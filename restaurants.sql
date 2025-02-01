-- Active: 1737679033724@@127.0.0.1@3306@apren173_anuncielo
----------------- new module restaurants -------------------

    -- create table restaurants
    CREATE TABLE restaurants (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        user_id BIGINT(20) unsigned NOT NULL,
        country_id BIGINT(20) unsigned NOT NULL,
        currency_id BIGINT(20) unsigned NOT NULL,
        active TINYINT(1) DEFAULT 1,
        url VARCHAR(255) NOT NULL,
        name VARCHAR(100) NOT NULL,
        description varchar(255),
        phone VARCHAR(20),
        whatsapp VARCHAR(20),
        address VARCHAR(255),
        email VARCHAR(255),
        facebook_url VARCHAR(255),
        instagram_url VARCHAR(255),
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (country_id) REFERENCES countries(id),
        FOREIGN KEY (currency_id) REFERENCES currencies(id),
        UNIQUE (url)
    );

    -- items
    CREATE TABLE restaurant_items (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        restaurant_id BIGINT(20) unsigned NOT NULL,
        name VARCHAR(100) NOT NULL,
        description VARCHAR(255),
        price DECIMAL(10,2) NOT NULL,
        active TINYINT(1) DEFAULT 1,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE
    );

    -- categories for restaurant items
    CREATE TABLE restaurant_categories (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        restaurant_id BIGINT(20) unsigned NOT NULL,
        name VARCHAR(100) NOT NULL,
        description TEXT,
        active TINYINT(1) DEFAULT 1,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE
    );

    -- relationship between items and categories (many to many)
    CREATE TABLE restaurant_item_categories (
        item_id BIGINT(20) unsigned NOT NULL,
        category_id BIGINT(20) unsigned NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (item_id, category_id),
        FOREIGN KEY (item_id) REFERENCES restaurant_items(id) ON DELETE CASCADE,
        FOREIGN KEY (category_id) REFERENCES restaurant_categories(id) ON DELETE CASCADE
    );


    -- create table restaurant_images
    CREATE TABLE restaurant_images (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        restaurant_id BIGINT(20) unsigned NOT NULL,
        url VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (restaurant_id) REFERENCES restaurants(id) ON DELETE CASCADE
    );

    -- create table restaurant_items_images
    CREATE TABLE restaurant_items_images (
        id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
        item_id BIGINT(20) unsigned NOT NULL,
        name VARCHAR(255) NOT NULL,
        url VARCHAR(255) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (item_id) REFERENCES restaurant_items(id) ON DELETE CASCADE
    );
