<?php if (!defined('SITE')) exit('No direct script access allowed.');



trait Database
{ 


    public function getDB(){
        
        
        
        // MySQL hostname
        $host = $this->config['host'];
        //MySQL basename
        $dbname = $this->config['dbname'];
        // MySQL user
        $uname = $this->config['uname'];
        // MySQL password
        $upass = $this->config['upass'];
        
        $link_db = @mysqli_connect($host, $uname, $upass);
        if(!$link_db) exit('Нет подключения к БД');
        
                    mysqli_select_db($link_db,$dbname);
                    mysqli_set_charset($link_db, "utf8");
        
        
        return $link_db;
        
    }
    
    
    
    
}









?>