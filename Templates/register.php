<?php
  session_start();
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
  if (isset($_POST['register'])){
    if (AddUser()){
      // $nombre = GetPost("person_name");
      // $_SESSION['NombreUsuario'] = $nombre;
      // $_SESSION['TipoUsuario'] = 'Usuario';
      // echo print_r($_SESSION);
      header("location: ./main.php?user=test");
    }
  }
  include "paginasHTML/registrarUser.html";
?>
