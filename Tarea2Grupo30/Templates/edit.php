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
     <link href="StyleCSS/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
           <form action="validate_edit.php" method="post" onsubmit="">
             <input type='hidden' name="recorridoSeleccionado" value="<?php echo $recorrido;?>"/>
             <div class="panel panel-primary">
               <div class="panel-heading">
                 Información de ticket
               </div>
               <div class="panel-body">
                 <?php
                   if ($recorrido){
                     $query = pg_query($GLOBALS['DataBase'], "SELECT * FROM Recorridos WHERE id_recorrido = $recorrido;");
                     while ($row = pg_fetch_row($query)){
                       $conductorQuery = pg_query($GLOBALS['DataBase'], "SELECT p.nombre
                                                                           FROM Empleados e, Empleados_recorridos er, Personas p
                                                                             WHERE er.id_recorrido = $recorrido    AND
                                                                                   er.id_empleado  = e.id_empleado AND
                                                                                   e.tipo_empleado = 'Conductor'   AND
                                                                                   p.id_cuenta     = e.id_cuenta;");
                       while ($rowConductor = pg_fetch_row($conductorQuery)){
                         $conductor = $rowConductor[0];
                       }
                       $auxiliarQuery = pg_query($GLOBALS['DataBase'], "SELECT p.nombre
                                                                           FROM Empleados e, Empleados_recorridos er, Personas p
                                                                             WHERE er.id_recorrido = $recorrido    AND
                                                                                   er.id_empleado  = e.id_empleado AND
                                                                                   e.tipo_empleado = 'Auxiliar'   AND
                                                                                   p.id_cuenta     = e.id_cuenta;");
                       while ($rowAuxiliar = pg_fetch_row($auxiliarQuery)){
                         $auxiliar = $rowAuxiliar[0];
                       }
                       $origenQuery = pg_query($GLOBALS['DataBase'], "SELECT c.nombre_ciudad
                                                                           FROM Origenes o, Ciudades c
                                                                             WHERE o.id_origen = $row[5] AND
                                                                                   o.id_ciudad = c.id_ciudad;");
                       while ($rowOrigen = pg_fetch_row($origenQuery)){
                         $origen = $rowOrigen[0];
                       }

                       $destinoQuery = pg_query($GLOBALS['DataBase'], "SELECT c.nombre_ciudad
                                                                           FROM Destinos d, Ciudades c
                                                                             WHERE d.id_destino = $row[6] AND
                                                                                   d.id_ciudad = c.id_ciudad;");
                       while ($rowDestino = pg_fetch_row($destinoQuery)){
                         $destino = $rowDestino[0];
                       }
                       $precio = $row[4];
                       $fecha_salida = $row[1];
                       $fecha_llegada = $row[3];
                     }
                   }


                 ?>
                 <div class="row">
                   <div class="col-md-6">

                     <p>
                       <div class="form-group">
                         <label for="dtp_input1" class="col-md-2 control-label">Fecha salida</label>
                           <div class="input-group date form_time id="dtp_input1" col-md-5" data-date="" data-date-format="yyyy-mm-dd hh:00:00" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd hh:00:00">
                             <input class="form-control" name="fecha_salida" type="text" value="<?php echo ''.$fecha_salida.''; ?>" readonly>
                             <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
               					    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                           </div>
               				  <input type="hidden" id="dtp_input1" name="fecha_salida" value="<?php echo ''.$fecha_salida.''; ?>" /><br/>
                       </div>
                     </p>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6">

                     <p>
                       <div class="form-group">
                         <label for="dtp_input2" class="col-md-2 control-label">Fecha llegada</label>
                           <div class="input-group date form_time id="dtp_input2" col-md-5" data-date="" data-date-format="yyyy-mm-dd hh:00:00" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd hh:00:00">
                             <input class="form-control" name="fecha_llegada" type="text" value="<?php echo ''.$fecha_llegada.''; ?>" readonly>
                             <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
               					    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                           </div>
               				  <input type="hidden" id="dtp_input2" name="fecha_llegada" value="<?php echo ''.$fecha_llegada.''; ?>" /><br/>
                       </div>
                     </p>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6">
                     <p>
                       <label for="conductor">Conductor a cargo</label>
                       <label class="form-control" name="conductor">
                         <?php
                           echo "$conductor";
                          ?>
                       </label>
                     </p>
                   </div>
                   <div class="col-md-6">
                     <p>
                       <label for="auxiliar">Auxiliar de viaje</label>
                       <label class="form-control" name="auxiliar">
                         <?php
                           echo "$auxiliar";
                          ?>
                       </label>
                     </p>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6">
                     <p>
                       <label for="origen">Ciudad de origen</label>
                       <label class="form-control" name="origen">
                         <?php
                           echo "$origen";
                          ?>
                       </label>
                     </p>
                   </div>
                   <div class="col-md-6">
                     <p>
                       <label for="destino">Ciudad destino</label>
                       <label class="form-control" name="destino">
                       <?php
                         echo "$destino";
                       ?>
                       </label>
                       </p>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6">
                     <p>
                       <label for="precio">Precio</label>
                       <input type="text" class="form-control" name="precio" value="<?php echo ''.$precio.''; ?>">
                     </p>
                   </div>
               </div>

               <div align="center">
                 <button class="btn btn-success" type="submit" name="confirmEdit">Confirmar cambios</button>
               </div>

             </div>



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
