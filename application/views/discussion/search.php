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

</ul>
</div>

<div style="margin-top:20px; text-align:center;">
	<h1>Boresha Mkulima</h1>
<h3></h3>
<?php echo form_open('discussion/search');?>
	<input placeholder="Type your question here" type="search" name="search" id="search">
	<button style="margin:auto;">Search</button>
</form>
</div>
	<div class="container">
		<?php if($results) foreach($results as $result):?>
		<div id="posts">
			<?php echo $result->question;?>
		</div>
		<?php endforeach?>
	</div>

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
    