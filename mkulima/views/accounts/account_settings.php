
<style type="text/css">
*{
  color: #000;
}
</style>


<div role="" class="page page--primary category-javascript container">
  <?php foreach($profile_data as $profile):?>
    <div class="row">
      <div class="col-md-3">
        <div class="bs-sidebar hidden-print affix-top" role="complementary">
         <ul class="nav bs-sidenav">
          <li class="active"><a href="#less">LESS components</a></li>
          <li><a href="#plugins">jQuery plugins</a></li>
          <li><a href="#download">Download</a></li>
        </ul>
      </div>
      <div class="col-md-6">
        <header class="span5 left">
            <img style="border-radius:88%;margin:25px 12px 0;" height="100" width="100" src="<?php echo IMG.'account_pics/thumbs/'.$this->gravator($profile->username);?>" >
              <h1 class="product_contributor"></h1>  
              <?=form_open_multipart('accounts/upload_profile_picture')?>
              <?=form_upload('userfile')?>
              <input type="submit" class="btn" value="upload" placeholder="change profile picture">
              </form>
        </header>
      </div>
     <li  data-block="4" data-offset="5">
      <article class="span5 article article--micro category-ux " data-disqus-id="http://www.sitepoint.com/15-rules-making-accessible-links/">
        
        <div class="span5">
       
        </div>

        

        <section class="article_header">
          <h1 class="article_title">
            <div >
                <a class="article_author-title" href="<?php echo base_url();?>"></a><?php echo $profile->first_name." ".$profile->last_name;?></h1>
                <i class="article_contributor"><?php echo $profile->username;?></i><br>
                
                <?php echo "<strong>Account created:</strong>".$this->timing($profile->created_on);?>

            </div>
            
            <div class="article_meta-data"><p class="article_pub-date"><time datetime="2014-02-20 09:03:45" pubdate="">Feb 20, 2014</time></p></div>
          <div class="contributor article_contributor">
            <p class="contributor_name article_author-name"> <a href="http://www.sitepoint.com/author/gian-wild/">Gian Wild</a></p>
          </div>
          
          
      
          </section>
        <?php endforeach;?>
      </article>
    </li>
    </div>

</div>