<?php
  session_start();
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
  if (isset($_POST['login'])){
    $user = GetPost("logged_user");
    $pass = GetPost("logged_user_psw");
    $query = pg_query($GLOBALS['DataBase'], "SELECT * FROM Personas WHERE nombre_usuario = '$user' AND contraseña = '$pass';");
    $row = pg_fetch_row($query);
    if ($row){
      if ($row[1] == GetPost("logged_user")){
        $_SESSION['NombreUsuario'] =  "$row[4]";
        echo print_r($_SESSION);
        // $_GLOBALS['NombreUsuario'] = $row[4];
        $empleado_query = pg_query($GLOBALS['DataBase'], "SELECT * FROM Empleados WHERE id_cuenta = $row[0]");
        $fila = pg_fetch_row($empleado_query);
        if ($fila){
          $_SESSION['TipoUsuario'] = $fila[1];
        }
        else{
          $_SESSION['TipoUsuario'] = 'Usuario';
        }
        $_SESSION['Authorized'] = true;
        header("location: ./main.php");
      }
    }
    else{
      header("location: ./login.php?unauthorized=true");
    }

  }


  // if (isset($_POST['register'])){
  //   if (AddUser()){
  //     header("location: /main.php?user=test");
  //   }
  // }
 ?>
