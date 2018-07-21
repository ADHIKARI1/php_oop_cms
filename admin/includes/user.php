<?php

class User{

	protected static $db_table = "users";
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

	public static function verify_user($username, $password)
	{
		global $db;
		$username = $db->escape_string($username);
		$password = $db->escape_string($password);

		$sql = "SELECT * FROM users WHERE ";
		$sql .= "username = '{$username}'";
		$sql .= "AND password = '{$password}' LIMIT 1";

		$result_arr = self::find_this_query($sql);
		return !empty($result_arr) ? array_shift($result_arr) :  false ;
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

	public function properties()
	{
		return get_object_vars($this);
	}

	public function save()
	{
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create()
	{
		global $db;
		$properties = $this->properties();
		$sql = "INSERT INTO ".self::$db_table."(".implode(",",array_keys($properties)).")VALUES('";
		$sql.= $db->escape_string($this->username)."','";
		$sql.= $db->escape_string($this->password)."','";
		$sql.= $db->escape_string($this->first_name)."','";
		$sql.= $db->escape_string($this->last_name)."')";
		
		if($db->query($sql)){
				$this->id = $db->the_insert_id();
				return true;
		}else
				return false;
		

	}

	public function update()
	{

		global $db;
		$sql = "UPDATE ".self::$db_table." SET ";
		$sql.=" username= '".$db->escape_string($this->username) ."',";
		$sql.=" password= '".$db->escape_string($this->password) ."',";
		$sql.=" first_name= '".$db->escape_string($this->first_name) ."',";
		$sql.=" last_name= '".$db->escape_string($this->last_name) ."'";
		$sql.=" WHERE id =".$db->escape_string($this->id);

		$db->query($sql);

		return (mysqli_affected_rows($db->con)==1)? true : false;		
	}

	public function delete()
	{
		global $db; 
		$sql= "DELETE FROM ".self::$db_table." WHERE id =".$db->escape_string($this->id)." LIMIT 1";
		$db->query($sql);
		return (mysqli_affected_rows($db->con)==1)? true : false;
	}

}//end of class

?>