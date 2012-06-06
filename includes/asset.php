<?php

require_once(LIB_PATH.DS.'database.php');

class Asset extends DatabaseObject {
	
	protected static $table_name = "assets";
	protected static $db_fields = array('id', 'name', 'type', 'creation_date', 'description', 'owner_id', 'asset_id');   
	public $id;
	public $name;
	public $type;
	public $creation_date;
	public $description;
	public $owner_id;
	public $asset_id;

	public static function find_by_object_id($type, $id) {
		$sql = "SELECT * FROM " . static::$table_name . ' WHERE ';
		$sql .= "`asset_type`='" . $type . "' AND ";
		$sql .= "`asset_id`='" . $id . "'";
		return self::find_by_sql($sql);
	}

	public static function filter_assets($asset_type, $user_id){
		$sql = "SELECT * FROM " . static::$table_name . ' WHERE ';
		if($asset_type){
			$sql .= "`type`='" . $asset_type . "'";
		} 
		if($asset_type && $user_id) {
			$sql .= "AND ";
		} 
		if($user_id) {
			$sql .= "`owner_id`='" . $user_id . "'";
		}
		return self::find_by_sql($sql);
	}
	
	public function add_asset() {
		$asset = new Asset();
		$asset->name = $_POST['name'];		
		$id = (int)$_SESSION['user_id'];		
		$user = User::find_by_id($id);
		$asset->owner_id = $user->id;		
		$dt = new DateTime("now");
		$date = $dt->format('Y-m-d H:i:sP');
		$asset->creation_date = $date;
		$asset->type = $_POST['type'];
		$asset->category = $_POST['category'];
		$asset->description = $_POST['description'];
		$asset->owner_id = $_POST['owner_id'];
		return $asset->save();
	}
	

}