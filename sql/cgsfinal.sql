CREATE DATABASE db;
USE db;
CREATE TABLE menu (dish VARCHAR(35), price INT, vegetarian VARCHAR(5));
SHOW TABLES;
INSERT INTO menu (dish,price,vegetarian)
VALUES("C++ Carbonara", 30, "Yes");
SELECT * FROM menu;
INSERT INTO menu (dish,price,vegetarian)
VALUES("Java Jackfruit Taco", 20, "Yes");
SELECT * FROM menu;
INSERT INTO menu (dish,price,vegetarian)
VALUES("Python Panini", 16, "No");
INSERT INTO menu (dish,price,vegetarian)
VALUES("C# Cauliflower Wings", 10, "Yes");
INSERT INTO menu (dish,price,vegetarian)
VALUES("HTML Ham Hoagie", 18, "No");
INSERT INTO menu (dish,price,vegetarian)
VALUES("SQL Swedish Meatballs", 25, "No");
SELECT * FROM menu;
INSERT INTO menu (dish,price,vegetarian)
VALUES("Rust Ravioli", 30, "No");
INSERT INTO menu (dish,price,vegetarian)
VALUES("PHP Pesto Pizza", 17, "Yes");
SELECT * FROM menu;