<?php

  if (isset($_REQUEST["type"])) {

    require_once '../libs/BristolIpsum.class.php';

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
    print $output;
    
  }

?>