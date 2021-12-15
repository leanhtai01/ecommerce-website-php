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

CREATE TABLE accounts (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  address VARCHAR(255) NOT NULL,
  role_id INT NOT NULL,
  CONSTRAINT pk_users PRIMARY KEY (id),
  CONSTRAINT unq_users_email UNIQUE (email),
  CONSTRAINT unq_users_phone_number UNIQUE (phone_number)
);

CREATE TABLE roles (
  id INT NOT NULL,
  role_name VARCHAR(50) NOT NULL,
  description VARCHAR(100) NOT NULL,
  CONSTRAINT pk_roles PRIMARY KEY (id),
  CONSTRAINT unq_roles_role_name UNIQUE (role_name)
);

INSERT INTO roles (id, role_name, description)
VALUES (0, 'admin', 'Administrator'),
       (1, 'user', 'Registered user'),
       (2, 'guest', 'Unregistered user');

CREATE TABLE tokens (
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(100) NOT NULL,
  token TEXT NOT NULL,
  expire_date DATETIME NOT NULL,
  CONSTRAINT pk_tokens PRIMARY KEY (id)
);
