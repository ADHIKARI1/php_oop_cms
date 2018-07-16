<?php

class User{

	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	public static function find_all_users()// make it static bcz no need to instanciate always
	{		
		return self::find_this_query("SELECT * FROM users");
	}
	public static function find_user_by_id($id)// make it static bcz no need to instanciate always
	{
		global $db;
		$result_arr = self::find_this_query("SELECT * FROM users WHERE id='$id'");
		return !empty($result_arr) ? array_shift($result_arr) :  false ;		
	}

	public static function find_this_query($sql)
	{
		global $db;
		$result = $db->query($sql);	
		$obj_array = array();
		while ($row = mysqli_fetch_array($result)) {
			$obj_array[] = self::instantation($row);
		}	
		return $obj_array;

	}

	public static function instantation($res)
	{
		$object = new self;

        // $object->id 			= $res['id'];
        // $object->username 	= $res['username']; 
        // $object->password 	= $res['password']; 
        // $object->firstName 	= $res['first_name']; 
        // $object->lastName 	= $res['last_name'];  

        foreach ($res as $key => $value) {//auto instantiation
        	if ($object->has_the_attribute($key))
        		$object->$key = $value; 	
        }

        return $object;
	}

	private function has_the_attribute($key)
	{
		$properties = get_object_vars($this);
		return array_key_exists($key, $properties);
	}

}

?>