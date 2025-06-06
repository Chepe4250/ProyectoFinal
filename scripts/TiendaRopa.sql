-- Crear la base de datos
CREATE DATABASE TiendaRopa;
USE TiendaRopa;

-- Tabla de Marcas
CREATE TABLE Marcas (
    id_marca INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    pais_origen VARCHAR(50) NOT NULL
);

-- Tabla de Prendas
CREATE TABLE Prendas (
    id_prenda INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    talla VARCHAR(10) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    id_marca INT,
    FOREIGN KEY (id_marca) REFERENCES Marcas(id_marca)
);

-- Tabla de Ventas
CREATE TABLE Ventas (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,
    id_prenda INT,
    cantidad INT NOT NULL,
    fecha DATE NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_prenda) REFERENCES Prendas(id_prenda)
);

-- Insertar datos ficticios en Marcas
INSERT INTO Marcas (nombre, pais_origen) VALUES
('Nike', 'Estados Unidos'),
('Adidas', 'Alemania'),
('Puma', 'Alemania'),
('Zara', 'España'),
('H&M', 'Suecia');

-- Insertar datos ficticios en Prendas
INSERT INTO Prendas (nombre, tipo, talla, precio, stock, id_marca) VALUES
('Camiseta deportiva', 'Camiseta', 'M', 29.99, 50, 1),
('Botas trekking', 'Calzado', '44', 99.99, 30, 2),
('Pantalón deportivo', 'Pantalón', 'L', 49.99, 40, 3),
('Chaqueta casual', 'Chaqueta', 'XL', 89.99, 25, 4),
('Vestido verano', 'Vestido', 'S', 59.99, 20, 5);

-- Insertar datos ficticios en Ventas
INSERT INTO Ventas (id_prenda, cantidad, fecha, total) VALUES
(1, 2, '2024-09-20', 59.98),
(2, 1, '2024-09-21', 79.99),
(3, 3, '2024-09-22', 149.97),
(4, 1, '2024-09-23', 89.99),
(5, 2, '2024-09-24', 119.98);

-- Eliminar un dato de la tabla Ventas
DELETE FROM Ventas WHERE id_venta = 2;

-- Actualizar la segunda fila de la tabla Prendas
UPDATE Prendas SET nombre = 'Botas trekking', tipo = 'Calzado', talla = '44', precio = 99.99, id_marca = 2 WHERE id_prenda = 2;

-- Consulta para obtener la cantidad vendida de prendas por fecha y filtrarla con una fecha específica
SELECT fecha, SUM(cantidad) AS cantidad_total
FROM Ventas
WHERE fecha = '2024-09-22'
GROUP BY fecha;

--MAS DATOS--
INSERT INTO Marcas (nombre, pais_origen) VALUES
('Under Armour', 'Estados Unidos'),
('Reebok', 'Reino Unido'),
('Levis', 'Estados Unidos'),
('Gucci', 'Italia'),
('Versace', 'Italia');

INSERT INTO Prendas (nombre, tipo, talla, precio, stock, id_marca) VALUES
('Sudadera con capucha', 'Sudadera', 'M', 45.99, 35, 6),
('Zapatillas urbanas', 'Calzado', '42', 79.99, 20, 7),
('Jeans clásicos', 'Pantalón', '32', 59.99, 30, 8),
('Bolso de cuero', 'Accesorio', 'Único', 199.99, 15, 9),
('Camisa elegante', 'Camisa', 'L', 89.99, 25, 10);

INSERT INTO Ventas (id_prenda, cantidad, fecha, total) VALUES
(8, 2, '2024-09-24', 91.98),
(9, 1, '2024-09-25', 79.99),
(10, 2, '2024-09-26', 119.98),
(11, 1, '2024-09-27', 199.99),
(12, 1, '2024-09-28', 89.99);

--VISTAS--
-- Consulta para obtener la lista de todas las marcas que tienen al menos una venta
CREATE VIEW MarcasConVentas AS
SELECT DISTINCT Marcas.nombre
FROM Marcas
JOIN Prendas ON Marcas.id_marca = Prendas.id_marca
JOIN Ventas ON Prendas.id_prenda = Ventas.id_prenda;

-- Consulta para obtener la cantidad de prendas vendidas y su cantidad restante en stock
CREATE VIEW PrendasStockVendidas AS
SELECT Prendas.id_prenda, Prendas.nombre, 
       COALESCE(SUM(Ventas.cantidad), 0) AS cantidad_vendida,
       Prendas.stock - COALESCE(SUM(Ventas.cantidad), 0) AS stock_restante
FROM Prendas
LEFT JOIN Ventas ON Prendas.id_prenda = Ventas.id_prenda
GROUP BY Prendas.id_prenda, Prendas.nombre, Prendas.stock;

-- Consulta para obtener el listado de las 5 marcas más vendidas y su cantidad de ventas
CREATE VIEW MarcasMasVendidas AS
SELECT Marcas.nombre, SUM(Ventas.cantidad) AS total_vendido
FROM Marcas
JOIN Prendas ON Marcas.id_marca = Prendas.id_marca
JOIN Ventas ON Prendas.id_prenda = Ventas.id_prenda
GROUP BY Marcas.nombre
ORDER BY total_vendido DESC
LIMIT 5;


