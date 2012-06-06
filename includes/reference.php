<?php

require_once(LIB_PATH.DS.'database.php');

class Reference extends DatabaseObject {
	
	protected static $table_name = "reference_images";
	protected static $db_fields = array('id','reference_type','description', 'reference_object_type', 'reference_object_id', 'reference_url', 'script_id', 'owner_id', 'creation_date');   
	public $id;
	public $reference_type;
	public $description;
	public $reference_object_type;
	public $reference_object_id;
	public $reference_url;
	public $script_id;
	public $owner_id;
	public $creation_date;

	public static function create_reference($reference_type, $reference_object_type, $reference_object_id, $script_id) {
		$reference = new Reference();
		$reference->reference_type = $reference_type;
		$reference->$script_id = $script_id;
		$reference->description = $_POST['reference_description'];
		$reference->reference_object_type = $reference_object_type;
		$reference->reference_object_id = $reference_object_id;
		$reference->reference_url = $_POST['reference_url'];
		// $reference->name = $_POST['name'];		
		$id = (int)$_SESSION['user_id'];		
		$user = User::find_by_id($id);
		$reference->owner_id = $user->id;		
		$dt = new DateTime("now");
		$date = $dt->format('Y-m-d H:i:sP');
		$reference->creation_date = $date;
		
		return $reference->create();
	}
	
	public static function create_reference_image($url) {
		$reference = new Reference();
		$reference->reference_type = 'image';
		$reference->reference_url = $url;		
		$id = $_SESSION['user_id'];		
		$user = User::find_by_id($id);
		$reference->owner_id = $user->id;		
		$dt = new DateTime("now");
		$date = $dt->format('Y-m-d H:i:sP');
		$reference->creation_date = $date;
		return $reference->create();
	}
	
	public static function find_references($file_id) {
		$sql  = "SELECT * FROM " . static::$table_name;
		$sql .= " WHERE reference_file_id=". $file_id;
		return self::find_by_sql($sql);
  	}

}