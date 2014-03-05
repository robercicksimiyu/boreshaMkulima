<div id="layout">
<header id="main-nav">

<div id="discovery-top"></div>

<div id="onboard"></div>

<nav class="nav nav-primary">
<ul>
<li class="tab-conversation active">

<a href="#" data-role="post-count" class="publisher-nav-color" data-nav="conversation">27 comments</a>
</li>
<li class="tab-community">
<a href="#" class="publisher-nav-color" data-nav="community" id="community-tab">

<strong>SitePoint</strong>

</a>
</li>
<li class="dropdown user-menu" data-role="logout"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
<span class="cog">

<i aria-hidden="true" class="icon-cog"></i>


<span>
Login
</span>


</span> <span class="caret"></span>
</a>

<ul class="dropdown-menu">




<li>
<a href="#" data-action="auth:disqus">Disqus</a>
</li>
<li>
<a href="#" data-action="auth:facebook">Facebook</a>
</li>
<li>
<a href="#" data-action="auth:twitter">Twitter</a>
</li>
<li>
<a href="#" data-action="auth:google">Google</a>
</li>







</ul></li>
<li class="notification-menu" data-role="notification-menu"><a href="#" class="notification-container" data-action="auth:disqus">
<span class="notification-icon icon-disqus"></span></a></li>
</ul>
</nav>

</header>


<section id="conversation" data-role="main" data-zone="thread">

<div class="nav nav-secondary">
<ul>

<li data-role="post-sort" class="dropdown sorting">
<a href="#" class="dropdown-toggle" data-nav="conversation" data-toggle="dropdown">
Sort by Best


<span class="caret"></span>
</a>
<ul class="dropdown-menu">
<li class="selected">
<a href="#" data-action="sort" data-sort="popular">Best</a>
</li>

<li>
<a href="#" data-action="sort" data-sort="desc">Newest</a>
</li>

<li>
<a href="#" data-action="sort" data-sort="asc">Oldest</a>
</li>
</ul>
</li>


<li id="thread-votes" class="favorite pull-right">
<!-- rendered dynamically -->
<div data-role="vote-button" class="thread-likes"><a href="#" data-action="upvote" title="Favorite this discussion">
<span class="label">Favorite</span>
<span class="icon-star"></span>
<span class="icon-check"></span>
</a></div></li>

<li id="thread-share-menu" class="dropdown share-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Share">
<span class="label">Share</span> <span class="icon-export"></span>
</a>
<ul class="share-menu dropdown-menu pull-right">
<li class="share">Share this discussion on
<ul>
<li class="twitter">
<a data-action="share:twitter" href="#">Twitter</a>
</li>
<li class="facebook">
<a data-action="share:facebook" href="#">Facebook</a>
</li>
</ul>
</li>
</ul>
</li>
</ul>
</div>


<div id="posts">

<div id="form"><form class="reply"><div class="alert error" style="display:none" role="alert">
<a class="close" data-action="dismiss-alert" title="Dismiss">×</a>
<span></span>
</div>

<div class="postbox">
<div class="avatar">

<span class="user">
<img data-role="user-avatar" src="a_data/noavatar92_002.png">
</span>

</div>

<div class="textarea-wrapper" data-role="textarea" draggable="true" dir="auto">
<div><span class="placeholder" placeholder="join in the conversation"></span>
	<div aria-label="Join the discussion…" style="overflow: auto; max-height: 350px;" data-role="editable" aria-multiline="true" role="textbox" tabindex="-1" class="textarea" contenteditable="true"><p><br></p></div>
	<div style="display: none;">
	<ul class="suggestions">
		<li class="header">
			<h5>in this conversation</h5>
		</li>
	</ul>
	</div>
</div>
<div data-role="drag-drop-placeholder" class="media-drag-hover" style="display: none">
<div class="drag-text">
⬇ Drag and drop your images here to upload them.
</div>
</div>

<div class="post-actions">
<ul class="wysiwyg">


</ul>


</div>

</div>

<section data-role="auth-or-ident" class="auth-section logged-out">

<div class="connect">
<h6>Sign in with</h6>

<ul data-role="login-menu" class="services login-buttons">



