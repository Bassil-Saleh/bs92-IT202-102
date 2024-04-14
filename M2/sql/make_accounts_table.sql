-- Active: 1707348080693@@db.ethereallab.app@3306@bs92
CREATE TABLE IF NOT EXISTS `Accounts` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `account_number` CHAR(12) DEFAULT NULL,
    `user_id` INT DEFAULT NULL,
    `balance` INT NOT NULL DEFAULT 0,
    `account_type` VARCHAR(255) DEFAULT NULL,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`account_number`),
    FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`)
);