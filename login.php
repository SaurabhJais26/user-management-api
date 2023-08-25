<?php
require 'connection.php';
$email = $_POST['email'];
$password = md5($_POST['password']);

$checkUser = "SELECT * from user where email = '$email' ";
$result = mysqli_query($con,$checkUser);

if (mysqli_num_rows($result)>0){

	$checkUserquery = "SELECT id,username,email from user where email = '$email' and password = '$password'";
	$resultant = mysqli_query($con,$checkUserquery);

	if (mysqli_num_rows($resultant)>0){
		while ($row=$resultant->fetch_assoc()){
		$response['user'] = $row;
	}
		$response ['status code'] = "200";
		$response ['message'] = "Login Success";
	}
	else{
		$response['user'] = (object)[];
		$response ['status code'] = "200";
		$response ['message'] = "Wrong Credentials";
	}

}
else{
	$response['user'] = (object)[];
	$response ['status code'] = "400";
	$response ['message'] = "User does not exist";
}

echo json_encode($response);
?>