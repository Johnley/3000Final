<?php
include("mysqli_connect.php");

	//build query
$sql = "SELECT `users`.`userName`, `tasks`.`task_name`, `tasks`.`task_descr`, `tasks`.`completed_date`\n"
    . "FROM `users`\n"
    . " LEFT JOIN `jabberwocky`.`tasks` ON `users`.`userId` = `tasks`.`user_Id` WHERE `tasks`.`complete` = 1 \n"
    . " LIMIT 0, 30 ";

	//Execute query
$qry_result = mysqli_query($dbc,$sql);

	//Build Result String
$display_string = "<table class=\"table\">";
$display_string .= "<tr>";
$display_string .= "<th>Name</th>";
$display_string .= "<th>Task</th>";
$display_string .= "<th>Description</th>";
$display_string .= "<th>Date Finished</th>";
$display_string .= "</tr>";

while($row = mysqli_fetch_array($qry_result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[userName]</td>";
	$display_string .= "<td>$row[task_name]</td>";
	$display_string .= "<td>$row[task_descr]</td>";
	$display_string .= "<td>$row[completed_date]</td>";
	$display_string .= "</tr>";
	
}
$display_string .= "</table>";
echo $display_string;
?>
