<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->


<div role="main" class="page page--primary category-javascript">
    
    <header role="banner" class="page_banner page_banner--category-ux">
        <h2 class="page_banner_title"><a href="#">Boresha Mkulima</a></h2>
    </header>
    <article class="page_content_article" id="post-76195">
        <header class="article_header">
            <h1 class="article_title">Climate Change</h1>
            <!-- <div class="contributor article_contributor">
                <figure class="contributor_avatar article_author-avatar">
                    <a href="#">
                        <img src="<?php echo IMG;?>/logo.png" class="avatar-96 photo" height="96" width="96">
                    </a>
                </figure>
                <p class="contributor_name article_author-name">
                    <a href="#">Robercick Simiyu</a>
                </p>
                <p class="contributor_title article_author-title">Contributing Editor</p>
            </div> -->
            <div class="page_banner_adspot">
            </div>
        </header>
    </article>

    <!-- Main hero unit for a primary marketing message or call to action -->
    <div class="hero-unit">
        <p>CI++ is an upgraded CodeIgniter skeleton application with added layouting,
            widget and helper capabilities, and with integrated HTML5 Boilerplate and Twitter Bootstrap. It also
            features examples of these implementations but for more information, you should probably read the <a
                    href="http://www.bitfalls.com/2013/01/ci-codeigniter-with-html5-boilerplate.html"
                    title="CI++ - CodeIgniter with layouts, H5BP and Bootstrap">blog post in which it is explained</a>.
        </p>
        <p>A prepared database demo is available, too. See models/test_model, and run createTable() to create the
        test table (see the demo method of the welcome controller), but not before you set your DB up as per
            information in the config/database.php file!</p>
        <p>Read the classes for in-depth documentation, it's all there. Also, after you install the table, you can
        try out the URL demo in which one url fetches one value from the DB, and another fetches a different value,
        and the only difference is one param. The links for this are here (pay attention to the URLs):</p>
        <p>
            <a href="/boreshaMkulima/welcome/urldemo/param/1" title="Getting value 1 from DB table">Get value 1 from db table.</a>
        </p>
        <p>
            <a href="/welcome/urldemo/param/2" title="Getting value 1 from DB table">Get value 2 from db table.</a>
        </p>
    </div>

    <!-- Example row of columns -->
    <div class="row">
        {{lf_leftbox}}
        {{vf_midbox}}
        <div class="span4">
            <h2>Layouts</h2>

            <p>To switch out a layout, simply copy the default one and change what you want. It's hard coded to use
            Twitter Bootstrap and HTML5 Boilerplate, but that's all editable. I might add a dynamic asset manager
            for easier dealing with JS and CSS files soon, but a big emphasis on "might".</p>

            <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; Company <?php echo date('Y'); ?></p>
    </footer>

</div> <!-- /container -->
