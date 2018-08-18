<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="StyleCSS/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="StyleCSS/Bootstrap/css/custom.css">
    <title>SansaTour</title>
  </head>
  <body>
    <?php
      include "CodigoPHP/codeServer.php";
      GetConfigServer();
      GetDataBase();
      $recorrido = Get("view_detail");
      echo $GLOBALS['NombreUsuario'];
     ?>
    <div class="container">
        <div class="jumbotron">
          <h1 class="display-3" align="center">SansaTour</h1>
          <hr class="my-4">
          <h4 align="center">Asientos disponibles para recorrido seleccionado.</h4>
        </div>
        <div>
          <form action="checkout.php" method="post" onsubmit="return ValidateSeatsSelected();">
            <div class="alert alert-danger alert-dismissable" role="alert" id="error" style="display:none">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="row">
              <input type='hidden' name="recorridoSeleccionado" value="<?php echo $recorrido;?> " />
              <div class="col-md-3 col-md-offset-4" >
                <?php
                  $count = 1;
                  if ($recorrido){
                    $seats = pg_query($GLOBALS['DataBase'], "SELECT * FROM Tickets WHERE id_recorrido = $recorrido;");

                    $asientos = array();
                    $cont = 0;
                    while ($row = pg_fetch_row($seats)){
                      $asientos[$cont] = $row[1];
                      $cont = $cont + 1;
                    }
                  }
                  for ($x = 1; $x <= 20; $x++){
                    if (in_array($x, $asientos)){
                      echo '<p>';
                      echo '<input type="checkbox" id="seatsSelected" value="'.$x.'" disabled> '.$x.' </input>';
                      echo '</p';
                    }
                    else{
                      echo '<p> ';
                      echo '<input type="checkbox" id="seatsSelected" name="seatsValue[]" value="'.$x.'"> '.$x.' </input>';
                      echo '</p';
                    }

                    if ($count == 2){
                      echo '<br>';
                      $count = 0;
                    }
                    $count = $count + 1;
                  }
                 ?>
              </div>
              <div class="col-md-3 ">
                <?php
                  $count = 1;
                  for ($x = 21; $x <= 40; $x++){
                    if (in_array($x, $asientos)){
                      echo '<p>';
                      echo '<input type="checkbox" id="seatsSelected" value="'.$x.'" disabled> '.$x.' </input>';
                      echo '</p';
                    }
                    else{
                      echo '<p>';
                      echo '<input type="checkbox" id="seatsSelected" name="seatsValue[]" value="'.$x.'"> '.$x.' </input>';
                      echo '</p';
                    }
                    if ($count == 2){
                      echo '<br>';
                      $count = 0;
                    }
                    $count = $count + 1;
                  }
                 ?>
              </div>

            </div>


            <div align="center">
              <button class="btn btn-success" type="submit" name="checkout">Confirmar pedido</button>
            </div>

          </form>


          <form action="main.php">
              <input class="btn btn-primary" type="submit" value="Volver al menú principal">
          </form>

        </div>
    </div>
    <script src="js/validation.js"></script>
    <script src="StyleCSS/Bootstrap/js/bootstrap.js"></script>
    <script src="StyleCSS/Bootstrap/js/bootstrap.min.js"></script>
    <script src="StyleCSS/Bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="StyleCSS/Bootstrap/js/npm.js"></script>
  </body>
</html>
