Bienvenido DBA, este documento te permitirá tener un dominio sobre el "Sistema de gestión de SansaTour".

1> Supuestos del sistema de gestión:
	-Se obvio la necesidad de requerir que el usuario/vendedor ingrese la cantidad de tickets a comprar, ya que con la cantidad de checkbox seleccionado se entregará el detalle correspondiente a su compra.
	-El tipo de usuario 'Gerente' puede interactuar con el sistema como si fuera un usuario normal aparte de realizar las operaciones especiales de gerente.


2> Modificaciones a modelo presentado:
	-Con respecto al modelo presentado, se realizaron dos cambios en los atributos de las tablas Recorridos y Turnos.
		-Para Recorridos:
			-Se almacenaba el dato de llegada estimada como un INT, el cual se pretendía sumar a la hora de salida del bus, sin embargo, este atributo se elimino, y a su vez, el atributo fecha_salida se cambio por horario_salida del tipo TIMESTAMP, para almacenar la fecha y hora de salida del recorrido. Lo mismo se hizo para el atributo llegada_estimada.
			
		-Para Turnos:
			-Se elimino el atributo dia de la tabla, dejando que el atributo hora_inicio del tipo TIMESTAMP maneje la información de la fecha y hora de comienzo del turno.
	


3> Como esta originalmente armado:
  3.1> Sistema:
    	a) Windows 8.1 64 bits.
    	b) PHP versión 7.2.7.
    	c) XAMPP versión windows 7.2.7.
    	d) PostgreSQL versión 10.4 64 bits (link: https://www.enterprisedb.com/downloads/postgres-postgresql-downloads).
    	e) Atom.io (link: https://atom.io/).
    	f) HTML 5.
  3.2> Base de datos:
    	a) La base de datos esta montado en postgreSQL.
	b) Los scripts de la base de datos se encuentra en la carpeta "SQL", en el archivo "modelo.sql", en este se encuentras las tablas, las eliminaciones de tablas y los datos de prueba.
	
  3.3> Servidor php:
    	a) El servidor PHP esta montado en el programa XAMPP, activando el modulo de APACHE.
    	b) Los archivos de la aplicación web, encontrados en la carpeta "Templates", deben copiarse en el directorio de la instalación de XAMPP, en la carpeta  ("...\xampp\htdocs\").
    	c) Para acceder al sitio web, ingresar la siguiente dirección en el explorador: localhost:8080/SansaTour.php

