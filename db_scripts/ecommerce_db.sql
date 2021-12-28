-- File: ecommerce_db.sql
-- Create database ecommerce_db
-- Author: 1760169 - Lê Anh Tài
-- Email: leanhtai01@gmail.com
-- GitHub: https://github.com/leanhtai01/leanhtai01-ecommerce

-- drop existing user and database
DROP USER IF EXISTS 'leanhtai01'@'localhost';
DROP DATABASE IF EXISTS ecommerce_db;

-- create database and user
CREATE DATABASE IF NOT EXISTS ecommerce_db;
CREATE USER IF NOT EXISTS 'leanhtai01'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON ecommerce_db.* TO 'leanhtai01'@'localhost';
FLUSH PRIVILEGES;

USE ecommerce_db;

DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  address VARCHAR(255) NOT NULL,
  role_id INT NOT NULL,
  is_verified TINYINT NOT NULL,
  CONSTRAINT pk_users PRIMARY KEY (id),
  CONSTRAINT unq_users_email UNIQUE (email),
  CONSTRAINT unq_users_phone_number UNIQUE (phone_number)
);

DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
  id INT NOT NULL,
  role_name VARCHAR(50) NOT NULL,
  description VARCHAR(100) NOT NULL,
  CONSTRAINT pk_roles PRIMARY KEY (id),
  CONSTRAINT unq_roles_role_name UNIQUE (role_name)
);

DROP TABLE IF EXISTS tokens;
CREATE TABLE tokens (
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(100) NOT NULL,
  token TEXT NOT NULL,
  expire_date DATETIME NOT NULL,
  CONSTRAINT pk_tokens PRIMARY KEY (id)
);

DROP TABLE IF EXISTS favorites;
CREATE TABLE favorites (
  account_id INT NOT NULL,
  product_id INT NOT NULL,
  CONSTRAINT pk_favorites PRIMARY KEY (account_id, product_id)
);

DROP TABLE IF EXISTS products;
CREATE TABLE products (
  id INT NOT NULL AUTO_INCREMENT,
  category_id INT NOT NULL,
  product_name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(15, 2) NOT NULL,
  quantity_in_stock INT NOT NULL,
  create_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  is_deleted TINYINT DEFAULT 0,
  CONSTRAINT pk_products PRIMARY KEY (id)
);

DROP TABLE IF EXISTS product_images;
CREATE TABLE product_images (
  id INT NOT NULL AUTO_INCREMENT,
  product_id INT NOT NULL,
  src TEXT NOT NULL,
  CONSTRAINT pk_product_images PRIMARY KEY (id)
);

DROP TABLE IF EXISTS orders;
CREATE TABLE orders (
  id INT NOT NULL AUTO_INCREMENT,
  account_id INT NOT NULL,
  order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  ship_name VARCHAR(100),
  ship_phone_number VARCHAR(20),
  ship_address VARCHAR(255),
  status ENUM('waiting', 'canceled', 'processing', 'shipping', 'completed') NOT NULL,
  CONSTRAINT pk_orders PRIMARY KEY (id)
);

DROP TABLE IF EXISTS order_details;
CREATE TABLE order_details (
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  CONSTRAINT pk_order_details PRIMARY KEY (order_id, product_id)
);

DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  id INT NOT NULL AUTO_INCREMENT,
  category_name VARCHAR(20) NOT NULL,
  description TEXT NOT NULL,
  CONSTRAINT pk_categories PRIMARY KEY (id)
);

DROP TABLE IF EXISTS carts;
CREATE TABLE carts (
  account_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  CONSTRAINT pk_carts PRIMARY KEY (account_id, product_id)
);

DROP TABLE IF EXISTS ratings;
CREATE TABLE ratings (
  account_id INT NOT NULL,
  product_id INT NOT NULL,
  comment TEXT NOT NULL,
  create_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT pk_ratings PRIMARY KEY (account_id, product_id)
);