<li class="auth-disqus">
<button type="button" data-action="auth:disqus" title="Disqus"><i class="icon-disqus"></i></button>
</li>
<li class="auth-facebook">
<button type="button" data-action="auth:facebook" title="Facebook"><i class="icon-facebook-circle"></i></button>
</li>
<li class="auth-twitter">
<button type="button" data-action="auth:twitter" title="Twitter"><i class="icon-twitter-circle"></i></button>
</li>
<li class="auth-google">
<button type="button" data-action="auth:google" title="Google"><i class="icon-google-plus-circle"></i></button>
</li>
<li class="auth-signup">
<button type="button" data-action="auth:disqus" title="Disqus">Sign up for Disqus</button>
</li>
</ul>

</div>

<div class="guest">
<h6 class="guest-form-title">

or register with Disqus

</h6>

<div class="what-is-disqus help-icon">
<div id="rules" class="tooltip show">
<h3>Disqus is a conversation network</h3>
<ul>
<li><span>Disqus never moderates or censors. The rules on this community are its own.</span></li>
<li><span>Your email is safe with us. It's only used for moderation and optional notifications.</span></li>
<li><span>Don't be a jerk or do anything illegal. Everything is easier that way.</span></li>
</ul>
<p class="clearfix"><a href="http://docs.disqus.com/kb/terms-and-policies/" class="btn btn-small" target="_blank">Read full terms and conditions</a></p>
</div>
</div>

<p class="input-wrapper">
<input dir="auto" placeholder="Name" name="author-name" maxlength="30" type="text">
</p>

<div class="guest-details " data-role="guest-details">
<p class="input-wrapper">
<input dir="auto" placeholder="Email" name="author-email" type="email">
</p>

<p class="input-wrapper">
<input dir="auto" placeholder="Password" name="author-password" type="password">
</p>

<input name="author-guest" style="display:none" type="checkbox">


</div>
</div>
<div class="proceed">

<button type="submit" class="btn submit" aria-label="Next"><span class="icon-proceed"></span></button>

</div>



</section>
</div></form></div>


<ul id="highlighted-post" class="post-list"></ul>

<button class="alert realtime" style="display: none" data-role="realtime-notification">

</button>


<div id="no-posts" style="display:none">Be the first to comment.</div>

<ul id="post-list" class="post-list"><li id="post-1234898982" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/manchuck/" class="user" data-action="profile" data-user="93945838">
<img data-role="user-avatar" data-user="93945838" src="<?php echo IMG;?>svg/book.svg" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="93945838" data-role="username">MANCHUCK™</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1234898982" data-role="relative-time" class="time-ago" title="Friday, February 7 2014 8:54 PM">
6 days ago
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

<p>I had many issues with the questions that were asked when I took the 
test many moons ago.  One was the over generalization of the DB 
questions.  My favorite was how they were asking me about variable 
variables:</p>

<p>$first = 'second';<br>$second = 'first';<br>echo $$$$first;</p>

<p>Whats the output?</p>

<p>The output is that I would fire the person who wrote that</p>

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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
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


<ul data-role="children" class="children"><li id="post-1235840885" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/brunoskvorc/" class="user" data-action="profile" data-user="84203213">
<img data-role="user-avatar" data-user="84203213" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="84203213" data-role="username">Bruno Skvorc</a></span>


<span class="badge moderator">SitePoint Staff</span>





<span><a href="#comment-1234898982" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> MANCHUCK™</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235840885" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 5:18 PM">
5 days ago
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

<p>Hahaha, "The output is that I would fire the person who wrote that" that should be a valid answer for that question</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235840885">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-8" data-action="upvote" title="">
<span class="updatable count" data-role="likes">8</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235840885">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li><li id="post-1234948146" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/pauloeduardolimarezende/" class="user" data-action="profile" data-user="76651675">
<img data-role="user-avatar" data-user="76651675" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="76651675" data-role="username">Paulo Eduardo Lima Rezende</a></span>






<span><a href="#comment-1234898982" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> MANCHUCK™</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1234948146" data-role="relative-time" class="time-ago" title="Friday, February 7 2014 9:32 PM">
6 days ago
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

