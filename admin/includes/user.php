<?php

class User{

	public $id;
	public $username;
	public $password;
	public $firstName;
	public $lastName;

	public static function find_all_users()// make it static bcz no need to instanciate always
	{		
		return self::find_this_query("SELECT * FROM users");
	}
	public static function find_user_by_id($id)// make it static bcz no need to instanciate always
	{
		global $db;
		$result = self::find_this_query("SELECT * FROM users WHERE id='$id'");
		$row = mysqli_fetch_array($result);
		return $row;
	}

	public static function find_this_query($sql)
	{
		global $db;
		$result = $db->query($sql);		
		return $result;
	}

	public static function instantation($res)
	{
		$object = new self;

        // $object->id 			= $res['id'];
        // $object->username 	= $res['username']; 
        // $object->password 	= $res['password']; 
        // $object->firstName 	= $res['first_name']; 
        // $object->lastName 	= $res['last_name'];  

        return $object;
	}
}

?>