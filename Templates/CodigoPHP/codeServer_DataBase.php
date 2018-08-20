<?php
$DataBase = null;

function GetDataBase(){
  //$GLOBALS['DataBase']
  CallConsole("Connecting to DB..");
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
    CallConsole("Failed to connect to database server.");
  }
  else{
    CallConsole("DB connected.");
  }
}

function GetListLineas(){
  if ($GLOBALS['DataBase'] === null) return null;
  $list = pg_query($GLOBALS['DataBase'], "SELECT id_linea, nombre_linea FROM Lineas");
  while ($row = pg_fetch_row($list)){
    CallConsole("Nombre de linea: $row[1]");
  }
  return $list;
}

function IsValidLogin($name, $psw){
  if ($GLOBALS['DataBase'] === null) return null;
  $query = pg_query($GLOBALS['DataBase'], "SELECT nombre FROM Personas WHERE nombre_usuario = '$name' AND contraseña = '$psw';");
  while ($row = pg_fetch_row($query)) {
    if ($row[0] === $name){
      return true;
    }
  }
  return false;
}

function AddUser(){
  if ($GLOBALS['DataBase'] === null){
    return false;
  }

  $psw = GetPost("user_psw");
  $psw_confirmation = GetPost("user_psw_confirmation");
  $name = GetPost("user_name");
  $email = GetPost("user_email");
  $nombre = GetPost("person-name");
  $rut = GetPost("user_rut");

  if ($psw === null || $name === null || ExistUserName($name) || $psw !== $psw_confirmation || $psw === '' || $name === '' || $nombre === ''){
    return false;
  }

  $maxid = pg_query($GLOBALS['DataBase'], "SELECT MAX(ID_cuenta) FROM Personas;");
  if ($maxid === false) {
    $maxid = 0;
  }
  else{
    $maxid = pg_fetch_row($maxid)[0];
    $maxid++;
  }

  $query = pg_query($GLOBALS['DataBase'], "INSERT INTO Personas (ID_cuenta,nombre_usuario,contraseña, email, nombre, rut) VALUES ($maxid, '$name', '$psw', '$email', '$nombre', '$rut');");
  return true;
}

function ExistUserName($name){
  if ($GLOBALS['DataBase'] === null) return null;

  $query = pg_query($GLOBALS['DataBase'], "SELECT e.* FROM Personas e WHERE e.nombre_usuario = '$name';");

  if (pg_fetch_row($query)) return true;
  return false;
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
