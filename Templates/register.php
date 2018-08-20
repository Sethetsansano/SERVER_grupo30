<?php
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
  if (isset($_POST['register'])){
    if (AddUser()){
      header("location: ./main.php?user=test");
    }
  }
  include "paginasHTML/registrarUser.html";
?>