<p>It's like arithmetic:<br>$first = 'second';<br>$second = 'first';<br>So:<br>$$$$first = $$$second<br>$$$second = $$first<br>$$first = $second<br>$second = 'first'</p>

<p>The output is "first"</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1234948146">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-1" data-action="upvote" title="">
<span class="updatable count" data-role="likes">1</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1234948146">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1238356324" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/manchuck/" class="user" data-action="profile" data-user="93945838">
<img data-role="user-avatar" data-user="93945838" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="93945838" data-role="username">MANCHUCK™</a></span>






<span><a href="#comment-1234948146" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Paulo Eduardo Lima Rezende</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1238356324" data-role="relative-time" class="time-ago" title="Monday, February 10 2014 6:35 PM">
3 days ago
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

<p>Its not a question of being able to answer the question, rather the 
manner the question was asked.  I got my CCNA, MCSA, MCSE, MCP, 
A/NET/Security+ a few years back.  During the course the instructor 
stated: The purpose of this is to prove that you can be thrown into a 
network, figure out what is going on, and fix problems.  That is what 
the goal of any professional certification should be.  PHP has  +20K 
functions, about 300 configuration options (based on extensions you run)
 each following its own standard (see haystack needle).  I was asked 
questions about functions that in 15 years of programming never used.  
In real life, I have <a href="http://php.net/" rel="nofollow">php.net</a>, Google and the PHP source code to figure out what is going on.  </p>

<p>Dr's don't remember every disease out there (they have the PDR), 
lawyers do not remember every piece of legislation (they use many 
references).  Instead they are quizzed on application.  The ZCE test was
 not about application but just knowing what  functions did or entering 
configurations. From memory I had to remember if it was gc_enable or 
enable_gc (not to mention spelling it correctly).  There was no feed 
back on weather I was correct with that answer.  </p>

<p>The other professional exams I took, asked practical questions: What 
is the correct subnet mask for a network requiring at least 15 clients? 
 Which of the following permissions do you need to enable to allow 
reading a file but not copying?  What is the correct IRQ for the 
keyboard? (you had to manually configure those back then) .  Questions 
on the ZCE: What does function X do? How do you query the only the 1st 
10 rows of a database table?  </p>

<p>I really wish the ZCE would grow to become just a set of problems you
 have to solve.  You are give some read only unit test that have to pass
 in 5 tries.  Once they pass, you are a ZCE</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1238356324">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-4" data-action="upvote" title="">
<span class="updatable count" data-role="likes">4</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1238356324">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li></ul></li><li id="post-1234932123" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/isimmons33/" class="user" data-action="profile" data-user="26794029">
<img data-role="user-avatar" data-user="26794029" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="26794029" data-role="username">Ian Simmons</a></span>






<span><a href="#comment-1234898982" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> MANCHUCK™</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1234932123" data-role="relative-time" class="time-ago" title="Friday, February 7 2014 9:19 PM">
6 days ago
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

<p>Wow, had to go look that up because I've never used it and don't know if and where I ever would use more than one $. <a href="http://php.net/manual/en/language.variables.variable.php" rel="nofollow">http://php.net/manual/en/langu...</a> Actually it seems to me like more than a single $ should be a syntax error but I guess the experts have a use for this :-)</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1234932123">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1234932123">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1235947453" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/timbrouckaert/" class="user" data-action="profile" data-user="94058074">
<img data-role="user-avatar" data-user="94058074" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="94058074" data-role="username">Tim Brouckaert</a></span>






<span><a href="#comment-1234932123" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Ian Simmons</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235947453" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 7:22 PM">
5 days ago
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

<p>using 2 $-signs is sometimes used in constructions like:</p>

<p>if ($a){<br>$varname = 'fullname';<br>} else {<br>$varname = 'name';<br>}<br>print $$varname; </p>

<p>Using more than 2 is just .... (censored :p )</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235947453">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-1" data-action="upvote" title="">
<span class="updatable count" data-role="likes">1</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235947453">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li><li id="post-1241071762" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/frostymarvelous/" class="user" data-action="profile" data-user="17123489">
<img data-role="user-avatar" data-user="17123489" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="17123489" data-role="username">frostymarvelous</a></span>






