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
      if (isset($_POST['seatsValue'])){
        $asientosElegidos = array();
        $cont = 0;
        foreach($_POST['seatsValue'] as $asiento){
          $asientosElegidos[$cont] = $asiento;
          $cont = $cont + 1;
        }
      }
      if (isset($_POST['recorridoSeleccionado'])){
        $recorrido = GetPost("recorridoSeleccionado");
      }
     ?>
    <div class="container">
        <div class="jumbotron">
          <h1 class="display-3" align="center">SansaTour</h1>
          <hr class="my-4">
          <h4 align="center">Confirme su pedido</h4>
        </div>
        <div>
          <form action="confirmPurchase.php" method="post">
            <?php
              for ($i = 0; $i < $cont; $i++){
                echo '<input type="hidden" name="asientos[]" value="'.$asientosElegidos[$i].'"/>';
              }
            ?>
            <input type='hidden' name="recorridoSeleccionado" value="<?php echo $recorrido;?>"/>
            <div class="panel panel-primary">
              <div class="panel-heading">
                Información de ticket
              </div>
              <div class="panel-body">
                <?php
                  if ($recorrido){
                    $query = pg_query($GLOBALS['DataBase'], "SELECT * FROM Recorridos WHERE id_recorrido = $recorrido;");
                    while ($row = pg_fetch_row($query)){
                      $conductorQuery = pg_query($GLOBALS['DataBase'], "SELECT p.nombre
                                                                          FROM Empleados e, Empleados_recorridos er, Personas p
                                                                            WHERE er.id_recorrido = $recorrido    AND
                                                                                  er.id_empleado  = e.id_empleado AND
                                                                                  e.tipo_empleado = 'Conductor'   AND
                                                                                  p.id_cuenta     = e.id_cuenta;");
                      while ($rowConductor = pg_fetch_row($conductorQuery)){
                        $conductor = $rowConductor[0];
                      }
                      $auxiliarQuery = pg_query($GLOBALS['DataBase'], "SELECT p.nombre
                                                                          FROM Empleados e, Empleados_recorridos er, Personas p
                                                                            WHERE er.id_recorrido = $recorrido    AND
                                                                                  er.id_empleado  = e.id_empleado AND
                                                                                  e.tipo_empleado = 'Auxiliar'   AND
                                                                                  p.id_cuenta     = e.id_cuenta;");
                      while ($rowAuxiliar = pg_fetch_row($auxiliarQuery)){
                        $auxiliar = $rowAuxiliar[0];
                      }
                      $origenQuery = pg_query($GLOBALS['DataBase'], "SELECT c.nombre_ciudad
                                                                          FROM Origenes o, Ciudades c
                                                                            WHERE o.id_origen = $row[5] AND
                                                                                  o.id_ciudad = c.id_ciudad;");
                      while ($rowOrigen = pg_fetch_row($origenQuery)){
                        $origen = $rowOrigen[0];
                      }

                      $destinoQuery = pg_query($GLOBALS['DataBase'], "SELECT c.nombre_ciudad
                                                                          FROM Destinos d, Ciudades c
                                                                            WHERE d.id_destino = $row[6] AND
                                                                                  d.id_ciudad = c.id_ciudad;");
                      while ($rowDestino = pg_fetch_row($destinoQuery)){
                        $destino = $rowDestino[0];
                      }
                      $precio = $row[4];
                      $pieces_salida = explode(" ", $row[1]);
                      $pieces_llegada = explode(" ", $row[3]);
                      $hora_salida = $pieces_salida[1];
                      $hora_llegada = $pieces_llegada[1];
                      $fecha_viaje = $pieces_salida[0];
                    }
                  }


                ?>
                <div class="row">
                  <div class="col-md-6">
                    <p>
                      <label for="escogidos">Asientos escogidos</label>
                      <label class="form-control" name="escogidos">
                        <?php
                          for ($i = 0; $i < $cont; $i++){
                            echo "$asientosElegidos[$i] ";
                          }
                         ?>
                      </label>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p>
                      <label for="fecha-salida">Fecha viaje</label>
                      <label class="form-control" name="fecha-salida">
                        <?php
                          echo "$fecha_viaje";
                         ?>
                      </label>
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <p>
                      <label for="h-salida">Hora salida</label>
                      <label class="form-control" name="h-salida">
                        <?php
                          echo "$hora_salida";
                         ?>
                      </label>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p>
                      <label for="h-llegada">Hora de llegada estimada</label>
                      <label class="form-control" name="h-llegada">
                      <?php
                        echo "$hora_llegada";
                      ?>
                      </label>
                      </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <p>
                      <label for="conductor">Conductor a cargo</label>
                      <label class="form-control" name="conductor">
                        <?php
                          echo "$conductor";
                         ?>
                      </label>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p>
                      <label for="auxiliar">Auxiliar de viaje</label>
                      <label class="form-control" name="auxiliar">
                        <?php
                          echo "$auxiliar";
                         ?>
                      </label>
                    </p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <p>
                      <label for="origen">Ciudad de origen</label>
                      <label class="form-control" name="origen">
                        <?php
                          echo "$origen";
                         ?>
                      </label>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p>
                      <label for="destino">Ciudad destino</label>
                      <label class="form-control" name="destino">
                      <?php
                        echo "$destino";
                      ?>
                      </label>
                      </p>
                  </div>
                </div>
              </div>

            </div>

            <div class="panel panel-success">
              <div class="panel-heading">
                Detalle de su compra
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                    <p>
                      <label for="precio">Precio unitario</label>
                      <label class="form-control" name="precio">
                        <?php
                          echo "$precio";
                         ?>
                      </label>
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p>
                      <label for="tickets">Tickets comprados</label>
                      <label class="form-control" name="tickets">
                        <?php
                          echo "$cont";
                         ?>
                      </label>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <p>
                      <label for="total">Total a pagar</label>
                      <label class="form-control" name="total">
                        <?php
                          $total = $cont * $precio;
                          echo "$total";
                         ?>
                      </label>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div align="center">
              <button class="btn btn-success" type="submit" name="confirmPurchase">Pagar</button>
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
