DROP TABLE EMPLEADOS_RECORRIDOS;
DROP TABLE TICKETS;
DROP TABLE RECORRIDOS;
DROP TABLE EMP_TURNOS;
DROP TABLE TURNOS;
DROP TABLE ORIGENES;
DROP TABLE DESTINOS;
DROP TABLE EMPLEADOS;
DROP TABLE PERSONAS;
DROP TABLE BUSES;
DROP TABLE AGENCIAS;
DROP TABLE LINEAS;
DROP TABLE TERMINALES;
DROP TABLE CIUDADES;


CREATE TABLE Personas(
	ID_cuenta INT PRIMARY KEY,
	nombre_usuario VARCHAR(45) UNIQUE NOT NULL,
	contraseña VARCHAR(45) NOT NULL,
	email VARCHAR(45),
	nombre VARCHAR(50),
	rut VARCHAR(10)
);

CREATE TABLE Lineas(
	ID_linea INT PRIMARY KEY,
	nombre_linea VARCHAR(45)
);

CREATE TABLE Ciudades(
	ID_ciudad INT PRIMARY KEY,
	nombre_ciudad VARCHAR(45)
);

CREATE TABLE Terminales(
	ID_terminal INT PRIMARY KEY,
	nombre_terminal VARCHAR(45),
	ID_ciudad INT REFERENCES Ciudades(ID_ciudad) NOT NULL
);


CREATE TABLE Agencias(
	ID_agencia INT PRIMARY KEY,
	nombre_agencia VARCHAR(45),
	ID_linea INT REFERENCES Lineas(ID_linea) NOT NULL,
	ID_terminal INT REFERENCES Terminales(ID_terminal) NOT NULL
);


CREATE TABLE Empleados(
	ID_empleado INT PRIMARY KEY,
	tipo_empleado VARCHAR(15),
	ID_cuenta INT REFERENCES Personas(ID_cuenta),
	ID_agencia INT REFERENCES Agencias(ID_agencia)
);


CREATE TABLE Buses(
	ID_bus INT PRIMARY KEY,
	numero_asientos INT NOT NULL,
	ID_agencia INT REFERENCES Agencias(ID_agencia) NOT NULL
);

CREATE TABLE Turnos(
	ID_turno INT PRIMARY KEY,
	hora_inicio TIMESTAMP NOT NULL,
	hora_termino TIMESTAMP NOT NULL
);

CREATE TABLE EMP_TURNOS(
	ID_empleado INT REFERENCES Empleados(ID_Empleado),
	ID_turno INT REFERENCES Turnos(ID_turno),
	PRIMARY KEY (ID_empleado, ID_turno)
);

CREATE TABLE Origenes(
	ID_origen INT PRIMARY KEY,
	ID_ciudad INT REFERENCES Ciudades(ID_ciudad) NOT NULL
);

CREATE TABLE Destinos(
	ID_destino INT PRIMARY KEY,
	ID_ciudad INT REFERENCES Ciudades(ID_ciudad) NOT NULL
);

CREATE TABLE Recorridos(
	ID_recorrido INT PRIMARY KEY,
	horario_salida TIMESTAMP NOT NULL,
	nombre_recorrido VARCHAR(45),
	llegada_estimada TIMESTAMP NOT NULL,
	precio INT NOT NULL,
	ID_origen INT REFERENCES Origenes(ID_origen),
	ID_destino INT REFERENCES Destinos(ID_destino),
	ID_bus INT REFERENCES Buses(ID_bus)
);

CREATE TABLE Tickets(
	ID_ticket INT PRIMARY KEY,
	num_asiento INT NOT NULL,
	ID_recorrido INT REFERENCES Recorridos(ID_recorrido)
);

CREATE TABLE Empleados_Recorridos(
	ID_recorrido INT REFERENCES Recorridos(ID_recorrido),
	ID_empleado INT REFERENCES Empleados(ID_empleado),
	PRIMARY KEY (ID_recorrido, ID_empleado)
);


--Ciudades + (Origen/Destino)
INSERT INTO CIUDADES (id_ciudad, nombre_ciudad) VALUES (1, 'Santiago'), (2, 'Viña del Mar'), (3, 'Valparaíso');
INSERT INTO ORIGENES (id_origen, id_ciudad) VALUES (1, 1), (2, 2), (3, 3);
INSERT INTO DESTINOS (id_destino, id_ciudad) VALUES (1,1), (2,2), (3, 3);


--Personas
INSERT INTO PERSONAS (ID_cuenta, nombre_usuario, contraseña, email, nombre, rut) VALUES (0, 'gerente', 'gerente', 'gerente@sansatour.cl', 'The boss agencia one', '99999999-9');
INSERT INTO PERSONAS (ID_cuenta, nombre_usuario, contraseña, email, nombre, rut) VALUES (1, 'csepulveda', 'admin', 'csepulveda@sansatour.cl', 'Christian Sepúlveda', '18499342-2');
INSERT INTO PERSONAS (ID_cuenta, nombre_usuario, contraseña, email, nombre, rut) VALUES (2, 'sgroselj', 'admin', 'sgroselj@sansatour.cl', 'Sebastian Groselj', '19180240-3');
INSERT INTO PERSONAS (ID_cuenta, nombre_usuario, contraseña, email, nombre, rut) VALUES (3, 'jnova', 'javier', 'jnova@sansatour.cl', 'Javier Nova', '17227832-1');
INSERT INTO PERSONAS (ID_cuenta, nombre_usuario, contraseña, email, nombre, rut) VALUES (4, 'larancibia', 'luciano', 'larancibia@sansatour.cl', 'Luciano Arancibia', '20540872-5');

