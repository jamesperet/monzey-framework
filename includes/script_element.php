<?php

require_once(LIB_PATH.DS.'database.php');

class ScriptElement extends DatabaseObject {
	
	protected static $table_name;
	protected static $db_fields = array('element_id', 'element_type', 'content', 'character_name', 'camera_angle', 'scene_id', 'sequence');   
	public $element_id;
	public $element_type;
	public $content;
	public $character_name;
	public $camera_angle;
	public $scene_id;
	public $sequence;

	public static function add_script_element(){
		static::$table_name = $_GET['script_id'] . '_script';
		$script_element = new ScriptElement();
		$script_element->element_type = $_GET['type'];
		$script_element->content = $_POST['content'];
		$script_element->character_name = $_POST['character_name'];
		$script_element->camera_angle = $_POST['camera_angle'];
		$script_element->scene_id = $_GET['scene_id'];
		$last_sequence_number = ScriptElement::find_last_scene_element();
		$script_element->sequence =  $last_sequence_number + 1;
		return $script_element->create();
	}
	
	public static function find_storyboard_elements() {
		$table_name = $_GET['script_id'] . '_script';
		$sql  = "SELECT * FROM " . $table_name;
		if($_GET['scene_id']) {
			$scene_id = $_GET['scene_id'];
		} else {
			$scene_id = 1;
		}
		$sql .= " WHERE scene_id=". $scene_id . " AND `element_type`='camera_angle' ORDER BY sequence";
		return self::find_by_sql($sql);
  }
	
	public static function find_scene_elements() {
		$table_name = $_GET['script_id'] . '_script';
		$sql  = "SELECT * FROM " . $table_name;
		$sql .= " WHERE scene_id=". $_GET['scene_id'] . " ORDER BY sequence";
		return self::find_by_sql($sql);
  }

	public static function find_last_scene_element() {
		$table_name = $_GET['script_id'] . '_script';
		$sql  = 'SELECT  `sequence` FROM  `'.$table_name.'` WHERE  `scene_id` =' . $_GET['scene_id'];
		$sql .= ' ORDER BY  `sequence` DESC LIMIT 0 , 1';
		$sequences = self::find_by_sql($sql);
		foreach($sequences as $sequence){
			$last_sequence = $sequence->sequence;
		}
		return $last_sequence;
	}
	
}
