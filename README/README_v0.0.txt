Bienvenido DBA, este documento te permitirá tener un dominio sobre el "Sistema de gestión de SansaTour".

Supuestos del sistema de gestión:
  1.-

Como esta originalmente armado:
  1.- Sistema:
    a) Windows 8.1 64 bits.
    b) PHP versión 7.2.7.
    c) XAMPP versión windows 7.2.7.
    d) PostgreSQL versi�n 10.4 64 bits (link: https://www.enterprisedb.com/downloads/postgres-postgresql-downloads).
    e) Atom.io (link: https://atom.io/).
    f) HTML 5.
  2.- Archivos:
    a) SansaTour_Grupo30/main.php:
      Archivo principal de la aplicacion, llama al  resto de componentes y los estructura en un formato de HTML.
    b) SansaTour_Grupo30/codeServer.php:
      Modulo principal de codigo PHP del servidor, es llamado desde el main.php para controlar el server.
    c) SansaTour_Grupo30/codeClient.js:
      Modulo principal de codigo JavaScript del cliente, es llamado desde el main.php para controlar el comportamiento del cliente de forma independiente del servidor.
    d) SansaTour_Grupo30/frontend.html:
      Modulo principal de codigo HTML, es llamado desde el main.php para gestionar el contenido en el cliente.
    e) SansaTour_Grupo30/frontend_style.css:
      Modulo principal de c�digo CSS, es llamado desde el main.php para gestionar el formato visual en el cliente.
    f) SQL???????
    g) SansaTour_Grupo30/config.txt:
      Es el archivo de configuracion del servidor, en este se puede entregar los datos de la DataBase.....
  3.- Base de datos:
    a) La base de datos esta montado en postgreSQL.....
  4.- Servidor php:
    a) El servidor PHP esta montado en el programa XAMPP, activando el modulo de APACHE.
    b) Los archivos de la aplicación web deben copiarse en el directorio de la instalación de XAMPP, en la carpeta  ("...\xampp\htdocs\").
    c) Para acceder al sitio web, ingresar la siguiente dirección en el explorador: localhost/SansaTour.php



Como reconstruirlo desde otro computador o servidor:

1.Colocar archivos en los diferentes programas:
	-Colocar los archivos de "Templates" en la carpeta.......
	

1.Instrucciones para tener acceso a la base de datos:

	-Dirigirse a la carpeta de instalación de PostgreSQL (PostgreSQL\10\data)
	-Abrir el archivo postgresql.conf
	-Agregar al final la siguiente linea en el archivo:
		listen_addresses = '*'
	-Guardar el archivo.
	-Luego en el mismo directorio (PostgreSQL\10\data)
	-Abrir el archivo pg_hba.conf
	-Agregar la siguiente linea al final del archivo:
		host    all             all             0.0.0.0/0               md5
	-Guardar el archivo.

2.Crear desde 0 nueva base de datos:
	-Entrar al administrador de la base de datos (en caso de postgreSQL: "pgAdmin").
	-En la seccion de "Browser", hacer click derecho en "Servers", luego seleccionar en "Create", luego seleccionar "Server...".
	-Ahora en la pestaña emergente se configurara el server de la base de datos, guarde los, siguientes datos que ingrese en algun lugar.
	-Ingresar a la pestaña "General".	
	-En "Name", colocar el nombre del servidor.
	-En "Server group", coloca el grupo de servidores en que guardar el servidor.
	-Entrar a la pestaña "Connection".
	-En "Host name/address", colocar "127.0.0.1".
	-En el "Port", colocar el numero de port a usar, este valor debe ser unico en el sistema (que ningun otro programa lo este usando) y usar valores entre 5001 y 14999.
	-En "Username", colocar el usuario que tenga privilegios y que sea el admin del server.
	-Guardar base de datos con el boton "Save".
	-En "Browser", entrar al grupo de servers del server de la base de datos, luego dar doble click y en la ventana emergente agregar la clave del usuario administrador y dar al boton "Ok", con ello se accede al servidor.
	-Ahora dentro del servidor en "Databases" vamos a crear la base de datos, dar click derecho y seleccionar "Create" y luego "DataBase...".
	-En la ventana emergente entrar a la pestaña "General".
	-En "DataBase", colocar el nombre de la base de datos.
	-En "Owner", colocar al usuario propietario, se puede usar el mismo de el servidor.
	-Guardar la base de datos con el boton "Save".
	-Dar doble click en la base de datos para iniciarla.
	-Para empesar a ingresar scripts, en la base de datos dar click derecho y seleccionar "CREATE Script".
	
3.Cargar datos en la base de datos:
	-En el "CREATE script".
	-Seleccionar "Open file" (su icono es una carpeta, suele estar arriba a la izquierda).
	-Seleccionar el archivo "modelo.sql" en la carpeta "SQL" de los archivos de SansaTour.
	-Si se van a agregar las tablas, seleccionar los "CREATE TABLE" y presionar "execute".
	-Si se van a remplazar las tablas, sin seleccionar, presionar "execute".
	-Si se van a borrar las tablas, seleccionar los "DROP TABLE" y presionar "execute".

4.Agregar datos a las tablas de la base de datos:


	




*Para poder habilitar que PHP acepte las instrucciones de PostgreSQL:
		-Dirigirse a la carpeta xampp/php
		-Buscar el archivo php.ini
		-Descomentar las siguientes lineas:
			extension=pgsql
			extension=pdo_pgsql
		-Guardar el archivo
	*Nota: Si PHP estaba corriendo es necesario detenerlo y volver a correr.


*Configurar servidor de SansaTour:
  -Acceder al archivo de ConfigServer.txt dentro de la carpeta templates.
  -Mantener la estructura de "variable = valor;" para cada linea
  -Mantener mayusculas y minusculas cuando corresponda.
  -Para confirurar la coneccion a la base de datos:
    -En DataBaseName, ingresar el nombre la base de datos.
    -En DataBaseAddress, ingresar el IP address de la base de datos, si esta se encuentra en el computador actual ingresar 127.0.0.1 como direccion o usar el "host address" que se encuentra en las propiedades del servidor en la pestaña de coneccion.
    -En DataBasePort, ingresar el puerto del servidor de la base se datos, este se encuentra en las propiedades en la pestaña de coneccion del servidor que contenga la base de datos a usar.
    -En DataBaseUser, ingresar el nombre del administrador de la base de datos con permisos.
    -En DataBasePassword, ingresar la contraseña del servidor de la base de datos.

*Acceder a la pagina web:
   -Ingresar a ..../Templates/SansaTour.php

*Acceder como gerente 0:
	-usando los casos de prueba, se puede acceder como gerente usando el nombre de usuario: "gerente" y clave: "gerente"
