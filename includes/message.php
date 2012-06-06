<?php

require_once(LIB_PATH.DS.'database.php');

class Message extends DatabaseObject {

	protected static $table_name = "messages";
	protected static $db_fields = array('id', 'send_date', 'sender_id', 'user_id', 'message', 'status');   
	public $id;
	public $send_date;
	public $sender_id;
	public $user_id;
	public $message;
	public $status;

	public static function send_message($user_id) {
		$message = new Message();
		$message->user_id = $user_id;
		$dt = new DateTime("now");
		$date = $dt->format('Y-m-d H:i:sP');
		$message->send_date = $date;
		$message->sender_id = $_SESSION['user_id'];
		$message->message =  $_POST['message'];
		$message->status = 'unread';
		$message->save();
	}

	public static function recent_messages($number){
		$sql  = "SELECT * FROM messages ";
		$sql .= "WHERE user_id = '{$_SESSION['user_id']}' ";
		$sql .= " ORDER BY `send_date` DESC";
		$sql .= " LIMIT " . $number;
		$result_array = self::find_by_sql($sql);
		return $result_array;
	}

}