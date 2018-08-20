<?php
  session_start();
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
  if (isset($_POST['addCity'])){
    $nombre_ciudad = GetPost("destino");
    $query = pg_query($GLOBALS['DataBase'], "SELECT * FROM Ciudades WHERE nombre_ciudad = '$nombre_ciudad';");
    $row = pg_fetch_row($query);

    if ($row){
      header("location: /add_city.php");
    }
    else{
      $max_idQuery = pg_query($GLOBALS['DataBase'], "SELECT MAX(id_ciudad) FROM Ciudades;");
      if ($max_idQuery){
        $max_id = pg_fetch_row($max_idQuery)[0];
        $max_id = $max_id + 1;
      }
      else{
        $max_id = 1;
      }
      $insertCiudad = pg_query($GLOBALS['DataBase'], "INSERT INTO Ciudades VALUES ($max_id, '$nombre_ciudad');");
      $insertDestino = pg_query($GLOBALS['DataBase'], "INSERT INTO Destinos VALUES ((SELECT MAX(id_destino) FROM Destinos)+1, $max_id);");
      $insertOrigen = pg_query($GLOBALS['DataBase'], "INSERT INTO Origenes VALUES ((SELECT MAX(id_origen) FROM Origenes)+1, $max_id);");
      header("location: /main.php");
    }
  }
 ?>
