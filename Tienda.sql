-- ========================================
-- 🗄️ BASE DE DATOS: Tienda_de_electrodomesticos
-- 📦 Compatible: MySQL 5.7+ / 8.0+ / MariaDB
-- 🔗 Diseñado para: config/Database.php + MVC Structure
-- ========================================

CREATE DATABASE IF NOT EXISTS Tienda_de_electrodomesticos 
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE Tienda_de_electrodomesticos;
drop database Tienda_de_electrodomesticos;
show tables;
-- 1️⃣ USUARIOS (Para AuthController.php, login.php, auth_guard.php)
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(120) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('Administrador', 'Empleado', 'Cliente') DEFAULT 'Cliente',
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_rol (rol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2️⃣ CLIENTES (Para ClienteController.php, clientes.php)
CREATE TABLE IF NOT EXISTS clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NULL,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    telefono VARCHAR(30),
    correo VARCHAR(120),
    direccion VARCHAR(255),
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE SET NULL ON UPDATE CASCADE,
    INDEX idx_correo (correo),
    INDEX idx_estado (estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3️⃣ CATEGORÍAS (Para CategoriaController.php, categorias.php, home.php)
CREATE TABLE IF NOT EXISTS categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_nombre (nombre),
    INDEX idx_estado (estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4️⃣ PROVEEDORES (Para ProveedorController.php, proveedores.php)
CREATE TABLE IF NOT EXISTS proveedores (
    id_proveedor INT AUTO_INCREMENT PRIMARY KEY,
    razon_social VARCHAR(150) NOT NULL,
    ruc VARCHAR(20),
    telefono VARCHAR(30),
    correo VARCHAR(120),
    direccion VARCHAR(255),
    estado ENUM('Activo', 'Inactivo') DEFAULT 'Activo',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_ruc (ruc),
    INDEX idx_correo (correo),
    INDEX idx_estado (estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5️⃣ PRODUCTOS (Para ProductoController.php, productos.php, home.php)
CREATE TABLE IF NOT EXISTS productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT NULL,
    id_proveedor INT NULL,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    stock INT NOT NULL DEFAULT 0,
    imagen VARCHAR(255) DEFAULT NULL,
    estado ENUM('Disponible', 'Agotado', 'Inactivo') DEFAULT 'Disponible',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (id_proveedor) REFERENCES proveedores(id_proveedor) ON DELETE SET NULL ON UPDATE CASCADE,
    INDEX idx_categoria (id_categoria),
    INDEX idx_proveedor (id_proveedor),
    INDEX idx_precio (precio),
    INDEX idx_estado (estado),
    INDEX idx_nombre (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6️⃣ VENTAS (Para VentaController.php, ventas.php, dashboard.php)
CREATE TABLE IF NOT EXISTS ventas (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL DEFAULT 1,
    precio_unitario DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    fecha_venta DATE NOT NULL,
    estado ENUM('Pendiente', 'Pagado', 'Anulado', 'Entregado') DEFAULT 'Pendiente',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto) ON DELETE RESTRICT ON UPDATE CASCADE,
    INDEX idx_cliente (id_cliente),
    INDEX idx_producto (id_producto),
    INDEX idx_fecha (fecha_venta),
    INDEX idx_estado (estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7️⃣ PAGOS (Para PagoController.php, pagos.php, dashboard.php)
CREATE TABLE IF NOT EXISTS pagos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    id_venta INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    metodo_pago ENUM('Efectivo', 'Tarjeta', 'Yape', 'Plin', 'Transferencia') NOT NULL,
    fecha_pago DATE NOT NULL,
    estado ENUM('Pagado', 'Pendiente', 'Anulado') DEFAULT 'Pagado',
    observacion TEXT,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_venta) REFERENCES ventas(id_venta) ON DELETE CASCADE ON UPDATE CASCADE,
    INDEX idx_venta (id_venta),
    INDEX idx_metodo (metodo_pago),
    INDEX idx_fecha (fecha_pago),
    INDEX idx_estado (estado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- 🌱 DATOS DE PRUEBA (SEED DATA)
-- ========================================

-- 🔐 Usuarios (Contraseña por defecto: password123)
INSERT INTO usuarios (nombre, email, password, rol) VALUES
('Administrador', 'admin@electrohogar.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrador'),
('Vendedor Demo', 'vendedor@electrohogar.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Empleado'),
('Cliente Público', 'cliente@demo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Cliente');

-- 👥 Clientes
INSERT INTO clientes (id_usuario, nombres, apellidos, telefono, correo, direccion) VALUES
(3, 'Juan Carlos', 'Pérez López', '987654321', 'juan.perez@email.com', 'Av. Principal 123, Lima'),
(NULL, 'María Elena', 'García Ruiz', '912345678', 'maria.garcia@email.com', 'Jr. Comercio 456, Arequipa'),
(NULL, 'Carlos Alberto', 'Mendoza Vega', '999888777', 'carlos.mendoza@email.com', 'Urb. Los Olivos 789, Callao');

-- 📂 Categorías
INSERT INTO categorias (nombre, descripcion) VALUES
('Televisores', 'Smart TV, LED, 4K, OLED y QLED'),
('Línea Blanca', 'Refrigeradoras, lavadoras, secadoras y cocinas integradas'),
('Cocina Pequeña', 'Microondas, licuadoras, ollas eléctricas y cafeteras'),
('Climatización', 'Aires acondicionados, ventiladores y calefactores'),
('Audio y Video', 'Parlantes, soundbars, proyectores y sistemas de sonido');

-- 🏭 Proveedores
INSERT INTO proveedores (razon_social, ruc, telefono, correo, direccion) VALUES
('ElectroPerú Distribuciones S.A.C.', '20123456789', '(01) 555-1234', 'ventas@electroperu.com', 'Av. Industrial 789, Callao'),
('Importaciones Globales E.I.R.L.', '20987654321', '(01) 555-5678', 'contacto@importglobales.com', 'Calle Los Olivos 456, San Juan de Lurigancho'),
('Tecnología Andina S.A.', '20543216789', '(084) 22-3344', 'pedidos@tecandina.com', 'Av. La Cultura 102, Cusco');

-- 📦 Productos (Precios y stock reales para pruebas)
INSERT INTO productos (id_categoria, id_proveedor, nombre, descripcion, precio, stock, imagen, estado) VALUES
(1, 1, 'Smart TV 55" 4K UHD', 'Televisor inteligente con HDR10, WiFi, Bluetooth y control por voz.', 1899.00, 15, 'tv-55-4k.jpg', 'Disponible'),
(2, 1, 'Refrigeradora Inverter 350L', 'Refrigeradora de 2 puertas con tecnología inverter y bajo consumo energético.', 2499.00, 8, 'refri-inverter.jpg', 'Disponible'),
(2, 2, 'Lavadora Automática 12kg', 'Lavadora de carga frontal con 15 programas de lavado y tecnología eco-friendly.', 1599.00, 12, 'lavadora-12kg.jpg', 'Disponible'),
(3, 2, 'Microondas Digital 30L', 'Microondas con grill, descongelado automático y panel táctil LED.', 349.00, 25, 'microondas-30l.jpg', 'Disponible'),
(4, 3, 'Aire Acondicionado Split 12000 BTU', 'Aire acondicionado frío/calor con control remoto, modo silencioso y WiFi.', 1299.00, 10, 'aire-split.jpg', 'Disponible'),
(3, 1, 'Licuadora Profesional 1500W', 'Licuadora de alta potencia con vasos de vidrio templado y 5 velocidades.', 189.00, 0, 'licuadora-pro.jpg', 'Agotado'),
(5, 3, 'Soundbar 2.1 Canales 300W', 'Barra de sonido con subwoofer inalámbrico, HDMI ARC y conectividad Bluetooth 5.0.', 599.00, 20, 'soundbar-21.jpg', 'Disponible'),
(1, 2, 'Smart TV 32" HD', 'Televisor LED inteligente ideal para dormitorios o espacios reducidos.', 799.00, 30, 'tv-32-hd.jpg', 'Disponible');

-- 🛒 Ventas de ejemplo
INSERT INTO ventas (id_cliente, id_producto, cantidad, precio_unitario, total, fecha_venta, estado) VALUES
(1, 1, 1, 1899.00, 1899.00, '2026-05-10', 'Pagado'),
(1, 4, 2, 349.00, 698.00, '2026-05-12', 'Pagado'),
(2, 2, 1, 2499.00, 2499.00, '2026-05-14', 'Pendiente'),
(2, 5, 1, 1299.00, 1299.00, '2026-05-15', 'Pagado'),
(3, 7, 1, 599.00, 599.00, '2026-05-16', 'Anulado'),
(1, 8, 2, 799.00, 1598.00, '2026-05-17', 'Entregado');

-- 💰 Pagos de ejemplo
INSERT INTO pagos (id_venta, monto, metodo_pago, fecha_pago, estado, observacion) VALUES
(1, 1899.00, 'Tarjeta', '2026-05-10', 'Pagado', 'Pago procesado correctamente con visa'),
(2, 698.00, 'Yape', '2026-05-12', 'Pagado', 'Confirmado por app móvil'),
(3, 2499.00, 'Transferencia', '2026-05-14', 'Pendiente', 'Esperando comprobante bancario'),
(4, 1299.00, 'Efectivo', '2026-05-15', 'Pagado', 'Contra entrega'),
(5, 599.00, 'Plin', '2026-05-16', 'Anulado', 'Pago revertido por cancelación de cliente'),
(6, 1598.00, 'Tarjeta', '2026-05-17', 'Pagado', '2 cuotas sin intereses');

