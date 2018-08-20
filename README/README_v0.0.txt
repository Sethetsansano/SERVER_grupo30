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


*Instrucciones para tener acceso a la base de datos.

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




*	-Para poder habilitar que PHP acepte las instrucciones de PostgreSQL:
		-Dirigirse a la carpeta xampp/php
		-Buscar el archivo php.ini
		-Descomentar las siguientes lineas:
			extension=pgsql
			extension=pdo_pgsql
		-Guardar el archivo
	*Nota: Si PHP estaba corriendo es necesario detenerlo y volver a correr.

*Configurar servidor
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
