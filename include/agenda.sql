-- MySQL Script generated by MySQL Workbench
-- Ter 19 Dez 2017 23:36:31 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema unaux_21268251_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema unaux_21268251_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `unaux_21268251_db` DEFAULT CHARACTER SET utf8 ;
USE `unaux_21268251_db` ;

-- -----------------------------------------------------
-- Table `unaux_21268251_db`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unaux_21268251_db`.`pais` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(3) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `unaux_21268251_db`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unaux_21268251_db`.`estado` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NULL,
  `uf` VARCHAR(3) NULL,
  `pais` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_estado_pais_idx` (`pais` ASC),
  CONSTRAINT `fk_estado_pais`
    FOREIGN KEY (`pais`)
    REFERENCES `unaux_21268251_db`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `unaux_21268251_db`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unaux_21268251_db`.`cidade` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NULL,
  `estado` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cidade_estado_idx` (`estado` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_cidade_estado`
    FOREIGN KEY (`estado`)
    REFERENCES `unaux_21268251_db`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `unaux_21268251_db`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unaux_21268251_db`.`empresa` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `cnpj` VARCHAR(45) NULL,
  `endereco` VARCHAR(100) NULL,
  `bairro` VARCHAR(45) NULL,
  `numero` VARCHAR(45) NULL,
  `cidade` INT UNSIGNED NULL,
  `estado` INT UNSIGNED NULL,
  `telefone1` VARCHAR(45) NULL,
  `telefone2` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_empresa_cidade_idx` (`cidade` ASC),
  INDEX `fk_empresa_estado_idx` (`estado` ASC),
  CONSTRAINT `fk_empresa_cidade`
    FOREIGN KEY (`cidade`)
    REFERENCES `unaux_21268251_db`.`cidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_estado`
    FOREIGN KEY (`estado`)
    REFERENCES `unaux_21268251_db`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `unaux_21268251_db`.`banco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unaux_21268251_db`.`banco` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `unaux_21268251_db`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unaux_21268251_db`.`cliente` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NULL,
  `rg` VARCHAR(45) NULL,
  `empresa` INT UNSIGNED NULL,
  `telefone1` VARCHAR(45) NULL,
  `telefone2` VARCHAR(45) NULL,
  `telefone3` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL DEFAULT '',
  `banco` INT UNSIGNED NULL,
  `agencia` VARCHAR(45) NULL,
  `conta` VARCHAR(45) NULL,
  `observacao` VARCHAR(500) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_cliente_empresa_idx` (`empresa` ASC),
  INDEX `fk_cliente_banco_idx` (`banco` ASC),
  CONSTRAINT `fk_cliente_empresa`
    FOREIGN KEY (`empresa`)
    REFERENCES `unaux_21268251_db`.`empresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_banco`
    FOREIGN KEY (`banco`)
    REFERENCES `unaux_21268251_db`.`banco` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `unaux_21268251_db`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unaux_21268251_db`.`usuario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NULL,
  `senha` VARCHAR(255) NULL,
  `data_criacao` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = MyISAM;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `usuario`(`id`, `nome`, `senha`) VALUES ('1','admin','$2y$10$vPCwScnZ.MCHxbbVGr.E1eSIwrRp0V91aSixt6B4bS.ESyLJfARIu');