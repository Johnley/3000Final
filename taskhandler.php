<?php
require("mysqli_connect.php");

if($_POST['func'] == "put"){
$name = mysqli_real_escape_string($dbc,$_POST['name']);
$descr = mysqli_real_escape_string($dbc,$_POST['descr']);
$userid = mysqli_real_escape_string($dbc,$_POST['userid']);
$date = mysqli_real_escape_string($dbc,$_POST['date']);
if(isset($_POST['public'])){
	$public = 1;
};


$query = "INSERT INTO `jabberwocky`.`tasks` (`task_name`, `task_descr`, `user_Id`, `due_date`, `public`) VALUES ('".$name."', '".$descr."', '".$userid."', '".$date."', '".$public."');";

mysqli_query($dbc, $query) or die(mysql_error()); 

echo(mysqli_insert_id($link));
}

