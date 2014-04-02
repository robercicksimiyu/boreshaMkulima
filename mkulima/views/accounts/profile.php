<div class="panel panel-success col-md-9 col-md-offset-2">
  <?php foreach($profile_data as $detail):?>
    <div class="col-md-2">
       <img  height="100" width="100" src="<?php echo P_PIC.'/'.($this->gravator($detail->username));?>" class="img-circle" >
    </div>
    <div class="col-md-6">
      <h1><?php $this->fullname($detail->username);?></h1>
    </div>

    <div class="container-fluid clearfix">
     <div class="col-md-6">

      <div class="list-group page-header">
            <a href="#" class="list-group-item active">
              <h4 class="list-group-item-heading">Contact Information</h4>
              <p class="list-group-item-text">There are all reasons to connect</p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Phone Number</h4>
              <p class="list-group-item-text"><span class="text-muted"><?php echo $detail->phone;?></span></p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Email Address</h4>
              <p class="list-group-item-text"><span class="text-muted"><?php echo $detail->email;?></span></p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Location</h4>
              <p class="list-group-item-text"><span class="text-muted"><?php echo $detail->location;?></span></p>
            </a>
             <a href="#" class="list-group-item success active">
              <h4 class="list-group-item-heading">Other Information</h4>
              <p class="list-group-item-text">This might be important</p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Interests</h4>
              <p class="list-group-item-text"><span class="text-muted"><?php echo $detail->interests;?></span></p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Membership</h4>
              <p class="list-group-item-text"><span class="text-muted"><?php echo $this->timing($detail->created_on);?></span></p>
            </a>
          </div>
          <!-- testzone -->
     
    </div>
    <div class="col-md-6">
      
      <ul class="list-group">
            <a href="#" class="list-group-item active page-header">
                      Reputation
                    </a>
              <li class="list-group-item">
                <span  class="glyphicon glyphicon-question-sign"></span>
                <span class="badge"><?php echo $questions_num;?></span>
                Asked Questions
                <div class="progress progress-striped active">
                  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $questions_num/($this->question_counts())*100;?>%">
                    <span class="sr-only">45% Complete</span>
                  </div>
                </div>
              </li>

              <li class="list-group-item">
                <span  class="glyphicon glyphicon-ok-sign"></span>
                <span class="badge"><?php echo $answers_num;?></span>
                Answered questions
                <div class="progress progress-striped active">
                  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $answers_num/($this->response_counts())*100;?>%">
                    <span class="sr-only">45% Complete</span>
                  </div>
                </div>

              </li>
              <li class="list-group-item">
                <span  class="glyphicon glyphicon-comment"></span>
                <span class="badge"><?php echo $comments_num;?></span>
                 Comments

              </li>
            </ul>
    </div>
    </div>
  <?php endforeach;?>
</div>