<span><a href="#comment-1234932123" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Ian Simmons</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1241071762" data-role="relative-time" class="time-ago" title="Wednesday, February 12 2014 5:08 PM">
17 hours ago
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

<p>No one will ever use more it more than once. It has no practical 
value and you will quickly be thrown out of the community if you tried 
that in an open source application!</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1241071762">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1241071762">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li></ul></li></ul></li><li id="post-1240501218" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/debbieotterstetter/" class="user" data-action="profile" data-user="94488143">
<img data-role="user-avatar" data-user="94488143" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="94488143" data-role="username">Debbie Otterstetter</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1240501218" data-role="relative-time" class="time-ago" title="Wednesday, February 12 2014 4:08 AM">
a day ago
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

<p>Great Article Jacek, and thanks for all the thoughtful comments!  
This is Debbie Otterstetter who runs Zend's certification and training 
programs, and I thought I'd provide some perspective on what we hear 
from PHP developers who have taken the exam.</p>

<p>Certification may not be required for all developers - as Jacek 
pointed out it may be too advanced for real beginners unless they are 
willing to put in the effort to truly learn their craft.  However, we 
have heard from many that studying for and obtaining Zend PHP 
certification helped them to become better programmers through the exam 
preparation, attain new jobs and/or salary increases. And as mentioned 
it can really help developers get a wide understanding of the full range
 of PHP's capabilities, not just those they need for their current 
project. Employers see certification as a way to guarantee a broad 
minimum skill set in a developer.</p>

<p>The new Zend Certified PHP Engineer exam (that was introduced last 
October) was completely reviewed and updated by our industry Advisory 
Board - we removed any outdated or unclear questions in order to refocus
 on the skills of the developer.  This version of the exam also includes
 some of the new features added in 5.4 and 5.5. </p>

<p>If you (or any of your followers) would like to take the new exam, 
I'd like to extend an offer to provide you with a FREE copy of the new 
PHP Study Guide. Just email me at debbie.o@zend.com and mention "Jacek's
 article".  This offer is good through the end of February, 2014.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1240501218">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-9" data-action="upvote" title="">
<span class="updatable count" data-role="likes">9</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1240501218">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1240503471" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/brunoskvorc/" class="user" data-action="profile" data-user="84203213">
<img data-role="user-avatar" data-user="84203213" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="84203213" data-role="username">Bruno Skvorc</a></span>


<span class="badge moderator">SitePoint Staff</span>





<span><a href="#comment-1240501218" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Debbie Otterstetter</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1240503471" data-role="relative-time" class="time-ago" title="Wednesday, February 12 2014 4:11 AM">
a day ago
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

<p>Thank you very much for chiming in and doing this, Debbie, that's a 
really nice gesture. I'll definitely be getting in touch so I can take a
 look at the study guide too.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1240503471">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1240503471">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li></ul></li><li id="post-1239977022" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/timgavin/" class="user" data-action="profile" data-user="3148935">
<img data-role="user-avatar" data-user="3148935" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="3148935" data-role="username">Tim Gavin</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1239977022" data-role="relative-time" class="time-ago" title="Tuesday, February 11 2014 9:47 PM">
2 days ago
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

<p>I used to play drums and knew a lot of drummers who had amazing 
technical chops and could do every rudiment in every book, however, they
 were crap in a band. They overplayed and couldn't do what the song 
required. Same goes for coding; knowing every single function is 
worthless if you can't do what the application requires. My clients 
don't care about awards and certifications - or how many functions I 
know - they care about how many orders they get with the app I built. :)</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1239977022">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-2" data-action="upvote" title="">
<span class="updatable count" data-role="likes">2</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1239977022">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li><li id="post-1236367174" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/taylorren/" class="user" data-action="profile" data-user="84895763">
<img data-role="user-avatar" data-user="84895763" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="84895763" data-role="username">Taylor Ren</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1236367174" data-role="relative-time" class="time-ago" title="Sunday, February 9 2014 2:55 AM">
4 days ago
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

<p>I always look at certification this way: it is a "common" ground to 
introduce your capability. Does MBA tell anything about your management 
skill / business acumen? Probably not. However, it helps in two things: 
brings you a circle of common interest; tells your interviewer that you 
at least grabs some basic knowledge of business administration. </p>

