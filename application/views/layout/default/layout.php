<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->


<html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    {{meta}}
    <title>{{title}}</title>
    <!-- <link rel="stylesheet" href="<?echo CSS;?>bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="<?echo CSS;?>bootstrap-responsive.min.css"> -->
    <link rel="stylesheet" href="<?echo CSS;?>main.css">
    <link rel="stylesheet" href="<?echo CSS;?>lounge.css">
    <link rel="stylesheet" href="<?echo CSS;?>customized.css">
    <style>
    
    </style>

    <script src="<?echo JS;?>modernizr.custom.js"></script>
</head>

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
            <a href="#" tabindex="-1">Topics</a>
            <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">« Back</a></h5></li>
              <li>
                <a class="category-html menuitem" href="#">Climate</a>
              </li>
              <li>
                <a class="category-css menuitem" href="#">Pests and Diseases</a>
              </li>
              <li>
                <a class="category-javascript menuitem" href="#">Infrustructure</a>
              </li>
              <li>
                <a class="category-php menuitem" href="#">Technology</a>
              </li>
              <li>
                <a class="category-ruby menuitem" href="h#">Market</a>
              </li>
                            
            </ul>
          </li>
          <li class="">
            <a href="/boreshaMkulima/discussion" tabindex="2">Discussions</a>
          </li>
          <li class="">
            <a href="#" tabindex="2">Research</a>
          </li>
          <li class="">
            <a href="#" tabindex="2">Updates</a>
          </li>
          <li class="">
            <a href="http://www.sitepoint.com/newsletter" tabindex="3">Subscribe</a>
          </li>
          <?php if($this->ion_auth->logged_in()):?>
          
          <li class="has-dropdown">
            <a href=""><img alt="" style="radius:100%" src="<?php echo P_PIC.'/'.$this->controller->session->userdata('gravator');?>" class="" height="45" width="45"><?php echo $this->controller->session->userdata('username');?></a>
            <ul class="dropdown" style=""><li class="title back js-generated"><h5><a href="#">« Back</a></h5></li>
              
              <li>
                <a class="category-ux menuitem" href="/boreshaMkulima/accounts/account_settings">Account Settings</a>
              </li>
              <li>
                <a class="category-ux menuitem" href="/boreshaMkulima/accounts/logout">Log Out</a>
              </li>
             
                            
            </ul>
          </li>
        <?php else:?>
          <li class="top-bar_search">
            <form method="get" action="http://www.sitepoint.com/">
              <input autocomplete="off" class="searchquery" id="search-box" name="s" placeholder="Search…" tabindex="4" type="text">
              <button tabindex="-1"></button>
            </form>
          </li>
        <?php endif;?>
        </ul>
      </section>
    
</nav>

{{content}}


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?echo JS;?>vendor/jquery-1.10.1.min.js"><\/script>')</script>

<script src="<?echo JS;?>vendor/bootstrap.min.js"></script>

<script src="<?echo JS;?>plugins.js"></script>
<script src="<?echo JS;?>me.js"></script>
<script src="<?echo JS;?>widgets.js"></script>

<script>
    // var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    //     g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    //     s.parentNode.insertBefore(g,s)}(document,'script'));
(function(){
    $('.placeholder').on('click',function(){
      console.log("message");
      $('.textarea').show();
    });
  }());
    
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