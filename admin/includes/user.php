<?php

class User extends Db_object{

	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password','first_name', 'last_name','user_image');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $user_image;

	public $upload_dir = "images";
	public $tmp_path;
	public $target_path;
	public $image_placeholder = "http://placehold.it/400x400&text=image";
	public $errors = array();
	public $upload_errors_array = array(
	UPLOAD_ERR_OK           => "There is no error",
	UPLOAD_ERR_INI_SIZE		=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",
	UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
	UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
	UPLOAD_ERR_NO_FILE      => "No file was uploaded.",               
	UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
	UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
	UPLOAD_ERR_EXTENSION    => "A PHP extension stopped the file upload."												
);


public function set_file($file)
{
	if (empty($file) || !$file || !is_array($file)) {
		$this->errors[] = "There was no file upload here";
		return false;
	}
	elseif ($file['error'] != 0) {
		$this->errors[] = $this->upload_errors_array[$file['error']];
		return false;
	}
	else{
	$this->user_image = basename($file['name']);
	$this->tmp_path = $file['tmp_name'];	
	}
}

public function save_data()
{
	

		if (!empty($this->errors)) {
			return false;
		}

		if (empty($this->user_image) || empty($this->tmp_path)) {
			$this->errors[] = "the file was not available";
			return false;
		}

		$this->target_path = SITE_ROOT.DS.'admin'.DS.$this->upload_dir.DS.$this->user_image;
		if (file_exists($this->target_path)) {
			$this->errors[] = "this file {$this->filename} already exists";
			return false;
		}

		if (move_uploaded_file($this->tmp_path, $this->target_path)) {			
			if ($this->save()) {
				unset($this->tmp_path);
				return true;
			}
		}
		else
		{			
			$this->errors[] = "the file directory need permissions!";
			return false;
		}
		
}

public function image_path()
{
	return empty($this->user_image) ? $this->image_placeholder : $this->upload_dir.DS.$this->user_image;
}

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

public function delete_user()
{
if($this->delete()) {
	$this->target_path  = SITE_ROOT.DS.'admin'.DS.$this->upload_dir.DS.$this->user_image;
	return unlink($this->target_path) ? true : false;
	
}
else
{
	return false;
}
}

public function ajax_save_user_image($user_image, $user_id)
{
	/*$this->user_image = $user_image;
	$this->id = $user_id;
	$this->save();*/

	global $db;

	$user_image = $db->escape_string($user_image);
	$user_id = $db->escape_string($user_id);

	$this->user_image = $user_image;
	$this->id = $user_id;

	$sql = "UPDATE ".self::$db_table." SET user_image = '{$this->user_image}'";	
	$sql.=" WHERE id = ".$db->escape_string($this->id);

	$update_image = $db->query($sql);

	echo $this->image_path();
}
	

}//end of class

?>