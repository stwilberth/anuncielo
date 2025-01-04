use anuncielo;
use apren173_anuncielo;

-- tabla categorias
    CREATE TABLE categories (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description VARCHAR(255),
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

    INSERT INTO categories (name, description)
    VALUES
        ('Ropa', 'Categoría de tiendas de ropa y moda.'),
        ('Electrónica', 'Categoría de tiendas de electrónica y tecnología.'),
        ('Alimentación', 'Categoría de tiendas de alimentos y supermercados.'),
        ('Hogar y jardín', 'Categoría de tiendas de productos para el hogar y jardín.'),
        ('Juguetes', 'Categoría de tiendas de juguetes y juegos.'),
        ('Salud y belleza', 'Categoría de tiendas de productos de salud y belleza.'),
        ('Deportes y aire libre', 'Categoría de tiendas de artículos deportivos y actividades al aire libre.'),
        ('Automóviles y motocicletas', 'Categoría de tiendas de vehículos y accesorios.'),
        ('Libros y entretenimiento', 'Categoría de tiendas de libros y productos de entretenimiento.'),
        ('Tecnología', 'Categoría de tiendas de productos tecnológicos y electrónicos.'),
        ('Mascotas', 'Categoría de tiendas de productos para mascotas.'),
        ('Otros', 'Categoría de tiendas de otros productos.'),
        ('Servicios', 'Categoría de tiendas de servicios.'),
        ('Eventos', 'Categoría de tiendas de eventos.'),
        ('Cursos', 'Categoría de tiendas de cursos.'),
        ('Viajes', 'Categoría de tiendas de viajes.'),
        ('Arte', 'Categoría de tiendas de arte.'),
        ('Otros', 'Categoría de tiendas de otros servicios.');

-- tabla stores
    CREATE TABLE stores (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        payment_methods VARCHAR(255) NOT NULL,
        shipping_methods VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        user_id BIGINT(20) unsigned NOT NULL,
        phone VARCHAR(20),
        whatsapp VARCHAR(20) NOT NULL,
        country VARCHAR(10) NOT NULL,
        address VARCHAR(255) NOT NULL,
        physical TINYINT(1) NOT NULL,
        email VARCHAR(255) NOT NULL,
        facebook_url VARCHAR(255),
        instagram_url VARCHAR(255),
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id),
        UNIQUE (url)
    );

-- insertar tienda de prueba
    INSERT INTO stores (name, description, payment_methods, shipping_methods, url, user_id, phone, whatsapp, country, address, physical, email, facebook_url, instagram_url)
    VALUES
        ('Tienda de prueba', 'descripcion', 'metodos de pago', 'metodos de envio', 'tienda-de-prueba', 1, '123456789', '123456789', 'CR', 'Calle 123', 1, 'stwilberth@gmail.com', 'https://facebook.com', 'https://instagram.com');

-- store users
    CREATE TABLE store_users (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        store_id BIGINT(20) unsigned NOT NULL,
        user_id BIGINT(20) unsigned NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (store_id) REFERENCES stores(id),
        FOREIGN KEY (user_id) REFERENCES users(id)
    );


    -- insertar store user de prueba
    INSERT INTO store_users (store_id, user_id)
    VALUES
        (1, 1);

