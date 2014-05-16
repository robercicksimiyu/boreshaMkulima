<style type="text/css">
  .container{
    background: #fff;
  }
  h1,p,h2{
    color: #000;
  }
</style>

<div class="container clearfix">
      <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <div class="well sidebar-nav">
          <ul class="nav">
            <li>Research</li>
            <li clss="btn btn-success"><a href="<?php echo base_url('research/research_start');?>">Write</a></li>
            
            
          </ul>
        </div><!--/.well -->
      </div><!--/span-->
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div>
            <h1>Research</h1>
            <p>Leading the way in farmers extention and knowledge dessemination</p>
          </div>
          <div class="row">
            <?php foreach($research as $row):?>
            <div class="col-6 col-sm-6 col-lg-4">
              <h2><?php echo $row->topic;?></h2>
              <p><?php echo $row->excerpt;?> <a class="btn btn-default" href="<?php echo base_url('research/view_research/'.$row->id);?>">Full research »</a></p>
             
            </div><!--/span-->
            <?php endforeach;?>
            
          </div><!--/row-->
        </div><!--/span-->

        
      </div><!--/row-->

      <hr>

      

    </div>