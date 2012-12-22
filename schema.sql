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
  `id` INT NOT NULL COMMENT '		' ,
  `group_id` INT NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  `name` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `code` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_groups1_idx` (`group_id` ASC) ,
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
  `id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `loaded` DATETIME NULL DEFAULT NULL ,
  `loaded_unixtime` INT NULL ,
  `began` DATETIME NULL DEFAULT NULL ,
  `began_unixtime` INT NULL DEFAULT NULL ,
  `ended` DATETIME NULL DEFAULT NULL ,
  `ended_unixtime` INT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sessions_users1_idx` (`user_id` ASC) ,
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
  `id` INT NOT NULL ,
  `user_id` INT NULL ,
  `session_id` INT NULL ,
  `began_unixtime` INT NULL ,
  `top_image_id` INT NULL ,
  `bottom_image_id` INT NULL ,
  `ocd_on_top` TINYINT(1) NULL ,
  `probe_on_top` TINYINT(1) NULL ,
  `first_valid_response` TINYINT(1) NULL ,
  `first_reaction_time_since_trial_began` DOUBLE NULL ,
  `first_reaction_time_since_probe_shown` DOUBLE NULL ,
  `currently_displayed` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `user_id_idx` (`user_id` ASC) ,
  INDEX `session_id_idx` (`session_id` ASC) ,
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
  `id` INT NOT NULL ,
  `user_id` INT NULL ,
  `time_since_session_began` VARCHAR(45) NULL ,
  `time_since_trial_began` INT NULL ,
  `time_since_last_probe_shown` INT NULL ,
  `response` VARCHAR(45) NULL ,
  `active_trial_id` INT NULL ,
  `currently_displayed` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `active_trial_idx` (`active_trial_id` ASC) ,
  INDEX `user_id_idx` (`user_id` ASC) ,
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
