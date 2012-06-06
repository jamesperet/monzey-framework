<?php

require_once(LIB_PATH.DS.'database.php');

class Event extends DatabaseObject {

	protected static $table_name = "events";
	protected static $db_fields = array('id', 'name', 'category', 'object_id', 'start', 'end', 'allday', 'description');   
	public $id;
	public $name;
	public $category;
	public $object_id;
	public $start;
	public $end;
	public $allday;
	public $description;

	public static function new_event($category, $object_id) {
		$event = new Event();
		$event->name = $_POST['name'];
		$event->category = $category;
		$event->object_id = $object_id;
		$event->allday = $_POST['allday'];
		$event->start = $_POST['start'];
		$event->end = $_POST['end'];	
		$event->description =  $_POST['description'];
		$event->save();
	}
	
	public static function update_event() {
		$event = Event::find_by_id($_POST['id']);
		$event->start = $_POST['start'];
		$event->end = $_POST['end'];
		$event->allday = $_POST['allday'];
		$event->update();
	}

}

?>