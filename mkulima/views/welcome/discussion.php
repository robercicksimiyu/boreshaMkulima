<style type="text/css">
    button{
        float:right;
    }
    .article-list_item{border:none;float:left;height:250px;margin-bottom:1.25em;width:450px}
    .article-list_item.article-list_item--featured{width:640px;margin-top:45px;}
  .alert{color: #f00;}

</style>
<?php if($this->controller->session->flashdata('request_failed')): ?>
  <div class="alert alert-success fade in">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?=$this->controller->session->flashdata('request_failed')?>
  </div>
  
<?php endif;?>
<div class="container">
  <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        
        <div class="carousel-inner">
          <div class="item active">
            <img src="data:image/png;base64," data-src="holder.js/100%x500/auto/#777:#7a7a7a/text:First slide" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Discussion Forum.</h1>
                <p>Information Platform Creating Solutions for Farmers. Get answers to your questions</p>
                <p><a data-toggle="modal" href="#signup" class="btn btn-large btn-primary">Sign up today</a></p>
                <p><a data-toggle="modal" href="#signin" class="btn btn-large btn-primary">Sign in</a></p>
              </div>
            </div>
          </div>
          
          
        </div>
        
      </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove-sign"></i></a>
          <h3 class="modal-title" style="color:#66cc33">Sign Up</h3>
          <div id="regmsg" style="color:#000">
        </div>
        </div>
        
        <div class="modal-body">
                <?php echo form_open('accounts/create_account',array('id'=>'create_account'));?>
                  <?php 
                  if(isset($message)){
                    echo "<i class='alert-error'>{$message}</i>";
                    // var_dump($message);
                  }        
                  ?>
                  <input name="username" type="text" value="" placeholder="username">
                  <input name="identity" type="text" placeholder="email">
                  <input name="phone" type="text" value="" placeholder="phone number">
                  <input name="password" type="password" placeholder="password">
                  <input name="c_password" type="password" placeholder="Confrim Password">
                  <p><?=$captcha_img?></p>
                  <input name="captcha_code" type="text" placeholder="insert code above">
                     
                  <button id="reg">Register</button>

                </form>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- Modal -->
  <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove-sign"></i></a>
          <h3 class="modal-title" style="color:#66cc33">Sign in</h3>
        </div>
        
        <div class="modal-body">
            <form class="" action="<?php echo base_url('accounts/login')?>" method="post">
          <?php 
          if(isset($message)){
            echo "<i class=''>{$message}</i>";
          }        
          ?>
                <input name="identity" type="email" autofocus required placeholder="Email">
                <input name="password" type="password" required placeholder="password">
          
                <a>Remember me:</a> <input type="checkbox" name="remember" value="1" id="remember">     
                <button >Sign in</button>
                <a href="/boreshaMkulima/accounts/forgot_password"></br>
                  Forgot Password ?</a>
            </form>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove-sign"></i></a>
          <h3 class="modal-title" style="color:#66cc33">Sign in</h3>
        </div>
        
        <div class="modal-body">
            <p>Successfull creation of accounts</p>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<!-- <div role="main" class="page page--primary category-javascript container">

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
  
      
      
  </article>
 
</li>

</div>


</div>
 -->

 <script type="text/javascript">
 function processData(data){
  alert(data);
 }
$('#reg').on('click',function(e){
  e.preventDefault();
  $.post("<?php echo base_url('accounts/create_account');?>",$('#create_account').serialize(),function(data){
    if(data){
      $('#regmsg').empty().append(data);
    }else{
      $('html').load("<?php echo base_url('discussion_forum/success');?>");
    }
  },"json");

  /*$.ajax({
    url:,
    type:'POST',
    dataType:'json',
    data:$('#create_account').serialize(),
    success:function(data){
      alert("Message");
      //$(".modal_header").append(message).append("sdsdsds");
    }*/
  
});
</script>