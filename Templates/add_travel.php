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
     <link href="StyleCSS/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
     <title>SansaTour</title>
   </head>
   <body>
     <div class="container">
         <div class="jumbotron">
           <h1 class="display-3" align="center">SansaTour</h1>
           <hr class="my-4">
           <h4 align="center">Agregar nuevo recorrido</h4>
         </div>
         <form action="validate_travel.php" method="post" onsubmit="return ValidateTravel();">
           <div class="alert alert-danger alert-dismissable" role="alert" id="error" style="display:none">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <div class="panel panel-primary">
             <div class="panel-heading">
               Ingrese la información del nuevo recorrido
             </div>
             <div class="panel-body">
               <div class="row">
                 <div class="col-md-6">
                   <p>
                     <div class="form-group">
                       <label for="dtp_input1" class="col-md-2 control-label">Fecha salida</label>
                         <div class="input-group date form_time id="dtp_input1" col-md-5" data-date="" data-date-format="dd-mm-yyyy hh:00:00" data-link-field="dtp_input1" data-link-format="hh:ii">
                           <input class="form-control" name="fecha_salida" type="text" value="" readonly>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
             					    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                         </div>
             				  <input type="hidden" id="dtp_input1" value="" /><br/>
                     </div>
                   </p>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">

                   <p>
                     <div class="form-group">
                       <label for="dtp_input2" class="col-md-2 control-label">Fecha llegada</label>
                         <div class="input-group date form_time id="dtp_input2" col-md-5" data-date="" data-date-format="dd-mm-yyyy hh:00:00" data-link-field="dtp_input2" data-link-format="hh:ii">
                           <input class="form-control" name="fecha_llegada" type="text" value="" readonly>
                           <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
             					    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                         </div>
             				  <input type="hidden" id="dtp_input2" value="" /><br/>
                     </div>
                   </p>
                 </div>
               </div>
                 <div class="row">
                   <div class="col-md-6">
                     <p>
                       <div>
                         <label for="id-nombre">Nombre recorrido</label>
                         <input type="text" id="id-nombre" class="form-control" name="nombre_recorrido">
                       </div>
                     </p>
                   </div>
                   <div class="col-md-6">
                     <p>
                       <label for="bus">Seleccione ID de bus</label>
                       <select class="form-control" id="bus" name="bus">
                         <?php
                           $list = pg_query($GLOBALS['DataBase'], "SELECT id_bus FROM Buses");
                           while ($row = pg_fetch_row($list)){
                             echo '<option value=" '.$row[0].'"> '.$row[0].' </option>';
                           }
                         ?>
                       </select>
                     </p>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6">
                     <p>
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
                   </p>
                   </div>
                   <div class="col-md-6">
                     <p>
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
                   </p>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-6">
                       <div>
                         <label for="precio">Precio recorrido</label>
                         <input type="text" id="precio" class="form-control" name="precio">
                       </div>
                   </div>
                 </div>
                 <p>
                 <div align="center">
                   <button class="btn btn-success" type="submit" name="addTravel">Agregar recorrido</button>
                 </div>
                 </p>
             </div>

           </div>

         </form>
         <form action="main.php">
             <input class="btn btn-primary" type="submit" value="Volver al menú principal">
         </form>


      </div>
      <script src="js/validation.js"></script>
      <script src="StyleCSS/Bootstrap/js/bootstrap.js"></script>
      <script src="StyleCSS/Bootstrap/js/bootstrap.min.js"></script>
      <script src="StyleCSS/Bootstrap/js/jquery-3.3.1.min.js"></script>
      <script src="StyleCSS/Bootstrap/js/npm.js"></script>

      <script type="text/javascript" src="StyleCSS/Bootstrap/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
      <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
      <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
      <script type="text/javascript">
          $('.form_datetime').datetimepicker({
              //language:  'fr',
              weekStart: 1,
              todayBtn:  1,
      		autoclose: 1,
      		todayHighlight: 1,
      		startView: 2,
      		forceParse: 0,
              showMeridian: 1
          });
      	$('.form_date').datetimepicker({
              language:  'es',
              weekStart: 1,
              todayBtn:  1,
      		autoclose: 1,
      		todayHighlight: 1,
      		startView: 2,
      		minView: 2,
      		forceParse: 0
          });
      	$('.form_time').datetimepicker({
              language:  'es',
              weekStart: 1,
              todayBtn:  1,
      		autoclose: 1,
      		todayHighlight: 1,
      		startView: 1,
      		minView: 1,
      		maxView: 1,
      		forceParse: 0
          });
      </script>

    </body>

  </html>
