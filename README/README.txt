Bienvenido DBA, este documento te permitirá tener un dominio sobre el "Sistema de gestión de SansaTour".

Supuestos del sistema de gestión:
  1.-
  
Modificaciones a modelo presentado:
	-Con respecto al modelo presentado, se realizaron dos cambios en los atributos de las tablas Recorridos y Turnos.
		-Para Recorridos:
			-Se almacenaba el dato de llegada estimada como un INT, el cual se pretendía sumar a la hora de salida del bus, sin embargo, este atributo se elimino, y a su vez, el atributo fecha_salida se cambio por horario_salida del tipo TIMESTAMP, para almacenar la fecha y hora de salida del recorrido. Lo mismo se hizo para el atributo llegada_estimada.
			
		-Para Turnos:
			-Se elimino el atributo dia de la tabla, dejando que el atributo hora_inicio del tipo TIMESTAMP maneje la información de la fecha y hora de comienzo del turno.
	


Como esta originalmente armado:
  1.- Sistema:
    	a) Windows 8.1 64 bits.
    	b) PHP versión 7.2.7.
    	c) XAMPP versión windows 7.2.7.
    	d) PostgreSQL versión 10.4 64 bits (link: https://www.enterprisedb.com/downloads/postgres-postgresql-downloads).
    	e) Atom.io (link: https://atom.io/).
    	f) HTML 5.
  2.- Base de datos:
    	a) La base de datos esta montado en postgreSQL.
		b) Los scripts de la base de datos se encuentra en la carpeta "SQL", en el archivo "modelo.sql", en este se encuentras las tablas, las eliminaciones de tablas y los datos de prueba.
	
  3.- Servidor php:
    	a) El servidor PHP esta montado en el programa XAMPP, activando el modulo de APACHE.
    	b) Los archivos de la aplicación web, encontrados en la carpeta "Templates", deben copiarse en el directorio de la instalación de XAMPP, en la carpeta  ("...\xampp\htdocs\").
    	c) Para acceder al sitio web, ingresar la siguiente dirección en el explorador: localhost:8080/SansaTour.php

Como reconstruirlo desde otro computador o servidor:

 1.Colocar archivos en los diferentes programas:
	-Colocar los archivos dentro de "Templates" en la carpeta del directorio de la instalación de XAMPP, en la carpeta  ("...\xampp\htdocs\").

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

 3.Cargar datos en la base de datos:
	-En el "CREATE script".
	-Seleccionar "Open file" (su icono es una carpeta, suele estar arriba a la izquierda).
	-Seleccionar el archivo "modelo.sql" en la carpeta "SQL" de los archivos de SansaTour.
	-Si se van a agregar las tablas (solo para tablas no existentes), seleccionar los "CREATE TABLE" y presionar "execute".
	-Si se van a reemplazar las tablas (solo para las tablas existentes), seleccionar los "DROP TABLE" y "CREATE TABLE", presionar "execute".
	-Si se van a borrar las tablas (solo para las tablas existentes), seleccionar los "DROP TABLE" y presionar "execute".
	-Se se van a agregar los datos de prueba (solo cuando esten todas las tablas, cuidado de no repetir algun INSERT INTO), seleccionar los "INSERT INTO" y presionar "execute".

 4.Agregar datos a las tablas de la base de datos:
	-En el archivo "modelo.sql" se encuentra una serie de datos de prueba para cada tabla del modelo, por lo que si se desean agregar más, se puede seguir el formato que tienen esas instrucciones.
	
 5.Para poder habilitar que PHP acepte las instrucciones de PostgreSQL:
	-Dirigirse a la carpeta xampp/php
	-Buscar el archivo php.ini
	-Descomentar las siguientes lineas:
		extension=pgsql
		extension=pdo_pgsql
	-Guardar el archivo
	*Nota: Si PHP estaba corriendo es necesario detenerlo y volver a correr.

 6.Configurar servidor de SansaTour:
	-Acceder al archivo de ConfigServer.txt dentro de la carpeta templates.
	-Mantener la estructura de "variable = valor;" para cada línea
	-Mantener mayúsculas y minúsculas cuando corresponda.
	-Para configurar la conexión a la base de datos:
	-En DataBaseName, ingresar el nombre de la base de datos.
    	-En DataBaseAddress, ingresar el IP address de la base de datos, si esta se encuentra en el computador actual ingresar 127.0.0.1 como dirección o usar el "host address" que se encuentra en las propiedades del servidor en la pestaña de conexión.
    	-En DataBasePort, ingresar el puerto del servidor de la base se datos, este se encuentra en las propiedades en la pestaña de conexión del servidor que contenga la base de datos a usar.
    	-En DataBaseUser, ingresar el nombre del administrador de la base de datos con permisos.
    	-En DataBasePassword, ingresar la contraseña del servidor de la base de datos.

 7.Acceder a la pagina web:
	-Ingresar a ..../Templates/SansaTour.php

 8.Acceder como gerente 0:
	-Usando los casos de prueba, se puede acceder como gerente usando el nombre de usuario: "gerente" y clave: "gerente"
