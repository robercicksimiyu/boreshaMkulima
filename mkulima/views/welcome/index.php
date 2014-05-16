<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
<link rel="stylesheet" type="text/css" href="<?=CSS?>/demo2.css">
<link rel="stylesheet" type="text/css" href="<?=CSS?>/component.css">
<style>
  .rotate{
    /* Safari */
    -webkit-transform: rotate(-12deg);

    /* Firefox */
    -moz-transform: rotate(-12deg);

    /* IE */
    -ms-transform: rotate(-12deg);

    /* Opera */
    -o-transform: rotate(-12deg);

    /* Internet Explorer */
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1.3);
      font-size: 1em;
       border: 2px dashed #fff;
       border-radius: 10px;
       box-shadow: 0 0 0 4px #7c5c45, 2px 1px 6px 4px rgba(10, 10, 0, 0.5);
       text-shadow: -1px -1px #eeeeee;
       font-weight: normal;

  }

  article{
    background-color: #fff;
    padding:2px 0;
    border-bottom: 1px solid #eee;
  }

.carousel{
  margin: 0 auto;
  height: 38em;
  background: url(<?=IMG?>/bg2.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
 
.carousel .container {
  position: relative;
  z-index: 9;
}

.carousel-control {
  font-size: 120px;
  text-shadow: 0 1px 1px rgba(0,0,0,.4);
  background-color: transparent;
  border: 0;
  z-index: 10;
}


.carousel-caption {
  background-color: transparent;
  position: static;
  max-width: 550px;
  padding: 0 20px;
  margin: 18% auto 0;
}

.carousel-caption h1,
.carousel-caption .lead {
  margin: 0;
  line-height: 1.25;
  color: #fff;
  text-shadow: 0 1px 1px rgba(0,0,0,.4);
}
.carousel-caption .btn {
  margin-top: 10px;
}

.front_logo{
  
  border: 3px solid #fff;
  background: transparent;
  color: #ffcc33;
  webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
}



h2.lead{
  margin: 0 auto;
  font-weight: 300;
  font-size: 2.0em;
  line-height: 1.3;
  width:100%;
 
}

.cover{
  background: url(<?=IMG?>/new.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  padding-bottom: 15px;
}
button{
  margin: 6em -1.8em;
  border: 3px solid #6c8ad2 !important;
  background: transparent;
}

.author{
  color:#66cc33;
}

.btn_start{
  margin:1em auto 0;max-width:300px;text-align:center;cursor: pointer; 
}
.top{
  height:2em;
  width: 2em;
  position: absolute;
  bottom: 2em;
  position: fixed;
  background: #777;
  padding:2px;
  right:1em;
  z-index: 1;
  border-radius: 88%;
}

.site-footer{
  z-index: 0;


.alert{
  border-radius:0;
  background: #ffcc33;
}


</style>

<div class="top"><a href="#"><img src="<?=IMG?>/ascendant.svg"></a></div>
<div class="cover">
  <div id="myCarousel" class="carousel slide" >
      <div class="carousel-inner">
        
        <div class="item active">
          <?php if($this->controller->session->flashdata('editor_error')):?>
            <div class="alert alert-success fade in">
                    <small type="button" class="close" data-dismiss="alert" aria-hidden="true">×</small>
                    <?=$this->controller->session->flashdata('editor_error')?>
            </div>
          <?php endif;?>

          <?php if($this->controller->session->flashdata('editor_a')):?>
            <div class="alert alert-success fade in">
                    <small type="button" class="close" data-dismiss="alert" aria-hidden="true">×</small>
                    <?=$this->controller->session->flashdata('editor_a')?>
            </div>
          <?php endif;?>

          <div class="container">
            <div class="carousel-caption">
              <h1 class="front_logo">Boresha Mkulima</h1>
             <h2 class="lead">Transforming the farmers experience</h2>

            </div>
          </div>
          
        </div>
        <a href="#articles"><h1 href="#articles" style=""class="front_logo btn_start">Check out</h1></a>
        <a href="#articles"><h1 href="#articles" style=""class=" btn_start"></h1></a>
        
  </div>
   
</div>  

<div id="articles"></div>
<div class="alert alert-success fade in">
        <small type="button" class="close" data-dismiss="alert" aria-hidden="true">×</small>
        <large>Want to write articles for farmers <i class="glyphicon glyphicon-hand-right"></i>  <a href="<?=base_url('accounts/apply_editor')?>" style="text-decoration:none;margin-top:-.6em" class="btn btn-primary pull-right">Editors Application</a>
</div>
<section id="grid" class="grid clearfix">
  <?php if($articles) foreach($articles as $article):?>
  <a href="<?php echo base_url('article/'.$article->id);?>" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
    <figure>
      <img src="<?=IMG?>/2.png" />
      <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
      <figcaption>
        <h2><?php $this->show_category($article->category_id);?></h2>
        <p><?=ucfirst($article->title)?> by <span class="author"><?=$article->author?></span></p>

        <button>View</button>
      </figcaption>
    </figure>
  </a>
<?php endforeach;?>
</section>
<!-- <div class="jumbotron" style="background:transparent">
  
    <h1 class="rotate pull-right">Boresha Mkulima!</h1>
    <h2>Come lets share the agriculutral experience. We are concerned about you. Let share knowledge as we gain knowledge</h2>
    <p><a href="<?php echo base_url('accounts/apply_editor');?>" class="btn btn-primary btn-lg">Become an Editor &raquo;</a></p>
    <?php
      if($this->controller->session->flashdata('aditor_a')){
        echo $this->controller->session->flashdata('editor_a');
      }

    ?>
  
</div> -->



</div>
<script>
      (function() {
  
        function init() {
          var speed = 300,
            easing = mina.backout;

          [].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
            var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
              pathConfig = {
                from : path.attr( 'd' ),
                to : el.getAttribute( 'data-path-hover' )
              };

            el.addEventListener( 'mouseenter', function() {
              path.animate( { 'path' : pathConfig.to }, speed, easing );
            } );

            el.addEventListener( 'mouseleave', function() {
              path.animate( { 'path' : pathConfig.from }, speed, easing );
            } );
          } );
        }

        init();

      })();
    </script>
