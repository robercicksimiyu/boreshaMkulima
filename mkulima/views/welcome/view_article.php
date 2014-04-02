<header id="main-nav">

<div id="discovery-top"></div>

<div id="onboard"></div>

<nav class="nav nav-primary">
<ul>
<li class="tab-conversation active">

<a href="#" data-role="post-count" class="publisher-nav-color" data-nav="conversation">27 questions</a>
</li>


</ul>
</nav>

</header>

<?php foreach($articles as $key):?>
<div class="panel panel-success col-md-9 col-md-offset-2">

  <div class="page-header">
    <h1><?php echo $key->title;?></h1>
  </div>
     
   <div class="panel-body">
       <?php echo $key->content;?>
   </div>

   <div class="page-header">
   	<h3>About Author</h3>
    </div>
    <?php foreach($this->author_details($key->author) as $detail):?>
    <div class="col-md-3">
     <img alt="" style="border-radius:88%" src="<?php echo P_PIC.'/'.$this->gravator($key->author);?>" class="" height="60" width="60"> 
     <h5><?php echo $this->fullname($detail->username);?></h5>
    </div>
    <div class="col-md-7">
      <p class="page-header"><strong>Specialization</strong></p>
      <p><?php echo $detail->specialization;?></p>

      <p class="page-header"><strong>Brief Description</strong></p>
      <p><?php echo $detail->about_info;?></p>

      <p class="page-header"><strong>Working Place</strong></p>
      <p><?php echo $detail->working_place;?></p>
      
    </div>
    <?php endforeach;?>
</div>

<?php endforeach;?>