-- store permissions
    CREATE TABLE store_permissions (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description VARCHAR(255),
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

    -- insertar permisos de prueba
    INSERT INTO store_permissions (name, description)
    VALUES
        ('Editar tienda', 'Permite editar la tienda.'),
        ('Crear productos', 'Permite crear productos en la tienda.'),
        ('Editar productos', 'Permite editar productos de la tienda.'),
        ('Eliminar productos', 'Permite eliminar productos de la tienda.');

-- store_user_permissions
    CREATE TABLE store_user_permissions (
        store_user_id BIGINT(20) unsigned NOT NULL,
        store_permission_id BIGINT(20) unsigned NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (store_user_id) REFERENCES store_users(id),
        FOREIGN KEY (store_permission_id) REFERENCES store_permissions(id)
    );

    -- insertar permisos de prueba
    INSERT INTO store_user_permissions (store_user_id, store_permission_id)
    VALUES
        (1, 1),
        (1, 2),
        (1, 3),
        (1, 4);

-- tabla de productos
    CREATE TABLE products (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        url VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        description VARCHAR(255),
        price DECIMAL(10,2) NOT NULL,
        store_id BIGINT(20) unsigned NOT NULL,
        category_id BIGINT(20) unsigned NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (store_id) REFERENCES stores(id),
        FOREIGN KEY (category_id) REFERENCES categories(id),
        UNIQUE KEY unique_store_url (store_id, url)
    );


    use anuncielo;
    --add column url not NULL
    ALTER TABLE products ADD url VARCHAR(255) NOT NULL AFTER name;

    -- add column public bit not NULL
    ALTER TABLE products ADD public BIT NOT NULL DEFAULT 1 AFTER category_id;

    -- modificar nombre public a published
    ALTER TABLE products CHANGE public published BIT NOT NULL DEFAULT 1;

    -- add user_id column
    ALTER TABLE products ADD user_id BIGINT(20) unsigned NOT NULL AFTER stock;
    -- add user_id 1 a todos los productos
    UPDATE products SET user_id = 1;
    --add foreign key
    ALTER TABLE products ADD FOREIGN KEY (user_id) REFERENCES users(id);

    -- add column stock INt positive not NULL
    ALTER TABLE products ADD stock INT UNSIGNED NOT NULL DEFAULT 1 AFTER public;

    -- cambiar DESCRIPTION a TEXT
    ALTER TABLE products CHANGE description description TEXT;







    -- insertar producto de prueba
    INSERT INTO products (name, url, description, price, store_id, category_id)
    VALUES
        ('Producto de prueba', 'producto-de-prueba', 'Descripción de producto de prueba', 1000, 1, 1),
        ('Producto de prueba 2', 'producto-de-prueba-2', 'Descripción de producto de prueba 2', 2000, 1, 1),
        ('Producto de prueba 3', 'producto-de-prueba-3', 'Descripción de producto de prueba 3', 3000, 1, 1),
        ('Producto de prueba 4', 'producto-de-prueba-4', 'Descripción de producto de prueba 4', 4000, 1, 1),
        ('Producto de prueba 5', 'producto-de-prueba-5', 'Descripción de producto de prueba 5', 5000, 1, 1),
        ('Producto de prueba 6', 'producto-de-prueba-6', 'Descripción de producto de prueba 6', 6000, 1, 1),
        ('Producto de prueba 7', 'producto-de-prueba-7', 'Descripción de producto de prueba 7', 7000, 1, 1),
        ('Producto de prueba 8', 'producto-de-prueba-8', 'Descripción de producto de prueba 8', 8000, 1, 1),
        ('Producto de prueba 9', 'producto-de-prueba-9', 'Descripción de producto de prueba 9', 9000, 1, 1),
        ('Producto de prueba 10', 'producto-de-prueba-10', 'Descripción de producto de prueba 10', 10000, 1, 1),
        ('Producto de prueba 11', 'producto-de-prueba-11', 'Descripción de producto de prueba 11', 11000, 1, 1),
        ('Producto de prueba 12', 'producto-de-prueba-12', 'Descripción de producto de prueba 12', 12000, 1, 1),
        ('Producto de prueba 13', 'producto-de-prueba-13', 'Descripción de producto de prueba 13', 13000, 1, 1),
        ('Producto de prueba 14', 'producto-de-prueba-14', 'Descripción de producto de prueba 14', 14000, 1, 1),
        ('Producto de prueba 15', 'producto-de-prueba-15', 'Descripción de producto de prueba 15', 15000, 1, 1);

-- ProductImage
    CREATE TABLE product_images (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        product_id BIGINT(20) unsigned NOT NULL,
        url VARCHAR(255) NOT NULL,
        type int(1) NOT NULL DEFAULT 0,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (product_id) REFERENCES products(id)
    );

    -- combinacion url y product_id unica
    ALTER TABLE product_images ADD UNIQUE KEY unique_product_image_url (product_id, url);


    -- add column aspect_ratio tynint NULL
    ALTER TABLE product_images ADD aspect_ratio TINYINT(1) NOT NULL after type;

    -- the column aspect_ratio cant be cero
    ALTER TABLE product_images MODIFY aspect_ratio TINYINT(1) NOT NULL DEFAULT 1;

-- crear tabla store_images con par unico de store_id y url
    CREATE TABLE store_images (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        store_id BIGINT(20) unsigned NOT NULL,
        url VARCHAR(255) NOT NULL,
        type int(1) NOT NULL DEFAULT 0,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (store_id) REFERENCES stores(id)
    );

    -- combinacion url y store_id unica
    ALTER TABLE store_images ADD UNIQUE KEY unique_store_image_url (store_id, url);

    -- add column aspect_ratio tynint NULL
    ALTER TABLE store_images ADD aspect_ratio TINYINT(1) NOT NULL after type;








-- crear tabla ads

    CREATE TABLE ads (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description VARCHAR(255),
        price DECIMAL(10,2) NOT NULL,
        currency VARCHAR(3) NOT NULL,
        url VARCHAR(255) NOT NULL,
        category_id BIGINT(20) unsigned NOT NULL,
        user_id BIGINT(20) unsigned NOT NULL,
        -- store_id BIGINT(20) unsigned NOT NULL,
        -- business_id BIGINT(20) unsigned NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

    -- add column store_id and this can be NULL
    ALTER TABLE ads ADD store_id BIGINT(20) unsigned NULL after user_id;

    -- crear tabla store_images con par unico de store_id y url
    CREATE TABLE ad_images (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        ad_id BIGINT(20) unsigned NOT NULL,
        url VARCHAR(255) NOT NULL,
        type int(1) NOT NULL DEFAULT 0,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (ad_id) REFERENCES ads(id)
    );

    -- combinacion url y ads_id unica
    ALTER TABLE ad_images ADD UNIQUE KEY unique_ad_image_url (ad_id, url);

    -- add column aspect_ratio tynint NULL
    ALTER TABLE ad_images ADD aspect_ratio TINYINT(1) NOT NULL after type;

    -- the column aspect_ratio cant be cero
    ALTER TABLE ad_images MODIFY aspect_ratio TINYINT(1) NOT NULL DEFAULT 1;

-- crear tabla countries
    CREATE TABLE countries (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        iso_code CHAR(2) NOT NULL,
        currency_code CHAR(3) NOT NULL,
        currency_symbol VARCHAR(5) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        UNIQUE KEY unique_iso_code (iso_code)
    );

    INSERT INTO countries (name, iso_code, currency_code, currency_symbol) VALUES
        ('Argentina', 'AR', 'ARS', '$'),
        ('Bolivia', 'BO', 'BOB', 'Bs.'),
        ('Chile', 'CL', 'CLP', '$'),
        ('Colombia', 'CO', 'COP', '$'),
        ('Costa Rica', 'CR', 'CRC', '₡'),
        ('Cuba', 'CU', 'CUP', '₱'),
        ('Ecuador', 'EC', 'USD', '$'),
        ('El Salvador', 'SV', 'USD', '$'),
        ('Guatemala', 'GT', 'GTQ', 'Q'),
        ('Honduras', 'HN', 'HNL', 'L'),
        ('México', 'MX', 'MXN', '$'),
        ('Nicaragua', 'NI', 'NIO', 'C$'),
        ('Panamá', 'PA', 'PAB', 'B/.'),
        ('Paraguay', 'PY', 'PYG', '₲'),
        ('Perú', 'PE', 'PEN', 'S/'),
        ('República Dominicana', 'DO', 'DOP', 'RD$'),
        ('Uruguay', 'UY', 'UYU', '$'),
        ('Venezuela', 'VE', 'VES', 'Bs.');

        -- delete column currency_code from countries
        ALTER TABLE countries DROP COLUMN currency_code;
        -- delete column currency_symbol from countries
        ALTER TABLE countries DROP COLUMN currency_symbol;

     
    -- create table currencies
    CREATE TABLE currencies (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        code CHAR(3) NOT NULL,
        symbol VARCHAR(5) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

    -- insert currencies
    INSERT INTO currencies (name, code, symbol) VALUES
        ('Costa Rica', 'CRC', '₡'),
        ('Panamá', 'PAB', 'B/.'),
        ('Nicaragua', 'NIO', 'C$'),
        ('Dólar estadounidense', 'USD', '$'),
        ('Euro', 'EUR', '€'),
        ('Peso mexicano', 'MXN', '$'),
        ('Peso colombiano', 'COP', '$'),
        ('Peso chileno', 'CLP', '$'),
        ('Sol peruano', 'PEN', 'S/'),
        ('Peso argentino', 'ARS', '$'),
        ('Real brasileño', 'BRL', 'R$'),
        ('Boliviano', 'BOB', 'Bs.'),
        ('Guaraní paraguayo', 'PYG', '₲'),
        ('Peso uruguayo', 'UYU', '$'),
        ('Bolívar venezolano', 'VES', 'Bs.');

        -- add column country_id to the stores table
        ALTER TABLE stores ADD country_id BIGINT(20) unsigned NOT NULL after user_id;

        -- add country_id value 5 to all stores
        UPDATE stores SET country_id = 5;

        -- delete column country
        ALTER TABLE stores DROP COLUMN country;

        -- add foreign key to the stores table
        ALTER TABLE stores ADD FOREIGN KEY (country_id) REFERENCES countries(id);

        -- add column currency_id to the stores table
        ALTER TABLE stores ADD currency_id BIGINT(20) unsigned NOT NULL after country_id;

        -- add currency_id value 1 to all stores
        UPDATE stores SET currency_id = 1;

        -- add foreign key to the stores table
        ALTER TABLE stores ADD FOREIGN KEY (currency_id) REFERENCES currencies(id);



















