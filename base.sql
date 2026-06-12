-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mitienda
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mitienda
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mitienda` DEFAULT CHARACTER SET utf8 ;
USE `mitienda` ;

-- -----------------------------------------------------
-- Table `mitienda`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mitienda`.`Producto` (
  `codigo` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `precio` DECIMAL(45) NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mitienda`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mitienda`.`Pedido` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Fecha` DATE NULL,
  `Estado` VARCHAR(45) NULL,
  `NombreVendedor` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mitienda`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mitienda`.`Usuario` (
  `Ci` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Direccion` VARCHAR(45) NULL,
  `Contrasena` VARCHAR(45) NULL,
  PRIMARY KEY (`Ci`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mitienda`.`Carrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mitienda`.`Carrito` (
  `Pedido_id` INT NOT NULL,
  `Producto_codigo` INT NOT NULL,
  `cantidad` INT NULL,
  `costototal` DECIMAL(3) NULL,
  PRIMARY KEY (`Pedido_id`, `Producto_codigo`),
  INDEX `fk_Pedido_has_Producto_Producto1_idx` (`Producto_codigo` ASC) VISIBLE,
  INDEX `fk_Pedido_has_Producto_Pedido_idx` (`Pedido_id` ASC) VISIBLE,
  CONSTRAINT `fk_Pedido_has_Producto_Pedido`
    FOREIGN KEY (`Pedido_id`)
    REFERENCES `mitienda`.`Pedido` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_has_Producto_Producto1`
    FOREIGN KEY (`Producto_codigo`)
    REFERENCES `mitienda`.`Producto` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
