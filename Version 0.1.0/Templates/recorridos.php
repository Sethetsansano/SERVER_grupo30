<?php
  session_start();
 ?>
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
      if (isset($_POST['view'])){
        $origen = explode("_",$_POST['origen']);
        $origen_id = $origen[0];
        $destino = explode("_",$_POST['destino']);
        $destino_id = $destino[0];
        $query = pg_query($GLOBALS['DataBase'], "SELECT id_recorrido, id_origen, id_destino, horario_salida, llegada_estimada, precio
	                                                 FROM Recorridos
                                                    WHERE id_origen  = $origen_id AND
                                                          id_destino = $destino_id
	                                                         ORDER BY horario_salida;");
      }
      else{
        $query = pg_query($GLOBALS['DataBase'], "SELECT id_recorrido, id_origen, id_destino, horario_salida, llegada_estimada, precio
                                                  FROM Recorridos
                                                   ORDER BY horario_salida");
      }
     ?>
    <div class="container">
        <div class="jumbotron">
          <h1 class="display-3" align="center">SansaTour</h1>
          <hr class="my-4">
          <h4 align="center">Seleccione recorrido</h4>
        </div>

        <form action="buy_ticket.php" method="GET">
          <div class="panel panel-default">
            <div class="panel-heading">Recorridos disponibles</div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Origen</th>
                  <th>Destino</th>
                  <th>Horario salida</th>
                  <th>Hora llegada</th>
                  <th>Fecha salida</th>
                  <th>Precio</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($row = pg_fetch_row($query)) {
                    echo '<tr>';
                    $nom_origen = pg_query($GLOBALS['DataBase'], "SELECT c.nombre_ciudad
                                                                    FROM Ciudades c, Origenes o
                                                                      WHERE c.id_ciudad = o.id_ciudad AND
                                                                            o.id_origen = '$row[1]'");
                    while ($value_origen = pg_fetch_row($nom_origen)){
                      echo "<td> $value_origen[0] </td>";
                    }
                    $nom_destino = pg_query($GLOBALS['DataBase'], "SELECT c.nombre_ciudad
                                                                    FROM Ciudades c, Destinos d
                                                                      WHERE c.id_ciudad = d.id_ciudad AND
                                                                            d.id_destino = '$row[2]'");
                    while ($value_destino = pg_fetch_row($nom_destino)){
                      echo "<td> $value_destino[0] </td>";
                    }

                    $pieces_salida = explode(" ", $row[3]);
                    $pieces_llegada = explode(" ", $row[4]);
                    echo "<td> $pieces_salida[1]</td>";
                    echo "<td> $pieces_llegada[1]</td>";
                    echo "<td> $pieces_salida[0]</td>";
                    echo "<td> $row[5]</td>";

                    //Aca hay que verificar el tipo de usuario logueado, la idea sería igual poder habilitar
                    //un tipoUsuario por defecto, es decir, anonimo, en ese caso se desplegaría solo el listado
                    //de recorridos disponibles sin tener acceso a comprar.
                    //Habría que eliminar la linea que esta abajo y descomentar las de abajo
                    //Guardando el tipo de usuario en la variable $tipoUsuario


                    if ($_SESSION['Authorized']){
                      if (isset($_SESSION['TipoUsuario'])){
                        $tipoUsuario = $_SESSION['TipoUsuario'];
                      }
                      else{
                        $tipoUsuario = 'Anonimo';
                      }
                      if ($tipoUsuario === 'Vendedor'){
                        echo '<td><button class="btn btn-success" type="submit" name="view_detail" value="'.$row[0].'">Vender</button></td>';
                      }
                      else{
                        if ($tipoUsuario !== 'Anonimo'){
                          echo '<td><button class="btn btn-success" type="submit" name="view_detail" value="'.$row[0].'">Comprar</button></td>';
                        }
                      }
                      if ($tipoUsuario === 'Gerente'){
                        echo '<td><button class="btn btn-primary" type="submit" name="edit_travel" value="'.$row[0].'">Editar</button></td>';
                      }

                    }


                    echo '</tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </form>

        <?php
          if ($_SESSION['TipoUsuario']){
            $tipoUsuario = $_SESSION['TipoUsuario'];
            if ($tipoUsuario === 'Gerente'){
              echo '<p>';
              echo '<form action="add_travel.php" method="post">';
              echo '<input class="btn btn-primary" type="submit" name="addRecorrido" value="Agregar nuevo recorrido">';
              echo '</form>';
              echo '</p>';
            }
          }
        ?>

        <p>
          <form action="main.php">
            <input class="btn btn-primary" type="submit" value="Volver al menú principal">
          </form>
        </p>

        <?php
          if ($_SESSION['TipoUsuario']){
            $tipo = $_SESSION['TipoUsuario'];
            if ($tipo === 'Anonimo'){
              echo '<p>';
              echo '<form action="login.php" method="post">';
              echo '<input class="btn btn-primary" type="submit" name="login" value="Iniciar sesión">';
              echo '</form>';
              echo '</p>';
              echo '<p>';
              echo '<form action="register.php" method="post">';
              echo '<input class="btn btn-primary" type="submit" name="register" value="Registrarme">';
              echo '</form>';
              echo '</p>';

            }else{
              echo '<p>';
              echo '<form action="SansaTour.php" method="post">';
              echo '<input class="btn btn-danger" type="submit" name="logout" value="Cerrar sesión">';
              echo '</form>';
              echo '</p>';
            }
          }
         ?>

    </div>
    <script src="js/validation.js"></script>
    <script src="StyleCSS/Bootstrap/js/bootstrap.js"></script>
    <script src="StyleCSS/Bootstrap/js/bootstrap.min.js"></script>
    <script src="StyleCSS/Bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="StyleCSS/Bootstrap/js/npm.js"></script>
  </body>

</html>
