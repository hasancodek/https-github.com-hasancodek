<?php

require_once 'include/user.php';

$username = "";

$password = "";

$email = "";

if(isset($_POST['kAdi'])){

$kAdi = $_POST['kAdi'];

}

if(isset($_POST['sifre'])){

$sifre = $_POST['sifre'];

}

if(isset($_POST['email'])){

$email = $_POST['email'];

}

// Instance of a User class

$userObject = new User();

// Registration of new user

if(!empty($kAdi) && !empty($sifre) && !empty($email)){

$hashed_sifre = md5($sifre);

$json_registration = $userObject->createNewRegisterUser($kAdi, $hashed_sifre, $email);

echo json_encode($json_registration);

}

// User Login

if(!empty($kAdi) && !empty($sifre) && empty($email)){

$hashed_sifre = md5($sifre);

$json_array = $userObject->loginUsers($kAdi, $hashed_sifre);

echo json_encode($json_array);
}
?>