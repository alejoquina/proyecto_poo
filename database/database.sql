CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE USUARIOS(

	id  int(255) AUTO_INCREMENT NOT NULL,
	nombre varchar(100) NOT NULL,
	apellidos  varchar(100) NOT NULL,
	email varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	rol varchar(20),
	imagen  varchar(255),
	CONSTRAINT pk_usuarios PRIMARY KEY(id),
	CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

INSERT INTO USUARIOS VALUES(NULL,'alejandro','quina','alequina@hotmail.com','1234','admin',NULL);

CREATE TABLE CATEGORIAS(
	id int(255) AUTO_INCREMENT NOT NULL,
	nombre varchar(100) NOT NULL,
	CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO CATEGORIAS VALUES(NULL,'Manga corta');
INSERT INTO CATEGORIAS VALUES(NULL,'tirantes');
INSERT INTO CATEGORIAS VALUES(NULL,'Manga larga');

CREATE TABLE PRODUCTOS(
	id int(255) AUTO_INCREMENT NOT NULL,
	categoria_id int(255) NOT NULL,
	nombre varchar(100) NOT NULL,
	descripcion text,
	precio float(100,2) NOT NULL,
	stock int(255) NOT NULL,
	oferta varchar(2),
	fecha date NOT NULL,
	imagen varchar(255),

	CONSTRAINT pk_producto_id PRIMARY KEY(id),
	CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES CATEGORIAS(id)
)ENGINE=InnoDb;


CREATE TABLE PEDIDOS(
	id int(255) AUTO_INCREMENT NOT NULL,
	usuario_id int(255) NOT NULL,
	provincia varchar(100) NOT NULL,
	localidad varchar(100) NOT NULL,
	direccion varchar(255) NOT NULL,
	coste float(200,2) NOT NULL,
	estado varchar(20) NOT NULL,
	fecha date,
	hora time,


	CONSTRAINT pk_pedidos PRIMARY KEY(id),
	CONSTRAINT fk_pedido_usaurio FOREIGN KEY(usuario_id) REFERENCES USUARIOS(id)
)ENGINE=InnoDb;





CREATE TABLE LINEAS_PEDIDO(
	id int(255) AUTO_INCREMENT NOT NULL,
	pedido_id int(55) NOT NULL,
	producto_id int(255) NOT NULL,
	CONSTRAINT pk_lienas_pedidos PRIMARY KEY(id),
	CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES PEDIDOS(id),
	CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES PRODUCTOS(id)
)ENGINE=InnoDb;


