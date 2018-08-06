<?php
$DataBase = null;

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
  if ($GLOBALS['DataBase'] === null) return null;
  $list = pg_query($GLOBALS['DataBase'], "SELECT nombre_linea FROM Lineas");
  while ($row = pg_fetch_row($list)){
    CallConsole("Nombre de linea: $row[0]");
  }
  return $list;
}

function ExistUserName($name){
  if ($GLOBALS['DataBase'] === null) return null;
  $query = pg_query($GLOBALS['DataBase'], "SELECT nombre_usuario FROM Personas;");
  while ($row = pg_fetch_row($query)) {
    if ($row[0] === $name){
      return true;
    }
  }
  return false;
}

function AddUser(){
  if ($GLOBALS['DataBase'] === null) return null;

  $psw = GetPost("user_psw");
  $name = GetPost("user_name");
  if ($psw === null || $name === null || ExistUserName($name)) return null;

  $maxid = pg_query($GLOBALS['DataBase'], "SELECT MAX(ID_cuenta) FROM Personas;");
  if ($maxid === false) {
    $maxid = 0;
  }
  else{
    $maxid = pg_fetch_row($maxid)[0];
    $maxid++;
  }

  $query = pg_query($GLOBALS['DataBase'], "INSERT INTO Personas (ID_cuenta,nombre_usuario,contraseña) VALUES ($maxid, '$name', '$psw');");

  $rut = GetPost("user_rut");
}

function GetAllUsers(){
  if ($GLOBALS['DataBase'] === null) return null;

  $query = pg_query($GLOBALS['DataBase'], "SELECT * FROM Personas;");

  $num = 0;
  $row;
  while ($row = pg_fetch_row($query)){
    $word = "";
    for ($i=0; $i < sizeof($row); $i++) {
      $word = $word . " : " . $row[$i];
    }
    CallConsole("Persona $num: $word");
    $num++;
  }
}


 ?>
