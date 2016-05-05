<?php

function writeToLog($type, $content){
  $myfile = "Log6da545.txt";
  date_default_timezone_set("Asia/Kolkata");
  $text = date("Y-m-d h:i:s a", time()) ." - ". $type . " " . $content . "\n";
  file_put_contents($myfile, $text, FILE_APPEND);
}

writeToLog("Hello", "rfe");

 ?>
