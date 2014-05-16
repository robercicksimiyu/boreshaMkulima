<style>
  #signup{
    max-width: 600px;
    margin:55px auto 30px;
    background: transparent;
  }

  #alert p{
    color:#fff;
  }

  alert{
    background: #ee0000;
  }

  button{
    border-radius: 3px;
  }

  .modal-footer{
    border:0px;
  }
input{
  max-height: 600px !important;
}


</style>
<div style="margin-top:23px;"></div>
<div class>
<div class="modal-content" id="signup">
    <div class="modal-header">
      <h3>Create Account | <a href="<?=base_url('login')?>"><i class="glyphicon glyphicon-chevron-right"></i> Sign In</a></h3>
    </div>

    <div class="modal-body" id="signup">
    <?php if(($message)):?>
    <div class="alert alert-warning" id="alert">
      <?=json_decode($message)?>
    </div>
    <?php endif;?>
    <?php echo form_open('signup',array('class'=>'login'));?>

      
        
        <input name="<?=$username['name'];?>"  class="input-group-lg" type="<?=$username['type'];?>" value="<?=$username['value'];?>" placeholder="username">
      

      
        
        <input name="<?php echo $identity['name'];?>" type="<?php echo $identity['type'];?>" value="<?=$identity['value']?>" placeholder="email">
      

      
        
        <input name="<?php echo $phone['name'];?>" type="<?php echo $phone['type'];?>" value="<?php echo $phone['value'];?>" placeholder="phone number">
      

      
        
        <input name="<?php echo $password['name'];?>" type="<?php echo $password['type'];?>" placeholder="password">
      

      
        
        <input name="<?php echo $c_password['name'];?>" type="<?php echo $c_password['type'];?>" placeholder="Confrim Password">
      

      
        <p><?=$captcha_img?></p>
        <input name="captcha_code" type="text" placeholder="insert code above">
      

            
      <p><a href="<?=base_url('accounts/forgot_password')?>">Forgot password?</a></p>
      <div class="modal-footer" style="margin-top:-22px;">
        <button type="submit" class="">Create Account</button></br>      
      </div>

     </form>
    </div>
    
</div>



<script type="text/javascript">
$('.signup').on('submit',function(e){
  e.preventDefault();
});
</script>