
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- user
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;


CREATE TABLE `user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`login` VARCHAR(50)  NOT NULL,
	`password` VARCHAR(100)  NOT NULL,
	`first_name` VARCHAR(255),
	`last_name` VARCHAR(255),
	`role` VARCHAR(10)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `user_U_1` (`login`)
)Engine=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
