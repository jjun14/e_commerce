SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `e_commerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `e_commerce` ;

-- -----------------------------------------------------
-- Table `e_commerce`.`categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `description` TEXT NULL ,
  `price` FLOAT NULL ,
  `inventory` VARCHAR(45) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  `categories_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_products_categories1_idx` (`categories_id` ASC) ,
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`categories_id` )
    REFERENCES `e_commerce`.`categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`image_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`image_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `image_type` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`images`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`images` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `url` VARCHAR(255) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  `product_id` INT NOT NULL ,
  `image_type_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_images_products_idx` (`product_id` ASC) ,
  INDEX `fk_images_image_types1_idx` (`image_type_id` ASC) ,
  CONSTRAINT `fk_images_products`
    FOREIGN KEY (`product_id` )
    REFERENCES `e_commerce`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_image_types1`
    FOREIGN KEY (`image_type_id` )
    REFERENCES `e_commerce`.`image_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`user_privileges`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`user_privileges` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `privilege` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(255) NULL ,
  `last_name` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `password` VARCHAR(45) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  `user_privilege_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_user_privileges1_idx` (`user_privilege_id` ASC) ,
  CONSTRAINT `fk_users_user_privileges1`
    FOREIGN KEY (`user_privilege_id` )
    REFERENCES `e_commerce`.`user_privileges` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`cities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`cities` (
  `id` INT NOT NULL ,
  `city_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`states`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`states` (
  `id` INT NOT NULL ,
  `state_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`zipcodes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`zipcodes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `zipcode` VARCHAR(10) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`shippings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`shippings` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(255) NULL ,
  `last_name` VARCHAR(255) NULL ,
  `address_1` VARCHAR(255) NULL ,
  `address_2` VARCHAR(255) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  `cities_id` INT NOT NULL ,
  `states_id` INT NOT NULL ,
  `zipcodes_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_shippings_cities1_idx` (`cities_id` ASC) ,
  INDEX `fk_shippings_states1_idx` (`states_id` ASC) ,
  INDEX `fk_shippings_zipcodes1_idx` (`zipcodes_id` ASC) ,
  CONSTRAINT `fk_shippings_cities1`
    FOREIGN KEY (`cities_id` )
    REFERENCES `e_commerce`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shippings_states1`
    FOREIGN KEY (`states_id` )
    REFERENCES `e_commerce`.`states` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_shippings_zipcodes1`
    FOREIGN KEY (`zipcodes_id` )
    REFERENCES `e_commerce`.`zipcodes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`billings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`billings` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(255) NULL ,
  `last_name` VARCHAR(255) NULL ,
  `address_1` VARCHAR(255) NULL ,
  `address_2` VARCHAR(255) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  `zipcodes_id` INT NOT NULL ,
  `states_id` INT NOT NULL ,
  `cities_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_billings_zipcodes1_idx` (`zipcodes_id` ASC) ,
  INDEX `fk_billings_states1_idx` (`states_id` ASC) ,
  INDEX `fk_billings_cities1_idx` (`cities_id` ASC) ,
  CONSTRAINT `fk_billings_zipcodes1`
    FOREIGN KEY (`zipcodes_id` )
    REFERENCES `e_commerce`.`zipcodes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_billings_states1`
    FOREIGN KEY (`states_id` )
    REFERENCES `e_commerce`.`states` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_billings_cities1`
    FOREIGN KEY (`cities_id` )
    REFERENCES `e_commerce`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`orders`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `total` FLOAT NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  `status` VARCHAR(255) NULL ,
  `user_id` INT NOT NULL ,
  `shipping_id` INT NOT NULL ,
  `billing_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_orders_users1_idx` (`user_id` ASC) ,
  INDEX `fk_orders_shippings1_idx` (`shipping_id` ASC) ,
  INDEX `fk_orders_billings1_idx` (`billing_id` ASC) ,
  CONSTRAINT `fk_orders_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `e_commerce`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_shippings1`
    FOREIGN KEY (`shipping_id` )
    REFERENCES `e_commerce`.`shippings` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_billings1`
    FOREIGN KEY (`billing_id` )
    REFERENCES `e_commerce`.`billings` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`orders_have_products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`orders_have_products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `orders_id` INT NOT NULL ,
  `products_id` INT NOT NULL ,
  `product_qty` INT NULL ,
  INDEX `fk_orders_has_products_products1_idx` (`products_id` ASC) ,
  INDEX `fk_orders_has_products_orders1_idx` (`orders_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_orders_has_products_orders1`
    FOREIGN KEY (`orders_id` )
    REFERENCES `e_commerce`.`orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_products_products1`
    FOREIGN KEY (`products_id` )
    REFERENCES `e_commerce`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`carts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`carts` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_carts_users1_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_carts_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `e_commerce`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e_commerce`.`carts_have_products`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `e_commerce`.`carts_have_products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cart_id` INT NOT NULL ,
  `product_id` INT NOT NULL ,
  `product_qty` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_carts_has_products_products1_idx` (`product_id` ASC) ,
  INDEX `fk_carts_has_products_carts1_idx` (`cart_id` ASC) ,
  CONSTRAINT `fk_carts_has_products_carts1`
    FOREIGN KEY (`cart_id` )
    REFERENCES `e_commerce`.`carts` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carts_has_products_products1`
    FOREIGN KEY (`product_id` )
    REFERENCES `e_commerce`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `e_commerce` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
