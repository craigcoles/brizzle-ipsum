<?php

  if (isset($_REQUEST["type"])) {

    require_once 'libs/BristolIpsum.class.php';

    $generator = new BristolIpsumGenerator();
    
    // Defaults
    $number_of_paragraphs = 5;

    if (isset($_REQUEST["paras"])) $number_of_paragraphs = intval($_REQUEST["paras"]);

    $output = '';
          
    // If stupid numbers are chosen     
    if ($number_of_paragraphs < 1) $number_of_paragraphs = 1;
    if ($number_of_paragraphs > 100) $number_of_paragraphs = 100;

    $paragraphs = $generator->Kinave_Filler(
      $_REQUEST["type"], 
      $number_of_paragraphs,
      isset($_REQUEST["start-with-luvver"]) && $_REQUEST["start-with-luvver"] == "true"
    );

    foreach($paragraphs as $paragraph) {
      $output .= '<p>' . $paragraph . '</p>'."\n";
    } 

  }

?>
<!doctype html>
<html>
<head>
  <title>Bristol Ipsum</title>
  <!-- so:meta-->
  <meta charset="utf-8">
  <meta name="robots" content="all" />
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--  Mobile viewport optimized: j.mp/bplateviewport -->
  
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="content-language" content="en" />
  
  <meta name="robots" content="noodp,noydir" />
  
  <meta name="author" content="Site Title" />
  <meta name="copyright" content="Year, Site Title" />
  
  <meta name="Geo.Country" content="GB" />
  <meta name="Geo.Region" content="GB-BST" />
  <!-- eo:meta-->
  
  <!-- Favicon: -->
  <link rel="shortcut icon" href="/favicon.ico">
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114x114-precomposed.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72x72-precomposed.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-precomposed.png">
  
  <!-- so:stylesheets -->
  <!--[if ! lte IE 6]><!-->
    <link href="assets/stylesheets/application.css" media="screen,tv,projection" rel="Stylesheet" type="text/css" />
    <!--[if lte IE 9]><link href="assets/stylesheets/ie9.css" media="screen" rel="Stylesheet" type="text/css" /><![endif]-->
    <!--[if lte IE 8]><link href="assets/stylesheets/ie8.css" media="screen" rel="Stylesheet" type="text/css" /><![endif]-->
    <!--[if lte IE 7]><link href="assets/stylesheets/ie7.css" media="screen" rel="Stylesheet" type="text/css" /><![endif]-->
  <!--<![endif]-->
  <!--[if !IE 7]>
    <style type="text/css">
      .content {display:table;height:100%}
    </style>
  <![endif]-->
  <!--[if lte IE 6]>
    <link rel="stylesheet" href="http://universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
  <![endif]-->
  <!-- eo:stylesheets -->

  <!-- so:header JS -->
  
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js"></script>
  
  <!-- Google Analytics -->
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
  <!-- eo:header JS -->
</head>

<body>

  <div classs="page">

    <div class="content">

      <form id="luvver" class="block" action="" method="get">

        <div class="form-wrap">
          <label for="paragraphs">Paragraphs:</label>
          <input id="paragraphs" style="width: 40px;" type="text" name="paras" value="5" maxlength="2" />
        </div>

        <div class="form-wrap">
          <label for="paragraphs">Type:</label>
            <ul>
              <li>
                <input id="luvver-and-filler" type="radio" name="type" value="luvver-and-filler" />
                <label for="luvver-and-filler">Luvver and Filler</label>
              </li> 
              <li>
                <input id="proper-gurt-lush" type="radio" name="type" value="proper-gurt-lush" />
                <label for="proper-gurt-lush">Proper Gurt Lush</label> 
              </li>
            </ul>
        </div>

        <div class="form-wrap">
          <input id="start-with-luvver" type="checkbox" name="start-with-luvver" value="true" /> 
          <label for="start-with-luvver">Start with 'All right me luvver ipsum dolor sit amet...'</label>
        </div>

        <div class="form-wrap buttons">
          <input id="generate" type="submit" value="Mint in it" />
          <p class="copy-to-clipboard">Copy to clipboard</p>
        </div>

    	</form>

    	<div class="block output <?php if (isset($_REQUEST["type"])) echo 'display'?>">
        <?php if (isset($_REQUEST["type"])) { print $output; }  ?> 
      </div> 
      
    </div>
    
    <footer class="site-footer">
      <p>Background Image: <a href="http://www.flickr.com/photos/danbri/8072271/">http://www.flickr.com/photos/danbri/8072271/</a></p>
    </footer>

  </div>

  <!-- so:JavaScripts -->
  <!-- libraries  -->
  <!--[if ! lte IE 6]><!-->
    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <!-- Custom -->
    <script src="assets/javascripts/jquery.plugin.clipboard.js"></script>
    <script src="assets/javascripts/application.js"></script>
  <!--<![endif]-->
<!-- eo:JavaScripts -->
</body>
</html>