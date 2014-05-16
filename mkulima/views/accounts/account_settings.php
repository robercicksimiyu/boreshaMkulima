<style type="text/css">
h1,p,h2,div{
  color: #000;
}
.container{
  background: #fff;
}
code,img{
  margin-left: 2px;
}
.question_icon{
  background: url(<?=IMG?>/faq3.svg) no-repeat;
}
</style>
<div class="container">
  <?php if($this->controller->session->flashdata('profile_msg')): ?>
    <div class="alert alert-success fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?=$this->controller->session->flashdata('profile_msg')?>
    </div>
    
  <?php endif;?>
  <?php foreach($profile_data as $profile):?>
    <div class="row page-header">
      <!-- Showing gravator -->
      <div class="col-md-3">
          <img style="border-radius:88%;margin:25px 12px 0;" height="100" width="100" src="<?php echo IMG.'account_pics/'.$this->gravator($profile->username);?>" >
              
              <p><a data-toggle="modal" href="#update_profile" class="btn btn-large btn-primary">Edit Profile</a></p>
      </div>
      <!-- Edning gravotor area -->

      <!-- Showing profile information -->
      <div class="col-md-8" style="margin-top:1em;">
        <h2 class="lead"><?=$profile->first_name?>  <?=$profile->last_name?></h2>
        <p>Interests: <?php $interests=explode(',',$profile->interests);
            foreach($interests as $intrest){echo '<code>'.$intrest.'</code>';}?></p> 
        <td><?=$profile->location?> , Kenya</p>
        <hr>
        <img src="<?=IMG?>mobile15.svg" alt="">  <?=$profile->phone?>
        <img src="<?=IMG?>tweet.svg" alt="">  <a href="<?=$profile->twitter_link?>">@<?=$profile->username?></a>
        <img src="<?=IMG?>facebook12.svg" alt="">  <a href="<?=$profile->fb_link?>"><?=$this->fullname($profile->username)?></a>
        <img src="<?=IMG?>email6.svg" alt="">  <?=$profile->email?>
      </div>
    </div>
    <!-- End profile information -->

    <!-- Users past information -->
    <div class="row-fluid">
      <!-- =================================================================================== -->
      <div class="col-md-4">
        <h2> Latest Questions</h2>
        
        <?php if($this->controller->question_by($profile->username))
             foreach($this->controller->question_by($profile->username) as $question):?>
             <hr>
            <p><i class="glyphicon glyphicon-question-sign"></i> <a href="<?=base_url('questions/'.$question->id)?>"> <?=$question->question?> <a href="<?=base_url('accounts/delete_question/'.$question->id)?>"><i class="glyphicon glyphicon-trash pull-right"></i></a></p>
            
        <?php endforeach;?>
      </div>
      <!-- =================================================================================== -->
      <div class="col-md-4">
        <h2>Latest Answers</h2>
        <?php if($this->controller->answer_by($profile->username))
             foreach($this->controller->answer_by($profile->username) as $answer):?>
             <hr>
            <p><?=$answer->answer?> <a class="pull-right" href="<?=base_url('questions/'.$answer->question_id)?>"><small>view question</small>  <i class="glyphicon glyphicon-hand-right"></i></a></p>
       
        <?php endforeach;?>
      </div>
      <!-- =================================================================================== -->
      <div class="col-md-4">
        <h2>Comments Made</h2>
      </div>
    </div>
  
  </div>
<!-- End past information display -->
  
      
  <!-- Modal -->
  <div class="modal fade" id="update_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove-sign"></i></a>
          <h3 class="modal-title" style="color:#66cc33">Sign Up</h3>
          <div id="regmsg" style="color:#000">
        </div>
        </div>
        
        <div class="modal-body">
                <?php echo form_open_multipart('accounts/profile_setup',array('id'=>'create_account'));?>
                  <?php 
                  if(isset($message)){
                    echo "<i class='alert-error'>{$message}</i>";
                    // var_dump($message);
                  }        
                  ?>
                  <input name="first_name" type="text" value="<?=($profile->first_name)?$profile->first_name:""?>" placeholder="First Name">
                  <input name="last_name" type="text" value="<?=($profile->last_name)?$profile->last_name:""?>" placeholder="Last Name">
                  <input name="phone" type="text" value="<?=($profile->phone)?$profile->phone:""?>" placeholder="phone number">
                  <input name="residence" type="text" value="<?=($profile->location)?$profile->location:""?>" placeholder="Residence">
                  <input name="interests" type="text" value="<?=($profile->interests)?$profile->interests:""?>" placeholder="Intrests">
                  <input name="fb_link" type="text" value="<?=($profile->fb_link)?$profile->fb_link:""?>" placeholder="Facebook Link">
                  <input name="twitter_link" type="text" value="<?=($profile->twitter_link)?$profile->twitter_link:""?>" placeholder="Twitter Link">
                  <h3 style="color:#000;">Profile Picture </h3><input type="file" name="profile_pic" value="" />
                                    
                  <button id="reg">Update</button>

                </form>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->        
              
 <?php endforeach;?>           
              