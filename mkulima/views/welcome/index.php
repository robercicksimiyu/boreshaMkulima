<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

<style>

</style>
<div class="jumbotron" style="background:transparent">
  
    <h1>Boresha Mkulima!</h1>
    <p>Come lets share the agriculutral experience. We are concerned about you. Let share knowledge as we gain knowledge</p>
    <p><a href="<?php echo base_url('accounts/apply_editor');?>" class="btn btn-primary btn-lg">Become an Editor &raquo;</a></p>
    <?php
      if($this->controller->session->flashdata('aditor_a')){
        echo $this->controller->session->flashdata('editor_a');
      }

    ?>
  
</div>
<div class="container-fluid">
    <div class="row">
        <ul class="article-list">
          <?php if($articles) foreach($articles as $article):?>
          <li class="article-list_item  tile post-tile" data-block="4" data-offset="5">
          <article class="article article--micro category-ux " data-disqus-id="http://www.sitepoint.com/15-rules-making-accessible-links/">
            <header class="article_category"><h2 class="article_category_title"><a href=""><?php $this->show_category($article->category_id);?></a><a class="comment-info" href="http://www.sitepoint.com/15-rules-making-accessible-links/#comments"><span class="comment-info__count">9</span><span class="comment-info__icon icon-comment"></span></a></h2></header>
            
            <section class="article_header">
              <h1 class="article_title"><a href="<?php echo base_url('article/'.$article->id);?>">
                <?php echo $article->title?> </a></h1>
              <div style="margin-top:12px;"></div>
              <div class="">
                <p class="contributor_name article_author-name">by <a href="http://www.sitepoint.com/author/gian-wild/"><?php echo $article->author;?></a></p>
              </div>
              
              <div class="article_meta-data"><p class="article_pub-date"><time datetime="2014-02-20 09:03:45" pubdate="">Feb 20, 2014</time></p></div>
              </section>
          </article>
        </li>
        <?endforeach?>
        </ul>
    </div>
</div>

