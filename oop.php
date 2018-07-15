<?php
class Cars{

	/*var $wheels = 4;
	var $doors = 4;*/
	//public $wheels = 4;
	//private $doors = 4;
	//protected $count = 4;

	static $wheels = 4;
	//static $doors = 3;

	/*function greeting()
	{
		echo "Hellow Student";

	}*/

	static function car_details()
	{
		//return "Car has ".$this->wheels." wheels";
		/*echo $this->wheels;
		echo $this->doors;
		echo $this->count;*/

		/**echo Cars::$wheels;// for properties need to use $ sign
		echo Cars::$doors;*/

		//return self::$wheels;// static referencing
		//return self::$doors;
		

	}

	/*function get_values()
	{	
		
		echo $this->doors;		

	}
	function set_values()
	{	
		
		$this->doors = 10;		

	}*/

	function __construct()
	{
		echo self::$wheels++;
	}
	
}

$bmw = new Cars();
$volvo = new Cars();

//echo $bmw->wheels;
//echo $bmw->doors;
//echo $bmw->count;
//echo $bmw->car_details();
/*echo Cars::$doors;//normal propertis are attch to the instance but static prop attach to class and use :: to call with $ sign
echo Cars::car_details();/// no need $ sign for methods*/

/*class Trucks extends Cars{

	static function display(){
		echo parent::car_details();
	}

}

Trucks::display();*/



/*$tacoma = new Trucks();
echo $tacoma->wheels;
*/

//$bmw->greeting();
/*echo $bmw->wheels = 10;
echo " ".$volvo->wheels."</br>";
echo $bmw->car_details();*/

/*$classes = get_declared_classes();
foreach($classes as $cls)
{
	echo $cls."</br>";
}*/

/*$methodes = get_class_methods("Cars");
foreach ($methodes as $methode) {
 	echo $methode."</br>";
 } */


/*$bmw->set_values();
$bmw->get_values();*/

?>