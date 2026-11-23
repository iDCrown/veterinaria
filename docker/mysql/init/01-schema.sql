USE veterinaria;

CREATE TABLE IF NOT EXISTS clientes (
    cedula VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    direccion VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS mascota (
    id_mascota INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombreA VARCHAR(150) NOT NULL,
    raza VARCHAR(100) NOT NULL,
    fechaini DATE NOT NULL,
    tamanio VARCHAR(50) NOT NULL,
    color VARCHAR(50) NOT NULL,
    especie VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS casos (
    expediente INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NULL,
    descripcion TEXT NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (cedula) REFERENCES clientes(cedula)
);

CREATE TABLE IF NOT EXISTS abogados (
    idAbogado VARCHAR(20) PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    direccion VARCHAR(255) NOT NULL
);

CREATE OR REPLACE VIEW cliente AS
SELECT cedula, nombre, email, telefono, direccion
FROM clientes;
