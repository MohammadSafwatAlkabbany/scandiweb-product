CREATE DATABASE SCANDIPRODUCT;

CREATE TABLE PRODUCTS(
    id INT PRIMARY KEY AUTO_INCREMENT,
    sku VARCHAR(60) NOT NULL,
    name VARCHAR(60),
    price DECIMAL(11,2),
    size DECIMAL(11,2),
    height DECIMAL(11,2),
    length DECIMAL(11,2),
    width DECIMAL(11,2),
    weight DECIMAL(11,2)

);