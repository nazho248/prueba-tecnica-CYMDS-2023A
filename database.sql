CREATE DATABASE IF NOT EXISTS pruebasdeclase;

USE pruebasdeclase;

CREATE TABLE   Municipio (
                                         idMunicipio int,
                                         idDepartamento int not null,
                                         Nombre varchar(50) not null,
                                         primary key (idMunicipio)
);

CREATE TABLE  estudiantes (
                                           IDEstudiante int(11) NOT NULL AUTO_INCREMENT,
                                           PRIMARY KEY (IDEstudiante),
                                           Nombres varchar(50) ,
                                           Apellidos varchar(50) ,
                                           Email varchar(50) ,
                                           FechaNacimiento date ,
                                           Genero varchar(1),
                                           Direccion int,
                                           SwActivo boolean,
                                           idmunicipio int,
                                           fechahora timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                             CONSTRAINT fk_municipio_estudiantes FOREIGN KEY (idmunicipio) REFERENCES Municipio(idMunicipio) on update cascade on delete RESTRICT
);

INSERT INTO Municipio (idMunicipio, idDepartamento, Nombre) VALUES (68001, 68, 'Bucaramanga');
#Conteo de estudiantes para el municipio Bucaramanga (68001)
SELECT count(*) as total FROM estudiantes WHERE idmunicipio = 68001;
#Listado de estudiantes de genero femenino (Genero = F)
SELECT * FROM estudiantes WHERE Genero = 'F';