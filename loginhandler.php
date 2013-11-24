<?php
require("mysqli_connect.php");

$userID = mysqli_real_escape_string($dbc, $_POST['userid']);
$userName = mysqli_real_escape_string($dbc, $_POST['name']);
$email = mysqli_real_escape_string($dbc, $_POST['email']);

$query = "SELECT * FROM `users` WHERE `userId` = ".$userID;

$query2 = "INSERT INTO `jabberwocky`.`users` (`userId`, `userName`, `email`) VALUES ('".$userID."', '".$userName."', '".$email."');";

$qry_result = mysqli_query($dbc,$query);
$row = mysqli_fetch_array($qry_result);
if($row['userName'] == ""){
	$qry_result2 = mysqli_query($dbc,$query2);
}

?>