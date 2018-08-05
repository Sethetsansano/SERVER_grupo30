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
    CallConsole($key, " : ", $value);
  }
}

function GetDataBase(){
  //$GLOBALS['DataBase']
  CallConsole("DataBase Conecting...");
  $db_host = GetConfig("DataBaseAddress");
  $db_name = GetConfig("DataBaseName");
  $db_user = GetConfig("DataBaseUser");
  $db_password = GetConfig("DataBasePassword");
  $string_connect = "host=".$db_host." dbname=".$db_name." user=".$db_user." password=".$db_password."";

  $db_connection = pg_connect($string_connect);
  $result = pg_query($db_connection, "SELECT nombre_linea FROM Lineas");
  while ($row = pg_fetch_row($result)){
	  CallConsole("Nombre de linea: $row[0]");
  }


  if ($GLOBALS['DataBase'] === null){
    CallConsole("DataBase fail connect.");
  }
  else{
    CallConsole("DataBase conect");
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

  CallConsole("ConfigLoad Comlete.");
}

function CallConsole($mensaje){
  $value = GetConfig('Console');

  if ($value === null){
    return;
  }
  if ($value){
    echo "<console>", $mensaje, "</console><br>";
  }
}

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

?>