<p>The same applies to PHP certification too. The questions being asked 
can never be exhaustive and "useful" but it saves time to explain 
yourself by simply saying: yes, I am Zend Certified. It tells something 
by whatever means. </p>

<p>That is how I value this certification.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1236367174">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-2" data-action="upvote" title="">
<span class="updatable count" data-role="likes">2</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1236367174">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li><li id="post-1241067559" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/frostymarvelous/" class="user" data-action="profile" data-user="17123489">
<img data-role="user-avatar" data-user="17123489" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="17123489" data-role="username">frostymarvelous</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1241067559" data-role="relative-time" class="time-ago" title="Wednesday, February 12 2014 5:04 PM">
17 hours ago
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

<p>"I don’t see a point in memorizing tens of string or array functions 
while in my everyday job I can successfully find a proper one just by 
browsing the PHP documentation" </p>

<p>Exactly why I have not bothered to certify!</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1241067559">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-1" data-action="upvote" title="">
<span class="updatable count" data-role="likes">1</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1241067559">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li><li id="post-1240339996" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/asciiville/" class="user" data-action="profile" data-user="4289371">
<img data-role="user-avatar" data-user="4289371" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="4289371" data-role="username">asciiville</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1240339996" data-role="relative-time" class="time-ago" title="Wednesday, February 12 2014 1:37 AM">
a day ago
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

<p>I totally agree with not wasting time memorizing function calls. It 
is so much easier just to leave my least favorite web browser open on <a href="http://php.net/" rel="nofollow">php.net</a>,
 where [IE] shouldn't cause too much trouble :) It is somewhat 
disconcerting that the exam asks questions about topics that can be 
Googled quickly.</p>

<p>I tend to deal with only a small subset of the language on any given 
day, and if there is a need to write some type of utility function, I 
will try to find out if it has already been done in PHP before expending
 any effort.</p>

<p>Interestingly enough, I found the Java certification study guides to 
be very helpful overall even though I had no intention of pursuing 
certification. It may not be a bad idea to peruse the Zend study guides 
as well.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1240339996">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-1" data-action="upvote" title="">
<span class="updatable count" data-role="likes">1</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1240339996">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li><li id="post-1235171627" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/BlaineSch/" class="user" data-action="profile" data-user="3546522">
<img data-role="user-avatar" data-user="3546522" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="3546522" data-role="username">Blaine</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235171627" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 12:32 AM">
5 days ago
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

<p>Regarding the first drawback, the 5.3 certification never asked about
 parameter order. None of the "what does this code do?" tricked you by 
putting them in wrong. I believe one of the study guides even mentions 
this.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235171627">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-1" data-action="upvote" title="">
<span class="updatable count" data-role="likes">1</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235171627">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1241075900" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/frostymarvelous/" class="user" data-action="profile" data-user="17123489">
<img data-role="user-avatar" data-user="17123489" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="17123489" data-role="username">frostymarvelous</a></span>






<span><a href="#comment-1235171627" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Blaine</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1241075900" data-role="relative-time" class="time-ago" title="Wednesday, February 12 2014 5:12 PM">
17 hours ago
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

<p>That is just plain sad. I can never remember the order! That is why I
 use Utility classes to ensure that I avoid the needle and haystack 
problem.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1241075900">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1241075900">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li></ul></li><li id="post-1237872160" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/disqus_os6WH9xwu4/" class="user" data-action="profile" data-user="64141619">
<img data-role="user-avatar" data-user="64141619" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="64141619" data-role="username">Radosław</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1237872160" data-role="relative-time" class="time-ago" title="Monday, February 10 2014 11:09 AM">
3 days ago
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

<p>Welcome to the ZCPE of Poland Developers ;) Nice to see you aslo at sitepoint.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1237872160">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1237872160">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li><li id="post-1235627352" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/adrianmiu/" class="user" data-action="profile" data-user="35631789">
<img data-role="user-avatar" data-user="35631789" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="35631789" data-role="username">Adrian Miu</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235627352" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 10:12 AM">
5 days ago
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

