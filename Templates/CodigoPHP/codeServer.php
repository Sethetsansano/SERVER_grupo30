<?php
$DataBase = null;
$ConfigServer = null;

//page

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
    CallConsole($key . ":" . $value);
  }
}

function GetPost($data){
  foreach ($_POST as $key => $value) {
    if ($data === $key){
      return $value;
    }
  }
  return null;
}


//Config server

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

//Data base

function GetDataBase(){
  //$GLOBALS['DataBase']
  CallConsole("DataBase Conecting...");
  $db_host = GetConfig("DataBaseAddress");
  $db_port = GetConfig("DataBasePort");
  $db_name = GetConfig("DataBaseName");
  $db_user = GetConfig("DataBaseUser");
  $db_password = GetConfig("DataBasePassword");

  $string_connect = "host=".$db_host." port=".$db_port." dbname=".$db_name." user=".$db_user." password=".$db_password."";
  CallConsole($string_connect);
  $db_connection = pg_connect($string_connect);

  if($db_connection === false){
    CallConsole("No se puedo conectar a la data base");
    return;
  }

  $GLOBALS['DataBase'] = $db_connection;

  if ($GLOBALS['DataBase'] === null){
    CallConsole("DataBase fail connect.");
  }
  else{
    CallConsole("DataBase conect");
  }
}

function GetListLineas(){
  $list = pg_query($GLOBALS['DataBase'], "SELECT nombre_linea FROM Lineas");
  while ($row = pg_fetch_row($list)){
    CallConsole("Nombre de linea: $row[0]");
  }
  return $list;
}

function AddUser(){
  $rut = GetPost("user_rut");
  $psw = GetPost("user_psw");
  $name = GetPost("user_name");

  $query = pg_query($GLOBALS['DataBase'], "INSERT INTO ")
}

//Console

function CallConsole($mensaje){
  $value = GetConfig('Console');

  if ($value === null){
    return;
  }
  if ($value){
    echo "<console>", $mensaje, "</console><br>";
  }
}
?>
