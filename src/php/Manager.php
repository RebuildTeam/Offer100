<?php
/**
*
*/
class Manager{
	private static $_instance;
	private static $_manager;

	private function __construct(){
		self::$_manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	}

	// clone is not allowed
	private function __clone(){}


	public static function getManager(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_manager;
	}
}
?>
