## Simple Medical Website

### Usage

1. Download XAMPP and Install it.
2. Download this project and extract it in C:\\xampp\htdocs
3. Open XAMPP and run APACHE & MySQL
4. From XAMPP, click on ADMIN from MySQL
5. Once it opens, click on SQL tab and enter below 3 commands one by one to create tables.

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    order_name VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    order_datetime DATETIME,
    FOREIGN KEY (email) REFERENCES users(email)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL
);

6. Once done, goto http://localhost
7. Enjoy the website
