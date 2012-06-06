<?php

require_once(LIB_PATH.DS.'database.php');

class Object extends DatabaseObject {

	protected static $table_name = "objects";
	protected static $db_fields = array('id', 'name', 'type', 'description', 'owner_asset_id', 'model_id', 'serial', 'fabrication_date');   
	public $id;
	public $name;
	public $type;
	public $description;
	public $owner_asset_id;
	public $model_id;
	public $serial;
	public $fabrication_date;

}
