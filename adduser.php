<?php 

include("mysqli_connect.php");

$sql = "INSERT INTO `jabberwocky`.`users` (`userId`, `userName`, `email`, `banned`, `createdon`) VALUES ('".mysql_real_escape_string($user_profile['id'])."', '".mysql_real_escape_string($user_profile['first_name'])."', '".mysql_real_escape_string($user_profile['email'])."' \'no\', CURRENT_TIMESTAMP);";

echo $sql;
?>