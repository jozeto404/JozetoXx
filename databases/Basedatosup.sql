drop database BaseDatosUpDenim;
create database BaseDatosUpDenim;
use BaseDatosUpDenim;

CREATE TABLE Personas(idDocumento INT NOT NULL,
nombresPer varchar(30) NOT NULL,
apellidosPer varchar(30) NOT NULL,
generoPer Varchar(3) NOT NULL,
primary key (idDocumento)); 

create table Contacto(idContacto INT NOT NULL AUTO_INCREMENT,
telefonoCont INT NOT NULL,
correoCont VARCHAR(50) NOT NULL,
idDocumento int NOT NULL,
PRIMARY KEY (idContacto),
foreign key (idDocumento) references Personas(idDocumento));

create table Direccion(idDireccion int not null auto_increment,
direccion varchar(70) not null, 
idContacto int not null,
primary key (idDireccion),
foreign key (idContacto) references Contacto(idContacto));

create table Ciudad(idCiudad int not null auto_increment,
ciudad varchar(30) not null,
idDireccion int not null,
primary key (idCiudad),
foreign key (idDireccion) references Direccion(idDireccion));

create table Empleados(idEmpleados int not null auto_increment,
SalarioEmpl float not null, 
fechaNacimiento date not null,
fechaIngreso date not null,
hrEmpl varchar(4),
idDocumento int not null,
primary key (idEmpleados),
foreign key (idDocumento) references Personas(idDocumento));

create table CargoEmpleado(idCargoEmpl int not null auto_increment,
cargoEmpl varchar(15) not null,
idEmpleados int not null,
primary key (idCargoEmpl),
foreign key (idEmpleados) references Empleados(idEmpleados));

create table SeguridadSocial(idSeguridadSocial int not null auto_increment,
idEps int not null,
idArl int not null,
idFondoPension int not null,
idEmpleados int not null,
primary key (idSeguridadSocial),
foreign key (idEmpleados) references Empleados(idEmpleados));

create table Eps(idEps int not null auto_increment,
eps varchar(15) not null,
idSeguridadSocial int not null,
primary key (idEps),
foreign key (idSeguridadSocial) references SeguridadSocial(idSeguridadSocial));

create table Arl(idArl int not null auto_increment,
Arl varchar(15) not null,
idSeguridadSocial int not null,
primary key (idArl),
foreign key (idSeguridadSocial) references SeguridadSocial(idSeguridadSocial));

create table FondoPersion(idFondoPension int not null auto_increment,
FondoPension varchar(15) not null,
idSeguridadSocial int not null,
primary key (idFondoPension),
foreign key (idSeguridadSocial) references SeguridadSocial(idSeguridadSocial));

create table NovedadesPersonal(idNovedadPersonal int not null auto_increment,
fechaInicioNovedadPer date not null,
descripcionNovedadPer varchar(30),
fechaFinNovedadPer date not null,
idEmpleados int not null,
primary key (idNovedadPersonal),
foreign key (idEmpleados) references Empleados(idEmpleados));

create table TipoNovedadPersonal(idTipoNovedadPers int not null auto_increment,
tipoNovedadPers varchar(15) not null,
idNovedadPersonal int not null,
primary key (idTipoNovedadPers),
foreign key (idNovedadPersonal) references NovedadesPersonal(idNovedadPersonal));

create table Clientes(idCliente int not null auto_increment,
cupoCredito float not null,
limiteCredito float not null,
idDocumento int not null,
primary key (idCliente),
foreign key (idDocumento) references Personas(idDocumento));

create table tipoCliente(idTipoCliente int not null auto_increment,
tipoCliente varchar (12) not null,
idCliente int not null,
primary key (idTipoCliente),
foreign key (idCliente) references Clientes(idCliente));

create table TipoComercio(idTipoComercio int not null auto_increment,
tipoComercio varchar(12) not null,
idCliente int not null,
primary key (idTipoComercio),
foreign key (idCliente) references Clientes(idCliente));

create table Pqrs(idPqr int not null auto_increment,
fechaInicioPqr date not null, 
horaInicioPqr datetime not null,
motivoPqr varchar(100) not null,
fechaCierrePqr date not null,
horaCierrePqr datetime not null,
idCliente int,
idEmpleados int not null,
primary key (idPqr),
foreign key (idCliente) references Clientes(idCliente),
foreign key (idEmpleados) references Empleados(idEmpleados));

