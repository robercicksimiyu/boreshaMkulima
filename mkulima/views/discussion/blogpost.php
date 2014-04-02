<!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
<style>
    button{float:right;}
</style>
<div role="main" class="page page--primary category-javascript">
    <button href="/boreshaMkulima/discussion/askQuestion">Ask a question</button>
    <h2 class="page_banner_title"><a href="#">Boresha Mkulima</a></h2>
    <hr></hr>

    <article class="page_content article" id="post-76830">
          <header class="article_header">
            <h1 class="article_title">10 HTML5 APIs Worth Looking Into</h1>
            <div class="contributor article_contributor">
                  <figure class="contributor_avatar article_author-avatar">
          <a href="http://www.sitepoint.com/author/aderosa/">
            <img alt="" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/8b01a8b4d7a0a9079a4e97b1ddedbe56.png" class="avatar avatar-96 photo" height="96" width="96">      </a>
        </figure>
        <p class="contributor_name article_author-name">
          <a href="http://www.sitepoint.com/author/aderosa/">Aurelio De Rosa</a>
        </p>
        <p class="contributor_title article_author-title">Web &amp; App Developer</p>
                </div>
            <iframe style="width: 73px; height: 28px;" data-twttr-rendered="true" title="Twitter Tweet Button" class="twitter-share-button twitter-tweet-button twitter-count-none" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/tweet_button.html" allowtransparency="true" id="twitter-widget-0" frameborder="0" scrolling="no"></iframe>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            <div class="article_meta-data">
              <p class="article_pub-date">Published <time datetime="2014-02-19" pubdate="">February 19, 2014</time></p>
            </div>
          </header>

          <section class="article_body">

              <p>The tools available to create powerful applications on the 
    web platform are getting better with each passing year. The HTML5 
    specification has added a number of useful features in new APIs that you
     may not have delved into yet, likely because of the lack of browser 
    support.</p>
    <p>In this post, we’ll take a look at <strong>10 HTML5 APIs</strong> 
    that cover a whole slew of functionality and features that can help you 
    create interactive websites, test the performance of your code, interact
     with a user’s device, and much more.</p>
    <p>And as you’ll see, support for these features is probably a lot better than you might think.</p>
    <h2>1. High Resolution Time API</h2>
    <p>The <a href="http://www.w3.org/TR/hr-time/">High Resolution Time API</a> provides the current time in sub-millisecond resolution and such that it is not subject to system clock skew or adjustments.</p>
    <p>It exposes only one method, that belongs to the <code>window.performance</code> object, called <code>now()</code>. It returns a <code>DOMHighResTimeStamp</code>
     representing the current time in milliseconds. The timestamp is very 
    accurate, with precision to a thousandth of a millisecond, allowing for 
    accurate tests of the performance of our code.</p>
    <p>The most important feature of this method is that <code>performance.now()</code> is <a href="http://www.w3.org/TR/hr-time/#sec-monotonic-clock">monotonically increasing</a> (that is, it increases consistently), so the difference between two calls will never be negative.</p>
    <p>The browsers that support the API are IE10, Opera 15, and Firefox 15+
     without prefix. Chrome supports this API from version 20 with its 
    “webkit” prefix, and without the prefix from version 24. More on the 
    compatibility <a href="https://developer.mozilla.org/en-US/docs/Web/API/Performance.now">here</a>.</p>
    <p>A basic example of calling this method is shown below:</p>
    <div><div id="highlighter_248138" class="syntaxhighlighter  jscript"><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="gutter"><div class="line number1 index0 alt2">1</div></td><td class="code"><div class="container"><div class="line number1 index0 alt2"><code class="jscript keyword">var</code> <code class="jscript plain">time = performance.now();</code></div></div></td></tr></tbody></table></div></div>
    <p>Below is a demo for you to experiment with:</p>
    <div><iframe id="cp_embed_LChwr" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/LChwr.html" allowtransparency="true" class="cp_embed_iframe" style="width: 100%; overflow: hidden;" frameborder="0" height="699" scrolling="no"></iframe></div>
    <p><script async="" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/ei.js"></script></p>
    <p>To learn more about this API, you can read one of my previous articles, <a href="http://www.sitepoint.com/discovering-the-high-resolution-time-api/">Discovering the High Resolution Time API</a>.</p>
    <h2>2. User Timing API</h2>
    <p>Another API created for testing the performance of our code is the <a href="http://www.w3.org/TR/user-timing/">User Timing API</a>.
     With the High Resolution Time API, we can retrieve the current time in 
    sub-millisecond resolution but it leaves us with the pain of introducing
     a bunch of variables in our code. The User Timing API solves this and 
    other problems.</p>
    <p>It allows us to accurately measure and report the performance of a 
    section of JavaScript code. It deals with two main concepts: mark and 
    measure. The former represents an instant (timestamp), while the latter 
    represents the time elapsed between two marks.</p>
    <p>This API exposes four methods, all belonging to the <code>window.performance</code> object, that allow us to store and delete marks and measures. The <code>mark(name)</code> method is used to store a timestamp with an associated name, while <code>measure(name[, mark1[, mark2]])</code> can be used to store the time elapsed between two marks with the provided name.</p>
    <p>The desktop and mobile browsers that support the User Timing API are IE10+, Chrome 25+, and Opera 15+.</p>
    <p>Here is a basic example of the use of this API:</p>
    <div><div id="highlighter_479442" class="syntaxhighlighter  jscript"><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="gutter"><div class="line number1 index0 alt2">1</div><div class="line number2 index1 alt1">2</div><div class="line number3 index2 alt2">3</div><div class="line number4 index3 alt1">4</div><div class="line number5 index4 alt2">5</div><div class="line number6 index5 alt1">6</div></td><td class="code"><div class="container"><div class="line number1 index0 alt2"><code class="jscript plain">performance.mark(</code><code class="jscript string">"startFoo"</code><code class="jscript plain">);</code></div><div class="line number2 index1 alt1"><code class="jscript comments">// A time consuming function</code></div><div class="line number3 index2 alt2"><code class="jscript plain">foo();</code></div><div class="line number4 index3 alt1"><code class="jscript plain">performance.mark(</code><code class="jscript string">"endFoo"</code><code class="jscript plain">);</code></div><div class="line number5 index4 alt2">&nbsp;</div><div class="line number6 index5 alt1"><code class="jscript plain">performance.measure(</code><code class="jscript string">"durationFoo"</code><code class="jscript plain">, </code><code class="jscript string">"startFoo"</code><code class="jscript plain">, </code><code class="jscript string">"endFoo"</code><code class="jscript plain">);</code></div></div></td></tr></tbody></table></div></div>
    <p>Here’s a demo:</p>
    <div><iframe id="cp_embed_qkKcs" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/qkKcs.html" allowtransparency="true" class="cp_embed_iframe" style="width: 100%; overflow: hidden;" frameborder="0" height="493" scrolling="no"></iframe></div>
    <p><script async="" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/ei.js"></script></p>
    <p>For more info, take a look at my article <a href="http://www.sitepoint.com/discovering-user-timing-api/">Discovering the User Timing API</a>.</p>
    <h2>3. Navigation Timing API</h2>
    <p>Page load time is one of the most important aspects of the user 
    experience. Unfortunately, troubleshooting a slow page load is not easy 
    because there are many contributing factors. To help with this, in 
    addition to the APIs considered above, the W3C have proposed the <a href="https://dvcs.w3.org/hg/webperf/raw-file/tip/specs/NavigationTiming/Overview.html">Navigation Timing API</a>.</p>
    <p>This API offers detailed timing information throughout the page load process accessible through the <code>timing</code> property of the <code>window.performance</code>
     object. In detail, it provides measurements related to page redirects, 
    DNS lookup, time spent building the DOM, TCP connection establishment, 
    and several other metrics.</p>
    <p>The Navigation Timing API is <a href="http://caniuse.com/nav-timing">currently supported in</a> IE9+, Firefox 7+, Opera 15+, and Chrome 6+.</p>
    <p>For a demonstration of this API, <a href="http://webtimingdemo.appspot.com/">see this page</a>. For more info, check out Colin Ihrig’s article <a href="http://www.sitepoint.com/profiling-page-loads-with-the-navigation-timing-api/">Profiling Page Loads with the Navigation Timing API</a>.</p>
    <h2>4. Network Information API</h2>
    <p>Do you think we’re done with performance stuff? No way! Performance 
    is one of most important concept to focus on today. Even Google has set 
    performance as <a href="https://groups.google.com/a/chromium.org/forum/#%21msg/blink-dev/kTktlHPJn4Q/YrnfLxeMO7IJ">one of the main goals to achieve in 2014</a>, according to Google Chrome programmer Eric Seidel.</p>
    <p>Another API that deals with performance is the <a href="http://www.w3.org/TR/netinfo-api/">Network Information API</a>.
     It helps you discover whether the user is on a metered connection, such
     as pay-as-you-go, and provides an estimate of bandwidth. Thanks to this
     information, it’s possible to change the behaviour of our pages to 
    accommodate a user in the best way possible. For example, we could 
    conditionally load images, videos, fonts and other resources based on 
    the type of connection detected.</p>
    <p>This API belongs to the <code>connection</code> property of the <code>window.navigator</code> object. It exposes two read-only properties: <code>bandwidth</code> and <code>metered</code>. The former is a number representing an estimation of the current bandwidth, while the latter is a Boolean whose value is <code>true</code> if the user’s connection is subject to limitation and bandwidth usage, and <code>false</code> otherwise.</p>
    <p>Currently only Firefox 12+ and Chrome (mobile only) offer experimental support using their respective vendor prefix.</p>
    <p>You can view an on-page demo of this API <a href="http://www.csskarma.com/lab/_javascript/network-connection/">on csskarma</a>. For more info, see Craig’s article, <a href="http://www.sitepoint.com/use-network-information-api-improve-responsive-websites/">How to Use the Network Information API to Improve Responsive Websites</a>.</p>
    <h2>5. Vibration API</h2>
    <p>Another key concept that gets a lot of attention in our industry is 
    user experience (UX). One of the APIs proposed that allows us to enhance
     this aspect of our websites is the <a href="http://www.w3.org/TR/vibration/">Vibration API</a>.</p>
    <p>This API is designed to address use cases where touch-based feedback 
    is required, and offers the ability to programmatically produce a 
    vibration interacting with the mobile device’s built-in vibration 
    hardware component. If such a component doesn’t exist, it does nothing.</p>
    <p>The Vibration API is particularly useful if you’re working with 
    online videos or web games. For example, you could let the user’s device
     vibrate during the progress of the game in reaction to a particular 
    event.</p>
    <p>It exposes only one method, <code>vibrate()</code>, that belongs to the <code>window.navigator</code>
     object. This method accepts one parameter specifying the duration of 
    the vibration in milliseconds. The parameter can be either an integer or
     an array of integers. In the second case, it’s interpreted as 
    alternating vibration times and pauses.</p>
    <p>This API is supported in Chrome 30+, Firefox 11+, and Opera 17+.</p>
    <p>A basic use of this API is shown below:</p>
    <div><div id="highlighter_474661" class="syntaxhighlighter  jscript"><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td class="gutter"><div class="line number1 index0 alt2">1</div><div class="line number2 index1 alt1">2</div></td><td class="code"><div class="container"><div class="line number1 index0 alt2"><code class="jscript comments">// Vibrate once for 2 seconds</code></div><div class="line number2 index1 alt1"><code class="jscript plain">navigator.vibrate(2000);</code></div></div></td></tr></tbody></table></div></div>
    <p>For a demonstration, visit <a href="http://aurelio.audero.it/demo/vibration-api-demo.html">this page</a> in a supporting device. For more on this API, take a look at <a href="http://www.sitepoint.com/the-buzz-about-the-vibration-api/">The Buzz About the Vibration API</a> and <a href="http://www.sitepoint.com/use-html5-vibration-api/">How to Use the HTML5 Vibration API</a>.</p>
    <h2>6. Battery Status API</h2>
    <p>The Vibration API isn’t the only one that allows access to a device’s
     hardware. Another API of this type, designed with mobile devices in 
    mind, is the <a href="http://www.w3.org/TR/battery-status/">Battery Status API</a>. It allows you to inspect the state of a device’s battery and fires events about changes in battery level or status.</p>
    <p>The Battery Status API exposes four properties (<code>charging</code>, <code>chargingTime</code>, <code>discharingTime</code>, and <code>level</code>)
     and four events. The properties specify if the battery is in charge, 
    the seconds remaining until the battery is fully charged, the seconds 
    remaining until the battery is fully discharged, and the current level 
    of the battery. These properties belongs to the <code>battery</code> property of the <code>window.navigator</code> object.</p>
    <p>The use cases for this API are really interesting. For example, if we
     detect the battery is low, we could slow down or stop Ajax requests 
    that might be occurring on a page automatically at specific intervals. 
    Another example is to disable non-critical CSS3 and JavaScript 
    animations, or to save data more frequently to prevent data loss when 
    the battery reaches a critical level.</p>
    <p>Currently only Firefox desktop and mobile support this API.</p>
    <p>A basic example of retrieving the current level of the battery in percentage is shown below:</p>
    <p>// Retrieves the percentage of the current level of the device’s battery<br>
    var percentageLevel = navigator.battery.level * 100;</p>
    <p>Again, here’s a demo, which will work only on a supporting device:</p>
    <div><iframe id="cp_embed_bhzgl" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/bhzgl.html" allowtransparency="true" class="cp_embed_iframe" style="width: 100%; overflow: hidden;" frameborder="0" height="575" scrolling="no"></iframe></div>
    <p><script async="" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/ei.js"></script></p>
    <p>For more info, see <a href="http://www.sitepoint.com/introducing-the-battery-status-api/">Introducing the Battery Status API</a> and <a href="http://www.sitepoint.com/html5-battery-status-api/">How to Use the HTML5 Battery Status API</a></p>
    <h2>7. Page Visibility API</h2>
    <p>The <a href="http://www.w3.org/TR/page-visibility/">Page Visibility API</a>
     enables us to determine the current visibility state of the page. What 
    this means is that we’re able to detect if our page is in the background
     or minimized (i.e. it’s not the currently-focused window).</p>
    <p>This capability can help us to develop powerful, yet CPU and 
    bandwidth efficient web applications. In fact, we can slow down or even 
    stop a CPU and/or bandwidth consuming process if we detect the user 
    isn’t using the page.</p>
    <p>This API exposes one event, called <code>visibilitychange</code>, that we can listen for to detect changes in the state of the page’s visibility, and two read-only properties, <code>hidden</code> and <code>visibilityState</code>. These properties belong to the <code>document</code> object. <code>hidden</code> is a Boolean whose value is <code>true</code> if the page is not visible, and <code>false</code> otherwise. <code>visibilityState</code> is an enumeration that specifies the current state of the document and consists of the following values: <code>hidden</code>, <code>visible</code>, <code>prerender</code>, and <code>unloaded</code>.</p>
    <p>The desktop browsers that support this API are Chrome 13+, Internet Explorer 10, Firefox 10+, Safari 7, and Opera 12.10 (<a href="https://developer.mozilla.org/en-US/docs/Web/Guide/User_experience/Using_the_Page_Visibility_API">source</a>). The mobile browsers that support the API are Chrome on Android 4.0+ and Opera Mobile 12.1+ on both Android and Symbian (<a href="http://mobilehtml5.org/">source</a>).</p>
    <p>Below is a demo:</p>
    <div><iframe id="cp_embed_CaGmw" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/CaGmw.html" allowtransparency="true" class="cp_embed_iframe" style="width: 100%; overflow: hidden;" frameborder="0" height="533" scrolling="no"></iframe></div>
    <p><script async="" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/ei.js"></script></p>
    <p>For more on this API, see my article <a href="http://www.sitepoint.com/introduction-to-page-visibility-api/">Introduction to Page Visibility API</a>.</p>
    <h2>8. Fullscreen API</h2>
    <p>The <a href="http://www.w3.org/TR/fullscreen/">Fullscreen API</a> provides a way to request fullscreen display from the user, and exit this mode when desired.</p>
    <p>This API exposes two methods, <code>requestFullscreen()</code> and <code>exitFullscreen()</code>, allowing us to request an element to become fullscreen and to exit fullscreen.</p>
    <p>It also exposes two properties, <code>fullScreenElement</code> and <code>fullScreenEnabled</code>, belonging to the <code>document</code>
     object. These specify the element that has been pushed to fullscreen 
    and if fullscreen mode is currently enabled. It also exposes one event, <code>fullScreenEnabled</code>, which provides us a convenient way to listen for when fullscreen mode has been enabled or disabled.</p>
    <p>The Fullscreen API is supported by all the major browsers, 
    specifically: Internet Explorer 11+, Firefox 10+, Chrome 15+, Safari 
    5.1+, and Opera 12.10+ (<a href="http://caniuse.com/#feat=fullscreen">source</a>).</p>
    <p>For a demonstration of this API, see <a href="http://blogs.sitepointstatic.com/examples/tech/full-screen/index.html">this page</a>. For more info, check out Craig’s article, <a href="http://www.sitepoint.com/html5-full-screen-api/">How to Use the HTML5 Full-Screen API</a>, from which the demo is taken.</p>
    <h2>9. getUserMedia API</h2>
    <p>The <a href="http://dev.w3.org/2011/webrtc/editor/getusermedia.html">getUserMedia API</a>
     provides access to multimedia streams (video, audio, or both) from 
    local devices. This means that we can access these streams without the 
    use of Flash or Silverlight. Some use cases for this API include 
    real-time communication and tutorials or lesson recording.</p>
    <p>The getUserMedia API exposes just one method called <code>getUserMedia()</code>. It belongs to the <code>window.navigator</code> object and accepts as its parameters an object of constraints, a success callback, and a failure callback.</p>
    <p>The getUserMedia API also allows us to have a lot of control over the
     requested stream. For example, we can choose to retrieve a video source
     at high resolution or at low resolution.</p>
    <p>The desktop browsers that support this API are Chrome 21+ (with 
    -webkit prefix), Firefox 17+ (with -moz prefix), and Opera 18+. On 
    mobile, it’s supported in Chrome 32+, Firefox 26+, and Opera 12+ (<a href="http://caniuse.com/#feat=stream">source</a>).</p>
    <p>To see a demo, <a href="http://aurelio.audero.it/demo/getusermedia-api-demo.html">visit this page</a> in a supporting browser. For more info, see my article <a href="http://www.sitepoint.com/introduction-getusermedia-api/">An Introduction to the getUserMedia API</a>.</p>
    <h2>10. WebSocket API</h2>
    <p>The <a href="http://www.w3.org/TR/websockets/">WebSocket API</a> 
    allows developers to create real-time applications by establishing 
    socket connections between the browser and the server. This means we can
     establish a persistent connection between the client and the server 
    that can exchange data at any time.</p>
    <p>In order to communicate using the WebSocket protocol, you need to create a <code>WebSocket</code> object. As soon as the object is instantiated, the API tries to establish a connection.</p>
    <p>The WebSocket API provides two methods: <code>send()</code>, to send data to the server, and <code>close()</code>,
     to close the connection. It also provides several attributes, some of 
    which are event listeners. This means that we can assign them a function
     that is executed when an event is fired. Examples of events include an 
    error occurring or a message arriving from the server.</p>
    <p>The WebSocket API is supported by all major browsers, specifically 
    IE10+, Firefox 4+ (full support from version 6), Chrome 4+ (full support
     from version 14), Safari 5+ (full support from version 6), and Opera 
    11+ (full support from version 12.10), (<a href="http://caniuse.com/#feat=websockets">source</a>).</p>
    <p>You can read more on this API in Sandeep Panda’s article <a href="http://www.sitepoint.com/introduction-to-the-html5-websockets-api/">Introduction to the HTML5 WebSockets API</a>.</p>
    <h2>Conclusion</h2>
    <p>In this article I’ve given an overview, along with some 
    demonstrations, of many of the APIs introduced in HTML5 in recent years.
     As you can see, many of them have pretty decent browser support.</p>
    <p>I hope this summary and the accompanying sources and demos can give 
    you some incentive to build something cool with these new features.</p>
    <p>If you’ve used any of these, let us know about your experience in the comments.</p>

                <div class="contributor-container--large">
            <div class="contributor contributor--large">
            <figure class="contributor_avatar article_author-avatar">
              <img alt="" src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/8b01a8b4d7a0a9079a4e97b1ddedbe56.png" class="avatar avatar-96 photo" height="96" width="96">        </figure>
            <div class="contributor_details">
              <h2 class="contributor_name"><a href="http://www.sitepoint.com/author/aderosa/">Aurelio De Rosa</a></h2>

              <p class="contributor_title">
                Web &amp; App Developer          </p>
              <p>I'm a (full-stack) web and app developer with more than 5 
    years' experience programming for the web using HTML5, CSS3, JavaScript 
    and PHP. I mainly use the LAMP stack and frameworks like jQuery, jQuery 
    Mobile, and Cordova (PhoneGap). My interests also include web security, 
    web accessibility, SEO and WordPress.

    Currently I'm self-employed working with the cited technologies and a 
    regular blogger for several networks (SitePoint, Tuts+ and 
    FlippinAwesome) where I write articles about the topics I usually work 
    with and more. I'm also the author of the books <cite>jQuery in Action, third edition</cite> and <cite>Instant jQuery Selectors</cite>.</p>
              <ul class="contributor_social">
                <li><a href="https://twitter.com/AurelioDeRosa" target="_blank"><i class="icon-twitter"></i></a></li><li><a href="https://github.com/AurelioDeRosa" target="_blank"><i class="icon-github"></i></a></li><li><a href="http://www.linkedin.com/in/aurelioderosa/en" target="_blank"><i class="icon-linkedin"></i></a></li><li><a href="https://plus.google.com/111199469497044249730" target="_blank"><i class="icon-google-plus"></i></a></li>          </ul>
            </div>
          </div>
          </div>
      
          </section>

          <div class="promo-panel promo-panel--no-ad">
            <div class="widget maestro maestro-content-type-product " id="maestro-product-29"><script>r(function(){ var element = document.getElementById('maestro-product-29'); var isVisible = element.offsetWidth > 0 || element.offsetHeight > 0; if (isVisible) {  gaQueue.track(['_trackEvent', 'Maestro View [Article End]', '1', 'Product - Book giveaway - JS HTML5 Basics - mobile', 1, true]); } });</script><div class="promo-panel_media-object"><img src="10%20HTML5%20APIs%20Worth%20Looking%20Into_files/jshtml-basics1_medium_3d.png"></div>
    <div class="promo-panel_content">
      <h1 class="promo-panel_title">
        Free book: Jump Start HTML5 Basics
      </h1>
      <p>Grab a free copy of one our latest ebooks! Packed with hints and tips on HTML5's most powerful new features.</p>
      <form class="promo-panel_action"><input name="email" class="promo-panel_email" placeholder="email address" type="email"><input name="content" value="29" type="hidden"><button class="button radius">Claim Book<div role="progressbar" style="position: relative; width: 0px; z-index: 2000000000;" class="spinner"><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-0-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(0deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-1-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(27deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-2-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(55deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-3-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(83deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-4-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(110deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-5-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(138deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-6-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(166deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-7-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(193deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-8-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(221deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-9-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(249deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-10-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(276deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-11-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(304deg) translate(7px, 0px); border-radius: 1px;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; animation: 1.42857s linear 0s normal none infinite opacity-72-25-12-13;"><div style="position: absolute; width: 5px; height: 2px; background: none repeat scroll 0% 0% rgb(0, 0, 0); box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1); transform-origin: left center 0px; transform: rotate(332deg) translate(7px, 0px); border-radius: 1px;"></div></div></div><div class="spinner" role="progressbar" style="position: relative; width: 0px; z-index: 2000000000;"><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-0-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(0deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-1-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(27deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-2-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(55deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-3-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(83deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-4-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(110deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-5-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(138deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-6-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(166deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-7-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(193deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-8-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(221deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-9-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(249deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-10-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(276deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-11-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(304deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div><div style="position: absolute; top: -1px; opacity: 0.25; -webkit-animation: opacity-72-25-12-13 1.4285714285714286s linear infinite;"><div style="position: absolute; width: 5px; height: 2px; background-color: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.0980392) 0px 0px 1px; -webkit-transform-origin: 0% 50%; -webkit-transform: rotate(332deg) translate(7px, 0px); border-top-left-radius: 1px; border-top-right-radius: 1px; border-bottom-right-radius: 1px; border-bottom-left-radius: 1px; background-position: initial initial; background-repeat: initial initial;"></div></div></div></button></form>
    </div></div>      </div>

          <div class="widget maestro maestro-content-type-ad hide-for-small" id="maestro-product-38"><script>r(function(){ var element = document.getElementById('maestro-product-38'); var isVisible = element.offsetWidth > 0 || element.offsetHeight > 0; if (isVisible) {  gaQueue.track(['_trackEvent', 'Maestro View [Article Footer]', '1', 'Ad - SP2013_Articles_728x90_2 - mobile', 1, true]); } });</script><!-- SP2013_Articles_728x90_2 -->
    <div id="div-gpt-ad-1392428092543-8" style="width:728px; height:90px;" class="adspot">
        <script type="text/javascript">googletag.cmd.push(function() { googletag.display("div-gpt-ad-1392428092543-8"); });</script><div id="google_ads_iframe_/7448792/SP2013_Articles_728x90_2_0__container__" style="border: 0pt none;"><iframe id="google_ads_iframe_/7448792/SP2013_Articles_728x90_2_0" name="google_ads_iframe_/7448792/SP2013_Articles_728x90_2_0" width="728" height="90" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom;"></iframe></div>
     <div style="border: 0pt none;" id="google_ads_iframe_/7448792/SP2013_Articles_728x90_2_0__container__"><iframe src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px none; vertical-align: bottom;" marginheight="0" marginwidth="0" name="google_ads_iframe_/7448792/SP2013_Articles_728x90_2_0" id="google_ads_iframe_/7448792/SP2013_Articles_728x90_2_0" frameborder="0" height="90" scrolling="no" width="728"></iframe></div></div></div>      <div class="widget maestro maestro-content-type-ad hide-for-large-up hide-for-medium" id="maestro-product-51"><script>r(function(){ var element = document.getElementById('maestro-product-51'); var isVisible = element.offsetWidth > 0 || element.offsetHeight > 0; if (isVisible) {  gaQueue.track(['_trackEvent', 'Maestro View [Article Footer Mobile]', '1', 'Ad - SP2013_Articles_320x50_2 - mobile', 1, true]); } });</script><!-- SP2013_Articles_320x50_2 -->
    <div id="div-gpt-ad-1392428092543-6" style="width:320px; height:50px;" class="adspot">
        <script type="text/javascript">googletag.cmd.push(function() { googletag.display("div-gpt-ad-1392428092543-6"); });</script><div id="google_ads_iframe_/7448792/SP2013_Articles_320x50_2_0__container__" style="border: 0pt none;"><iframe id="google_ads_iframe_/7448792/SP2013_Articles_320x50_2_0" name="google_ads_iframe_/7448792/SP2013_Articles_320x50_2_0" width="320" height="50" scrolling="no" marginwidth="0" marginheight="0" frameborder="0" src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px; vertical-align: bottom;"></iframe></div>
     <div style="border: 0pt none;" id="google_ads_iframe_/7448792/SP2013_Articles_320x50_2_0__container__"><iframe src="javascript:&quot;<html><body style='background:transparent'></body></html>&quot;" style="border: 0px none; vertical-align: bottom;" marginheight="0" marginwidth="0" name="google_ads_iframe_/7448792/SP2013_Articles_320x50_2_0" id="google_ads_iframe_/7448792/SP2013_Articles_320x50_2_0" frameborder="0" height="50" scrolling="no" width="320"></iframe></div></div></div>
          <a id="comments"></a>

          
    <div id="disqus_thread"><div dir="ltr" style="overflow: hidden;"><div style="width: 54px; height: 54px; margin: 0px auto; overflow: hidden; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFMAAABmCAMAAACA210sAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAadEVYdFNvZnR3YXJlAFBhaW50Lk5FVCB2My41LjEwMPRyoQAAAlhQTFRFMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtWDj2BwAAAMh0Uk5TAAABAQICAwMEBAUFBgYHBwgICQkKCgsLDAwNDQ4ODw8QEBEREhITExQUFRUWFhcXGBgZGRoaGxscHB0dHh4fHyAgISEjIyQkJSUmJigoKSkqKisrLCwtLS4uLy8wMDExMjIzMzQ0NTU2Njc3ODg5OTo6Ozs8PD09Pj4/P0BAQUFCQkNDRERFRUZGR0dISElJS0tMTE1NTk5PT1BQUVFSUlNTVFRVVVZWV1dYWFlZWlpbW1xcXV1eXl9fYGBhYWJiY2NkZGVlZmaMInkiAAAFVklEQVRo3u2Yf0hbVxTHP/flmYYQxFoXghMJzkpXQmszCd0ma7eKKyKuSOlKGaV0RaRzsIHIGDK2MqSsXVvKcKWIG6V0ItI5Z1tXZBsiIkWciC0iYsMIIbisC1mWhpDG/RFjfpvr4O2vnH+Se+/J575z3z3n5n4F2Uy12aotpUY1HFp1OecXo+S00vo6q9kYXF2ZnfLG+0QWYH2jw5jcEZi6P50dW33qoBL//sl4TqbpyPHSzB97bo2GMjr1bcfUjcbcWXIwlZb24uxBenvH0sM+b0s0om2PAJPBC+hS3KxfvrUtx8IZD+z9LZDcUfL1zqTWj98DtLVP/JP2nIc74+vonplfWQ2EDcZya22deb3T1zOZtOq9saf0jMy6vSarywdU3tAvdIRTmGdOxz5Dd8cWkqeyNzXG1i16ZWijs+MEQPjaUCTh+EU9DFxNZna2AhAZvPUkPXDLqebY++3rj7/xfhXwfTyX5LX/EhA9tZxYz/bjACx0/vQ0YzEDk9O27QD2vx/Gej6oBiKdcylub24DsWN8g9ncAcDAp39mfUV/jJp3Aux//Big9CMF+Go8xcfveR14/k6cuatHB0Qvf5MrZ55NiH0Ajl/8wKEDgOezNOeVV8tAca8z9Zd3AFy4nTsLmRX7AP2Ld9bgxAvA4Ey6S9HLwNP11HrHCnBjmM2sbwTA1gJUAWQgmQKwxpiWkwAz19ncriwBtJugDMCZ4eAOAeYY84QeCPZE8zBDn0eA4qOgAvgzPQKASQEobQbo85DPlgcBjhkIA2SpNSVAQAFoMADeYfLbzSBQ8hpPACwZw2YV8CoATQCDIQmmbwTgMCsA9oxhO4BTASw1QGQMGRsBqDPNADSr6aPNADNKnD7rlWI6lwG1bioCVDSlDb5iB6ITClAL8AA5mwbY9eTXjaRPWs1ugEmvEt/AjySZjwCs9EcAQ3tK8bpUAkT7UYBKgGVJphOgAucAwI2kgfq+KoChJVRQTYA/IMl0AZTB9Vob9+cBSn1RxeJorAVg6RqoYIwngJRFQgYwQqSr19ILUH6LkCl+Iru6QglmEGkosdT0nXWsApzVo4+PLXZ5Y6NBWAdLmbrOxXcfoO6NxHk81BsmiVksjTSkRKV0bBAnvl3amDXiLwZTsV+OWQmQyA/9UF2V2Rj0OmcnvMmROPcAVXNbYLoS5W90NMNFAX4HsEnGvjt7NU5nLgA4JJn78yedEj9XasukkDXVQGQ2L9O9DKhNUswmgJlAXiZjAEdUCWRJC8Bd8jP9AOGIBPOkAfBNSjBbAW7LrOZRgIFQfubuXUBI4uwwdKuAL9/sCnAE4GeJPIrV9WuB/MziBgCJk7i9BWB+VKLKHDYAiwuo5RUW9/QmyJMAgXNRCWYrgP5qhVmBQHeus87Y1QhAjztvPDocbwNsLzcJQN+oPsy6p2wXXgLg4j0kmO9Zk9ui9tBfzrV0r/L3P9wOwPXvJHacKLudkT/O4fHkW4Jib2pYv3dclPlPhTh9Jl6nPW7vQcP698W5RddqMGQyVpbb7fHqEjg3KVUTxLA56Ha7XB63OwKV3ZuU0QfnPXLlUOxxpcTZ0laS4755dVz2yMq4Fxtbj2WppO6bd8P8Zyao9Q0OU8q9Z3p8Koq8CZF1h9lqaixlRn0w5HWtLCytsSVTc8y0rahIpxNFz3S6Ip1Y26J2ITTQLoQG2oXQQLsQGmgXQgPtQmigXQgNtAuhgXYhNNAuhAbahShoFwXtoqBdFLSLgnZR0C4K2kVBuyhoFwXtIofOIDTQLoQG2sVzGmgX72qgXfyggXaxVwPtQmigXYj/S7tQU7WLrQCBfwFnft8xK3413wAAAABJRU5ErkJggg==); background-repeat: no-repeat no-repeat;"><style type="text/css">.disqus-loader{animation:disqus-embed-spinner .7s infinite linear;-webkit-animation:disqus-embed-spinner .7s infinite linear}@keyframes disqus-embed-spinner{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}@-webkit-keyframes disqus-embed-spinner{0%{-webkit-transform:rotate(0deg)}100%{-webkit-transform:rotate(360deg)}}</style><div class="disqus-loader" style="width: 29px; height: 29px; margin: 11px 14px; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFMAAABmCAMAAACA210sAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAadEVYdFNvZnR3YXJlAFBhaW50Lk5FVCB2My41LjEwMPRyoQAAAlhQTFRFMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtMzY63+TtWDj2BwAAAMh0Uk5TAAABAQICAwMEBAUFBgYHBwgICQkKCgsLDAwNDQ4ODw8QEBEREhITExQUFRUWFhcXGBgZGRoaGxscHB0dHh4fHyAgISEjIyQkJSUmJigoKSkqKisrLCwtLS4uLy8wMDExMjIzMzQ0NTU2Njc3ODg5OTo6Ozs8PD09Pj4/P0BAQUFCQkNDRERFRUZGR0dISElJS0tMTE1NTk5PT1BQUVFSUlNTVFRVVVZWV1dYWFlZWlpbW1xcXV1eXl9fYGBhYWJiY2NkZGVlZmaMInkiAAAFVklEQVRo3u2Yf0hbVxTHP/flmYYQxFoXghMJzkpXQmszCd0ma7eKKyKuSOlKGaV0RaRzsIHIGDK2MqSsXVvKcKWIG6V0ItI5Z1tXZBsiIkWciC0iYsMIIbisC1mWhpDG/RFjfpvr4O2vnH+Se+/J575z3z3n5n4F2Uy12aotpUY1HFp1OecXo+S00vo6q9kYXF2ZnfLG+0QWYH2jw5jcEZi6P50dW33qoBL//sl4TqbpyPHSzB97bo2GMjr1bcfUjcbcWXIwlZb24uxBenvH0sM+b0s0om2PAJPBC+hS3KxfvrUtx8IZD+z9LZDcUfL1zqTWj98DtLVP/JP2nIc74+vonplfWQ2EDcZya22deb3T1zOZtOq9saf0jMy6vSarywdU3tAvdIRTmGdOxz5Dd8cWkqeyNzXG1i16ZWijs+MEQPjaUCTh+EU9DFxNZna2AhAZvPUkPXDLqebY++3rj7/xfhXwfTyX5LX/EhA9tZxYz/bjACx0/vQ0YzEDk9O27QD2vx/Gej6oBiKdcylub24DsWN8g9ncAcDAp39mfUV/jJp3Aux//Big9CMF+Go8xcfveR14/k6cuatHB0Qvf5MrZ55NiH0Ajl/8wKEDgOezNOeVV8tAca8z9Zd3AFy4nTsLmRX7AP2Ld9bgxAvA4Ey6S9HLwNP11HrHCnBjmM2sbwTA1gJUAWQgmQKwxpiWkwAz19ncriwBtJugDMCZ4eAOAeYY84QeCPZE8zBDn0eA4qOgAvgzPQKASQEobQbo85DPlgcBjhkIA2SpNSVAQAFoMADeYfLbzSBQ8hpPACwZw2YV8CoATQCDIQmmbwTgMCsA9oxhO4BTASw1QGQMGRsBqDPNADSr6aPNADNKnD7rlWI6lwG1bioCVDSlDb5iB6ITClAL8AA5mwbY9eTXjaRPWs1ugEmvEt/AjySZjwCs9EcAQ3tK8bpUAkT7UYBKgGVJphOgAucAwI2kgfq+KoChJVRQTYA/IMl0AZTB9Vob9+cBSn1RxeJorAVg6RqoYIwngJRFQgYwQqSr19ILUH6LkCl+Iru6QglmEGkosdT0nXWsApzVo4+PLXZ5Y6NBWAdLmbrOxXcfoO6NxHk81BsmiVksjTSkRKV0bBAnvl3amDXiLwZTsV+OWQmQyA/9UF2V2Rj0OmcnvMmROPcAVXNbYLoS5W90NMNFAX4HsEnGvjt7NU5nLgA4JJn78yedEj9XasukkDXVQGQ2L9O9DKhNUswmgJlAXiZjAEdUCWRJC8Bd8jP9AOGIBPOkAfBNSjBbAW7LrOZRgIFQfubuXUBI4uwwdKuAL9/sCnAE4GeJPIrV9WuB/MziBgCJk7i9BWB+VKLKHDYAiwuo5RUW9/QmyJMAgXNRCWYrgP5qhVmBQHeus87Y1QhAjztvPDocbwNsLzcJQN+oPsy6p2wXXgLg4j0kmO9Zk9ui9tBfzrV0r/L3P9wOwPXvJHacKLudkT/O4fHkW4Jib2pYv3dclPlPhTh9Jl6nPW7vQcP698W5RddqMGQyVpbb7fHqEjg3KVUTxLA56Ha7XB63OwKV3ZuU0QfnPXLlUOxxpcTZ0laS4755dVz2yMq4Fxtbj2WppO6bd8P8Zyao9Q0OU8q9Z3p8Koq8CZF1h9lqaixlRn0w5HWtLCytsSVTc8y0rahIpxNFz3S6Ip1Y26J2ITTQLoQG2oXQQLsQGmgXQgPtQmigXQgNtAuhgXYhNNAuhAbahShoFwXtoqBdFLSLgnZR0C4K2kVBuyhoFwXtIofOIDTQLoQG2sVzGmgX72qgXfyggXaxVwPtQmigXYj/S7tQU7WLrQCBfwFnft8xK3413wAAAABJRU5ErkJggg==); background-position: -54px 0px; background-repeat: no-repeat no-repeat;"></div></div><p align="center">Disqus seems to be taking longer than usual. <a href="#" onclick="DISQUS.reset({reload: true}); return false;">Reload</a>?</p></div><iframe id="dsq-2" data-disqus-uid="2" allowtransparency="true" frameborder="0" tabindex="0" title="Disqus" width="100%" src="http://disqus.com/embed/comments/?disqus_version=f45da22e&amp;base=default&amp;f=sitepointproduction&amp;t_i=76830%20http%3A%2F%2Fwww.sitepoint.com%2F%3Fp%3D76830&amp;t_u=http%3A%2F%2Fwww.sitepoint.com%2F10-html5-apis-worth-looking%2F&amp;t_e=10%20HTML5%20APIs%20Worth%20Looking%20Into&amp;t_d=10%20HTML5%20APIs%20Worth%20Looking%20Into&amp;t_t=10%20HTML5%20APIs%20Worth%20Looking%20Into&amp;s_o=default&amp;l=#2" style="width: 100% !important; border: none !important; overflow: hidden !important; height: 0px !important;" scrolling="no" horizontalscrolling="no" verticalscrolling="no"></iframe></div>

    <script type="text/javascript">
    /* <![CDATA[ */
        var disqus_url = 'http://www.sitepoint.com/10-html5-apis-worth-looking/';
        var disqus_identifier = '76830 http://www.sitepoint.com/?p=76830';
        var disqus_container_id = 'disqus_thread';
        var disqus_domain = 'disqus.com';
        var disqus_shortname = 'sitepointproduction';
        var disqus_title = "10 HTML5 APIs Worth Looking Into";
            var disqus_config = function () {
            var config = this; // Access to the config object
            config.language = '';

            /*
               All currently supported events:
                * preData — fires just before we request for initial data
                * preInit - fires after we get initial data but before we load any dependencies
                * onInit  - fires when all dependencies are resolved but before dtpl template is rendered
                * afterRender - fires when template is rendered but before we show it
                * onReady - everything is done
             */

            config.callbacks.preData.push(function() {
                // clear out the container (its filled for SEO/legacy purposes)
                document.getElementById(disqus_container_id).innerHTML = '';
            });
                    config.callbacks.onReady.push(function() {
                // sync comments in the background so we don't block the page
                var script = document.createElement('script');
                script.async = true;
                script.src = '?cf_action=sync_comments&post_id=76830';

                var firstScript = document.getElementsByTagName( "script" )[0];
                firstScript.parentNode.insertBefore(script, firstScript);
            });
                        };
    /* ]]> */
    </script>

    <script type="text/javascript">
    /* <![CDATA[ */
        var DsqLocal = {
            'trackbacks': [
            ],
            'trackback_url': "http:\/\/www.sitepoint.com\/10-html5-apis-worth-looking\/trackback\/"    };
    /* ]]> */
    </script>

    <script type="text/javascript">
    /* <![CDATA[ */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript';
        dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.' + 'disqus.com' + '/embed.js?pname=wordpress&pver=2.74';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
    /* ]]> */
    </script>

        </article>
    
   

    <!-- Example row of columns -->
    

   

</div> <!-- /container -->
