<?php

  require_once 'libs/BristolIpsum.class.php';

  $generator = new BristolIpsumGenerator();
  
  // Defaults
  $number_of_paragraphs = 10;

  if (isset($_REQUEST["paras"])) $number_of_paragraphs = intval($_REQUEST["paras"]);

  $output = '';
        
  // If stupid numbers are chosen     
  if ($number_of_paragraphs < 1) $number_of_paragraphs = 1;
  if ($number_of_paragraphs > 100) $number_of_paragraphs = 100;

  if (isset($_REQUEST["type"])) {
    $paragraphs = $generator->Kinave_Filler(
      $_REQUEST["type"], 
      $number_of_paragraphs,
      isset($_REQUEST["start-with-luvver"]) && $_REQUEST["start-with-luvver"] == "true"
    );
  } else {
    $paragraphs = $generator->Kinave_Filler(
      "luvver-and-filler",
      $number_of_paragraphs,
      "true"
    );
  }


  foreach($paragraphs as $paragraph) {
    $output .= '<p>' . $paragraph . '</p>'."\n";
  } 

?>
<!doctype html>
<html>
  <head>
    <title>Brizzle Ipsum</title>
    <!-- so:meta-->
    <meta charset="utf-8">
    <meta name="robots" content="all" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <meta name="description" content="Brizzle Ipsum, a Lorem Ipsum Genarator with a Bristolian Dialect. " />
    <meta name="keywords" content="Brizzle, Ipsum, Lorem, Ipsum, Brizzle Ipsum, Lorem, Ipsum, Generator, Lorem Ipsum Genrator, Bristol, Craig Coles, Liam Richardson, Beef" />
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    
    <meta name="robots" content="noodp,noydir" />
    
    <meta name="author" content="Brizzle Ipsum" />
    <meta name="copyright" content="2013, Brizzle Ipsum" />
    
    <meta name="Geo.Country" content="GB" />
    <meta name="Geo.Region" content="GB-BST" />
    <!-- eo:meta-->
    
    <!-- Favicon: -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-precomposed.png">

    <link href="assets/stylesheets/application.css" media="screen,tv,projection" rel="Stylesheet" type="text/css" />
     
    <!-- so:header JS -->
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js"></script>
    
    <!-- Google Analytics -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-38812079-1']);
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

    <div id="page" class="page">
      
      <header class="site-header">

        
        <h1 class="site-title">
          <a href="/">Brizzle Ipsum</a>
          <!-- <p>A Lorem Ipsum Genarator with a Bristolian Dialect.</p> -->
        </h1>

      </header>

      <section class="main-content">

        <!-- so: form -->
        <div class="form-block">

          <form id="luvver" class="block" action="" method="get">

            <div class="input-wrap count">
              <label for="paragraphs">Paragraph Count</label>
              <input id="paragraphs" type="text" name="paras" value="5" maxlength="2" />
            </div>

            <div class="input-wrap">
              <label>Type of Ipusm:</label>
              <ul>
                <li>
                  <input id="luvver-and-filler" type="radio" name="type" value="luvver-and-filler" checked="checked" />
                  <label for="luvver-and-filler">Luvver and Filler</label>
                </li> 
                <li>
                  <input id="proper-gurt-lush" type="radio" name="type" value="proper-gurt-lush" />
                  <label for="proper-gurt-lush">Proper Gurt Lush</label> 
                </li>
              </ul>
            </div>
           
            <div class="input-wrap">
              <input id="start-with-luvver" type="checkbox" name="start-with-luvver" value="true" checked="checked" /> 
              <label for="start-with-luvver">Start with 'All right me luvver...'</label>
            </div>

            <div class="input-wrap submit">
              <input id="generate" class="btn" type="submit" value="Generate" />
            </div>

          </form>

        </div>
        <!-- eo: form -->

        <div class="block output">
          <?php 
            if (isset($_REQUEST["type"])) { 
              print $output; 
            } else {
              print $output;
            }
          ?> 
        </div>

      </section>

      <footer class="site-footer">
        
        <p class="beef-love"><a href="http://www.wearebeef.co.uk">Beef</a></p>
        <p>
          Made by <a href="http://craigcoles.co.uk" title="Craig Coles">Craig Coles</a> and <a href="http://discoliam.com" title="DiscoLiam">Liam Richardson</a>.<br/>
          Based on <a href="https://github.com/petenelson/bacon-ipsum" title="Bacon Ipsum on Github">Bacon Ipsum</a>
          by <a href="https://twitter.com/GunGeekATX" title="Pete Nelson on Twitter">Pete Nelson</a><br/>
          Background Image taken by <a href="http://www.flickr.com/photos/danbri/8072271/">Dan Brickley</a>.
        </p>

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