create table TipoPqr(idTipoPqr int not null auto_increment,
tipoPqr varchar(20) not null,
idPqr int not null,
primary key (idTipoPqr),
foreign key (idPqr) references Pqrs(idPqr));

create table EstadoPqr(idEstadoPqr int not null auto_increment,
estadoPqr varchar(15) not null,
idPqr int not null,
primary key (idEstadoPqr),
foreign key (idPqr) references Pqrs(idPqr));

use BaseDatosUpDenim;

create table Cotizaciones(idCotizacion int not null auto_increment,
fechaCotizacion date not null, 
horaCotizacion datetime not null,
cantidadProd int not null,
descuentoCotizacion float not null,
valorTotalCotizacion float not null,
idEmpleados int not null,
idCliente int not null,
idProducto int not null,
primary key (idCotizacion),
foreign key (idCliente) references Clientes(idCliente));

create table Ventas(idVenta int not null auto_increment,
fechaVenta date not null, 
horaVenta datetime not null,
cantidadProdVenta int not null,
descuentoVenta float not null,
valorTotalVenta float not null,
idEmpleados int not null,
idCliente int not null,
idProducto int not null,
primary key (idVenta),
foreign key (idCliente) references Clientes(idCliente));

create table CompobanteVentas(idComprobanteVenta int not null auto_increment,
fechaEmisionCompr date not null, 
horaEmisionCompr datetime not null,
idCliente int not null,
idVenta int not null,
primary key (idComprobanteVenta),
foreign key (idVenta) references Ventas(idVenta));

create table FormaPago(idFormaPago int not null auto_increment,
formaPago varchar(12) not null,
idComprobanteVenta int not null,
primary key (idFormaPago),
foreign key (idComprobanteVenta) references CompobanteVentas(idComprobanteVenta));

create table EstadoPago(idEstadoPago int not null auto_increment,
EstadoPago varchar(12) not null,
idComprobanteVenta int not null,
primary key (idEstadoPago),
foreign key (idComprobanteVenta) references CompobanteVentas(idComprobanteVenta));

create table Productos(idProducto int not null auto_increment,
nombreProducto varchar(30) not null,
precioVentaProducto float not null,
descripcionProducto varchar (30) not null,
primary key (idProducto));

create table CategoriaProductos(idCategoriaProducto int not null auto_increment,
CategoriaProducto varchar(32) not null,
idProducto int not null,
primary key (idCategoriaProducto),
foreign key (idProducto) references Productos(idProducto));

create table TallaProducto(idTallaProducto int not null auto_increment,
tallaProducto varchar(4) not null,
idProducto int not null,
primary key (idTallaProducto),
foreign key (idProducto) references Productos(idProducto));


create table NovedadProducto(idNovedadProducto int not null auto_increment,
fechaNovedad datetime not null,
cantidadProductoNovedad int not null,
descripcionNovedad varchar (50) not null,
idEmpleados int not null,
idInventario int not null,
idProducto int not null,
primary key (idNovedadProducto),
foreign key (idProducto) references Productos(idProducto));

create table TipoNovedadProducto(idTipoNovedadProd int not null auto_increment,
tipoNovedadProducto varchar(30) not null,
idNovedadProducto int not null,
primary key (idTipoNovedadProd),
foreign key (idNovedadProducto) references NovedadProducto(idNovedadProducto));

create table Inventario(idInventario int not null auto_increment,
fechaInventario datetime not null,
cantidadProdInventario int not null,
idEmpleados int not null,
idProducto int not null,
primary key (idInventario),
foreign key (idProducto) references Productos(idProducto));

create table TipoMovimiento(idTipoMovimientoInv int not null auto_increment,
TipoMovimientoInv varchar(30) not null,
idInventario int not null,
primary key (idTipoMovimientoInv),
foreign key (idInventario) references Inventario(idInventario));

create table UbicacionInventario(idUbicacionInventario int not null auto_increment,
ubicacionInventario varchar(20) not null,
idInventario int not null,
primary key (idUbicacionInventario),
foreign key (idInventario) references Inventario(idInventario));


