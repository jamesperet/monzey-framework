<?php

require_once(LIB_PATH.DS.'database.php');

class ContactList extends DatabaseObject {

	protected static $table_name = 'contact_lists';
	protected static $db_fields = array('id', 'contact_id', 'list_owner_id');   
	public $id;
	public $contact_id;
	public $list_owner_id;

	public static function add_to_contact_list($contact_id){
		$new_contact = new ContactList();
		$new_contact->contact_id = $contact_id;
		$new_contact->list_owner_id = $_SESSION['user_id'];
		return $new_contact->save();
	}
	
	public static function check_contact($contact_id){
		$user_id = $_SESSION['user_id'];
		global $database;
		$sql  = "SELECT * FROM " . static::$table_name;
		$sql .= " WHERE contact_id = '{$contact_id}' ";
		$sql .= "AND list_owner_id = '{$user_id} ' ";
		$sql .= "LIMIT 1";
		$result_array = self::find_by_sql($sql);
		if(empty($result_array)){
			return false;
		} else {
			return true;
		}
	}
	
	public static function user_contacts(){
		$user_id = $_SESSION['user_id'];
		global $database;
		$sql  = "SELECT * FROM " . static::$table_name;
		$sql .= " WHERE list_owner_id = '{$user_id} ' ";
		return self::find_by_sql($sql);
	}
	

}
