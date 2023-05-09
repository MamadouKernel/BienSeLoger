-- MySQL Script generated by MySQL Workbench
-- Mon Oct 10 13:02:24 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bienseloger
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bienseloger
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bienseloger` DEFAULT CHARACTER SET utf8mb4 ;
USE `bienseloger` ;

-- -----------------------------------------------------
-- Table `bienseloger`.`T_CATEGORIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienseloger`.`T_CATEGORIE` (
  `idT_CATEGORIE` INT NOT NULL AUTO_INCREMENT,
  `Libelle` VARCHAR(255) NULL,
  PRIMARY KEY (`idT_CATEGORIE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bienseloger`.`T_AGENT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienseloger`.`T_AGENT` (
  `idT_AGENT` INT NOT NULL AUTO_INCREMENT,
  `NomPrenom` VARCHAR(255) NULL,
  `Email` VARCHAR(255) NULL,
  `Password` VARCHAR(255) NULL,
  `Tel` VARCHAR(255) NULL,
  `Commune` VARCHAR(255) NULL,
  `Role` VARCHAR(255) NULL,
  PRIMARY KEY (`idT_AGENT`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bienseloger`.`T_PRODUIT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienseloger`.`T_PRODUIT` (
  `idT_PRODUIT` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(255) NULL,
  `Prix` VARCHAR(255) NULL,
  `Statut` VARCHAR(255) NULL,
  `LinkMap` VARCHAR(255) NULL,
  `Commune` VARCHAR(255) NULL,
  `Quartier` VARCHAR(255) NULL,
  `Nb_chambres` VARCHAR(255) NULL,
  `Espaces` VARCHAR(255) NULL,
  `Garages` VARCHAR(255) NULL,
  `Salle_bain` VARCHAR(255) NULL,
  `Cuisines` VARCHAR(255) NULL,
  `Salon` VARCHAR(255) NULL,
  `Etat` VARCHAR(45) NULL,
  `idT_CATEGORIE` INT NOT NULL,
  `idT_AGENT` INT NOT NULL,
  PRIMARY KEY (`idT_PRODUIT`),
  INDEX `fk_T_PRODUIT_T_CATEGORIE_idx` (`idT_CATEGORIE` ASC),
  INDEX `fk_T_PRODUIT_T_AGENT1_idx` (`idT_AGENT` ASC),
  CONSTRAINT `fk_T_PRODUIT_T_CATEGORIE`
    FOREIGN KEY (`idT_CATEGORIE`)
    REFERENCES `bienseloger`.`T_CATEGORIE` (`idT_CATEGORIE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_T_PRODUIT_T_AGENT1`
    FOREIGN KEY (`idT_AGENT`)
    REFERENCES `bienseloger`.`T_AGENT` (`idT_AGENT`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bienseloger`.`T_COMMANDE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienseloger`.`T_COMMANDE` (
  `idT_COMMANDE` INT NOT NULL AUTO_INCREMENT,
  `Date` VARCHAR(255) NULL,
  `Libelle` VARCHAR(255) NULL,
  `idT_PRODUIT` INT NOT NULL,
  PRIMARY KEY (`idT_COMMANDE`),
  INDEX `fk_T_COMMANDE_T_PRODUIT1_idx` (`idT_PRODUIT` ASC),
  CONSTRAINT `fk_T_COMMANDE_T_PRODUIT1`
    FOREIGN KEY (`idT_PRODUIT`)
    REFERENCES `bienseloger`.`T_PRODUIT` (`idT_PRODUIT`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bienseloger`.`T_CLIENT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienseloger`.`T_CLIENT` (
  `idT_CLIENT` INT NOT NULL AUTO_INCREMENT,
  `NomPrenom` VARCHAR(255) NULL,
  `Email` VARCHAR(255) NULL,
  `Telephone` VARCHAR(255) NULL,
  `idT_COMMANDE` INT NOT NULL,
  PRIMARY KEY (`idT_CLIENT`),
  INDEX `fk_T_CLIENT_T_COMMANDE1_idx` (`idT_COMMANDE` ASC),
  CONSTRAINT `fk_T_CLIENT_T_COMMANDE1`
    FOREIGN KEY (`idT_COMMANDE`)
    REFERENCES `bienseloger`.`T_COMMANDE` (`idT_COMMANDE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bienseloger`.`T_SSCATEGORIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienseloger`.`T_SSCATEGORIE` (
  `idT_SSCATEGORIE` INT NOT NULL AUTO_INCREMENT,
  `Libelle` VARCHAR(255) NULL,
  `idT_CATEGORIE` INT NOT NULL,
  PRIMARY KEY (`idT_SSCATEGORIE`),
  INDEX `fk_T_SSCATEGORIE_T_CATEGORIE1_idx` (`idT_CATEGORIE` ASC),
  CONSTRAINT `fk_T_SSCATEGORIE_T_CATEGORIE1`
    FOREIGN KEY (`idT_CATEGORIE`)
    REFERENCES `bienseloger`.`T_CATEGORIE` (`idT_CATEGORIE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;