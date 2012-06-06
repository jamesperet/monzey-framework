<?php

// Define software version
defined('CURRENT_VERSION') ? null : define("CURRENT_VERSION", "v0.1");

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : 
	//define('SITE_ROOT', DS.'Users'.DS.'james'.DS.'Sites'.DS.'ProductionManager'.DS.CURRENT_VERSION);
	define('SITE_ROOT', DS.'Users'.DS.'james'.DS.'Sites'.DS.'sandbox'.DS.'monzey-framework');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// load config file first
require_once(LIB_PATH.DS.'config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');

// load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');
require_once(LIB_PATH.DS.'log.php');

// load database-related classes
require_once(LIB_PATH.DS.'user.php');
require_once(LIB_PATH.DS.'file_object.php');
require_once(LIB_PATH.DS.'permission.php');
require_once(LIB_PATH.DS.'project.php');
require_once(LIB_PATH.DS.'script.php');
require_once(LIB_PATH.DS.'scene.php');
require_once(LIB_PATH.DS.'script_element.php');
require_once(LIB_PATH.DS.'asset.php');
require_once(LIB_PATH.DS.'storyboard.php');
require_once(LIB_PATH.DS.'reference.php');
require_once(LIB_PATH.DS.'comment.php');
require_once(LIB_PATH.DS.'contact_list.php');
require_once(LIB_PATH.DS.'message.php');
require_once(LIB_PATH.DS.'event.php');
require_once(LIB_PATH.DS.'contact.php');
require_once(LIB_PATH.DS.'location.php');
require_once(LIB_PATH.DS.'object.php');

?>