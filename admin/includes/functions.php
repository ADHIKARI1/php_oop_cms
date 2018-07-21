<?php


function __autoload($class)
{
	/*This global function is called whenever you 
	try to create an object of a class that hasn't been defined and require the class*/
	$class = strtolower($class);
	$path = "includes/{$class}.php";
	if (file_exists($path))
		require_once($path);
	else
		die("File name {$class}.php not found!");	
	
}

function redirect_to($location)
{
	header("Location:{$location}");
}




?>