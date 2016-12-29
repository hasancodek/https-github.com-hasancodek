<?php

define("DB_HOST", "localhost");
define("DB_USER", "bitirme");
define("DB_PASSWORD", "4b3giTb60M");
define("DB_NAME", "bitirme_kullanicilar");

class DbConnect{
	
	private $connect;
	
	public function __construct(){
		
		$this->connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		 
		if (mysqli_connect_errno($this->connect))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();  
		}
	}
	
	public function getDb(){
		
		return $this->connect;
	}
	
}
