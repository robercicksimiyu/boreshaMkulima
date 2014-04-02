<div id="layout">
<header id="main-nav">

<div id="discovery-top"></div>

<div id="onboard"></div>

<nav class="nav nav-primary">
<ul>
<li class="tab-community" >

<a href="<?php echo base_url('discussion');?>" data-role="post-count" class="publisher-nav-color" data-nav="conversation">27 questions</a>
</li>
<li class="tab-community" >
	<a href="<?php echo base_url('discussion/askQuestion');?>" class="publisher-nav-color" data-nav="community" id="community-tab">
		<strong>Ask Question</strong>
	</a>
</li>
<li class="tab-conversation active">
	<a href="<?php echo base_url('discussion/search');?>" class="publisher-nav-color" data-nav="conversation" id="community-tab">
		<strong>Search Question</strong>
	</a>
</li>

</ul>
</nav>

</header>


<section id="conversation" data-role="main" data-zone="thread">

	
<?php echo form_open('discussion/search',array('class'=>'search_form form-inline','name'=>"search_form"));?>
	<div class="form-group col-lg-10">
		<input placeholder="Type your question here" type="search" name="search" id="search_input">
		
	</div>
	<div class="form-group">
	<button class="search_btn"  type="submit">Search</button>
	</div>
</form>

	<!-- <div class="container">
		<?php if($results) foreach($results as $result):?>
		<div id="posts">
			<?php echo $result->question;?>
		</div>
		<?php endforeach?>
	</div> -->
	<div id="results" class="col-lg-9 col-md-offset-1">
	</div>
	<script id="search_results_template" type="text/x-handlebars-template">
		{{#if this}}
			<div class='page-header' style='margin-top:-60px;'>
				<h4 >Search results</h4>
			</div>
			<ul id="post-list " class="post-list row">
			{{#each this}}
			<li id="post-1234898982" class="post">
				<div data-role="post-content" class="post-content">
						<div class="indicator"></div>
						<div class="avatar hovercard">
						<a href="http://disqus.com/manchuck/" class="user" data-action="profile" data-user="93945838">
							<img data-role="user-avatar" data-user="93945838" src="<?php echo IMG.'account_pics/';?>{{gravator}}" alt="Avatar">
						</a>
					</div>


					<div class="post-body">
					<header>
					<span class="post-byline">

					<span class="author publisher-anchor-color">{{posted_by}}™</a></span>






					</span>

					<div class="post-meta">
					<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


					<a href="#comment-1234898982" data-role="relative-time" class="time-ago" title="Friday, February 7 2014 8:54 PM">
					<?php echo $this->timing("{{time_posted}}");?>
					</a>

					</div>




					<ul class="post-menu dropdown" data-role="menu">
					<li class="collapse">
					<a href="#" data-action="collapse" title="Collapse"><span>−</span></a>
					</li>
					<li class="expand">
					<a href="#" data-action="collapse" title="Expand"><span>+</span></a>
					</li>

					<li role="menu">



					<a class="dropdown-toggle" href="#" data-action="flag" data-role="flag" title="Flag as inappropriate">
					<i aria-hidden="true" class="icon icon-untitled-3"></i>
					</a>



					</li>
					</ul>

					</header>


					<div class="post-body-inner">

					<div class="post-message-container" data-role="message-container">

					<div class="publisher-anchor-color" data-role="message-content">
					<div class="post-message " data-role="message" dir="auto">

					<p><a href="<?php echo base_url('questions/{{id}}');?>">{{question}}</a></p>
					</div>

					<div class="post-media"><ul data-role="post-media-list"></ul></div>
					</div>
					</div>
					<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
					</div>

					<footer>


					<menu>
					<li class="realtime" data-role="realtime-notification:1234898982">
					<span style="display:none;" class="realtime-replies"></span>
					<a style="display:none;" href="#" class="btn btn-small"></a>

					</li>

					<li class="voting" data-role="voting">

					<a href="#" class="vote-up  count-16" data-action="upvote" title="">
					<span class="updatable count" data-role="likes">16</span>
					<span class="control"><i aria-hidden="true" class="icon icon-arrow-2"></i></span>
					</a>
					<a class="vote-down  count-0" title="Vote down">

					<span class="updatable count" data-role="dislikes">0</span>

					<span class="control"><i aria-hidden="true" class="icon icon-arrow"></i></span>
					<span class="tooltip">You must sign in to down-vote this post.</span>
					</a>

					</li>
					<li class="bullet" aria-hidden="true">•</li>




					<li class="reply">
					<a href="<?php echo base_url('discussion/view_question/{{id}}');?>" data-action="reply">
					<i class="icon icon-mobile icon-reply"></i><span class="text">View</span></a></li>
					<li class="bullet" aria-hidden="true">•</li>


					<li class="share">
					<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
					<ul>
					<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
					<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
					<li class="link"><a href="#comment-1234898982">Link</a></li>
					</ul>
					</li>
					</menu>


					</footer>
					</div>


					<div data-role="blacklist-form"></div>
					<div class="reply-form-container" data-role="reply-form"></div>
					</div>
			 	
			 	
			</li>
			{{/each}}
			{{else}}
				<div class='page-header' style='margin-top:-60px;'>
					<h4 >No results found</h4>
				</div>
			{{/if}}
			</ul>
	</script>


	<ul id="post-list" class="post-list">
	<?php //if($results) foreach($results as $question):?>
	
	
	</ul>
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
    