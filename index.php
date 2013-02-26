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
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/images/apple-touch-icon-precomposed.png">

  <link href="assets/stylesheets/application.css" media="screen,tv,projection" rel="Stylesheet" type="text/css" />
   
  <!-- so:header JS -->
  
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

  <div class="content">
    <h1>Bristol Ipsum</h1>

    <form id="luvver" class="block" action="" method="get">

      <div class="form-wrap">
        <label for="paragraphs">Num. of Paragraphs:</label>
        <input id="paragraphs" style="width: 40px;" type="text" name="paras" value="5" maxlength="2" />
      </div>

      <label for="paragraphs">Type of Ipusm:</label>
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
     

      <input id="start-with-luvver" type="checkbox" name="start-with-luvver" value="true" /> 
      <label for="start-with-luvver">Start with 'All right me luvver...'</label>

      <input id="generate" type="submit" value="Generate" />

    </form>

    <div class="block output">
      <?php if (isset($_REQUEST["type"])) { print $output; }  ?> 
      <p class="quote"><span class="mark">"</span>A dialect of English is spoken by some Bristol inhabitants, known colloquially as Bristolian, "Bristolese" or even, following the publication of Derek Robson's "Krek Waiters peak Bristle", as "Bristle" or "Brizzle". Bristol natives speak with a rhotic accent, in which the post-vocalic r in words like car and card is still pronounced, having been lost from many other dialects of English, notably BBC English, or RP, i.e., "received pronunciation". The unusual feature of this accent, unique to Bristol, is the so-called Bristol L (or terminal L), in which an L sound appears to be appended to words that end in an 'a' or 'o'. There is some dispute about whether this is broad "l" or "w".[210] Thus "area" becomes "areal" or "areaw", etc. The "-ol" ending of the city's name is a significant example of the occurrence of the so-called "Bristol L". Bristolians using the dialect, tend to pronounce "a" and "o" at the end of a word almost as "aw", hence "cinemaw". To the stranger's ear this pronunciation sounds as if there is an "L" after the vowel. For example the statement "Africa is a malaria area", spoken with a Bristolian accent will sound like "Africal is a malarial areal" or "Africaw is a malariaw areaw". Another example of the Bristol accent is broad a before "l", thus "Awbert" for "Albert", "fawt" for "fault".<span class="mark">"</span></p>
      <p>From <a href="http://en.wikipedia.org/wiki/Bristol#Dialect" title="Bristol Dialect on Wikipedia">Wikiepdia</a>.</p>
    </div>

  </div>

  <footer class="site-footer">
  <p>Made 2013 <a href="http://craigcoles.co.uk" title="Craig Coles">Craig Coles</a>. With help from <a href="http://discoliam.com" title="DiscoLiam">Liam Richardson</a>.<br />Background Image: <a href="http://www.flickr.com/photos/danbri/8072271/">http://www.flickr.com/photos/danbri/8072271/</a>. Based on <a href="https://github.com/petenelson/bacon-ipsum" title="Bacon Ipsum on Github">Bacon Ipsum</a> by <a href="https://twitter.com/GunGeekATX" title="Pete Nelson on Twitter">Pete Nelson</a>.</p>
  </footer>




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