<?php

class User extends Db_object{

	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password','first_name', 'last_name');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	

	public static function verify_user($username, $password)
	{
		global $db;
		$username = $db->escape_string($username);
		$password = $db->escape_string($password);

		$sql = "SELECT * FROM ".self::$db_table." WHERE ";
		$sql .= "username = '{$username}'";
		$sql .= "AND password = '{$password}' LIMIT 1";

		$result_arr = self::find_by_query($sql);
		return !empty($result_arr) ? array_shift($result_arr) :  false ;
	}
	

}//end of class

?>