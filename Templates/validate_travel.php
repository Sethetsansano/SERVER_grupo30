<?php
  session_start();
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
  if (isset($_POST['addTravel'])){
    $origen = explode("_",$_POST['origen']);
    $origen_id = $origen[0];
    $destino = explode("_",$_POST['destino']);
    $destino_id = $destino[0];
    $bus = explode("_", $_POST['bus']);
    $bus_id = $bus[0];
    $hora_salida = GetPost("horario_salida");
    $llegada_estimada = GetPost("llegada_estimada");
    $nombre_recorrido = GetPost("nombre_recorrido");
    $precio = GetPost("precio");
    //Si llego aca, los campos deberían estar completos ya.
    $query = pg_query($GLOBALS['DataBase'], "INSERT INTO Recorridos VALUES (SELECT MAX(id_recorrido) FROM RECORRIDOS, $horario_salida, '$nombre_recorrido', $llegada_estimada, $precio, $origen_id, $destino_id, $bus_id);");
    header("location: ./main.php");
  }
  else{
    header("location: ./add_travel.php");
  }
 ?>
