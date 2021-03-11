<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>

<?php $this->LoadTemplate('tmpl/head'); ?>

<body class="bg-light">


<?php $this->LoadTemplate('tmpl/header'); ?>



<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Редактирование задачи</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-12 mb-4">
            
            <?php //print_r($this->task); ?>

              <form action="/" method="post" enctype="multipart/form-data"> 

                  <div class="row">
                      <div class="col-md-12 mb-4">
                        <label for="status">Статус</label>
                     
                        <select id="status" name="status" class="form-control" >
                            <option value="0">Не проверено</option>
                            <option value="1">Проверено</option>
                        </select>                      
                      
                      </div> 
                      
                <script type="text/javascript">
                    document.getElementById('status').value='<?php echo $this->task->status ?>';
                </script>                    
                      
                      
                  </div> 
            
                  <div class="row">
                      <div class="col-md-12 mb-4">
                        <input class="form-control" type="text" name="name"
                        value="<?php echo $this->task->name ?>"
                        placeholder="Имя пользователя" required/>
                      </div> 
                  </div> 
            
                  <div class="row">
                      <div class="col-md-12 mb-4">
                        <input class="form-control" type="text" name="email"
                        value="<?php echo $this->task->email ?>"
                        placeholder="Email" required />
                      </div> 
                  </div> 
            
                  <div class="row">
                      <div class="col-md-12 mb-4">
                        <textarea class="form-control" name="task"
                        placeholder="Текст задачи" required><?php echo $this->task->task ?></textarea>
                      </div> 
                  </div> 
                   
                 <div>
                  <input type="hidden" name="id" value="<?php echo $this->task->id ?>"/>  
                  <input type="hidden" name="oper" value="update_task"/>  
                  <input class="w-100 btn btn-lg btn-success mt-3" name="submit" 
                  type="submit" value="Сохранить" />
                 </div>

              </form>          
          
          
        </div>
      </div>


    </div>









<?php $this->LoadTemplate('tmpl/footer'); ?>