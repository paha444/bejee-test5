<?php if (!defined('SITE')) exit('No direct script access allowed.');   // проверка на запуск файла с нашего сайта а не напрямую.


class App extends User
{
 
public $db;    
public $status_auth;    
public $role;    
public $user;
public $params;
public $site_url;
public $languages;
public $lang;
public $Reg;
public $CheckRegData;
public $CheckUpdateData;
public $FormRegData;

//public $tasks;


public $on_page = 3; // количество вывода задачь на странице

public $config;
public $message;

/////////


function __construct() {

   
    $this->getConfig();  // подключаем конфиг с настройками
    $this->getLang(); // подключаем файл с текстами
    $this->db = $this->getDB(); // подключаем БД
    $this->CheckAuth(); // проверяем авторизован пользователь или нет
    $this->getMessage(); // получаем сообщение


    $this->Router();
    
}


function Router(){
    
   
    switch ($_SERVER['REQUEST_METHOD']){
        ///////////////////////////////////////----- Обработка запросов из форм методом POST
        case "POST":

                switch ($_POST['oper']) {
                     case "login":
                         $this->Auth();
                     break;
                     case "registration":
                         $this->Register();
                     break;
                     case "update_user":
                         $this->Update_user();
                     break;
                     case "create_task":
                         $this->create_task();
                     break;
                     case "update_task":
                         if($this->role=='admin'){
                            $this->update_task();
                            $this->Redirect('/');
                         }
                     break;
                     
                }
        
        break;
        //////////////////////////////////////
        
        
        //////////////////////////////////////----------- Обработка запросов из адресной строки методом GET
        case "GET":
        
        $url = $_SERVER['REQUEST_URI'];
        $q = explode('/',$url);

        if(isset($q[1])){
        
            switch ($q[1]){
                
                //////////// 
                
                 case "admin":              /////////////////////// Админская часть //////////
                        
                        if($this->role=='admin'){
                                 
                            if(isset($q[2]) && $q[2]=='task' && isset($q[3])){
                            
                                switch ($q[3]){
                                    
                                    case "edit":
                                        
                                        $id = $this->CheckInt($q[4]);
                                        if($id){
                                            $this->edit_task($id); 
                                            $this->LoadTemplate('admin/edit_task');
                                        }else{
                                            $this->Redirect('/');
                                        }
                                        
                                    break;
                                    case "delete":
                                        
                                        $id = $this->CheckInt($q[4]);
                                        if($id){
                                            $this->delete_task($id); 
                                        }
                                        
                                        $this->Redirect('/');
                                    
                                    break;
                                }
                                 
                            }    
                        }

                 break;                
                                        /////////////////////// Админская часть /////////
                
                //////////
                
                
                 case "login":
                        if(!$this->status_auth){
                            $this->LoadTemplate('login');
                        }else{
                            $this->Redirect('/'); 
                        }
                 break;
                 case "registration":
                        if(!$this->status_auth){
                            $this->LoadTemplate('registration');
                        }else{
                            $this->Redirect('/'); 
                        }
                 break;
                 case "my_account":
                        if($this->status_auth){
                            $this->LoadTemplate('my_account');
                        }else{
                            $this->Redirect('/'); 
                        }
                 break;
                 case "logout":
                     $this->User_exit();
                 break;          
                 case "create_task":
                     $this->LoadTemplate('create_task');
                 break; 
                 
                 
                 //case "page":         
                 default:


                    $page = $this->GetVar('page');
                    if(!$page) $page = 1;
                    
                    $sort_by = $this->GetVar('sort_by');
                    $order_by = $this->GetVar('order_by');
                    
                    $this->index($page,$sort_by,$order_by);
                    $this->LoadTemplate('index');
                    
                 break;             
            }
            
        }  
        break;
       
        
    }  

    
}


function getLang(){
    include_once('language/ru.php');  ////////////// загрузка языкового файла
}

function getConfig(){
    include_once('config.php'); 
}


function delete_task($id){

    $sql = "DELETE FROM `tasks` WHERE `id` = '".$id."'";
    
    if(mysqli_query($this->db,$sql)){
        $this->setMessage('<span class="green">'.$this->get_text_m('text_15').'</span>');   
    }else{
        $this->setMessage('<span>'.mysqli_error($this->db).'</span>'); 
    }

}

function edit_task($id){

    $sql = "SELECT * FROM `tasks` WHERE `id` = '$id'";
    //echo $sql;
    $result = mysqli_query($this->db,$sql);
    $this->task = mysqli_fetch_object($result);
    
    if(!$this->task->id) 
        $this->Redirect('/');

}


function update_task(){


    $id = $this->PostVar('id');
    $name = $this->PostVar('name');
    $email = $this->PostVar('email');
    $task = $this->PostVar('task');
    $status = $this->PostVar('status');


    $sql = "UPDATE `tasks` SET 
    `name`='$name',
    `email`='$email',
    `task`='$task',
    `status`='$status'
     WHERE `id`='$id';";
    
    if(mysqli_query($this->db,$sql)){
        $this->setMessage('<span class="green">'.$this->get_text_m('text_2').'</span>');   
    }else{
        $this->setMessage('<span>'.mysqli_error($this->db).'</span>'); 
    }

            
    

}


function create_task(){
            
            //print_r($_POST); 
            
            $name = mysqli_real_escape_string($this->db,$_POST['name']);
            $email = mysqli_real_escape_string($this->db,$_POST['email']);
            $task = mysqli_real_escape_string($this->db,$_POST['task']);
        
            $sql = "INSERT INTO `tasks` (`name`,`email`,`task`) 
                    VALUES ('$name','$email','$task')";
                    
            if(mysqli_query($this->db,$sql)){
                $this->setMessage('<span class="green">'.$this->get_text_m('text_14').'</span>');   
            }else{
                $this->setMessage('<span class="green">'.mysqli_error($this->db).'</span>'); 
            }
            
            $this->Redirect('create_task');               


}


function index($page,$sort_by,$order_by){
        
        $this->tasks = array();

        
        $result = mysqli_query($this->db,"SELECT COUNT(*) FROM tasks");
        $posts = mysqli_fetch_row($result);
        
        //print_r($posts);
        
        // Находим общее число страниц
        $total = intval(($posts[0] - 1) / $this->on_page) + 1; 
        
        $this->tasks_pagination['total'] = $total;
        $this->tasks_pagination['active'] = $page;
        
        if($page>1){
            $this->tasks_pagination['prev'] = '/?page='.($page-1).'&sort_by='.$sort_by.'&order_by='.$order_by;
        }else{
            $this->tasks_pagination['prev'] = '/?page='.$page.'&sort_by='.$sort_by.'&order_by='.$order_by;
        }
        
        if($page<$total){
            $this->tasks_pagination['next'] = '/?page='.($page+1).'&sort_by='.$sort_by.'&order_by='.$order_by;
        }else{
            $this->tasks_pagination['next'] = '/?page='.$page.'&sort_by='.$sort_by.'&order_by='.$order_by;
        }

        $this->tasks_pagination['page'] = '/?page=%d&sort_by='.$sort_by.'&order_by='.$order_by;
        
        $this->tasks_pagination['sort_by'] = $sort_by;
        $this->tasks_pagination['order_by'] = $order_by;
        
        $start = $page * $this->on_page - $this->on_page; 
        
        $sql  = "";
        $sql .= "SELECT * FROM `tasks`";
        
        if($sort_by) $sql .= "ORDER BY $sort_by $order_by ";
        
        $sql .= "LIMIT $start, $this->on_page ";
        
        //echo $sql;
        
        $result = mysqli_query($this->db,$sql);
        
        while ($row = mysqli_fetch_object($result)) { 
            $this->tasks[] = $row; 
        }       
      
             
}





}


?>