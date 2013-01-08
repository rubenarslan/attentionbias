SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `zwang` ;
CREATE SCHEMA IF NOT EXISTS `zwang` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `zwang` ;

-- -----------------------------------------------------
-- Table `zwang`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zwang`.`groups` ;

CREATE  TABLE IF NOT EXISTS `zwang`.`groups` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zwang`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zwang`.`users` ;

CREATE  TABLE IF NOT EXISTS `zwang`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '		' ,
  `group_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  `name` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `code` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `condition` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_users_groups1`
    FOREIGN KEY (`group_id` )
    REFERENCES `zwang`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zwang`.`training_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zwang`.`training_sessions` ;

CREATE  TABLE IF NOT EXISTS `zwang`.`training_sessions` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `number` INT UNSIGNED NULL ,
  `loaded` DATETIME NULL DEFAULT NULL ,
  `loaded_unixtime` INT UNSIGNED NULL ,
  `began` DATETIME NULL DEFAULT NULL ,
  `began_unixtime` INT UNSIGNED NULL DEFAULT NULL ,
  `ended` DATETIME NULL DEFAULT NULL ,
  `ended_unixtime` INT UNSIGNED NULL DEFAULT NULL ,
  `condition` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sessions_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `zwang`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zwang`.`trials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zwang`.`trials` ;

CREATE  TABLE IF NOT EXISTS `zwang`.`trials` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `session_id` INT NOT NULL ,
  `number` INT UNSIGNED NULL ,
  `began_unixtime` INT UNSIGNED NULL ,
  `ocd_image_id` INT UNSIGNED NULL ,
  `neutral_image_id` INT UNSIGNED NULL ,
  `ocd_on_top` TINYINT(1) NULL ,
  `probe_on_top` TINYINT(1) NULL ,
  `first_valid_response` TINYINT(1) NULL ,
  `first_reaction_time_since_trial_began` DOUBLE NULL ,
  `first_reaction_time_since_probe_shown` DOUBLE NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `zwang`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `session_id`
    FOREIGN KEY (`session_id` )
    REFERENCES `zwang`.`training_sessions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zwang`.`reactions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zwang`.`reactions` ;

CREATE  TABLE IF NOT EXISTS `zwang`.`reactions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `active_trial_id` INT NULL ,
  `time_since_session_began` DOUBLE NULL ,
  `time_since_trial_began` DOUBLE NULL ,
  `time_since_last_probe_shown` DOUBLE NULL ,
  `response` VARCHAR(45) NULL ,
  `currently_displayed` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `active_trial`
    FOREIGN KEY (`active_trial_id` )
    REFERENCES `zwang`.`trials` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `reaction_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `zwang`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `zwang`.`cake_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `zwang`.`cake_sessions` ;

CREATE  TABLE IF NOT EXISTS `zwang`.`cake_sessions` (
  `id` VARCHAR(255) NOT NULL ,
  `data` TEXT NULL ,
  `expires` INT(11) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
