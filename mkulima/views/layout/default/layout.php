<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->


<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{meta}}
    <title>{{title}}</title>
    <link rel="stylesheet" href="<?echo CSS;?>bootstrap.css">
    
    <link rel="stylesheet" href="<?echo CSS;?>main.css">
    <link rel="stylesheet" href="<?echo CSS;?>lounge.css">
    <link rel="stylesheet" href="<?echo CSS;?>customized.css">
    <style>
    
    </style>
    <script src="<?echo JS;?>modernizr.custom.js"></script>
    <script src="<?echo JS;?>tiny_mce/tiny_mce.js"></script>

    <script src="<?echo JS;?>vendor/jquery-1.10.1.min.js"></script>
    <script src="<?echo JS;?>vendor/bootstrap.js"></script>
</head>
<style>
  body{
    background: url('<?=IMG?>/new.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  
  
</style>

<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<nav class="top-bar" role="navigation">
    <ul class="title-area">
      <li class="name">
        <div class="logo">
          <a class="logomark" href="/boreshaMkulima" tabindex="1">
            <img src="<?php echo IMG;?>logo.png" alt="BM">
          </a>
        </div>
      </li>
      <li class="toggle-topbar menu-icon">
        <a href="#"><span>Menu</span></a>
      </li>
    </ul>
    <section class="top-bar-section" style="left: 0%;">
        <ul class="right">
          <li class="has-dropdown">
            <a href="<?echo base_url();?>" tabindex="-1">Topics</a>
            <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">« Back</a></h5></li>
              <li>
                <a class="menuitem" href="<?=base_url('category/climate')?>">Climate</a>
              </li>
              <li>
                <a class="menuitem" href="<?=base_url('category/pestsanddiseases')?>">Pests and Diseases</a>
              </li>
              <li>
                <a class="menuitem" href="<?=base_url('category/infrustructure')?>">Infrustructure</a>
              </li>
              <li>
                <a class="menuitem" href="<?=base_url('category/technology')?>">Technology</a>
              </li>
              <li>
                <a class="menuitem" href="<?=base_url('category/marketing')?>">Market</a>
              </li>
                            
            </ul>
          </li>
          <?php if($this->controller->session->userdata('role')):?>
            <li class="">
              <a href="<?php echo base_url('publish');?>" tabindex="2">Post on <?php $this->view_category($this->controller->session->userdata('username'));?></a>
            </li>
          <?php endif;?>
          <li class="">
            <a href="<?=base_url('discussion')?>" tabindex="2">Discussions</a>
          </li>
          <li class="">
            <a href="<?php echo base_url('research');?>" tabindex="2">Research</a>
          </li>
          <li class="">
            <a href="#" tabindex="2">Updates</a>
          </li>
          <li class="">
            <a href="http://www.sitepoint.com/newsletter" tabindex="3">Subscribe</a>
          </li>
          <?php if($this->controller->ion_auth->is_admin()):?>
            <li><a href="<?php echo base_url('admin/dashboard');?>">Admin Panel</li>
          <?php endif;?>
          <?php if($this->controller->ion_auth->logged_in()):?>
          <li class="top-bar_search">
            <form method="get" action="http://www.sitepoint.com/">
              <input autocomplete="off" class="searchquery" id="search-box" name="s" placeholder="Search…" tabindex="4" type="text">
              <button tabindex="-1"></button>
            </form>
          </li>
          
          <li class="has-dropdown">
            <a href=""><img alt="" style="border-radius:88%" src="<?php echo P_PIC.'/'.$this->controller->session->userdata('gravator');?>" class="" height="45" width="45"><?php echo $this->controller->session->userdata('username');?></a>
            <ul class="dropdown" style=""><li class="title back js-generated"><h5><a href="#">« Back</a></h5></li>
              
              <li>
                <a class="category-ux menuitem" href="<?php echo base_url('profile');?>">Account Settings</a>
              </li>
              <li>
                <a class="category-ux menuitem" href="<?php echo base_url('logout');?>">Log Out</a>
              </li>                         
            </ul>
          </li>
        <?php else:?>
          <li class='create_account'>
            <a href="<?php echo base_url('login');?>" class="category-ux menuitem" >Sign in</a>
          </li>
        <?php endif;?>
        </ul>
      </section>
    
</nav>


{{content}}


<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->



<script src="<?echo JS;?>plugins.js"></script>
<script src="<?echo JS;?>me.js"></script>
<script src="<?echo JS;?>widgets.js"></script>
<script src="<?echo JS;?>vendor/handlebars-v1.3.0.js"></script>
<script>
    // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    //     g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    //     s.parentNode.insertBefore(g,s)}(document,'script'));

var Search={
  init:function(config){
    this.config=config;
    this.bindEvents();
    this.setupTemplates();
  },

  bindEvents:function(){
    this.config.search_input.on('keyup',this.searchQuestions);
    this.config.search_btn.on('click',this.searchQuestions);
    this.config.search_btn.on('click',this.clickSearch);
  },

  setupTemplates:function(){
    this.config.questionListTemplate=Handlebars.compile(this.config.questionListTemplate);
  },

  searchQuestions:function(){
    var self=Search;
    if(self.config.search_input.val()===''){
          self.config.results.empty();
    }
    // self.config.nav_primary.html(self.config.search);
    var self=Search;
    var form_data=self.config.search_form.serialize();
    $this=$(this);
    $.ajax({
      url:"<?php echo base_url('discussion/search')?>",
      type:'POST',
      dataType:'json',
      data:form_data,
      success:function(data){
         self.config.results.empty().append(self.config.questionListTemplate(data));
      }
    });
  },

  clickSearch:function(e){
    e.preventDefault();
    this.searchQuestions();
  },

  selectCountry:function(e){
    var self=Countries;
    $this=$(this);
    e.preventDefault();
    var nValue=$this.attr('alt');
    self.config.searchInput.val(nValue);
    self.config.results.empty();
    
  }
}

Search.init({
  search_form:$('.search_form'),
  search_btn:$('.search_btn'),
  search_input:$('#search_input'),
  results:$('div#results'),
  questionListTemplate:$('#search_results_template').html(),
  nav_primary:$(".nav-primary"),
  search:$(".search")
  
});


    
</script>

</body>
<footer class="site-footer" role="contentinfo" style="margin-top:px;">
       <div class="row"> 

        <ul class="footer-links">
          <li class="foot-link_item">
            <h3>About</h3>
          </li>
          <li class="foot-link_item">
            <a href="http://www.sitepoint.com/about-us/">About us</a>
          </li>
          <li class="foot-link_item">
            <a href="http://www.sitepoint.com/advertising">Advertise</a>
          </li>
          <li class="foot-link_item">
            <a href="http://www.sitepoint.com/legals">Legals</a>
          </li>
          <li class="foot-link_item">
            <a href="mailto:feedback@sitepoint.com">Feedback</a>
          </li>
        </ul>

        <ul class="footer-links">
          <li class="foot-link_item">
            <h3>Our Sites</h3>
          </li>
          <li class="foot-link_item">
            <a href="http://www.learnable.com/" target="_blank">Learnable</a>
          </li>
          <li class="foot-link_item">
            <a href="http://reference.sitepoint.com/" target="_blank">Reference</a>
          </li>
          <li class="foot-link_item">
            <a href="http://www.sitepoint.com/hosting-reviews/" target="_blank">Hosting Reviews</a>
          </li>
          <li class="foot-link_item">
            <a href="http://www.sitepoint.com/web-foundations/">Web Foundations</a>
          </li>
        </ul>

        <ul class="footer-links">
          <li class="foot-link_item">
            <h3>Connect</h3>
          </li>
          <li class="foot-link_item foot-link_item--icons">
            <a href="http://www.sitepoint.com/feed"><i class="icon-rss icon-blocks icon-blocks--rss"></i></a>
            <a href="http://www.sitepoint.com/newsletter"><i class="icon-envelope-alt icon-blocks icon-blocks--newsletter"></i></a>
            <a href="https://www.facebook.com/sitepoint" target="_blank"><i class="icon-facebook icon-blocks icon-blocks--facebook"></i></a>
            <a href="http://twitter.com/sitepointdotcom" target="_blank"><i class="icon-twitter icon-blocks icon-blocks--twitter"></i></a>
            <a href="https://plus.google.com/+sitepoint" target="_blank"><i class="icon-google-plus icon-blocks icon-blocks--google-plus"></i></a>
          </li>
        </ul>

        <p class="site-footer_copyright">
          © 2000 – 2014 Dcyntech Ltd.
        </p>

      </div>
    </footer>
</html>