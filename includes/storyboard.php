<?php

require_once(LIB_PATH.DS.'database.php');

class Storyboard extends DatabaseObject {
	
	protected static $table_name = "users";
	protected static $db_fields = array('id', 'storyboard_image', 'layout_image', 'description', 'camera_name', 'element_id', 'shoot_length', 'registration_date', 'owner_id');   
	public $id;
	public $storyboard_image;
	public $layout_image;
	public $description;
	public $camera_name;
	public $element_id;
	public $shoot_length;
	public $registration_date;
	public $owner_id;

	public static function create_storyboard() {
		// CREATE TABLE  `pm_database`.`1_storyboard` (
		// 	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		// 	`storyboard_image` VARCHAR( 255 ) NULL ,
		// 	`layout_image` VARCHAR( 255 ) NULL ,
		// 	`description` VARCHAR( 1024 ) NULL ,
		// 	`camera_name` VARCHAR( 255 ) NULL ,
		// 	`element_id` INT NOT NULL ,
		// 	`shoot_length` INT NULL
		// ) ENGINE = INNODB;
	}
}