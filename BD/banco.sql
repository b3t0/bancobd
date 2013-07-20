SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `banco` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `banco`;

-- -----------------------------------------------------
-- Table `banco`.`mybankusers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco`.`mybankusers` (
  `ncuenta` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `direccion` VARCHAR(45) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `clave` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ncuenta`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco`.`users` (
  `ncuenta` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `apellido` VARCHAR(45) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `clave` VARCHAR(45) NULL ,
  PRIMARY KEY (`ncuenta`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco`.`saldo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco`.`saldo` (
  `ncuenta` INT NOT NULL ,
  `saldo_actual` VARCHAR(45) NOT NULL ,
  `ultima_transaccion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`ncuenta`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco`.`historial`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco`.`historial` (
  `idh` INT NOT NULL ,
  `ncuenta` INT UNSIGNED NOT NULL ,
  `fecha` DATE NOT NULL ,
  `tipo_transaccion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idh`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `banco`.`mybankusers_has_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco`.`mybankusers_has_users` (
  `mybankusers_ncuenta` INT NOT NULL ,
  `users_ncuenta` INT NOT NULL ,
  PRIMARY KEY (`mybankusers_ncuenta`, `users_ncuenta`) ,
  INDEX `fk_mybankusers_has_users_mybankusers` (`mybankusers_ncuenta` ASC) ,
  INDEX `fk_mybankusers_has_users_users` (`users_ncuenta` ASC) ,
  CONSTRAINT `fk_mybankusers_has_users_mybankusers`
    FOREIGN KEY (`mybankusers_ncuenta` )
    REFERENCES `banco`.`mybankusers` (`ncuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mybankusers_has_users_users`
    FOREIGN KEY (`users_ncuenta` )
    REFERENCES `banco`.`users` (`ncuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `banco`.`saldo_has_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco`.`saldo_has_users` (
  `saldo_ncuenta` INT NOT NULL ,
  `users_ncuenta` INT NOT NULL ,
  PRIMARY KEY (`saldo_ncuenta`, `users_ncuenta`) ,
  INDEX `fk_saldo_has_users_saldo` (`saldo_ncuenta` ASC) ,
  INDEX `fk_saldo_has_users_users` (`users_ncuenta` ASC) ,
  CONSTRAINT `fk_saldo_has_users_saldo`
    FOREIGN KEY (`saldo_ncuenta` )
    REFERENCES `banco`.`saldo` (`ncuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_saldo_has_users_users`
    FOREIGN KEY (`users_ncuenta` )
    REFERENCES `banco`.`users` (`ncuenta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
