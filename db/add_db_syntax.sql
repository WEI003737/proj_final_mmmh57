-- 新增資料表語法：
//orders--------------------------------------
CREATE TABLE
`proj_final`.`orders`
( `sid` INT NOT NULL AUTO_INCREMENT , `mem_sid` INT NOT NULL , `order_num` VARCHAR NOT NULL , `coupon` VARCHAR NOT NULL ,
`amount` VARCHAR NOT NULL , `shipping` VARCHAR NOT NULL , `receiver` VARCHAR NOT NULL , `receiver_mobile` VARCHAR NOT NULL ,
`address` VARCHAR NOT NULL , `payment` VARCHAR NOT NULL , `receipt` VARCHAR NOT NULL , `order_status` VARCHAR NOT NULL ,
`created_date` DATETIME NOT NULL , PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

//order_details-----------------------------
CREATE TABLE `proj_final`.`order_details` ( `sid` INT NOT NULL AUTO_INCREMENT , `order_sid` INT NOT NULL , `pro_sid` INT NOT NULL ,
`color_sid` INT NOT NULL , `size_sid` INT NOT NULL , `name` VARCHAR(255) NOT NULL , `color` VARCHAR(255) NOT NULL ,
`size` VARCHAR(255) NOT NULL , `price` VARCHAR(255) NOT NULL , `gty` VARCHAR(255) NOT NULL , `is_cus` BOOLEAN NOT NULL ,
`cus_color` VARCHAR(255) NOT NULL , PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

//like_box-----------------------------
CREATE TABLE `proj_final`.`like` ( `sid` INT NOT NULL AUTO_INCREMENT , `mem_sid` INT NOT NULL , `pro_sid` INT NOT NULL ,
PRIMARY KEY (`sid`)) ENGINE = InnoDB;

//coupon-----------------------------
CREATE TABLE `proj_final`.`coupon` ( `sid` INT NOT NULL AUTO_INCREMENT , `mem_sid` INT NOT NULL , `name` VARCHAR(255) NOT NULL ,
`description` VARCHAR(255) NOT NULL , `discount` VARCHAR(255) NOT NULL , `is_use` BOOLEAN NOT NULL , `expire_date` TIMESTAMP NOT NULL ,
PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

//customize-----------------------------
CREATE TABLE `proj_final`.`customize` ( `sid` INT NOT NULL AUTO_INCREMENT , `cate_sid` INT NOT NULL , `name` VARCHAR(255) NOT NULL ,
`price` VARCHAR(255) NOT NULL , `intro` VARCHAR(255) NOT NULL , `material` VARCHAR(255) NOT NULL , `take_care` VARCHAR(255) NOT NULL ,
`can_cus_color` VARCHAR(255) NOT NULL , `pro_pic` VARCHAR(255) NOT NULL , `cus_pic` VARCHAR(255) NOT NULL ,
PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

//categories-----------------------------
CREATE TABLE `proj_final`.`categories` ( `sid` INT NOT NULL AUTO_INCREMENT , `parent_sid` INT NOT NULL , `parent` VARCHAR(255) NOT NULL , `en_parent` VARCHAR(255) NOT NULL ,
`name` VARCHAR(255) NOT NULL ,`en_name` VARCHAR(255) NOT NULL , `size_chart` VARCHAR(255) NOT NULL , PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

//products-----------------------------
CREATE TABLE `proj_final`.`products` ( `sid` INT NOT NULL AUTO_INCREMENT , `cate_sid` INT NOT NULL , `name` VARCHAR(255) NOT NULL ,
`price` VARCHAR(255) NOT NULL , `intro` VARCHAR(255) NOT NULL , `material` VARCHAR(255) NOT NULL , `take_care` VARCHAR(255) NOT NULL ,
`created_date` DATETIME NOT NULL , PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

//products_intro-----------------------------
CREATE TABLE `proj_final`.`products_intro` ( `sid` INT NOT NULL AUTO_INCREMENT , `cate_sid` INT NOT NULL , `name` VARCHAR(255) NOT NULL ,
`en_name` VARCHAR(255) NOT NULL , `en_material` VARCHAR(255) NOT NULL , `hash_tag` VARCHAR(255) NOT NULL , `description` VARCHAR(255) NOT NULL ,
`pro_color` VARCHAR(255) NOT NULL , PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

//color-----------------------------
CREATE TABLE `proj_final`.`color` ( `sid` INT NOT NULL AUTO_INCREMENT , `pro_sid` INT NOT NULL , `color` VARCHAR(255) NOT NULL ,
`pro_pic` VARCHAR(255) NOT NULL , PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

//size-----------------------------
CREATE TABLE `proj_final`.`size` ( `sid` INT NOT NULL AUTO_INCREMENT , `pro_sid` INT NOT NULL , `color_sid` INT NOT NULL ,
`size` VARCHAR(255) NOT NULL , `in_stock` VARCHAR(255) NOT NULL , PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
