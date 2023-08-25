<?php
require 'connection.php';
$id = $_POST['id'];
$deleteuser = mysqli_query($con, "DELETE FROM user where id = '$id' ");
if ($deleteuser>0) {
	$response['status code']="200";
	$response['message']="Account has been deleted successfully";
}else{
	$response['status code']="400";
	$response['message']="Account not deleted";
}
echo json_encode($response);

?>