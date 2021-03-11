<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>

<?php $this->LoadTemplate('tmpl/head'); ?>

<body class="bg-light">


<?php $this->LoadTemplate('tmpl/header'); ?>



<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Личный кабинет</h2>
        <p class="lead"></p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-1 mb-4">

            <form action="/logout/" method="GET" class="mb-3">
                <input name="hash" type="hidden" value="<?php echo $_SESSION['hash'] ?>"><br>
                <input class="w-100 btn btn-lg btn-primary" name="submit" type="submit" value="<?php $this->get_text('Exit'); ?>">
            </form>  
          
            <?php if( $this->params['image']){ ?>
            <div class="user_image">
                <img src="/images/avatars/<?php echo $this->params['image']; ?>"/>
            </div>
            <?php } ?>
            
           

        </div>
        <div class="col-md-8 order-md-2">
          <h4 class="mb-3"><?php $this->get_text('text_1',$this->params['name']); ?></h4>
          


              <form action="/" id="user_info" name="user_info" method="post" enctype="multipart/form-data"> 
            
                  <div>
                    <input class="form-control" type="text" name="login" id="login" value="<?php echo $this->params['login']; ?>" 
                    placeholder="<?php $this->get_text('login'); ?>*" disabled="disabled" />
                    <?php //echo $this->CheckRegData['login']; ?>
                  </div> 
            
                  <div>
                    <label class="lock" for="password"></label>
                    <input class="form-control" type="password" name="password" id="password" value="" placeholder="<?php $this->get_text('password'); ?>" />
                  </div>
                  
                  <div>
                    <input class="form-control" type="password" name="password2" id="password2" value="" placeholder="<?php $this->get_text('password2'); ?>" />
                    <?php echo $this->CheckUpdateData['password2']; ?>
                  </div>
                  
            
                  <div>
                    <input class="form-control" type="text" name="email" id="email" value="<?php echo $this->params['email']; ?>" placeholder="<?php $this->get_text('Email'); ?>*" required />
                    <?php echo $this->CheckUpdateData['email']; ?>
                  </div> 
            
                  <div>
                    <input class="form-control" type="text" name="name" id="name" value="<?php echo $this->params['name']; ?>" placeholder="<?php $this->get_text('Name'); ?>" />
                  </div> 
            
            
                  <div>
                    <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $this->params['phone']; ?>" placeholder="<?php $this->get_text('Phone'); ?>" />
                  </div> 
            
                  <div>
                    <textarea class="form-control" name="dop_info" id="dop_info" placeholder="<?php $this->get_text('dop_info_pl_txa'); ?>"><?php echo $this->params['dop_info']; ?></textarea>
                  </div> 
            
                  <div>
                  <fieldset>
                    <label><?php $this->get_text('your_image'); ?></label>
                    <input class="form-control" type="file" name="image"/>
                  </fieldset>  
                  </div> 
                   
                 <div>
                  <input type="hidden" name="oper" value="update_user"/>  
                  <input class="w-100 btn btn-lg btn-success mt-3" name="submit" type="submit" value="<?php $this->get_text('update_bt'); ?>" />
                 </div>
            
                  <div class="clear"></div>
              </form>          
          
          
        </div>
      </div>


    </div>









<?php $this->LoadTemplate('tmpl/footer'); ?>