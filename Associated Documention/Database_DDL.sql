CREATE TABLE IF NOT EXISTS `address` (
  `Address_ID` INT NOT NULL,
  `Street` VARCHAR(100) NOT NULL,
  `Street2` VARCHAR(100) NOT NULL,
  `City` VARCHAR(100) NOT NULL,
  `State` VARCHAR(50) NOT NULL,
  `Postal_Code` INT NOT NULL,
  `Default_ID` INT NOT NULL,
  `Address_Type` INT NOT NULL,
  PRIMARY KEY (`Address_ID`),
  UNIQUE INDEX `Address_ID_UNIQUE` (`Address_ID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `credit` (
  `Credit_ID` INT NOT NULL,
  `Card_Type` VARCHAR(50) NOT NULL,
  `Card_Number` BIGINT NOT NULL,
  `Card_Date` DATE NOT NULL,
  `Card_Name` VARCHAR(50) NOT NULL,
  `Card_Zipcode` VARCHAR(10) NOT NULL,
  `Card_Saved` TINYINT NOT NULL,
  PRIMARY KEY (`Credit_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `order` (
  `Order_ID` INT NOT NULL,
  `Date` DATETIME(4) NULL DEFAULT NULL,
  `Address_ID` INT NULL DEFAULT NULL,
  `User_ID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`Order_ID`),
  INDEX `address_id_idx` (`Address_ID` ASC) VISIBLE,
  INDEX `user_id_idx` (`User_ID` ASC) VISIBLE,
  CONSTRAINT `address_id`
    FOREIGN KEY (`Address_ID`)
    REFERENCES `g4asynvtu9x2oh4e`.`address` (`Address_ID`),
  CONSTRAINT `user_id`
    FOREIGN KEY (`User_ID`)
    REFERENCES `g4asynvtu9x2oh4e`.`user` (`USER_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `order_details` (
  `Detail_ID` INT NOT NULL AUTO_INCREMENT,
  `Order_ID` INT NULL DEFAULT NULL,
  `Product_ID` INT NULL DEFAULT NULL,
  `Quantity` INT NULL DEFAULT NULL,
  `CurrencyPrice` FLOAT NULL DEFAULT NULL,
  `Discount_Code` BIGINT NULL DEFAULT NULL,
  `Total_Price` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`Detail_ID`),
  UNIQUE INDEX `order_id_UNIQUE` (`Detail_ID` ASC) VISIBLE,
  INDEX `prod_id_idx` (`Product_ID` ASC) VISIBLE,
  INDEX `ord_id_idx` (`Order_ID` ASC) VISIBLE,
  CONSTRAINT `ord_id`
    FOREIGN KEY (`Order_ID`)
    REFERENCES `g4asynvtu9x2oh4e`.`order` (`Order_ID`),
  CONSTRAINT `prod_id`
    FOREIGN KEY (`Product_ID`)
    REFERENCES `g4asynvtu9x2oh4e`.`products` (`Product_ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `products` (
  `Product_ID` INT NOT NULL,
  `Product_Name` VARCHAR(50) NOT NULL,
  `Product_Description` TEXT NOT NULL,
  `Product_Price` DECIMAL(10,2) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000000.00',
  `Product_Picture` BLOB NOT NULL,
  PRIMARY KEY (`Product_ID`),
  UNIQUE INDEX `Product_ID_UNIQUE` (`Product_ID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `roles` (
  `Role_ID` INT NOT NULL,
  `Role_Name` VARCHAR(50) NOT NULL,
  `Role_Description` TEXT NOT NULL,
  `Access_Level` INT NOT NULL DEFAULT '1',
  PRIMARY KEY (`Role_ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `sensor` (
  `entryid` INT NOT NULL AUTO_INCREMENT,
  `DTStamp` DATETIME(6) NULL DEFAULT NULL,
  `Temperature` FLOAT NULL DEFAULT NULL,
  `Humidity` FLOAT NULL DEFAULT NULL,
  `Pressure` FLOAT NULL DEFAULT NULL,
  `Altitude` FLOAT NULL DEFAULT NULL,
  `GPSTimeStamp` VARCHAR(100) NULL DEFAULT NULL,
  `GPSLat` VARCHAR(45) NULL DEFAULT NULL,
  `GPSLong` VARCHAR(45) NULL DEFAULT NULL,
  `GPSAltitude` VARCHAR(45) NULL DEFAULT NULL,
  `GPSNumSat` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`entryid`))
ENGINE = InnoDB
AUTO_INCREMENT = 1132
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` INT NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` VARCHAR(50) NOT NULL,
  `LASTNAME` VARCHAR(50) NOT NULL,
  `USERNAME` VARCHAR(100) NOT NULL,
  `PASSWORD` VARCHAR(50) NOT NULL,
  `EMAIL` VARCHAR(100) NOT NULL,
  `Role_ID` INT NOT NULL,
  `Address_ID` INT NOT NULL,
  `Credit_ID` INT NOT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE INDEX `EMAIL_UNIQUE` (`USERNAME` ASC) VISIBLE,
  UNIQUE INDEX `Credit_ID_UNIQUE` (`Credit_ID` ASC) VISIBLE,
  UNIQUE INDEX `Address_ID_UNIQUE` (`Address_ID` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 392
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `user_address` (
  `ADDRESS_ID` INT NOT NULL AUTO_INCREMENT,
  `STREET` VARCHAR(100) NOT NULL,
  `CITY` VARCHAR(50) NOT NULL,
  `STATE` VARCHAR(2) NOT NULL,
  `ZIPCODE` INT NOT NULL,
  PRIMARY KEY (`ADDRESS_ID`),
  CONSTRAINT `USER_ADDRESS_USER_USER_ID_fk`
    FOREIGN KEY (`ADDRESS_ID`)
    REFERENCES `g4asynvtu9x2oh4e`.`user` (`USER_ID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;