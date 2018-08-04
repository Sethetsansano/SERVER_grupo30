Bienvenido DBA, este documento te permitir� tener un dominio sobre el "Sistema de gesti�n de SansaTour".

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
    b) Los archivos de la aplicaci�n web se encuentran en el directorio de la instalaci�n de XAMPP, en la carpeta de "\htdocs\SansaTour_Grupo30" ("...\xampp\htdocs\SansaTour_Grupo30").
    c) Se puede acceder a la aplicaci�n web desde el propio servidor mediante el link "localhost/SansaTour_Grupo30/Work/main.php".

Como reconstruirlo desde otro computador o servidor:
  1.-
