<?php
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();

  if (isset($_POST['confirmPurchase'])){
    if (isset($_POST['recorridoSeleccionado'])){
      $recorrido = GetPost("recorridoSeleccionado");
    }
    $cont = 0;
    foreach($_POST['asientos'] as $asiento){
      $asientosElegidos[$cont] = $asiento;
      $cont = $cont + 1;
    }

    for ($i = 0; $i < $cont; $i++){
        $query = pg_query($GLOBALS['DataBase'], "INSERT INTO Tickets VALUES ((SELECT MAX(id_ticket) FROM Tickets WHERE id_recorrido = $recorrido)+1, $asientosElegidos[$i], $recorrido);");
    }
  }
  header("location: /main.php");
 ?>
