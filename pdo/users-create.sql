-- создание базы данных
CREATE DATABASE IF NOT EXISTS users;

-- выбор БД для дальнейшего использования
USE users;

-- создание таблицы
CREATE TABLE IF NOT EXISTS reg_users(
     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     login VARCHAR(100) NOT NULL UNIQUE,
     password VARCHAR(100) NOT NULL
);