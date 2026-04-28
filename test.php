<!DOCTYPE html>
<html id="jsbin" lang="en" class="">
<head>
  <meta charset=utf-8>
  <title>JS Bin - Collaborative JavaScript Debugging</title>
  <link rel="icon" href="http://static.jsbin.com/images/favicon.png">
  <link rel="stylesheet" href="http://static.jsbin.com/css/style.css?3.18.29">
  <link rel="stylesheet" href="http://static.jsbin.com/css/flat-ui.css?3.18.29">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!--[if lte IE 9 ]><link rel="stylesheet" href="http://static.jsbin.com/css/ie.css?3.18.29"><![endif]-->
  
    
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-1656750-13', 'jsbin.com');
ga('require', 'linkid', 'linkid.js');
ga('require', 'displayfeatures');
ga('send', 'pageview');
ga('set', 'dimension1', '');
</script>

  
  <meta name="description" content="A live pastebin for HTML, CSS & JavaScript and a range of processors, including SCSS, CoffeeScript, Jade and more..." />
  
  <meta property="og:url" content="http://jsbin.com/umuvu4/108/edit" />
  <meta property="og:title" content="JS Bin" />
  <meta property="og:description" content="Sample of the bin: " />
  
  <meta property="og:image" content="http://static.jsbin.com/images/logo.png" />
</head>
<!--[if lt IE 7]>  <body class="source ie ie6"> <![endif]-->
<!--[if IE 7]>     <body class="source ie ie7"> <![endif]-->
<!--[if gt IE 7]>  <body class="source ie">     <![endif]-->
<!--[if !IE]><!--> <body class="source public">    <!--<![endif]-->

<script>
if(top != self) {
  window.location = 'http://jsbin.com/umuvu4/108/embed';
  document.write('<' + '!--');
}
</script>
<div id="control">
  <div class="control">
    <div class="buttons"><div id="sharemenu" class="menu ">
      <div class="dropdown" id="share">
        <div class="dropdowncontent">
          <form>
            <div data-desc="This bin's full output without the JS Bin editor"></div>
          </form>
        </div>
      </div>
    </div>
      <div class="help">
        <div class="menu">
          <div class="dropdown dd-right" id="help"> </div>
      </div>
    </div>
  </div>
  </div>
</div>
<div id="bin" class="stretch" style="opacity: 0; filter:alpha(opacity=0);">
  <div id="source" class="binview stretch">
  </div>
  <div id="panelswaiting">
    <div class="code stretch html panel">
      <div class="label menu"><span class="name"><strong><a href="#htmlprocessors" class="fake-dropdown button-dropdown">HTML</a></strong></span><div class="dropdown" id="htmlprocessors">
          <div class="dropdownmenu processorSelector" data-type="html">
            <a href="#html">HTML</a>
            <a href="#markdown">Markdown</a>
            <a href="#jade">Jade</a>
            <a href="#convert">Convert to HTML</a>
          </div>
        </div>
      </div>
      <div class="editbox">
        <textarea spellcheck="false" autocapitalize="none" autocorrect="off" id="html"></textarea>
      </div>
    </div>
    <div class="code stretch javascript panel">
      <div class="label menu"><span class="name"><strong><a  class="fake-dropdown button-dropdown" href="#javascriptprocessors">JavaScript</a></strong></span>
        <div class="dropdown" id="javascriptprocessors">
          <div class="dropdownmenu processorSelector" data-type="javascript">
            <a href="#javascript">JavaScript</a>
            <a href="#coffeescript">CoffeeScript</a>
            <a href="#jsx">JSX (React)</a>
            <a href="#livescript">LiveScript</a>
            <a href="#processing">Processing</a>
            <a href="#traceur">Traceur</a>
            <a href="#typescript">TypeScript</a>
            <a href="#convert">Convert to JavaScript</a>
          </div>
        </div>
      </div>
      <div class="editbox">
        <textarea spellcheck="false" autocapitalize="none" autocorrect="off" id="javascript"></textarea>
      </div>
    </div>
    <div class="code stretch css panel">
      <div class="label menu"><span class="name"><strong><a class="fake-dropdown button-dropdown" href="#cssprocessors">CSS</a></strong></span>
        <div class="dropdown" id="cssprocessors">
          <div class="dropdownmenu processorSelector" data-type="css">
            <a href="#css">CSS</a>
            <a href="#less">Less</a>
            <a href="#myth">Myth</a>
            
            <a href="#sass" data-label="Sass">Sass <span class="small">with Compass</span></a>
            <a href="#scss" data-label="SCSS">SCSS <span class="small">with Compass</span></a>
            
            <a href="#stylus">Stylus</a>
            <a href="#convert">Convert to CSS</a>
          </div>
        </div>
      </div>
      <div class="editbox">
        <textarea spellcheck="false" autocapitalize="none" autocorrect="off" id="css"></textarea>
      </div>
    </div>
    <div class="stretch console panel">
      <div class="label">
        <span class="name"><strong>Console</strong></span>
        <span class="options">
          <button id="runconsole" title="ctrl + enter">Run</button>
          <button id="clearconsole" title="ctrl + l">Clear</button>
        </span>
      </div>
      <div id="console" class="stretch"><ul id="output"></ul><form>
          <textarea id="exec" spellcheck="false" autocapitalize="none" rows="1" autocorrect="off"></textarea>
      </form></div>
    </div>
    <div id="live" class="stretch live panel">
      <div class="label">
        <span class="name"><strong>Output</strong></span>
        <span class="options">
          <button id="runwithalerts" title="ctrl + enter
Include alerts, prompts &amp; confirm boxes">Run with JS</button>
          <label>Auto-run JS<input type="checkbox" id="enablejs"></label>
          <a target="_blank" title="Live preview" id="jsbinurl" class="" href="/umuvu4/108"><img src="http://static.jsbin.com/images/popout.png"></a>
        </span>
        <span class="size"></span>
      </div>
    </div>
  </div>
  
 
  
</div>







<!--[if lte IE 8]>
<script src="http://static.jsbin.com/js/vendor/jshint/jshint.old.min.js"></script>
<![endif]-->
<script src="http://static.jsbin.com/js/vendor/jquery-1.11.0.min.js"></script>

<script src="http://static.jsbin.com/js/prod/jsbin-3.18.29.min.js"></script>


</body>
</html>

<!--
Created using JS Bin
http://jsbin.com

Copyright (c) 2014 by anonymous (http://jsbin.com/umuvu4/2/edit)

Released under the MIT license: http://jsbin.mit-license.org
-->




