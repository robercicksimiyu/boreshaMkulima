<style type="text/css">
    button{
        float:right;
    }
    .article-list_item{border:none;float:left;height:250px;margin-bottom:1.25em;width:450px}
    .article-list_item.article-list_item--featured{width:640px;margin-top:45px;}
  .alert{color: #f00;}

</style>
<div role="main" class="page page--primary category-javascript">
  <a href="/boreshaMkulima/accounts/create_account"><button>Create Account</button></a>
<div class="article-list">
    <div class="article-list_item article-list" data-offset="2">
        <form class="span3" action="/boreshaMkulima/accounts/login" method="post">
      <?php 
      if(isset($message)){
        echo "<i class=''>{$message}</i>";
      }        
      ?>
            <h1>Login</h1> 
      
            <input name="<?php echo $identity['name'];?>" type="<?php echo $identity['type'];?>" value="<?php echo $identity['value'];?>">
            <input name="<?php echo $password['name'];?>" type="<?php echo $password['type'];?>" width="400">
      
            Remember me: <input type="checkbox" name="remember" value="1" id="remember">     
            <button >Login</button>
            <a href="/boreshaMkulima/accounts/forgot_password"></br>
              Forgot Password ?</a>
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
