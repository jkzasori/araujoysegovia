/*
Diseñar y llenar la base de datos
*/

/*Se crea la BD si no existe*/
CREATE DATABASE IF NOT EXISTS pruebaTecnicaTamara;
USE pruebaTecnicaTamara;

/*Se crean las tablas*/

/*Tabla Admin*/
CREATE TABLE admin(
id int(10) auto_increment not null,
usuario varchar(255) not null,
password varchar(10) not null,
Fecha_registro date not null,
CONSTRAINT pk_admin PRIMARY KEY(id),
CONSTRAINT uq_usuario UNIQUE(usuario)
)ENGINE=InnoDb;

/*Tabla Categoria de productos*/
CREATE TABLE categoria(
id int(10) auto_increment not null,
codigo varchar(10) not null,
nombre varchar(100) not null,
descripcion varchar(200) not null,
activo boolean not null,
admin_id int(10) not null,
CONSTRAINT pk_categoria PRIMARY KEY(id),
CONSTRAINT uq_codigo UNIQUE(codigo),
CONSTRAINT uq_nombre UNIQUE(nombre),
CONSTRAINT fk_categoria_admin FOREIGN KEY(admin_id) REFERENCES admin(id)
)ENGINE=InnoDb;

/*Tabla Categoria de productos*/
CREATE TABLE producto(
id int(10) auto_increment not null,
codigo varchar(10) not null,
nombre varchar(100) not null,
descripcion varchar(200) not null,
marca varchar(50) not null,
categoria_id  int(10) not null,
precio float(20,2) not null,
admin_id int(10) not null,
CONSTRAINT pk_producto PRIMARY KEY(id),
CONSTRAINT uq_codigo UNIQUE(codigo),
CONSTRAINT uq_nombre UNIQUE(nombre),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categoria(id),
CONSTRAINT fk_producto_admin FOREIGN KEY(admin_id) REFERENCES admin(id)
)ENGINE=InnoDb;
/*LLenar la bd*/

#ADMIN
INSERT INTO admin VALUES(NULL, 'admin@admin.jkt', 'clave', CURDATE());
INSERT INTO admin VALUES(NULL, 'admin2@admin.jkt', 'clave', CURDATE());
INSERT INTO admin VALUES(NULL, 'tamara@tamara.com', 'tamara', CURDATE());

#CATEGORÍA
INSERT INTO categoria VALUES(NULL, '1ct1', 'Categoria1', 'Esta es la categoria 1', TRUE, 1);
INSERT INTO categoria VALUES(NULL, '2ct2', 'Categoria2', 'Esta es la categoria 2', FALSE, 2);
INSERT INTO categoria VALUES(NULL, '3ct3', 'Categoria3', 'Esta es la categoria 3', TRUE, 3);

#PRODCUTO
INSERT INTO producto VALUES(NULL, '1pd1', 'producto1', 'Este es el producto 1', 'marca1',1, 2000, 1);
INSERT INTO producto VALUES(NULL, '2pd2', 'producto2', 'Este es el producto 2', 'marca2',2, 2000, 2);
INSERT INTO producto VALUES(NULL, '3pd3', 'producto3', 'Este es el producto 3', 'marca3',3, 2500, 3);