4> Como reconstruirlo desde otro computador o servidor:

 4.1> Colocar archivos en los diferentes programas:
	-Colocar los archivos dentro de "Templates" en la carpeta del directorio de la instalación de XAMPP, en la carpeta  ("...\xampp\htdocs\").

 4.2> Instrucciones para tener acceso a la base de datos:

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

 4.3> Crear desde 0 nueva base de datos:
	-Entrar al administrador de la base de datos (en caso de postgreSQL: "pgAdmin").
	-En la sección de "Browser", hacer click derecho en "Servers", luego seleccionar en "Create", luego seleccionar "Server...".
	-Ahora en la pestaña emergente se configurará el server de la base de datos, guarde los siguientes datos que ingrese en algun lugar.
	-Ingresar a la pestaña "General".
	-En "Name", colocar el nombre del servidor.
	-En "Server group", colocar el grupo de servidores en que se guardara el servidor.
	-Entrar a la pestaña "Connection".
	-En "Host name/address", colocar "127.0.0.1".
	-En el "Port", colocar el numero de port a usar, este valor debe ser único en el sistema (que ningún otro programa lo este usando) y usar valores entre 5001 y 14999.
	-En "Username", colocar el usuario que tenga privilegios y que sea el admin del server.
	-Guardar base de datos con el boton "Save".
	-En "Browser", entrar al grupo de servers del server de la base de datos, luego dar doble click y en la ventana emergente agregar la clave del usuario administrador y dar al boton "Ok", con ello se accede al servidor.
	-Ahora dentro del servidor en "Databases" vamos a crear la base de datos, dar click derecho y seleccionar "Create" y luego "DataBase...".
	-En la ventana emergente entrar a la pestaña "General".
	-En "DataBase", colocar el nombre de la base de datos.
	-En "Owner", colocar al usuario propietario, se puede usar el mismo de el servidor.
	-Guardar la base de datos con el boton "Save".
	-Dar doble click en la base de datos para iniciarla.
	-Para empezar a ingresar scripts, en la base de datos dar click derecho y seleccionar "CREATE Script".

 4.4> Cargar datos en la base de datos:
	-En el "CREATE script".
	-Seleccionar "Open file" (su icono es una carpeta, suele estar arriba a la izquierda).
	-Seleccionar el archivo "modelo.sql" en la carpeta "SQL" de los archivos de SansaTour.
	-Si se van a agregar las tablas (solo para tablas no existentes), seleccionar los "CREATE TABLE" y presionar "execute".
	-Si se van a reemplazar las tablas (solo para las tablas existentes), seleccionar los "DROP TABLE" y "CREATE TABLE", presionar "execute".
	-Si se van a borrar las tablas (solo para las tablas existentes), seleccionar los "DROP TABLE" y presionar "execute".
	-Se se van a agregar los datos de prueba (solo cuando esten todas las tablas, cuidado de no repetir algun INSERT INTO), seleccionar los "INSERT INTO" y presionar "execute".

 4.5> Agregar datos a las tablas de la base de datos:
	-En el archivo "modelo.sql" se encuentra una serie de datos de prueba para cada tabla del modelo, por lo que si se desean agregar más, se puede seguir el formato que tienen esas instrucciones.
	
 4.6> Para poder habilitar que PHP acepte las instrucciones de PostgreSQL:
	-Dirigirse a la carpeta xampp/php
	-Buscar el archivo php.ini
	-Descomentar las siguientes lineas:
		extension=pgsql
		extension=pdo_pgsql
	-Guardar el archivo
	*Nota: Si PHP estaba corriendo es necesario detenerlo y volver a correr.

 4.7> Configurar servidor de SansaTour:
	-Acceder al archivo de ConfigServer.txt dentro de la carpeta templates.
	-Mantener la estructura de "variable = valor;" para cada línea
	-Mantener mayúsculas y minúsculas cuando corresponda.
	-Para configurar la conexión a la base de datos:
	-En DataBaseName, ingresar el nombre de la base de datos.
    	-En DataBaseAddress, ingresar el IP address de la base de datos, si esta se encuentra en el computador actual ingresar 127.0.0.1 como dirección o usar el "host address" que se encuentra en las propiedades del servidor en la pestaña de conexión.
    	-En DataBasePort, ingresar el puerto del servidor de la base se datos, este se encuentra en las propiedades en la pestaña de conexión del servidor que contenga la base de datos a usar.
    	-En DataBaseUser, ingresar el nombre del administrador de la base de datos con permisos.
    	-En DataBasePassword, ingresar la contraseña del servidor de la base de datos.

 4.8> Acceder a la pagina web:
	-Entrar al navegador web (en preferencia chrome).
	-Tener activo la base de datos, el servidor php, los archivos "Templates" en el "xampp/htdocs/" y las configuraciones previas. 
	-Usar el siguiente URL: 
		http://localhost/SansaTour.php
	*Nota: Si no se encuetra la pagina (error 404) al tener los archivos en una subcarpeta, ingresar http://localhost/ seguido de la parte de la direccion de SansaTour.php que sea lo siguiente a .../xampp/htdocs/ más el nombre SansaTour.php , ejemplo: con la direccion del archivo C:/xampp/htdocs/grupo30/SansaTour.php , ingresar: http://localhost/grupo30/SansaTour.php 		

 4.9> Acceder como gerente 0:
	-Usando los casos de prueba, se puede acceder como gerente usando el nombre de usuario: "gerente" y clave: "gerente"
 
 4.10> Agregar empleados a la BD
	- Para agregar empleados del tipo 'Conductor', 'Auxiliar', 'Gerente', se le delego la responsabilidad al DBA y no será manejado a traves de la aplicación Web
	- Para poder realizar esta operación, será necesario crear una nueva cuenta de usuario (la cual se puede realizar mediante la aplicación Web) o utilizar un usuario ya existente.
	- Para esto, es necesario saber las personas que se encuentran registradas:
		- SELECT * FROM PERSONAS;
	- Luego, para ingresar un nuevo empleado a la empresa, se necesita saber a la agencia que corresponde:
		- SELECT * FROM Agencias;
	- Finalmente, para agregar al empleado:
		- INSERT INTO Empleados VALUES (MAX(ID_empleado), '<TipoEmpleado>', <ID_cuenta>, <ID_agencia>);
		- <TipoEmpleado> corresponde a uno de los siguientes valores: 'Gerente', 'Conductor', 'Auxiliar'.
		- <ID_cuenta> corresponde a la ID de la cuenta del usuario que se agregará como empleado (debe existir en la BD).
		- <ID_agencia> corresponde a la ID de la agencia a la que corresponde el empleado (debe existir en la BD).
