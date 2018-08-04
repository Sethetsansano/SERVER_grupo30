<?php
  /*
  En el atributo password debes poner la password que le pusiste a PostgresSQL cuando lo creaste, vere como crear un nuevo user para dejarlo por defecto
  $db_connection = pg_connect("host=127.0.0.1 dbname=Tarea2 user=postgres password=TUPASSWORD");
  $result = pg_query($db_connection, "SELECT nombre_linea FROM Lineas");
  while ($row = pg_fetch_row($result)){
	  echo "Nombre de linea: $row[0]";
	  echo "<br/>\n";
  }
  */
  include "CodigoPHP/codeServer.php";
  CallStyle();
  SelectPage();

  /* codigotemporal
  include "frontend.html";
  CallStyle("StyleCSS/frontend_style_boostrap.css");
  include "frontend_style.css";


  */
?>
