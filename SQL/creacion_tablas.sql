DROP TABLE Personas;
DROP TABLE Lineas;
DROP TABLE Ciudades;
DROP TABLE Terminales;
DROP TABLE Agencias;
DROP TABLE Empleados;
DROP TABLE Buses;
DROP TABLE Turnos;
DROP TABLE EMP_TURNOS;
DROP TABLE Origenes;
DROP TABLE Destinos;
DROP TABLE Recorridos;
DROP TABLE Tickets;
DROP TABLE Empleados_Recorridos;

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
	hora_termino TIMESTAMP NOT NULL,
	dia DATE NOT NULL
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
	fecha_salida DATE NOT NULL,
	horario_salida TIMESTAMP NOT NULL,
	nombre_recorrido VARCHAR(45),
	tiempo_viaje INT NOT NULL,
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
