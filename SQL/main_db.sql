-- Database: Main

-- DROP DATABASE "Main";

CREATE DATABASE "Main"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Spanish_Spain.1252'
    LC_CTYPE = 'Spanish_Spain.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

CREATE 	TABLE personas
(
	x INT NOT NULL,
	PRIMARY KEY (x)
);

SELECT * FROM personas;
INSERT INTO personas VALUES (12);
