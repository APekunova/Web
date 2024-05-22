CREATE TABLE `post` (
	`id` INT NOT NULL,
	`title` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`subtitle` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`content` TEXT NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`author` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`author_url` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`publish_date` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`image_url` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`featured` TINYINT(1) NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;
