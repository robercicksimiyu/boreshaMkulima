<div id="layout">
  <header id="main-nav">
    <nav class="nav nav-primary">
      <ul>

        <li class="tab-conversation active">
          <a href="<?php echo base_url();?>" data-role="post-count" class="publisher-nav-color" data-nav="conversation"><?php //echo $question_number;?> <strong>Questions</strong></a>
        </li>

        <li class="tab-community">
           <a href="<?php echo base_url('discussion/askQuestion');?>" class="publisher-nav-color" data-nav="community" id="community-tab"><strong>Ask Question</strong></a>
        </li>

        <li class="tab-community">
             <a href="<?php echo base_url('discussion/search');?>" class="publisher-nav-color" data-nav="community" id="community-tab"><strong>Search Question</strong></a>
        </li>

      </ul>
    </nav>
  </header>

  <section class="panel col-md-9 col-md-offset-2 header-post" data-role="main" data-zone="thread">
  <?php if($this->controller->session->flashdata('question_success')):?>
    <div class="alert alert-success fade in">
            <small type="button" class="close" data-dismiss="alert" aria-hidden="true">×</small>
            <?=$this->controller->session->flashdata('question_success')?>
    </div>
  <?php endif;?>
  <div id="posts">
    <ul id="post-list" class="post-list">
    <?php foreach($questions as $question):?>
      <li id="post-1234898982 highlighted-post " class="post ">
          <div data-role="post-content" class="post-content main_question">
            <div class="avatar hovercard">
               <a href="http://disqus.com/manchuck/" class="user" data-action="profile" data-user="93945838">
                <img data-role="user-avatar" data-user="93945838" src="<?php echo IMG.'account_pics/'.$this->gravator($question->username);?>" class="img-circle"alt="Avatar"></a>
           </div>
           <div class="post-body">
              <header>
                <span class="post-byline">
                  <span class="author publisher-anchor-color"><a href="<?php echo base_url('accounts/profile/'.$question->username);?>" data-action="profile" data-user="93945838" data-role="username"><?php echo strtoupper($question->username);?>™</a></span>
                </span>

                <div class="post-meta">
                  <span class="bullet time-ago-bullet" aria-hidden="true">•</span>
                  <a href="#comment-1234898982" data-role="relative-time" class="time-ago" title="Friday, February 7 2014 8:54 PM">
                    <?php echo $this->timing($question->time_posted);?>
                </a>

              </div>
              
            </header>
            <!-- Body Container -->
            <div class="post-body-inner">
              <div class="post-message-container" data-role="message-container">
                <div class="publisher-anchor-color" data-role="message-content">
                  <div class="post-message " data-role="message" dir="auto">
                        <p><?php echo $question->question;?></p>
                  </div>
                  <div class="post-media"><ul data-role="post-media-list"></ul></div>
                </div>
              </div>
                <a class="see-more hidden" title="see more" data-action="see-more">see more</a>
            </div>
            <!-- end of container -->
            
            
        </div>
        <div data-role="blacklist-form"></div>
        <div class="reply-form-container" data-role="reply-form"></div>
        </div>

        <ul data-role="children" class="children">
        <?php if($this->discussion_answer($question->id)) 
           foreach($this->discussion_answer($question->id) as $answer):?>
           <!-- start of answers -->
          <li id="post-1234932123" class="post">
          <div data-role="post-content" class="post-content question_answer">
            <div class="indicator"></div>
            <div class="avatar hovercard">
              <a href="http://disqus.com/isimmons33/" class="user" data-action="profile" data-user="26794029">
              <img data-role="user-avatar" data-user="26794029" src="<?php echo IMG.'account_pics/'.$this->controller->gravator($answer->username);?>" alt="Avatar"></a>
            </div>
            <div class="post-body">
            <header>
                <span class="post-byline"><span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="26794029" data-role="username"><?=$answer->username?></a></span>
                  <span><a href="#comment-1234898982" class="parent-link" data-role="parent-link">
                  <i aria-hidden="true" class="icon-forward" title="in reply to"></i><?php echo $question->username;?></a></span>
               </span>
              <div class="post-meta">
                <span class="bullet time-ago-bullet" aria-hidden="true">•</span>
                <a href="#comment-1234932123" data-role="relative-time" class="time-ago" title="Friday, February 7 2014 9:19 PM"><?php echo $this->timing($answer->time_answered);?></a>

              </div>
              
          </header>
          <div class="post-body-inner">
             <div class="post-message-container" data-role="message-container">
              <div class="publisher-anchor-color" data-role="message-content">
                <div class="post-message " data-role="message" dir="auto">
                  <p><?=$answer->answer;?></p>
                 </div>
                </div>
              </div>
            <a class="see-more hidden" title="see more" data-action="see-more">see more</a>
          </div>
          
        </div>

        <div data-role="blacklist-form"></div>
        <div class="reply-form-container" data-role="reply-form"></div>
        </div>
        <ul data-role="children" class="children">
          <!-- Start of comment -->
        <?php if($this->show_answer_comment($answer->id))
          foreach($this->show_answer_comment($answer->id) as $answer_comment):?>

         <li id="post-1235947453" class="post"><div data-role="post-content" class="post-content answer_comment"> 
             <div class="indicator"></div>
             <div class="avatar hovercard">
                <a href="http://disqus.com/timbrouckaert/" class="user" data-action="profile" data-user="94058074"><img data-role="user-avatar" data-user="94058074" src="<?php echo IMG.'account_pics/'.$this->controller->gravator($answer_comment->username);?>" alt="Avatar"></a>
            </div>
            <div class="post-body ">

            <header>
              <span class="post-byline">
                <span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="94058074" data-role="username"><?php echo $answer_comment->username;?></a></span>
                <span><a href="#comment-1234932123" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> <?php echo $answer->username;?></a></span>
              </span>

              <div class="post-meta">
                <span class="bullet time-ago-bullet" aria-hidden="true">•</span>
                <a href="#comment-1235947453" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 7:22 PM"><?php echo $this->timing($answer_comment->time_commented);?></a>
              </div>
              <ul class="post-menu dropdown" data-role="menu">
                <li class="collapse"><a href="#" data-action="collapse" title="Collapse"><span>−</span></a></li>
                <li class="expand"><a href="#" data-action="collapse" title="Expand"><span>+</span></a></li>
                <li role="menu"><a class="dropdown-toggle" href="#" data-action="flag" data-role="flag" title="Flag as inappropriate"><i aria-hidden="true" class="icon icon-untitled-3"></i></a></li>
              </ul>
            </header>
            <!-- comment body -->
            <div class="post-body-inner ">
                <div class="post-message-container" data-role="message-container">
                  <div class="publisher-anchor-color" data-role="message-content">
                    <div class="post-message " data-role="message" dir="auto">
                        <p><?php echo $answer_comment->comment;?></p>
                    </div>
                    <div class="post-media"><ul data-role="post-media-list"></ul></div>
                </div>
                </div>
                <a class="see-more hidden" title="see more" data-action="see-more">see more</a>
            </div>

            
