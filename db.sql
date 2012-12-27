SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Producto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Producto` (
  `idProducto` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL ,
  `url_img` VARCHAR(80) NULL ,
  `precio` DOUBLE NOT NULL ,
  `exitencia` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`idProducto`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apPat` VARCHAR(45) NOT NULL ,
  `apMat` VARCHAR(45) NULL ,
  `username` VARCHAR(30) NOT NULL ,
  `email` VARCHAR(80) NOT NULL ,
  `password` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL ,
  `fRegistro` DATETIME NOT NULL ,
  `tipo` TINYINT NOT NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Deseo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Deseo` (
  `idProducto` INT NOT NULL ,
  `idUsuario` INT NOT NULL ,
  PRIMARY KEY (`idProducto`, `idUsuario`) ,
  INDEX `fk_Producto_has_Usuario_Usuario1_idx` (`idUsuario` ASC) ,
  INDEX `fk_Producto_has_Usuario_Producto_idx` (`idProducto` ASC) ,
  CONSTRAINT `fk_Producto_has_Usuario_Producto`
    FOREIGN KEY (`idProducto` )
    REFERENCES `mydb`.`Producto` (`idProducto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_has_Usuario_Usuario1`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `mydb`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Apartado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Apartado` (
  `idProducto` INT NOT NULL ,
  `idUsuario` INT NOT NULL ,
  `fechaApartado` DATETIME NOT NULL ,
  `cantidad` TINYINT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`idProducto`, `idUsuario`) ,
  INDEX `fk_Producto_has_Usuario_Usuario2_idx` (`idUsuario` ASC) ,
  INDEX `fk_Producto_has_Usuario_Producto1_idx` (`idProducto` ASC) ,
  CONSTRAINT `fk_Producto_has_Usuario_Producto1`
    FOREIGN KEY (`idProducto` )
    REFERENCES `mydb`.`Producto` (`idProducto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_has_Usuario_Usuario2`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `mydb`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cupon`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Cupon` (
  `idCupon` INT NOT NULL AUTO_INCREMENT ,
  `fechaInicio` DATETIME NULL ,
  `fechaFin` VARCHAR(45) NULL ,
  `cantidad` DOUBLE NULL ,
  `limiteUsos` INT NULL DEFAULT 0 ,
  `usado` INT NULL DEFAULT 0 ,
  PRIMARY KEY (`idCupon`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT ,
  `nombreCategoria` VARCHAR(45) NOT NULL ,
  `categoriaPadre` INT NOT NULL ,
  PRIMARY KEY (`idCategoria`) ,
  INDEX `fk_Categoria_Categoria1_idx` (`categoriaPadre` ASC) ,
  CONSTRAINT `fk_Categoria_Categoria1`
    FOREIGN KEY (`categoriaPadre` )
    REFERENCES `mydb`.`Categoria` (`idCategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CategoriaProducto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`CategoriaProducto` (
  `idProducto` INT NOT NULL ,
  `idCategoria` INT NOT NULL ,
  PRIMARY KEY (`idProducto`, `idCategoria`) ,
  INDEX `fk_Producto_has_Categoria_Categoria1_idx` (`idCategoria` ASC) ,
  INDEX `fk_Producto_has_Categoria_Producto1_idx` (`idProducto` ASC) ,
  CONSTRAINT `fk_Producto_has_Categoria_Producto1`
    FOREIGN KEY (`idProducto` )
    REFERENCES `mydb`.`Producto` (`idProducto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_has_Categoria_Categoria1`
    FOREIGN KEY (`idCategoria` )
    REFERENCES `mydb`.`Categoria` (`idCategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Oferta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Oferta` (
  `idOferta` INT NOT NULL AUTO_INCREMENT ,
  `idProducto` INT NOT NULL ,
  `descuento` DOUBLE NOT NULL ,
  `inicioOferta` DATETIME NULL ,
  `finOferta` DATETIME NOT NULL ,
  PRIMARY KEY (`idOferta`) ,
  INDEX `fk_Oferta_Producto1_idx` (`idProducto` ASC) ,
  CONSTRAINT `fk_Oferta_Producto1`
    FOREIGN KEY (`idProducto` )
    REFERENCES `mydb`.`Producto` (`idProducto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Venta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Venta` (
  `idVenta` INT NOT NULL AUTO_INCREMENT ,
  `idComprador` INT NOT NULL ,
  `idProducto` INT NOT NULL ,
  `idCupon` INT NOT NULL ,
  `cantidad` INT NOT NULL DEFAULT 1 ,
  `fechaVenta` VARCHAR(45) NULL ,
  PRIMARY KEY (`idVenta`, `idComprador`, `idProducto`) ,
  INDEX `fk_Venta_Usuario1_idx` (`idComprador` ASC) ,
  INDEX `fk_Venta_Producto1_idx` (`idProducto` ASC) ,
  INDEX `fk_Venta_Cupon1_idx` (`idCupon` ASC) ,
  CONSTRAINT `fk_Venta_Usuario1`
    FOREIGN KEY (`idComprador` )
    REFERENCES `mydb`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Producto1`
    FOREIGN KEY (`idProducto` )
    REFERENCES `mydb`.`Producto` (`idProducto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Cupon1`
    FOREIGN KEY (`idCupon` )
    REFERENCES `mydb`.`Cupon` (`idCupon` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Etiqueta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Etiqueta` (
  `nombre` VARCHAR(50) NOT NULL ,
  `idProducto` INT NOT NULL ,
  PRIMARY KEY (`nombre`, `idProducto`) ,
  INDEX `fk_Etiqueta_Producto1_idx` (`idProducto` ASC) ,
  CONSTRAINT `fk_Etiqueta_Producto1`
    FOREIGN KEY (`idProducto` )
    REFERENCES `mydb`.`Producto` (`idProducto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
