<?php


class Db_object 
{
	protected static $db_table = "users";
	
	public static function find_all()// make it static bcz no need to instanciate always
	{		
		return static::find_by_query("SELECT * FROM ".static::$db_table." ");
	}
	public static function find_by_id($id)// make it static bcz no need to instanciate always
	{
		global $db;
		$result_arr = static::find_by_query("SELECT * FROM ".static::$db_table." WHERE id='$id'");
		return !empty($result_arr) ? array_shift($result_arr) :  false ;		
	}

	public static function find_by_query($sql)
	{
		global $db;
		$result = $db->query($sql);	
		$obj_array = array();
		while ($row = mysqli_fetch_array($result)) {
			$obj_array[] = static::instantation($row);
		}	
		return $obj_array;

	}

	public static function instantation($res)
	{
		//$object = new self;
		$calling_class = get_called_class();// late static binding/ check actually where it call and and return that class 
		$object = new $calling_class;

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

	public function properties()
	{
		//return get_object_vars($this);
		$properties = array();
		foreach (static::$db_table_fields as $db_field) {
			if (property_exists($this, $db_field)) {
				$properties[$db_field] = $this->$db_field;
			}
		}

		return $properties;
	}

	protected  function clean_properties()
	{
		global $db;
		$clean_properties = array();

		foreach ($this->properties() as $key => $value) {
			$clean_properties[$key] = $db->escape_string($value);
		}
		return $clean_properties;
	}

	private function has_the_attribute($key)
	{
		$properties = get_object_vars($this);
		return array_key_exists($key, $properties);
	}

	public function save()
	{
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create()
	{
		global $db;
		$properties = $this->clean_properties();
		$sql = "INSERT INTO ".static::$db_table."(".implode(",",array_keys($properties)).")VALUES('";
		$sql.= implode("','", array_values($properties))."')";		
		/*$sql.= $db->escape_string($this->username)."','";
		$sql.= $db->escape_string($this->password)."','";
		$sql.= $db->escape_string($this->first_name)."','";
		$sql.= $db->escape_string($this->last_name)."')";*/

		//echo $sql;
		
		if($db->query($sql)){
				$this->id = $db->the_insert_id();
				return true;
		}else
				return false;
		

	}

	public function update()
	{

		global $db;
		$properties = $this->clean_properties();		
		$properties_pair = array();
		foreach ($properties as $key => $value) {
			$properties_pair[] = "{$key}='{$value}'";
		}
		
		$sql = "UPDATE ".static::$db_table." SET ";
		$sql.=implode(", ",$properties_pair);
		$sql.=" WHERE id = ".$db->escape_string($this->id);
		/*$sql.=" username= '".$db->escape_string($this->username) ."',";
		$sql.=" password= '".$db->escape_string($this->password) ."',";
		$sql.=" first_name= '".$db->escape_string($this->first_name) ."',";
		$sql.=" last_name= '".$db->escape_string($this->last_name) ."'";
		$sql.=" WHERE id = ".$db->escape_string($this->id);*/
		

		$db->query($sql);
		return (mysqli_affected_rows($db->con)==1)? true : false;		
	}

	public function delete()
	{
		global $db; 
		$sql= "DELETE FROM ".static::$db_table." WHERE id =".$db->escape_string($this->id)." LIMIT 1";
		$db->query($sql);
		return (mysqli_affected_rows($db->con)==1)? true : false;
	}

	public static function count_all()
	{
		global $db;
		$sql = "SELECT COUNT(*) FROM ".static::$db_table;
		$result = $db->query($sql);
		$row= mysqli_fetch_array($result);

		return array_shift($row);
	}

}


?>