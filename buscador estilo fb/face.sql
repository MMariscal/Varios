CREATE DATABASE IF NOT EXISTS face;
USE face;


CREATE TABLE face (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  nombre varchar(45) NOT NULL,
  direccion varchar(50) NOT NULL,
  url varchar(45) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO face (`id`,`nombre`,`direccion`,`url`) VALUES 
 (1,'Campos Chavez Ademir','Breña','fotos/1.jpg'),
 (2,'Vargas Vela Vladimir','San Martin de Porres','fotos/2.jpg'),
 (3,'Rado Romero César','Puente Piedra','fotos/3.jpg'),
 (4,'Valera Leon Anthony','Naranjal','fotos/4.jpg'),
 (5,'Santos Dantes Luis','Salamanca','fotos/5.jpg'),
 (6,'Moy Padilla Marylia','Barranco','fotos/6.jpg'),
 (7,'Llungo Cristina','Surco','fotos/7.jpg'),
 (8,'Quispe Chavez Cinthya','SJM','fotos/8.jpg'); 

select * from face;