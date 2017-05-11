DROP DATABASE IF EXISTS  AlmacenComedor;
CREATE DATABASE AlmacenComedor;
USE AlmacenComedor;


CREATE TABLE TipoUsuario(
    idTipoUsuario int unsigned not null auto_increment primary key,
    nombreTipo varchar(40) not null
);

CREATE TABLE Usuarios(
    idUsuario int unsigned not null auto_increment primary key,
    idTipoUsuario int not null,
    usuario varchar(25) unique not null,
    contrasena text not null,
    email varchar(45) not null,
    estado bool not null,
    FOREIGN KEY(idTipoUsuario)REFERENCES TipoUsuario(idTipoUsuario)ON UPDATE CASCADE ON DELETE CASCADE
);

-- 1 unidad de medida
create table udiadMedida (
    idUnidMedida int not null auto_increment primary Key,
    nombre varchar(30)not null,
    abreviatura varchar(30)not null
);

-- 2 categoria producto
create table categoriaProducto (
    idCatProducto int not null auto_increment primary Key,
    nombreCategoria varchar(30)not null
);

-- 3 producto
create table producto (
    idProducto int not null auto_increment primary Key,
    nombreProducto varchar(30)not null,
    idUnidMedida int not null,
    idCatProducto int not null,
    FOREIGN KEY (idCatProducto) REFERENCES categoriaProducto(idCatProducto) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idUnidMedida) REFERENCES udiadMedida(idUnidMedida) ON UPDATE CASCADE ON DELETE CASCADE
);

-- 4 Categoria Plato
CREATE TABLE categoriaPlato (
	idCategoria int not null auto_increment primary key,
	nombre varchar(30) not null
);

-- 5 Plato
CREATE TABLE plato (
	idPlato int not null auto_increment primary key,
	idCategoria int,
	nombre varchar(50) not null,
	imagen text,
	FOREIGN KEY(idCategoria) REFERENCES categoriaPlato (idCategoria) ON UPDATE CASCADE ON DELETE CASCADE
);

-- 6 receta 
create table receta(
    idReceta int not null auto_increment primary Key,
    idProducto int not null,
    idPlato int not null,
    cantidadProducto int not null,
    FOREIGN KEY (idPlato) REFERENCES plato(idPlato) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idProducto) REFERENCES producto (idProducto) ON UPDATE CASCADE ON DELETE CASCADE
);

-- 7 Almacen 
CREATE TABLE almacen(
    idAlmacen int unsigned not null auto_increment primary key,
    idProducto int not null,
    cantidad float(8,2) not null,
    FOREIGN KEY (idProducto) REFERENCES producto (idProducto) ON UPDATE CASCADE ON DELETE CASCADE
);

-- 8 Detalle de Almacen
CREATE TABLE detalleAlmacen(
    idDetalle int unsigned not null auto_increment primary key,
    idAlmacen int not null,
    cantidadIngresada float not null,
    fechaVencimiento date null,
    precioTotal float not null,
    fechaRegistro timestamp not null,
    idUsuario int not null,
    FOREIGN KEY (idAlmacen) REFERENCES almacen (idAlmacen) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE
);

-- 9  Factura
CREATE TABLE factura(
    idFactura int unsigned not null auto_increment primary key,
    idDetalle int not null,
    numFactura varchar(45),
    valorIVA varchar(45),
    FOREIGN KEY (idDetalle) REFERENCES detalleAlmacen (idDetalle) ON UPDATE CASCADE ON DELETE CASCADE
);

-- 10 Despacho
CREATE TABLE despacho (
	idDespacho int not null auto_increment primary key,
	idAlmacen int,
	idPlato int,
	cantidadRetirada int not null,
	precioRetiro int not null,
	fechaRetiro date not null,
	observaciones varchar(100),
    idUsuario int not null,
	FOREIGN KEY(idAlmacen) REFERENCES almacen (idAlmacen) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(idPlato) REFERENCES plato (idPlato) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE
);


-- 1. Tipo de Usuario
INSERT INTO TipoUsuario VALUE(null, "Administrador");
INSERT INTO TipoUsuario VALUE(null, "Nutricionista");

-- 2. Usuarios
INSERT INTO Usuarios VALUE(null, 1, "gustavo", "d2xlbkNUaTBZOGNYbG1rd2trWU1iUT09", "gustavo@gmail.com", 1);
INSERT INTO Usuarios VALUE(null, 1, "stephanie", "OTN5MXJmbk5PQ1VRK3BXT3JGL0tNZz09", "stephanie@gmail.com", 1);
INSERT INTO Usuarios VALUE(null, 2, "elsy", "Y1VWZnp6YnBCTmNra2J3SGFGOFp0QT09", "elsy@gmail.com", 1);
INSERT INTO Usuarios VALUE(null, 2, "gladiz", "NzlpUlgvRFFxQWl0ZXkyTlpCNkNKUT09", "gladiz@gmail.com", 1);
INSERT INTO Usuarios VALUE(null, 2, "miriam", "ai9XdkY1L1JJWGFmSFpXRkRPMitjUT09", "miriam@gmail.com", 0);
INSERT INTO Usuarios VALUE(null, 1, "vanesa", "RDNLK1JSSHpHdCtJSUczV3ArbmJvdz09", "vanesa@gmail.com", 1);