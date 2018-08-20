<?php

$ConfigServer = null;

function GetConfig($config){
  if ($GLOBALS['ConfigServer'] === null){
    print "ConfigServer not load.";
    return null;
  }
  if (!isset($GLOBALS['ConfigServer'][$config])){
    print "Config not exist";
    return null;
  }

  return $GLOBALS['ConfigServer'][$config];
}


function GetConfigServer(){
  $myFile = fopen("ConfigServer.txt", "r") or die("Unable to open file!");
  $arrayFile = array();
  while(!feof($myFile)){
    $line = fgets($myFile);
    $parts = explode("=", $line);
    for ($i=0; $i < sizeof($parts); $i++) {
      $parts[$i] = str_replace(' ', '', $parts[$i]);
      $parts[$i] = str_replace(';', '', $parts[$i]);
    }
    if (sizeof($parts) === 2){
      $arrayFile[$parts[0]] = $parts[1];
    }
  }

  $GLOBALS['ConfigServer'] = $arrayFile;
  fclose($myFile);

  CallConsole("ConfigLoad Complete.");
}


 ?>
