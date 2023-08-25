<?php

require 'connection.php';
$users = "SELECT username , email from user";
$result = mysqli_query($con, $users);

if (mysqli_num_rows($result)>0) {
	while($row = $result->fetch_assoc()){
		$response['users'][]=$row;
		$response['status code'] = "200";
	}
}
else{
	$response['status code'] = "400";
	$response['message'] = (object)[];
}

echo json_encode($response);
?>