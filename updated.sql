-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema e_commerce
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema e_commerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `e_commerce` DEFAULT CHARACTER SET utf8 ;
USE `e_commerce` ;

-- -----------------------------------------------------
-- Table `e_commerce`.`billings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`billings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `address_1` VARCHAR(255) NULL DEFAULT NULL,
  `address_2` VARCHAR(255) NULL DEFAULT NULL,
  `city` VARCHAR(255) NULL DEFAULT NULL,
  `state` VARCHAR(255) NULL DEFAULT NULL,
  `zipcode` VARCHAR(12) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_billings_zipcodes1_idx` (`zipcode` ASC),
  INDEX `fk_billings_states1_idx` (`state` ASC),
  INDEX `fk_billings_cities1_idx` (`city` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`user_privileges`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`user_privileges` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `privilege` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `user_privilege_id` INT(11) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_user_privileges1_idx` (`user_privilege_id` ASC),
  CONSTRAINT `fk_users_user_privileges1`
    FOREIGN KEY (`user_privilege_id`)
    REFERENCES `e_commerce`.`user_privileges` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`carts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`carts` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_carts_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_carts_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `e_commerce`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `price` FLOAT NULL DEFAULT NULL,
  `inventory` INT(11) NULL DEFAULT NULL,
  `category_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx1` (`category_id` ASC),
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`category_id`)
    REFERENCES `e_commerce`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`carts_have_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`carts_have_products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_qty` INT(11) NULL DEFAULT NULL,
  `cart_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_carts_has_products_products1_idx` (`product_id` ASC),
  INDEX `fk_carts_has_products_carts1_idx` (`cart_id` ASC),
  CONSTRAINT `fk_carts_has_products_carts1`
    FOREIGN KEY (`cart_id`)
    REFERENCES `e_commerce`.`carts` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carts_has_products_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `e_commerce`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 57
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`image_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`image_types` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `image_type` VARCHAR(45) NULL DEFAULT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`images` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(255) NULL DEFAULT NULL,
  `product_id` INT(11) NOT NULL,
  `image_type_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_images_products_idx` (`product_id` ASC),
  INDEX `fk_images_image_types1_idx` (`image_type_id` ASC),
  CONSTRAINT `fk_images_image_types1`
    FOREIGN KEY (`image_type_id`)
    REFERENCES `e_commerce`.`image_types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_products`
    FOREIGN KEY (`product_id`)
    REFERENCES `e_commerce`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`shippings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`shippings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `address_1` VARCHAR(255) NULL DEFAULT NULL,
  `address_2` VARCHAR(255) NULL DEFAULT NULL,
  `city` VARCHAR(255) NULL DEFAULT NULL,
  `state` VARCHAR(255) NULL DEFAULT NULL,
  `zipcode` VARCHAR(12) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`orders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `total` FLOAT NULL DEFAULT NULL,
  `status` VARCHAR(255) NULL DEFAULT NULL,
  `user_id` INT(11) NOT NULL,
  `shipping_id` INT(11) NOT NULL,
  `billing_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_users1_idx` (`user_id` ASC),
  INDEX `fk_orders_shippings1_idx` (`shipping_id` ASC),
  INDEX `fk_orders_billings1_idx` (`billing_id` ASC),
  CONSTRAINT `fk_orders_billings1`
    FOREIGN KEY (`billing_id`)
    REFERENCES `e_commerce`.`billings` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_shippings1`
    FOREIGN KEY (`shipping_id`)
    REFERENCES `e_commerce`.`shippings` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `e_commerce`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e_commerce`.`orders_have_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `e_commerce`.`orders_have_products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_qty` INT(11) NULL DEFAULT NULL,
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_has_products_products1_idx` (`product_id` ASC),
  INDEX `fk_orders_has_products_orders1_idx` (`order_id` ASC),
  CONSTRAINT `fk_orders_has_products_orders1`
    FOREIGN KEY (`order_id`)
    REFERENCES `e_commerce`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_products_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `e_commerce`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
