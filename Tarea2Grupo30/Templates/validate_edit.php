<?php
  session_start();
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
  if (isset($_POST['confirmEdit'])){
    $recorrido = GetPost("recorridoSeleccionado");
    $origen = GetPost("origen");
    $destino = GetPost("destino");
    $hora_salida = GetPost("fecha_salida");
    $fecha_llegada = GetPost("fecha_llegada");
    $precio = GetPost("precio");
    $query = pg_query($GLOBALS['DataBase'], "UPDATE Recorridos SET
                                              horario_salida = '$hora_salida',
                                              llegada_estimada = '$fecha_llegada',
                                              precio = '$precio'
                                                WHERE id_recorrido = $recorrido;");
    header("location: ./main.php");
  }
  else{
    header("location: ./add_travel.php");
  }
 ?>
