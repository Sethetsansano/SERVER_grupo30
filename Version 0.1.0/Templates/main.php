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
      if (isset($_SESSION['NombreUsuario'])){
        $nombreUsuario = $_SESSION['NombreUsuario'];
      }

     ?>
    <div class="container">
        <div class="jumbotron">
          <h1 class="display-3" align="center">SansaTour</h1>
          <hr class="my-4">
          <h4 align="center">Bienvenido, <?php if ($nombreUsuario){echo $nombreUsuario;}else{echo "anónimo";}?></h4>
        </div>
        <div>
          <form action="recorridos.php" method="post" onsubmit="return FilterValidation()">

            <div class="alert alert-danger alert-dismissable" role="alert" id="error" style="display:none">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="form-group">
              <label for="originSelection">Seleccione ciudad de origen</label>
              <select class="form-control" id="originSelection" name="origen">
                <?php
                  $list = pg_query($GLOBALS['DataBase'], "SELECT id_ciudad, nombre_ciudad FROM Ciudades");
                  while ($row = pg_fetch_row($list)){
                    echo '<option value=" '.$row[0].'"> '.$row[1].' </option>';
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="destinySelection">Seleccione ciudad de destino</label>
              <select class="form-control" id="destinySelection" name="destino">
                <?php
                  $list = pg_query($GLOBALS['DataBase'], "SELECT id_ciudad, nombre_ciudad FROM Ciudades");
                  while ($row = pg_fetch_row($list)){
                    echo '<option value=" '.$row[0].'"> '.$row[1].' </option>';
                  }
                ?>
              </select>
            </div>

            <p>
              <div align="center">
                <button class="btn btn-success" type="submit" name="view">Buscar recorridos</button>
                <button class="btn btn-danger" type="reset" value="Resetear campos">Resetear campos</button>
              </div>
            </p>
          </form>
                  <?php
                    if ($_SESSION['TipoUsuario']){
                      $tipoUsuario = $_SESSION['TipoUsuario'];
                      if ($tipoUsuario === 'Gerente'){
                        echo '<p>';
                        echo '<form action="add_city.php" method="post">';
                        echo '<input class="btn btn-primary" type="submit" name="addCity" value="Agregar destino">';
                        echo '</form>';
                        echo '</p>';
                      }
                    }
                  ?>
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
    </div>
    <script src="js/validation.js"></script>
    <script src="StyleCSS/Bootstrap/js/bootstrap.js"></script>
    <script src="StyleCSS/Bootstrap/js/bootstrap.min.js"></script>
    <script src="StyleCSS/Bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="StyleCSS/Bootstrap/js/npm.js"></script>
  </body>
</html>
