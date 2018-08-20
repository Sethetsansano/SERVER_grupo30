<?php
  session_start();
  if (isset($_POST['logout'])){
    session_destroy();
    session_start();
    $_SESSION['NombreUsuario'] = 'anonimo';
    $_SESSION['Authorized'] = false;
    $_SESSION['TipoUsuario'] = 'Anonimo';
  }
  else{
    if (isset($_SESSION['Authorized'])){
      //nada
    }
    else{
      $_SESSION['NombreUsuario'] = 'anonimo';
      $_SESSION['Authorized'] = false;
      $_SESSION['TipoUsuario'] = 'Anonimo';

    }
  }
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
  CallStyle();
  SelectPage();

?>
