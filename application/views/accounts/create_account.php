<style type="text/css">
	button{
		float:right;
	}
	.article-list_item{border:none;float:left;height:250px;margin-bottom:1.25em;width:450px}
	.article-list_item.article-list_item--featured{width:640px;margin-top:45px;}
  .alert{color: #f00;}
  .span6{width:450px;float:right;margin-right: 40px;margin-top: -40px;}

</style>
<div role="main" class="page page--primary category-javascript">
<div class="article-list">
	<div class="span6" data-offset="2">
		<form class="" action="/boreshaMkulima/accounts/create_account" method="post">
      <?php 
      if(isset($message)){
        echo "<i class='alert-error'>{$message}</i>";
        // var_dump($message);
      }        
      ?>
			<h2>Create Account</h2> 
      
			<input name="<?php echo $username['name'];?>" type="<?php echo $username['type'];?>" value="<?php echo $username['value'];?>" placeholder="username">
			<input name="<?php echo $identity['name'];?>" type="<?php echo $identity['type'];?>" placeholder="email">
      <input name="<?php echo $phone['name'];?>" type="<?php echo $phone['type'];?>" value="<?php echo $phone['value'];?>" placeholder="phone number">
      <input name="<?php echo $password['name'];?>" type="<?php echo $password['type'];?>" placeholder="password">
      <input name="<?php echo $c_password['name'];?>" type="<?php echo $c_password['type'];?>" placeholder="Confrim Password">
      
         
			<button >Register</button>

		</form>
	</div>

<li class="article-list_item article-list_item--featured featured tile post-tile" data-block="1" data-offset="">
  <article class="article article--micro category-design article--micro-featured" data-disqus-id="http://www.sitepoint.com/6-common-mistakes-logo-design/">
    
    <div class="article_video"><img src="<?php echo IMG;?>logo.png" alt="Boulder" height="168" width="146"></div>
    <section class="article_header">
      <h1 class="article_title"><a href="http://www.sitepoint.com/6-common-mistakes-logo-design/">Boresha Mkulima</a></h1>
      <div class="contributor article_contributor">
        <p class="contributor_name article_author-nAre you frustrated by lies - white or otherwise? Deliberately
misrepresented information, concealed emotions, and hidden motives
wreck havoc on daily conversations as well as on critical business
negotiations.
Most individuals cannot detect poisoned facts smothered with silken
words and laced with an impressive vocal tone. Well-placed words hide
duplicity so well that even average individuals get away with it.
ame">by <a href="http://www.sitepoint.com/author/kbutters/">Kerry Butters</a></p>
      </div>
      <p class="article_synopsis">Are you frustrated by lies - white or otherwise? Deliberately
misrepresented information, concealed emotions, and hidden motives
wreck havoc on daily conversations as well as on critical business
negotiations.
Most individuals cannot detect poisoned facts smothered with silken
words and laced with an impressive vocal tone. Well-placed words hide
duplicity so well that even average individuals get away with it.
</p>
      
      </section>
  </article>
 
</li>

</div>


</div>
