<?php

require_once(LIB_PATH.DS.'database.php');

class Scene extends DatabaseObject {
	
	protected static $table_name = "scenes";
	protected static $db_fields = array('id', 'scene', 'project_id', 'script_id', 'name', 'ext_int', 'day_night', 'description', 'script', 'location',);   
	public $id;
	public $scene;
	public $project_id;
	public $script_id;
	public $name;
	public $ext_int;
	public $day_night;
	public $description;
	public $script;
	public $location;

	public static function find_scenes($script_id) {
		$sql  = "SELECT * FROM " . static::$table_name;
		$sql .= " WHERE script_id=". $script_id . " ORDER BY `scene` ASC ";
		return self::find_by_sql($sql);
  	}

	public function add_scene() {
		$scene = new Scene();
		$scene->name = $_POST['name'];
		$scene->description = $_POST['description'];
		$scene->ext_int = $_POST['ext_int'];
		$scene->day_night = $_POST['day_night'];
		$scene->script_id = $_GET['script_id'];
		$scene->project_id = $_GET['project_id'];
		$last_scene_number = Scene::find_last_scene($_GET['script_id']);
		$scene->scene = $last_scene_number + 1;
		return $scene->create();
	}
	
	public static function find_last_scene($script_id='') {
		$sql  = 'SELECT  `scene` FROM  `scenes` WHERE  `script_id` =' . $script_id;
		$sql .= ' ORDER BY  `scene` DESC LIMIT 0 , 1';
		$scenes = self::find_by_sql($sql);
		foreach($scenes as $scene){
			$last_scene = $scene->scene;
		}
		return $last_scene;
	}

	public static function reorder_scenes() {
		//Get the Array from Ajax
		//Make sure it is an array.
		if (is_array($_POST['scene'])){
		    $items = $_POST['scene']; 
		} else { $items = ""; }
		
		if ($items != ""){	  
		  //Cycle through Array.
		  for ($i=0; $i < count($items); $i++) { 
		      //Make sure the value of the item is numeric.
		      if (is_numeric($items[$i])){
		          $id = $items[$i];
		      }else{
		          die("Invalid ID");
		      }
		      
		      //Set the database order to match the order of the array.
		      $sql = "UPDATE `scenes` SET `scene` = " . $i . " WHERE `id` = " . $items[$i];
		   		$scenes = self::find_by_sql($sql);	   		
		  }
 
		}
	}
	

	
}