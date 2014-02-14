<?php

// Require Libs
require_once('libs/codebird.php');
require_once('libs/BristolIpsum.class.php');

// Generate some Ipsum
$generator = new BristolIpsumGenerator();
$output = $generator->Kinave_Filler("proper-gurt-lush", 1, false);

// Make sure it is 140 characters or less
$tweet = preg_replace('/\s+?(\S+)?$/', '', substr($output[0], 0, 141));

if ( $_GET["auth"] === getenv('SCHEDULER_PASSWORD')) {

  // Twitter shizzle
  \Codebird\Codebird::setConsumerKey(getenv('TWITTER_API_KEY'), getenv('TWITTER_API_SECRET'));
  $cb = \Codebird\Codebird::getInstance();
  $cb->setToken(getenv('ACCESS_TOKEN'), getenv('ACCESS_TOKEN_SECRET'));
   
  $params = array(
    'status' => $tweet
  );

  $reply = $cb->statuses_update($params);

}

?>