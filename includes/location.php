<?php

require_once(LIB_PATH.DS.'database.php');

class Location extends DatabaseObject {

	protected static $table_name = "locations";
	protected static $db_fields = array('id', 'name', 'description', 'owner_asset_id', 'country', 'state', 'city', 'adress', 'zipcode', 'longitude', 'latitude', 'altitude', 'cover_image_id', 'public_space', 'outdoor_indoor');   
	public $id;
	public $name;
	public $description;
	public $owner_asset_id;
	public $country;
	public $state;
	public $city;
	public $adress;
	public $zipcode;
	public $longitude;
	public $latitude;
	public $altitude;
	public $cover_image;
	public $public_space;
	public $outdoor_indoor;

}