--Lineas
INSERT INTO LINEAS VALUES (1, 'SansaTour');

--Terminales
INSERT INTO TERMINALES VALUES (1, 'Terminal Sur', 1);
INSERT INTO TERMINALES VALUES (2, 'Rodoviario Viña del Mar', 2);
INSERT INTO TERMINALES VALUES (3, 'Terminal de Valparaíso', 3);
SELECT nombre_ciudad, nombre_terminal from terminales, ciudades where terminales.id_ciudad = ciudades.id_ciudad;

--Agencias
INSERT INTO AGENCIAS VALUES (1, 'Agencia Santiago', 1, 1);
INSERT INTO AGENCIAS VALUES (2, 'Agencia Viña', 1, 2);
INSERT INTO AGENCIAS VALUES (3, 'Agencia Valparaíso', 1, 3);

--Empleados
INSERT INTO EMPLEADOS VALUES (1, 'Conductor', 3, 1);
INSERT INTO EMPLEADOS VALUES (2, 'Auxiliar', 4, 1);
INSERT INTO EMPLEADOS VALUES (4, 'Gerente', 0, 1);

select nombre, nombre_agencia from empleados, personas, agencias where empleados.id_cuenta = personas.id_cuenta and empleados.id_agencia = agencias.id_agencia;


--Turnos
select * from turnos;
INSERT INTO TURNOS VALUES (1, to_timestamp('20-08-2018 05:00:00', 'dd-mm-yyyy hh24:mi:ss'), to_timestamp('20-08-2018 14:00:00', 'dd-mm-yyyy hh24:mi:ss'));
INSERT INTO TURNOS VALUES (2, to_timestamp('20-08-2018 14:00:00', 'dd-mm-yyyy hh24:mi:ss'), to_timestamp('20-08-2018 23:00:00', 'dd-mm-yyyy hh24:mi:ss'));

--Turnos-empleados

INSERT INTO EMP_TURNOS VALUES (1, 1);
INSERT INTO EMP_TURNOS VALUES (2, 1);

--Buses

INSERT INTO BUSES VALUES (1, 40, 1);
INSERT INTO BUSES VALUES (2, 40, 1);
INSERT INTO BUSES VALUES (3, 40, 1);
INSERT INTO BUSES VALUES (4, 40, 2);
INSERT INTO BUSES VALUES (5, 40, 2);
INSERT INTO BUSES VALUES (6, 40, 2);
INSERT INTO BUSES VALUES (7, 40, 3);
INSERT INTO BUSES VALUES (8, 40, 3);
INSERT INTO BUSES VALUES (9, 40, 3);

-- Recorridos
SELECT * FROM RECORRIDOS;

INSERT INTO RECORRIDOS VALUES (1, to_timestamp('20-08-2018 05:00:00', 'dd-mm-yyyy hh24:mi:ss'), 'Santiago-Viña', to_timestamp('20-08-2018 07:00:00', 'dd-mm-yyyy hh24:mi:ss'), 3500, 1, 2, 1);
INSERT INTO RECORRIDOS VALUES (2, to_timestamp('20-08-2018 07:00:00', 'dd-mm-yyyy hh24:mi:ss'), 'Viña-Santiago', to_timestamp('20-08-2018 09:00:00', 'dd-mm-yyyy hh24:mi:ss'), 3500, 2, 1, 1);
INSERT INTO RECORRIDOS VALUES (3, to_timestamp('20-08-2018 09:00:00', 'dd-mm-yyyy hh24:mi:ss'), 'Santiago-Viña', to_timestamp('20-08-2018 11:30:00', 'dd-mm-yyyy hh24:mi:ss'), 4500, 1, 2, 2);
INSERT INTO RECORRIDOS VALUES (4, to_timestamp('20-08-2018 11:30:00', 'dd-mm-yyyy hh24:mi:ss'), 'Viña-Santiago', to_timestamp('20-08-2018 14:00:00', 'dd-mm-yyyy hh24:mi:ss'), 4500, 2, 1, 2);

--Empleados/recorridos
SELECT * FROM EMPLEADOS_RECORRIDOS;

INSERT INTO EMPLEADOS_RECORRIDOS VALUES (1, 1);
INSERT INTO EMPLEADOS_RECORRIDOS VALUES (1, 2);
INSERT INTO EMPLEADOS_RECORRIDOS VALUES (2, 1);
INSERT INTO EMPLEADOS_RECORRIDOS VALUES (2, 2);
INSERT INTO EMPLEADOS_RECORRIDOS VALUES (3, 1);
INSERT INTO EMPLEADOS_RECORRIDOS VALUES (3, 2);
INSERT INTO EMPLEADOS_RECORRIDOS VALUES (4, 1);
INSERT INTO EMPLEADOS_RECORRIDOS VALUES (4, 2);