</div>


          <div data-role="blacklist-form"></div>
          <div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li>

<?php endforeach;?>

          </ul>
</li>
<!-- Modal -->
<div class="modal fade" id="<?php echo $answer->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <?php echo form_open('discussion/answer_comment',array('class'=>'response_form'));?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
       <textarea name="answer_comment" col="12"></textarea>
       <input type="hidden" value="<?php echo $answer->id;?>" name="answer_id">
       <input type="hidden" value="<?php echo $question->id?>" name="question_id">
              
       
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal">Close</button>
        <button type="submit">Comment</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </form>
</div><!-- /.modal -->

<?php endforeach;?>
<a href="<?php echo base_url('questions/'.$question->id);?>"><button type="button" class="conversation pull-right">Join in the conversation <i class="glyphicon glyphicon-share"></i></button></a>
</ul>
<!-- Modal -->
<div class="modal fade" id="<?php echo $question->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <?php echo form_open('discussion/main_question_comment',array('name'=>'discuss','class'=>'answer_form'));?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
       
        
          <textarea placeholder="Join in the discussion" name="main_post_comment">
          </textarea>
          
          <input type="hidden" name="question_id" value="<?php echo $question->id;?>">
        
       
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal">Close</button>
        <button type="submit">Discuss</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
  </form>

</div><!-- /.modal -->

<?php endforeach;?>
</li>
<?php echo $this->controller->pagination->create_links();?>

</ul>


<div class="load-more" data-role="more" style="display:none">
<a href="#" data-action="more-posts" class="btn">Load more comments</a>
</div>
</div>

</section>

<section id="community" style="display:none" data-role="main" data-outbound-link="embed:community"><div>
<div data-role="community-notification">

</div>

<div class="row">
<h3>Top Commenters on 
<strong>SitePoint</strong>
</h3>

<div data-role="top-users"><ol class="loading" id="top-users"></ol>

<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

</div>

<div class="row">
<h3>Top Discussions on 
<strong>SitePoint</strong>
</h3>
<div data-role="top-threads"><ol class="loading" id="top-threads"></ol></div>
</div>
</div></section>

<section id="dashboard" style="display:none" data-role="main">


<p style="line-height: 1.4">Nothing for you here ... yet. But as you comment with Disqus and follow
other Disqus users, you will start to receive notifications here, as well as a personalized
feed of activity by you and the people you follow. So get out there and participate in
some discussions!</p>
</section>

<section id="profile" style="display:none" data-role="main">
</section>

<div id="discovery"></div>

<div id="footer">
<ul>
<li class="logo"><a href="http://disqus.com/" title="Powered by Disqus">Powered by Disqus</a></li>
<li id="thread-subscribe-button" class="email"> 
<div class="default">
<a href="#" data-action="subscribe" title="Subscribe and get email updates from this discussion"><i aria-hidden="true" class="icon-mail"></i><span class="clip">Subscribe</span> <i aria-hidden="true" class="icon-checkmark"></i></a>
</div>
<div class="form">
<div class="input-wrapper"><input id="thread-subscribe-email" placeholder="yourname@email.com" type="email"></div>
</div>
</li>
<li class="install">
<a href="https://disqus.com/websites/?utm_source=sitepointproduction&amp;utm_medium=Disqus-Footer" target="_blank">
<i aria-hidden="true" class="icon-disqus"></i>
<span class="clip">Add Disqus to your site</span>
</a>
</li>
</ul>
</div>
</div>

  
</ul>

