
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
