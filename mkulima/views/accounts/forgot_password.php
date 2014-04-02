<style type="text/css">
	button{
		float:right;
	}
	.article-list_item{border:none;float:left;height:relative;margin-bottom:1.25em;width:450px}
	.article-list_item.article-list_item--featured{width:640px;margin-top:45px;}
  .alert{color: #f00;}

</style>
<div role="main" class="page page--primary category-javascript">
  
<div class="article-list">
  <?php 
      if(!empty($message)){
        echo "<i class='alert-error'>{$message}</i>";
      }        
      ?>
	<div class="article-list_item article-list" data-offset=""> 
		
      
			<h1>Change Password</h1> 
      <?php echo form_open('accounts/forgot_password');?>
			<input name="<?php echo $email['name'];?>" type="<?php echo $email['type'];?>"  placeholder="<?php echo $email['placeholder'];?>">
			         
			<button>Submit</button>

		</form>
    <div class="clearfix"></div>

	</div>



</div>


</div>
