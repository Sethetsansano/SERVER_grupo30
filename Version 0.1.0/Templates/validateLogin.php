<?php
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
        $GLOBALS['NombreUsuario'] = $row[4];
        $empleado_query = pg_query($GLOBALS['DataBase'], "SELECT * FROM Empleados WHERE id_cuenta = $row[0]");
        $fila = pg_fetch_row($empleado_query);
        if ($fila){
          $GLOBALS['TipoEmpleado'] = $fila[1];
        }
        else{
          $GLOBALS['TipoEmpleado'] = '';
        }
        header("location: /main.php");
      }
    }
    else{
      header("location: /login.php?unauthorized=true");
    }

  }


  // if (isset($_POST['register'])){
  //   if (AddUser()){
  //     header("location: /main.php?user=test");
  //   }
  // }
 ?>
