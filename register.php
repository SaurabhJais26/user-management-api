<?php

require 'connection.php';
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);


$checkUser = "SELECT * from user where email = '$email'";
$checkQuery = mysqli_query($con,$checkUser);

if (mysqli_num_rows($checkQuery)>0) {
	$response ['status code'] = "201";
	$response ['message'] = "User Already Exists";
	
}
else{

	$insertQuery = "INSERT INTO user(username, email, password) VALUES('$username','$email','$password')";

$result = mysqli_query($con, $insertQuery);

if($result){
	$response ['status code'] = "200";
	$response ['message'] = "Register Successful";
}
else{
	$response ['status code'] = "404";
	$response ['message'] = "Register Failed";
}

}

echo json_encode($response);


?>