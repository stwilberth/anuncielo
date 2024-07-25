
use menux2;
-- tabla para registrar restaurantes en ingles
CREATE TABLE IF NOT EXISTS restaurants (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(100) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    web VARCHAR(100) NOT NULL,
    description VARCHAR(100) NOT NULL,
    image VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    UNIQUE (email),
    UNIQUE (phone)
);

--- add column to restaurants url
ALTER TABLE restaurants ADD COLUMN url VARCHAR(100) NOT NULL;
-- add unique to url
ALTER TABLE restaurants ADD UNIQUE (url);

-- tabla para registrar tipos de comida y bebida en ingles
CREATE TABLE IF NOT EXISTS categories (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id BIGINT NOT NULL,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);


-- tabla para registrar menus en ingles
CREATE TABLE IF NOT EXISTS menus (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id BIGINT NOT NULL,
    category_id BIGINT NOT NULL,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

--- add column to menus url
ALTER TABLE menus ADD COLUMN url VARCHAR(100) NOT NULL;
-- add unique to url
ALTER TABLE menus ADD UNIQUE (url);

---- insertar datos en la tabla de categorias
INSERT INTO categories (restaurant_id, name) VALUES (1, 'Bebidas');
INSERT INTO categories (restaurant_id, name) VALUES (1, 'Comida');
INSERT INTO categories (restaurant_id, name) VALUES (1, 'Postres');
INSERT INTO categories (restaurant_id, name) VALUES (1, 'Entradas');
INSERT INTO categories (restaurant_id, name) VALUES (1, 'Platos fuertes');


-- tabla para registrar mesas en ingles
CREATE TABLE IF NOT EXISTS tables (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    quantity_people INT NOT NULL,
    restaurant_id BIGINT NOT NULL,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);

-- tabla para los status de las ordenes en ingles
CREATE TABLE IF NOT EXISTS status (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- registros de status de las ordenes en ingles
INSERT INTO status (name) VALUES ('pending');
INSERT INTO status (name) VALUES ('completed');
INSERT INTO status (name) VALUES ('served');
INSERT INTO status (name) VALUES ('canceled');
INSERT INTO status (name) VALUES ('rejected');


-- tabla para registrar ordenes en ingles
CREATE TABLE IF NOT EXISTS orders (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    table_id BIGINT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (table_id) REFERENCES tables(id)
);

-- tabla para registrar detalles de ordenes en ingles


-- tabla en ingles para registrar imagenes
CREATE TABLE IF NOT EXISTS images (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(100) NOT NULL,
    path VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE (path)
);
