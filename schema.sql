SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `groups` ;

CREATE  TABLE IF NOT EXISTS `groups` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

CREATE  TABLE IF NOT EXISTS `users` (
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
    REFERENCES `groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `training_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `training_sessions` ;

CREATE  TABLE IF NOT EXISTS `training_sessions` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `number` INT UNSIGNED NULL ,
  `loaded` DATETIME NULL DEFAULT NULL ,
  `loaded_unixtime` BIGINT NULL ,
  `began` DATETIME NULL DEFAULT NULL ,
  `began_unixtime` BIGINT NULL DEFAULT NULL ,
  `ended` DATETIME NULL DEFAULT NULL ,
  `ended_unixtime` BIGINT NULL DEFAULT NULL ,
  `condition` VARCHAR(45) NULL ,
  `browser` VARCHAR(255) NULL ,
  `browser_version` VARCHAR(255) NULL ,
  `operating_system` VARCHAR(255) NULL ,
  `browser_language` VARCHAR(255) NULL ,
  `window_width` VARCHAR(45) NULL ,
  `document_width` VARCHAR(45) NULL ,
  `window_height` VARCHAR(45) NULL ,
  `document_height` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sessions_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `trials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `trials` ;

CREATE  TABLE IF NOT EXISTS `trials` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NULL ,
  `session_id` INT NOT NULL ,
  `number` INT UNSIGNED NULL ,
  `began_unixtime` BIGINT UNSIGNED NULL ,
  `ocd_image_id` INT UNSIGNED NULL ,
  `neutral_image_id` INT UNSIGNED NULL ,
  `ocd_on_top` TINYINT(1) NULL ,
  `probe_on_top` TINYINT(1) NULL ,
  `first_valid_response` TINYINT(1) NULL ,
  `first_reaction_time_since_trial_began` DOUBLE NULL ,
  `first_reaction_time_since_probe_shown` DOUBLE NULL ,
  `fixation_duration` DOUBLE UNSIGNED NULL ,
  `images_duration` DOUBLE UNSIGNED NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `session_id`
    FOREIGN KEY (`session_id` )
    REFERENCES `training_sessions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reactions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reactions` ;

CREATE  TABLE IF NOT EXISTS `reactions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `active_trial_id` INT NULL ,
  `time_since_session_began` DOUBLE NULL ,
  `time_since_trial_began` DOUBLE NULL ,
  `time_since_last_probe_shown` DOUBLE NULL ,
  `response` VARCHAR(45) NULL ,
  `currently_displayed` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `active_trial`
    FOREIGN KEY (`active_trial_id` )
    REFERENCES `trials` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cake_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cake_sessions` ;

CREATE  TABLE IF NOT EXISTS `cake_sessions` (
  `id` VARCHAR(255) NOT NULL ,
  `data` TEXT NULL ,
  `expires` INT(11) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `groups`
-- -----------------------------------------------------
START TRANSACTION;
INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES (1, 'admin', NULL, NULL);
INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES (2, 'pretest', NULL, NULL);

COMMIT;
