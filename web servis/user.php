<?php

include_once 'db.php';

class User{
	
	private $db;
	private $db_table = "kullanici";
	
	public function __construct(){
		$this->db = new DbConnect();
	}
	
	public function isLoginExist($kAdi, $sifre){		
				
		$query = "select * from " . $this->db_table . " where kAdi = '$kAdi' AND sifre = '$sifre' Limit 1";
		$result = mysqli_query($this->db->getDb(), $query);
		if(mysqli_num_rows($result) > 0){
			mysqli_close($this->db->getDb());
			return true;
		}		
		mysqli_close($this->db->getDb());
		return false;		
	}
	
	public function createNewRegisterUser($kAdi, $sifre, $email){
			
		$query = "insert into kullanici ( kAdi, sifre, email, kayit_tarihi) values ('$kAdi', '$sifre', '$email', NOW())";
		$inserted = mysqli_query($this->db->getDb(), $query);
		if($inserted == 1){
			$json['success'] = 1;									
		}else{
			$json['success'] = 0;
		}
		mysqli_close($this->db->getDb());
		return $json;
	}
	
	public function loginUsers($kAdi, $sifre){
			
		$json = array();
		$canUserLogin = $this->isLoginExist($kAdi, $sifre);
		if($canUserLogin){
			$json['success'] = 1;
		}else{
			$json['success'] = 0;
		}
		return $json;
	}

}

?>