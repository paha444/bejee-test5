<?php if (!defined('SITE')) exit('No direct script access allowed.'); ?>

<?php $this->LoadTemplate('tmpl/head'); ?>

<body>

<?php $this->LoadTemplate('tmpl/header'); ?>


<main class="form-signin">
  <form action="/" id="registration_form" class="<?php echo $this->active_reg; ?>" name="registration" method="post" enctype="multipart/form-data"> 

    <img class="mb-4" src="//getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Регистрация</h1>
      <div>

                <input class="form-control" type="text" name="login" id="login" 
                value="<?php echo $this->FormRegData['login']; ?>" 
                placeholder="<?php $this->get_text('login'); ?>*" required />
                
                  <?php echo $this->CheckRegData['login']; ?>
                
    
        
      </div> 

      <div>
        <input class="form-control" type="password" name="password" id="password" value="<?php echo $this->FormRegData['password2']; ?>" placeholder="<?php $this->get_text('password'); ?>*" required />
      </div>
      
      <div>
        <input class="form-control" type="password" name="password2" id="password2" value="<?php echo $this->FormRegData['password2']; ?>" placeholder="<?php $this->get_text('password2'); ?>*" required />
        <?php echo $this->CheckRegData['password2']; ?>
      </div>
      

      <div>
        <input class="form-control" type="text" name="email" id="email" value="<?php echo $this->FormRegData['email']; ?>" placeholder="<?php $this->get_text('Email'); ?>*" required />
        <?php echo $this->CheckRegData['email']; ?>
      </div> 

      <div>
        <input class="form-control" type="text" name="name" id="name" placeholder="<?php $this->get_text('Name'); ?>" />
      </div> 

      <div>
        <input class="form-control" type="text" name="phone" id="phone" placeholder="<?php $this->get_text('Phone'); ?>" />
      </div> 

      <div>
        <textarea class="form-control" name="dop_info" id="dop_info" placeholder="<?php $this->get_text('dop_info_pl_txa'); ?>"></textarea>
      </div> 

      <div>
          <fieldset>
            <label><?php $this->get_text('your_image'); ?>*</label>
            <input type="file" name="image"/>
          </fieldset>  
      </div> 
      

      
     <div>
      <input type="hidden" name="oper" value="registration"/>  
      <input class="w-100 btn btn-lg btn-primary" name="submit" type="submit" value="<?php $this->get_text('reg_bt'); ?>" />
     </div>

      <div class="clear"></div>
  </form>
</main>

<?php $this->LoadTemplate('tmpl/footer'); ?>