<p>I have taken the exam and, while I learned something during 
preparation, IMO the certification is useless. You have to be a poor 
programmer not to pass it and any job interview I've been had tests good
 enough to filter these kind of people. It would be dissapointing if the
 MySQL and framework specific certifications are just as difficult</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235627352">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235627352">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1235953441" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/timbrouckaert/" class="user" data-action="profile" data-user="94058074">
<img data-role="user-avatar" data-user="94058074" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="94058074" data-role="username">Tim Brouckaert</a></span>






<span><a href="#comment-1235627352" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Adrian Miu</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235953441" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 7:29 PM">
5 days ago
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

<p>The certification itself doesn't prove if you're a good or bad programmer. It just proves you are able to study some lines :)</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235953441">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-4" data-action="upvote" title="">
<span class="updatable count" data-role="likes">4</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235953441">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li></ul></li><li id="post-1235621067" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/KalpeshSingh/" class="user" data-action="profile" data-user="15748955">
<img data-role="user-avatar" data-user="15748955" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="15748955" data-role="username">Kalpesh Singh</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235621067" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 9:56 AM">
5 days ago
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

<p>Hi Jacek,</p>

<p>So What will be real benefits of this certs in terms of Salary?</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235621067">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235621067">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1235648594" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/jacekbarecki/" class="user" data-action="profile" data-user="94016059">
<img data-role="user-avatar" data-user="94016059" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="94016059" data-role="username">Jacek Barecki</a></span>






<span><a href="#comment-1235621067" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Kalpesh Singh</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235648594" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 11:04 AM">
5 days ago
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

<p>That's a good question but I think that the situation may be 
different in each country. In Poland (where I live) I've never seen a 
job offer with the PHP certificate as one of the requirements. Some 
companies require framework-specific certifications but it's also not 
very common. So in Poland having the certificate  isn't probably 
beneficial in terms of salary.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235648594">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235648594">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1236792374" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/KalpeshSingh/" class="user" data-action="profile" data-user="15748955">
<img data-role="user-avatar" data-user="15748955" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="15748955" data-role="username">Kalpesh Singh</a></span>






<span><a href="#comment-1235648594" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Jacek Barecki</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1236792374" data-role="relative-time" class="time-ago" title="Sunday, February 9 2014 4:36 PM">
4 days ago
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

<p>Lets say a company wants to recruit a fresher PHP developer ...then I
 think they will select certified person and may increase 15-20% salary.
 What you say?</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1236792374">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1236792374">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1236922440" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/brunoskvorc/" class="user" data-action="profile" data-user="84203213">
<img data-role="user-avatar" data-user="84203213" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="84203213" data-role="username">Bruno Skvorc</a></span>


<span class="badge moderator">SitePoint Staff</span>





<span><a href="#comment-1236792374" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Kalpesh Singh</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1236922440" data-role="relative-time" class="time-ago" title="Sunday, February 9 2014 6:59 PM">
4 days ago
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

<p>No company worth a damn will ever give you a 15-20% higher pay if you
 have a certificate. You'll earn the 15-20% increase when you prove 
yourself.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1236922440">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-6" data-action="upvote" title="">
<span class="updatable count" data-role="likes">6</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1236922440">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li></ul></li></ul></li></ul></li><li id="post-1235349131" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/dojovader/" class="user" data-action="profile" data-user="50110120">
<img data-role="user-avatar" data-user="50110120" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="50110120" data-role="username">dojoVader</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235349131" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 3:11 AM">
5 days ago
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

<p>I really do relate with your article, I think back then there was a 
pressure on certification, till later it was dependent on how people 
code, I got friends who got Java and .NET Certifications, and this guys 
can't even configure Java on the System Path or even know how to debug 
an app talk-less of writing one, However someone companies do put a lot 
of requirements on certifications. so its a mixed topic, I don't really 
see the point of one, but regardless i might still get one depending on 
the environment</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235349131">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235349131">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li><li id="post-1235016907" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/disqus_5mzUhFxoGS/" class="user" data-action="profile" data-user="72866018">
<img data-role="user-avatar" data-user="72866018" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="72866018" data-role="username">Alex</a></span>






</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235016907" data-role="relative-time" class="time-ago" title="Friday, February 7 2014 10:25 PM">
6 days ago
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

