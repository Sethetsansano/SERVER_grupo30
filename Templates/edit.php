<?php
  session_start();
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
  $recorrido = Get("travel");
  if ($recorrido){

  }
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
     <div class="container">
         <div class="jumbotron">
           <h1 class="display-3" align="center">SansaTour</h1>
           <hr class="my-4">
           <h4 align="center">Modificación de recorrido</h4>
         </div>
         <div>
           <form action="recorridos.php" method="post" onsubmit="">


           </form>
         </div>
         <p>
           <form action="main.php">
             <input class="btn btn-primary" type="submit" value="Volver al menú principal">
           </form>
         </p>
       </div>
       <script src="js/validation.js"></script>
       <script src="StyleCSS/Bootstrap/js/bootstrap.js"></script>
       <script src="StyleCSS/Bootstrap/js/bootstrap.min.js"></script>
       <script src="StyleCSS/Bootstrap/js/jquery-3.3.1.min.js"></script>
       <script src="StyleCSS/Bootstrap/js/npm.js"></script>
     </body>
 </html>
