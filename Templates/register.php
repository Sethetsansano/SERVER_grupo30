<?php
  include "CodigoPHP/codeServer.php";
  include "paginasHTML/registrarUser.html";
  GetConfigServer();
  GetDataBase();
  if (isset($_POST['register'])){
    if (AddUser()){
      header("location: /main.php?user=test");
    }
  }
?>
