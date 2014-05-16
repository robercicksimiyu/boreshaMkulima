<style>
  #login{
    max-width: 600px;
    margin:55px auto 30px;
    background: transparent;
  }

  

  .alert-warning{
    background: #ee0000;
    color:#000;
  }
  .alert.alert-success{
    color: #33cc66;
  }



  button{
    border-radius: 3px;
  }

  .modal-footer{
    border:0px;
  }



</style>

<div class="modal-content" id="login">
    <div class="modal-header">
      <h3>Sign In | <a href="<?=base_url('signup')?>"><i class="glyphicon glyphicon-chevron-right"></i> Create Account</a></h3>
    </div>

    <div class="modal-body">
    <?php if(($message)):?>
    <div class="alert alert-warning fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?=$message?>
      </div>
    <?php endif;?>
    <?php if($this->controller->session->flashdata('success')): ?>
      <div class="alert alert-success fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?=$this->controller->session->flashdata('success')?>
      </div>
      
    <?php endif;?>
    <?php echo form_open('accounts/login',array('class'=>'login'));?>

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="<?php echo $identity['name'];?>" class="form-control input-lg" placeholder="Email" value="<?php echo $identity['value'];?>">
      </div>

      <div class="clearfix" style="margin-top:8px;"></div>

      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input name="<?php echo $password['name'];?>" type="<?php echo $password['type'];?>" class="form-control input-lg" placeholder="Password" >
      </div>
     
        Remember me:</a> <input type="checkbox" name="remember" value="1" id="remember" style="margin-top:12px;left:10px;"> 
      
      <p><a href="<?=base_url('accounts/forgot_password')?>">Forgot password?</a></p>
      <div class="modal-footer" style="margin-top:-22px;">
        <button type="submit" class="">Sign in  <i class="glyphicon glyphicon-ok-circle"></i></button></br>      
      </div>

     </form>
    </div>
    
</div>
    
<script type="text/javascript">
  $('.alert').alert();
</script>

  

