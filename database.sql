CREATE TABLE laboratorios(
	id_laboratorio 	int(10) auto_increment not null,
	nombre_lab		varchar(50) not null,
	ruc_lab 		int(10),
	direccion_lab 	varchar(100),
	celular_lab 	int(11),
	CONSTRAINT pk_laboratorios PRIMARY KEY(id_laboratorio)
)Engine=InnoDB;

CREATE TABLE tipos_usuarios(
	id_tipo_usu 	int(10) auto_increment not null,
	descripcion 	varchar(20) not null,
	CONSTRAINT pk_tipos_usuarios PRIMARY KEY(id_tipo_usu)
)Engine=InnoDB;

CREATE TABLE usuarios(
	id_usuario		int(10) auto_increment not null,
	dni_usu			int(10) not null,
	nombre_usu		varchar(50) not null,
	apellido_usu	varchar(50) not null,
	celular			int(11),
	correo_usu		varchar(50),
	nick_usu		varchar(30),
	password_usu	varchar(70),
	id_tipo_usu		int(10),
	CONSTRAINT pk_usuarios PRIMARY KEY(id_usuario),
	CONSTRAINT fk_usuarios_tipos_usuarios FOREIGN KEY(id_tipo_usu) REFERENCES tipos_usuarios(id_tipo_usu)
)Engine=InnoDB;


CREATE TABLE productos_farmaceuticos(
	id_producto		int(10) auto_increment not null,
	descripcion_pro	varchar(50) not null,
	estado_pro		int(1),
	fecha_reg		date,
	fecha_venci_pro	date,
	num_pro			int(11),
	precioc_pro		double(10,2),
	preciov_pro		double(10,2),
	stock_min_pro	int(10),
	stock_pro		int(10),
	CONSTRAINT pk_productos_farmaceuticos PRIMARY KEY(id_producto)
)Engine=InnoDB;

CREATE TABLE presentaciones(
	id_presentacion int(10) auto_increment not null,
	nombre 			varchar(20) not null,
	CONSTRAINT pk_presentaciones PRIMARY KEY(id_presentacion)
)Engine=InnoDB;

CREATE TABLE clientes(
	id_cli 			int(10) auto_increment not null,
	nombre_cli 		varchar(50) not null,
	apellido_cli 	varchar(50),
	dni_cli 		int(10) not null,
	celular 		int(11),
	direccion 		varchar(100),
	CONSTRAINT pk_clientes PRIMARY KEY(id_cli)
)Engine=InnoDB;

CREATE TABLE productos_laboratorios(
	id_prod_lab	int(10) auto_increment not null,
	id_producto	int(10),
	id_laboratorio	int(10),
	CONSTRAINT pk_productos_laboratorios PRIMARY KEY(id_prod_lab),
	CONSTRAINT fk_prod_lab_prod_farm FOREIGN KEY(id_producto) REFERENCES productos_farmaceuticos(id_producto),
	CONSTRAINT fk_prod_lab_laboratorio FOREIGN KEY(id_laboratorio) REFERENCES laboratorios(id_laboratorio)
)Engine=InnoDB;

CREATE TABLE productos_presentaciones(
	id_prod_pres	int(10) auto_increment not null,
	id_producto		int(10),
	id_presentacion	int(10),
	CONSTRAINT pk_productos_presentaciones PRIMARY KEY(id_prod_pres),
	CONSTRAINT fk_prod_pres_prod_farm FOREIGN KEY(id_producto) REFERENCES productos_farmaceuticos(id_producto),
	CONSTRAINT fk_prod_pres_presentacion FOREIGN KEY(id_presentacion) REFERENCES presentaciones(id_presentacion)
)Engine=InnoDB;

CREATE TABLE comprobantes_ventas(
	id_venta 		int(10) auto_increment not null,
	num_venta 		int(10),
	efectivo_venta 	double(10,2),
	total_venta 	double(10,2),
	subtotal_venta 	double(10,2),
	igv_venta 		double(10,2),
	vuelto_venta 	double(10,2),
	fecha_venta 	date,
	id_usuario 		int(10),
	id_cli 			int(10),
	CONSTRAINT pk_comprobantes_ventas PRIMARY KEY(id_venta),
	CONSTRAINT fk_comprobantes_ventas_usuarios FOREIGN KEY(id_usuario) REFERENCES usuarios(id_usuario),
	CONSTRAINT fk_comprobantes_ventas_clientes FOREIGN KEY(id_cli) REFERENCES clientes(id_cli)
)Engine=InnoDB;

CREATE TABLE detalles_comprobantes(
	id_detalle 			int(10) auto_increment not null,
	cantidad 			int(10),
	importe 			double(10,2),
	precio 				double(10,2),
	subtotal 			double(10,2),
	id_producto 		int(10),
	id_venta 			int(10),
	CONSTRAINT pk_detalles_comprobantes PRIMARY KEY(id_detalle),
	CONSTRAINT fk_detalles_comprobantes_productos FOREIGN KEY(id_producto) REFERENCES productos_farmaceuticos(id_producto),
	CONSTRAINT fk_detalles_comprobantes_comprob_ventas FOREIGN KEY(id_venta) REFERENCES comprobantes_ventas(id_venta)
)Engine=InnoDB;