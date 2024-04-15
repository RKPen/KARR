-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema car rental v2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema car rental v2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `car rental v2` DEFAULT CHARACTER SET utf8mb4 ;
USE `car rental v2` ;

-- -----------------------------------------------------
-- Table `car rental v2`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`employee` (
  `Employee_num` INT(11) NOT NULL,
  `Gender` VARCHAR(15) NOT NULL,
  `Nationality` VARCHAR(45) NOT NULL,
  `Postion` VARCHAR(20) NOT NULL,
  `Full_Name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Employee_num`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`car_lot`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`car_lot` (
  `Carlot_Num` INT(11) NOT NULL,
  `Employee_num` INT(11) NOT NULL,
  `Full_bool` BINARY(1) NOT NULL DEFAULT '0',
  `Location` VARCHAR(45) NOT NULL,
  `Capacity` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Carlot_Num`),
  INDEX `Employee_num` (`Employee_num` ASC) VISIBLE,
  CONSTRAINT `car_lot_ibfk_1`
    FOREIGN KEY (`Employee_num`)
    REFERENCES `car rental v2`.`employee` (`Employee_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`contract`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`contract` (
  `Contract_num` INT(11) NOT NULL,
  `Issue_date` DATE NOT NULL,
  `Date_of_return` DATE NOT NULL,
  `returned_date` DATE NOT NULL,
  `Commision` INT(11) NULL DEFAULT NULL,
  `Payment` INT(11) NOT NULL,
  PRIMARY KEY (`Contract_num`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`customer` (
  `Customer_num` INT(11) NOT NULL AUTO_INCREMENT,
  `Firstname` VARCHAR(16) NOT NULL,
  `Lastname` VARCHAR(16) NOT NULL,
  `Gender` VARCHAR(10) NOT NULL,
  `Age` INT(11) NOT NULL,
  `Email` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `Phonenumber` VARCHAR(32) NOT NULL,
  `Password` VARCHAR(32) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`Customer_num`))
ENGINE = InnoDB
AUTO_INCREMENT = 58129
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`driver_license`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`driver_license` (
  `Customer_num` INT(11) NOT NULL,
  `Issue_Date` DATE NULL DEFAULT NULL,
  `Number` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Customer_num`),
  CONSTRAINT `driver_license_ibfk_1`
    FOREIGN KEY (`Customer_num`)
    REFERENCES `car rental v2`.`customer` (`Customer_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`insurance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`insurance` (
  `Insurance_num` INT(11) NOT NULL,
  `Type` VARCHAR(20) NULL DEFAULT NULL,
  `Company` VARCHAR(20) NULL DEFAULT NULL,
  `issue_date` DATE NULL DEFAULT NULL,
  `price` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Insurance_num`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`insured`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`insured` (
  `Insurance_num` INT(11) NOT NULL,
  `Contract_num` INT(11) NOT NULL,
  `Customer_num` INT(11) NOT NULL,
  PRIMARY KEY (`Insurance_num`, `Contract_num`),
  INDEX `contracts_idx` (`Contract_num` ASC) VISIBLE,
  INDEX `cus_idx` (`Customer_num` ASC) VISIBLE,
  CONSTRAINT `insured_ibfk_1`
    FOREIGN KEY (`Contract_num`)
    REFERENCES `car rental v2`.`contract` (`Contract_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `insured_ibfk_2`
    FOREIGN KEY (`Customer_num`)
    REFERENCES `car rental v2`.`customer` (`Customer_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `insured_ibfk_3`
    FOREIGN KEY (`Insurance_num`)
    REFERENCES `car rental v2`.`insurance` (`Insurance_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`maintence`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`maintence` (
  `Request_num` INT(11) NOT NULL,
  `Plate_num` INT(11) NOT NULL,
  `Defected_parts` VARCHAR(45) NOT NULL,
  `issue_date` DATE NOT NULL,
  `Last_fixed` DATE NOT NULL,
  `Insurance_num` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Request_num`),
  INDEX `Insurance_num` (`Insurance_num` ASC) VISIBLE,
  INDEX `Plate_num` (`Plate_num` ASC) VISIBLE,
  CONSTRAINT `maintence_ibfk_1`
    FOREIGN KEY (`Insurance_num`)
    REFERENCES `car rental v2`.`insurance` (`Insurance_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `maintence_ibfk_2`
    FOREIGN KEY (`Plate_num`)
    REFERENCES `car rental v2`.`veichle` (`Plate_Num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`rent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`rent` (
  `Contract_num` INT(11) NOT NULL,
  `Plate_num` INT(11) NOT NULL,
  `Customer_num` INT(11) NOT NULL,
  `Employee_num` INT(11) NOT NULL,
  PRIMARY KEY (`Contract_num`, `Plate_num`, `Customer_num`, `Employee_num`),
  INDEX `Customer_num` (`Customer_num` ASC) VISIBLE,
  INDEX `Employee_num` (`Employee_num` ASC) VISIBLE,
  INDEX `Plate_num` (`Plate_num` ASC) VISIBLE,
  CONSTRAINT `rent_ibfk_1`
    FOREIGN KEY (`Contract_num`)
    REFERENCES `car rental v2`.`contract` (`Contract_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `rent_ibfk_2`
    FOREIGN KEY (`Customer_num`)
    REFERENCES `car rental v2`.`customer` (`Customer_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `rent_ibfk_3`
    FOREIGN KEY (`Employee_num`)
    REFERENCES `car rental v2`.`employee` (`Employee_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `rent_ibfk_4`
    FOREIGN KEY (`Plate_num`)
    REFERENCES `car rental v2`.`veichle` (`Plate_Num`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`review`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`review` (
  `Review_Id` INT(11) NOT NULL,
  `Recomendation` VARCHAR(140) NULL DEFAULT NULL,
  `Rating` INT(11) NULL DEFAULT NULL,
  `Feedback` VARCHAR(140) NULL DEFAULT NULL,
  `Customer_num` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`Review_Id`),
  INDEX `Customer_num` (`Customer_num` ASC) VISIBLE,
  CONSTRAINT `review_ibfk_1`
    FOREIGN KEY (`Customer_num`)
    REFERENCES `car rental v2`.`customer` (`Customer_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`salary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`salary` (
  `Employee_num` INT(11) NOT NULL,
  `Commision` INT(11) NULL DEFAULT NULL,
  `Wage` INT(11) NOT NULL,
  PRIMARY KEY (`Employee_num`),
  CONSTRAINT `salary_ibfk_1`
    FOREIGN KEY (`Employee_num`)
    REFERENCES `car rental v2`.`employee` (`Employee_num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`store`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`store` (
  `Carlot_Num` INT(11) NOT NULL,
  `Plate_num` INT(11) NOT NULL,
  `lot_num` INT(11) NOT NULL,
  PRIMARY KEY (`Carlot_Num`, `Plate_num`),
  INDEX `Plate_num` (`Plate_num` ASC) VISIBLE,
  CONSTRAINT `store_ibfk_1`
    FOREIGN KEY (`Carlot_Num`)
    REFERENCES `car rental v2`.`car_lot` (`Carlot_Num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `store_ibfk_2`
    FOREIGN KEY (`Plate_num`)
    REFERENCES `car rental v2`.`veichle` (`Plate_Num`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `car rental v2`.`vehicle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`vehicle` (
  `Plate_Num` INT(11) NOT NULL,
  `Price` INT(11) NOT NULL,
  `Engine` VARCHAR(45) NOT NULL,
  `Color` VARCHAR(20) NOT NULL,
  `Gas_Type` VARCHAR(15) NOT NULL,
  `Milage` INT(11) NOT NULL DEFAULT 0,
  `Available` BINARY(1) NOT NULL DEFAULT '1',
  `Brand` VARCHAR(45) NOT NULL,
  `Model` VARCHAR(45) NOT NULL,
  `Type` VARCHAR(45) NOT NULL,
  `Year` INT(11) NOT NULL,
  PRIMARY KEY (`Plate_Num`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

USE `car rental v2` ;

-- -----------------------------------------------------
-- Placeholder table for view `car rental v2`.`customerview`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`customerview` (`Customer_num` INT, `Gender` INT, `nationality` INT, `Age` INT, `Full_name` INT, `Issue_Date` INT, `Number` INT);

-- -----------------------------------------------------
-- Placeholder table for view `car rental v2`.`employeeview`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`employeeview` (`Employee_num` INT, `Gender` INT, `Nationality` INT, `Postion` INT, `Full_Name` INT, `commision` INT, `wage` INT);

-- -----------------------------------------------------
-- Placeholder table for view `car rental v2`.`rentview`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`rentview` (`Plate_num` INT, `type` INT, `brand` INT, `model` INT, `price` INT);

-- -----------------------------------------------------
-- Placeholder table for view `car rental v2`.`returnview`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`returnview` (`contract_num` INT, `Full_name` INT, `plate_num` INT, `Date_of_return` INT);

-- -----------------------------------------------------
-- Placeholder table for view `car rental v2`.`vehichleview`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`vehichleview` (`Plate_Num` INT, `Price` INT, `Engine` INT, `Color` INT, `Gas_Type` INT, `Milage` INT, `Available` INT, `Brand` INT, `Model` INT, `Type` INT, `Year` INT, `Carlot_Num` INT, `lot_num` INT);

-- -----------------------------------------------------
-- Placeholder table for view `car rental v2`.`vehicle_in_carlot`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `car rental v2`.`vehicle_in_carlot` (`Carlot_Num` INT, `location` INT, `lot_num` INT, `plate_num` INT, `brand` INT, `model` INT, `type` INT);

-- -----------------------------------------------------
-- View `car rental v2`.`customerview`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `car rental v2`.`customerview`;
USE `car rental v2`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car rental v2`.`customerview` AS select `c`.`Customer_num` AS `Customer_num`,`c`.`Gender` AS `Gender`,`c`.`nationality` AS `nationality`,`c`.`Age` AS `Age`,`c`.`Full_name` AS `Full_name`,`d`.`Issue_Date` AS `Issue_Date`,`d`.`Number` AS `Number` from (`car rental v2`.`customer` `c` join `car rental v2`.`driver_license` `d` on(`c`.`Customer_num` = `d`.`Customer_num`));

-- -----------------------------------------------------
-- View `car rental v2`.`employeeview`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `car rental v2`.`employeeview`;
USE `car rental v2`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car rental v2`.`employeeview` AS select `e`.`Employee_num` AS `Employee_num`,`e`.`Gender` AS `Gender`,`e`.`Nationality` AS `Nationality`,`e`.`Postion` AS `Postion`,`e`.`Full_Name` AS `Full_Name`,`s`.`Commision` AS `commision`,`s`.`Wage` AS `wage` from (`car rental v2`.`employee` `e` left join `car rental v2`.`salary` `s` on(`e`.`Employee_num` = `s`.`Employee_num`));

-- -----------------------------------------------------
-- View `car rental v2`.`rentview`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `car rental v2`.`rentview`;
USE `car rental v2`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car rental v2`.`rentview` AS select `v`.`Plate_Num` AS `Plate_num`,`v`.`Type` AS `type`,`v`.`Brand` AS `brand`,`v`.`Model` AS `model`,`v`.`Price` AS `price` from `car rental v2`.`vehicle` `v` where `v`.`Available` = 0;

-- -----------------------------------------------------
-- View `car rental v2`.`returnview`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `car rental v2`.`returnview`;
USE `car rental v2`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car rental v2`.`returnview` AS select `r`.`Contract_num` AS `contract_num`,`cus`.`Full_name` AS `Full_name`,`r`.`Plate_num` AS `plate_num`,`c`.`Date_of_return` AS `Date_of_return` from ((`car rental v2`.`rent` `r` join `car rental v2`.`customer` `cus` on(`r`.`Customer_num` = `cus`.`Customer_num`)) join `car rental v2`.`contract` `c` on(`c`.`Contract_num` = `r`.`Contract_num`));

-- -----------------------------------------------------
-- View `car rental v2`.`vehichleview`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `car rental v2`.`vehichleview`;
USE `car rental v2`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car rental v2`.`vehichleview` AS select `v`.`Plate_Num` AS `Plate_Num`,`v`.`Price` AS `Price`,`v`.`Engine` AS `Engine`,`v`.`Color` AS `Color`,`v`.`Gas_Type` AS `Gas_Type`,`v`.`Milage` AS `Milage`,`v`.`Available` AS `Available`,`v`.`Brand` AS `Brand`,`v`.`Model` AS `Model`,`v`.`Type` AS `Type`,`v`.`Year` AS `Year`,`s`.`Carlot_Num` AS `Carlot_Num`,`s`.`lot_num` AS `lot_num` from (`car rental v2`.`vehicle` `v` left join `car rental v2`.`store` `s` on(`v`.`Plate_Num` = `s`.`Plate_num`));

-- -----------------------------------------------------
-- View `car rental v2`.`vehicle_in_carlot`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `car rental v2`.`vehicle_in_carlot`;
USE `car rental v2`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `car rental v2`.`vehicle_in_carlot` AS select `c`.`Carlot_Num` AS `Carlot_Num`,`c`.`Location` AS `location`,`s`.`lot_num` AS `lot_num`,`v`.`Plate_Num` AS `plate_num`,`v`.`Brand` AS `brand`,`v`.`Model` AS `model`,`v`.`Type` AS `type` from ((`car rental v2`.`car_lot` `c` left join `car rental v2`.`store` `s` on(`c`.`Carlot_Num` = `s`.`Carlot_Num`)) join `car rental v2`.`vehicle` `v` on(`s`.`Plate_num` = `v`.`Plate_Num`));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
