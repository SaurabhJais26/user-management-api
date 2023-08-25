<?php

require 'connection.php';
$current = md5($_POST['current']);
$new = md5($_POST['new']);
$email = $_POST['email'];

$checkUser = "SELECT * FROM user where email = '$email' and password = '$current' ";
$result = mysqli_query($con,$checkUser);

if (mysqli_num_rows($result)>0) {
	$updatePass = mysqli_query($con, "UPDATE user SET password= '$new' WHERE email= '$email' ");
	if ($updatePass>0) {
		$response['status code'] = "200";
		$response['message'] = "Password update success";
	}else{
		$response['status code'] = "400";
		$response['message'] = "Password update failed";
	}
}else{
	$response['status code'] = "404";
	$response['message'] = "User does not exist";
}
echo json_encode($response);
?>