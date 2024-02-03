CREATE DATABASE IF NOT EXISTS oop;

USE oop;

CREATE TABLE IF NOT EXISTS `oop`.`register` 
    (`id` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(10) NOT NULL , `surname` VARCHAR(10) NOT NULL ,
    `age` INT NOT NULL , PRIMARY KEY (`id`))
    ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;