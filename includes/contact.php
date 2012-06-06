<?php

require_once(LIB_PATH.DS.'database.php');

class Contact extends DatabaseObject {

	protected static $table_name = "contacts";
	protected static $db_fields = array('id', 'type', 'name', 'first_name', 'last_name', 'description', 'user_id', 'primary_email_id', 'primary_phone_id', 'cover_image_id');   
	public $id;
	public $type;
	public $name;
	public $first_name;
	public $last_name;
	public $description;
	public $user_id;
	public $primary_email_id;
	public $primary_phone_id;
	public $conver_image_id;

	public static function find_by_user_id($id=0) {
			$result_array = static::find_by_sql("SELECT * FROM  " . static::$table_name . " WHERE user_id={$id} LIMIT 1");
			return !empty($result_array) ? array_shift($result_array) : false;
		}

}
