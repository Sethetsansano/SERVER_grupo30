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
      $isAuthorized = Get("unauthorized");
      if ($isAuthorized){
        echo "<script> alert('Usuario y/o contraseña incorrectas. Reintente');</script>";
      }
     ?>
     <div class="container">
         <div class="jumbotron">
           <h1 class="display-3" align="center">SansaTour</h1>
           <hr class="my-4">
           <h4 align="center">Iniciar sesión.</h4>
         </div>
         <div>
           <!-- onsubmit="return FilterValidation()" -->
           <form action="validateLogin.php" method="post">

             <div class="alert alert-danger alert-dismissable" role="alert" id="error" style="display:none">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>
             <div class="row" align="center">
               <div class="col-md-4 col-md-offset-4" align="center">
                 <div class="panel panel-primary">
                   <div class="panel-heading">
                     Bienvenido a SansaTour
                   </div>
                   <div class="panel-body">
                     <p>
                       <div>
                         <label for="username-id">Nombre de usuario</label>
                         <input type="text" id="username" class="form-control" name="logged_user">
                       </div>
                     </p>

                     <p>
                       <div>
                         <label>Contraseña</label>
                         <input type="password" id="password" class="form-control" name="logged_user_psw">
                       </div>
                     </p>
                     <p>
                     </p>

                     <p>
                       <div align="center">
                         <button class="btn btn-success" type="submit" name="login">Iniciar sesión</button>
                       </div>
                     </p>
                   </div>
                 </div>
               </div>
             </div>
           </form>

           <form action="SansaTour.php">
               <input class="btn btn-primary" type="submit" value="Volver al menú">
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
