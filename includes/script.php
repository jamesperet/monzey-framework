<?php

require_once(LIB_PATH.DS.'database.php');

class Script extends DatabaseObject {
	
	protected static $table_name = 'scripts';
	protected static $db_fields = array('id', 'name', 'project_id', 'creation_date', 'owner_id', 'fountain_script');   
	public $id;
	public $name;
	public $project_id;
	public $creation_date;
	public $owner_id;
	public $fountain_script;

	public static function add_script($project){
		
		// Insert New Script reference in Scripts Table
		$script = new Script();
		$script->name = $_POST['name'];		
		$id = (int)$_SESSION['user_id'];		
		$user = User::find_by_id($id);
		$script->owner_id = $user->id;
		$script->project_id = $project;
		$dt = new DateTime("now");
		$date = $dt->format('Y-m-d H:i:sP');
		$script->creation_date = $date;		
		$new_script_id = $script->create();
		
		// Create New Script Elements Table
		// $sql  = 'CREATE TABLE .`' . $new_script_id . '_script` (';
		// $sql .= '`element_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,';
		// $sql .= '`type` VARCHAR( 255 ) NOT NULL ,';
		// $sql .= '`content` VARCHAR( 2500 ) NOT NULL ,';
		// $sql .= '`character` VARCHAR( 255 ) NOT NULL ,';
		// $sql .= '`camera_angle` VARCHAR( 30 ) NOT NULL ,';
		// $sql .= '`scene_id` INT NOT NULL ,';
		// $sql .= '`sequence` INT NOT NULL';
		// $sql .= ') ENGINE = INNODB;';		
		// global $database;
		// $result = $database->query($sql);
		
		return $new_script_id;
		
	}
	
	public static function find_project_scripts($project_id=0) {
		$sql  = "SELECT * FROM " . self::$table_name;
		$sql .= " WHERE project_id=". $project_id;
		return self::find_by_sql($sql);
  }
  
  public function delete_script() {
		$table_name = $this->id . '_script';
		global $database;
	  $sql  = "DROP TABLE ". $table_name ;
	  $database->query($sql);
	  return ($this->delete());

  }
  
  public static function process_fountain_script($fountain_script) {
	  require_once(LIB_PATH.DS.'scrippetize.php');
	  $script = scrippetize( $fountain_script );
	  return $script;
  }

}