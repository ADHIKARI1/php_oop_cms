<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'oop_project');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');


require_once("functions.php");
include_once("config.php");
include_once("database.php");
include_once("db_object.php");
include_once("user.php");
include_once("photo.php");
require_once("session.php");



?>