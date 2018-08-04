<?php
$DataBase = null;
$ConfigServer = null;

function CallPage($value = NULL){
  if ($value === NULL) {
    return "NULL";
  }
  include $value;
  return $value;
}

function SelectPage(){
  $page_main = "PaginasHTML/main.html";
  $page_main_name = "main";
  $page_user = "PaginasHTML/mainUser.html";
  $page_user_name = "mainUser";
  $page_ingresarUser = "PaginasHTML/ingresarUser.html";
  $page_ingresarUser_name = "ingresarUser";
  $page_registrarUser = "PaginasHTML/registrarUser.html";
  $page_registrarUser_name = "registrarUser";


  if (empty($_GET['page'])){
    return CallPage($page_main);
  }
  $page = $_GET['page'];
  switch ($page) {
    case $page_main_name:
      return CallPage($page_main);
      break;
    case $page_user_name:
      return CallPage($page_user);
      break;
    case $page_ingresarUser_name:
      return CallPage($page_ingresarUser);
      break;
    case $page_registrarUser_name:
      return CallPage($page_registrarUser);
      break;

    default:
      return CallPage($page_main);
      break;
  }
}

function CallStyle($value="StyleCSS/frontend_style.css"){
  include $value;
}

function LookPost(){
  foreach ($_POST as $key => $value) {
    echo "<console>",$key, " : ", $value, "</console><br>";
  }
}

function GetDataBase(){
  //$GLOBALS['DataBase']
  echo "<console>", "DataBase Conecting...", "</console><br>";

  if ($GLOBALS['DataBase'] === null){
    echo "<console>", "DataBase fail connect.", "</console><br>";
  }
  else{
    echo "<console>", "DataBase conect", "</console><br>";
  }
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
    $arrayFile[$parts[0]] = $parts[1];
  }

  $GLOBALS['ConfigServer'] = $arrayFile;
  fclose($myFile);

  CallConsole("hola console");
}

function CallConsole($mensaje){
  if (!($GLOBALS['ConfigServer'] === null)){
    if (isset($GLOBALS['ConfigServer']["Console"])){
      if($GLOBALS['ConfigServer']["Console"]){
        echo "<console>", $mensaje, "</console><br>";
      }
    }
  }
}

?>
