<?php
  session_start();
  include "CodigoPHP/codeServer.php";
  GetConfigServer();
  GetDataBase();
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
           <h4 align="center">Agregar nuevo destino</h4>
         </div>
         <div class="row">
           <div class="col-md-4 col-md-offset-4">
             <div class="panel panel-primary">
               <div class="panel-heading" align="center">
                 Ingrese la información del nuevo destino
               </div>
               <div class="panel-body">
                 <form action="validate_city.php" method="post" onsubmit="return ValidateCity()">
                   <label for="destino">Nombre destino</label>
                   <input type="text" class="form-control" name="destino">
                   </label>
                   <p>
                   <div align="center">
                     <button class="btn btn-success" type="submit" name="addCity">Agregar destino</button>
                   </div>
                  </p>
                 </form>
               </div>
             </div>

           </div>
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
