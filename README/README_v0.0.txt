Bienvenido DBA, este documento te permitirá tener un dominio sobre el "Sistema de gesti�n de SansaTour".

Supuestos del sistema de gesti�n:
  1.-

Como esta originalmente armado:
  1.- Sistema:
    a) Windows 8.1 64 bits.
    b) PHP versi�n 7.2.7.
    c) XAMPP versi�n windows 7.2.7.
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
  
  
Instrucciones para tener acceso a la base de datos.

	-Dirigirse a la carpeta de instalación de PostgreSQL (PostgreSQL\10\data)
	-Abrir el archivo postgresql.conf
	-Agregar la siguiente linea al final del archivo: 
		listen_addresses = '*'
	-Guardar el archivo.
	-Luego en el mismo directorio (PostgreSQL\10\data)
	-Abrir el archivo pg_hba.conf
	-Agregar la siguiente linea al final del archivo:
		host    all             all             0.0.0.0/0               md5
	-Guardar el archivo.




	-Para poder habilitar que PHP acepte las instrucciones de PostgreSQL:
		-Dirigirse a la carpeta xampp/php
		-Buscar el archivo php.ini
		-Descomentar las siguientes lineas:
			extensions=pgsql
			extensions=pdo_pgsql
		-Guardar el archivo
	*Nota: Si PHP estaba corriendo es necesario detenerlo y volver a correr.


