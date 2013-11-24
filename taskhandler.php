<?php
require("mysqli_connect.php");

if($_POST['func'] == "put"){
$name = mysqli_real_escape_string($dbc,$_POST['name']);
$descr = mysqli_real_escape_string($dbc,$_POST['descr']);
$userid = mysqli_real_escape_string($dbc,$_POST['userid']);
$date = mysqli_real_escape_string($dbc,$_POST['date']);


$query = "INSERT INTO `jabberwocky`.`tasks` (`task_name`, `task_descr`, `user_Id`, `due_date`) VALUES ('".$name."', '".$descr."', '".$userid."', '".$date."');";

mysqli_query($dbc, $query) or die(mysql_error()); 

echo(mysqli_insert_id($link));
}