<p>What will this code produce questions are senseless to me...in 
practical terms anyway...I can paste that into NetBeans hit ctrl+f5 and 
see immediately. I don't understand how this proves anything but ones 
ability to memorize. :)</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235016907">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235016907">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1241079307" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/frostymarvelous/" class="user" data-action="profile" data-user="17123489">
<img data-role="user-avatar" data-user="17123489" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="17123489" data-role="username">frostymarvelous</a></span>






<span><a href="#comment-1235016907" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Alex</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1241079307" data-role="relative-time" class="time-ago" title="Wednesday, February 12 2014 5:15 PM">
17 hours ago
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

<p>That means you cannot debug another person's code! Ever!!<br>And oh, digging into the source to help you understand what is happening is utterly of no use to you.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1241079307">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1241079307">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"><li id="post-1241085159" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/disqus_5mzUhFxoGS/" class="user" data-action="profile" data-user="72866018">
<img data-role="user-avatar" data-user="72866018" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="72866018" data-role="username">Alex</a></span>






<span><a href="#comment-1241079307" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> frostymarvelous</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1241085159" data-role="relative-time" class="time-ago" title="Wednesday, February 12 2014 5:20 PM">
17 hours ago
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

<p>I constantly sift through source code, I am not sure what your point is??</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1241085159">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1241085159">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li></ul></li><li id="post-1235952057" class="post"><div data-role="post-content" class="post-content



">
<div class="indicator"></div>




<div class="avatar hovercard">
<a href="http://disqus.com/timbrouckaert/" class="user" data-action="profile" data-user="94058074">
<img data-role="user-avatar" data-user="94058074" src="a_data/noavatar92.png" alt="Avatar">
</a>
</div>


<div class="post-body">
<header>
<span class="post-byline">

<span class="author publisher-anchor-color"><a href="#" data-action="profile" data-user="94058074" data-role="username">Tim Brouckaert</a></span>






<span><a href="#comment-1235016907" class="parent-link" data-role="parent-link"><i aria-hidden="true" class="icon-forward" title="in reply to"></i> Alex</a></span>

</span>

<div class="post-meta">
<span class="bullet time-ago-bullet" aria-hidden="true">•</span>


<a href="#comment-1235952057" data-role="relative-time" class="time-ago" title="Saturday, February 8 2014 7:27 PM">
5 days ago
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

<p>While code reviewing it isn't bad to see what code does, even without
 executing it. You should familiarize yourself with this. It has nothing
 to do with memorization, but with following the logic.<br>That being 
said, one should use as little lines for doing one clear thing as 
possible. If you need more than about 10 lines, you should move it away 
to a separate function / method. In this way, you can even reuse this 
'difficult' code.</p>

</div>

<div class="post-media"><ul data-role="post-media-list"></ul></div>
</div>
</div>
<a class="see-more hidden" title="see more" data-action="see-more">see more</a>
</div>

<footer>


<menu>
<li class="realtime" data-role="realtime-notification:1235952057">
<span style="display:none;" class="realtime-replies"></span>
<a style="display:none;" href="#" class="btn btn-small"></a>

</li>

<li class="voting" data-role="voting">

<a href="#" class="vote-up  count-0" data-action="upvote" title="Vote up">
<span class="updatable count" data-role="likes">0</span>
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
<a href="#" data-action="reply">
<i class="icon icon-mobile icon-reply"></i><span class="text">Reply</span></a></li>
<li class="bullet" aria-hidden="true">•</li>


<li class="share">
<a class="toggle"><i class="icon icon-mobile icon-share"></i><span class="text">Share ›</span></a>
<ul>
<li class="twitter"><a href="#" data-action="share:twitter">Twitter</a></li>
<li class="facebook"><a href="#" data-action="share:facebook">Facebook</a></li>
<li class="link"><a href="#comment-1235952057">Link</a></li>
</ul>
</li>
</menu>


</footer>
</div>


<div data-role="blacklist-form"></div>
<div class="reply-form-container" data-role="reply-form"></div>
</div>


<ul data-role="children" class="children"></ul></li></ul></li></ul>

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
<script type="text/javascript">
	
</script>