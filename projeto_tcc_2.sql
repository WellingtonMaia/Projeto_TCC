-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema projeto_tcc_2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projeto_tcc_2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projeto_tcc_2` DEFAULT CHARACTER SET utf8 ;
USE `projeto_tcc_2` ;

-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`projects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`projects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,  
  `client_name` VARCHAR(255) NULL,
  `estimate_date` DATE NULL,
  `estimate_time` TIME NULL,
  `project_price` FLOAT NULL,
  `status` ENUM('A', 'C') NULL,
  `project_type` ENUM('I', 'E') NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`tasks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `estimate_date` DATE NULL,
  `estimate_time` TIME NULL,
  `status` ENUM('C', 'I') NULL,
  `begin_date` DATE NULL,
  `final_date` DATE NULL,
  `project_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tasks_projects_idx` (`project_id` ASC),
  CONSTRAINT `fk_tasks_projects`
    FOREIGN KEY (`project_id`)
    REFERENCES `projeto_tcc_2`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`times`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`times` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `time_value` TIME NULL,
  `begin_date` DATE NULL,
  `final_date` DATE NULL,
  `task_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_times_tasks1_idx` (`task_id` ASC),
  CONSTRAINT `fk_times_tasks1`
    FOREIGN KEY (`task_id`)
    REFERENCES `projeto_tcc_2`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`files`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`files` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `file_url` VARCHAR(255) NULL,
  `task_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_files_tasks1_idx` (`task_id` ASC),
  CONSTRAINT `fk_files_tasks1`
    FOREIGN KEY (`task_id`)
    REFERENCES `projeto_tcc_2`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`notes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `task_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notes_tasks1_idx` (`task_id` ASC),
  CONSTRAINT `fk_notes_tasks1`
    FOREIGN KEY (`task_id`)
    REFERENCES `projeto_tcc_2`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `role` VARCHAR(255) NULL,
  `image` VARCHAR(255) NULL,  
  `status` ENUM('A', 'I') NULL,
  `permission` ENUM('A', 'C') NULL,
  `remember_token` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`projects_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`projects_has_users` (
  `project_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`project_id`, `user_id`),
  INDEX `fk_projects_has_users_users1_idx` (`user_id` ASC),
  INDEX `fk_projects_has_users_projects1_idx` (`project_id` ASC),
  CONSTRAINT `fk_projects_has_users_projects1`
    FOREIGN KEY (`project_id`)
    REFERENCES `projeto_tcc_2`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_has_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `projeto_tcc_2`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`tasks_has_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`tasks_has_users` (
  `task_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`task_id`, `user_id`),
  INDEX `fk_tasks_has_users_users1_idx` (`user_id` ASC),
  INDEX `fk_tasks_has_users_tasks1_idx` (`task_id` ASC),
  CONSTRAINT `fk_tasks_has_users_tasks1`
    FOREIGN KEY (`task_id`)
    REFERENCES `projeto_tcc_2`.`tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tasks_has_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `projeto_tcc_2`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`pay_accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`pay_accounts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `cost_center` VARCHAR(255) NULL,
  `due_date` DATE NULL,
  `value` FLOAT NULL,
  `payment_type` INT NULL,
  `project_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_financials_projects1_idx` (`project_id` ASC),
  CONSTRAINT `fk_financials_projects1`
    FOREIGN KEY (`project_id`)
    REFERENCES `projeto_tcc_2`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`receive_accounts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`receive_accounts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `client_name` VARCHAR(255) NULL,
  `date_receive` DATE NULL,
  `value` FLOAT NULL,
  `payment_type` INT NULL,
  `project_name` VARCHAR(255) NULL,
  `receive_paymentscol` VARCHAR(45) NULL,
  `project_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_financials_projects1_idx` (`project_id` ASC),
  CONSTRAINT `fk_financials_projects10`
    FOREIGN KEY (`project_id`)
    REFERENCES `projeto_tcc_2`.`projects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projeto_tcc_2`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projeto_tcc_2`.`password_resets` (
  `idpassword_resets` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
