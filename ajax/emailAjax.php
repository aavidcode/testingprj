<?php
include("../config/database.php");
$email     = $_POST['email'];
$password     = $_POST['password'];
$query = "SELECT `email`, `name` FROM `users` WHERE `email` = '$email' and password = '$password'";
$result = mysql_query($query);
if($rows = mysql_fetch_assoc($result)){
	$res['error'] = false;
	$res['message'] = "welcome ".$rows['name'];
}
else
{
	$res['error'] = true;
	$res['message'] = "User doesn't exist";
}

echo json_encode($res);
?>