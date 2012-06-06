<?php

require_once(LIB_PATH.DS.'database.php');

class Project extends DatabaseObject {
	
	protected static $table_name = "projects";
	protected static $db_fields = array('id', 'name', 'owner_id', 'creation_date');   
	public $id;
	public $name;
	public $owner_id;
	public $creation_date;
	
	public static function add_project(){
		$project = new Project();
		$project->name = $_POST['name'];			
		$project->owner_id = $_SESSION['user_id'];	
		$dt = new DateTime("now");
		$date = $dt->format('Y-m-d H:i:sP');
		$project->creation_date = $date;
		return $project->save();
	}
	
	public static function current_project() {
		$user = User::find_by_id($_SESSION['user_id']);
		return $user->current_project;
	}
}
