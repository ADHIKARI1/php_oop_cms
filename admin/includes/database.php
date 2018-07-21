<?php
require_once ("config.php");

class Database{
	public $con;

	function __construct()
	{
		$this->open_db_con();
	}


	public function open_db_con()
	{
		//$this->con = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);
		$this->con = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME);
		//if (mysqli_connect_errno())
		if ($this->con->connect_errno)
		die("connection_failed!".mysqli_error());	
		
	}

	public function query($sql)
	{
		$result = mysqli_query($this->con, $sql);
		return $result;
	}

	private function confirm_query($result)
	{
		if(!$result)
			die("Query Failed!");
	}

	public function escape_string($string)
	{
		$esc_string = mysqli_real_escape_string($this->con, $string);
		return $esc_string;
	}

	public function the_insert_id()
	{
		return mysqli_insert_id($this->con);
	}
}


$db = new Database();
//$db->open_db_con();






?>