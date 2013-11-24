<? 
		require("mysqli_connect.php");
		require("phpfacebook.php");
		  
		$userID = $facebook->api('me?fields=id','GET');
		$userID = $userID['id'];
		$delete = mysqli_real_escape_string($dbc,$_GET['delete']);
		
		$q_delete = "DELETE FROM tasks WHERE task_Id = '".$delete."'";		
		$q_select = " SELECT * FROM tasks WHERE user_Id = '".$userID."' AND complete = '1'";
		$q = $q_select;

		$result = mysqli_query($dbc,$q);
		
		
		$display_string = "<table class=\"table\">";
		$display_string .= "<tr>";
		$display_string .= "<th>Task</th>";
		$display_string .= "<th>Description</th>";
		$display_string .= "<th>Date Finished</th>";
		$display_string .= "<th></th>";
		$display_string .= "</tr>";

while($row = mysqli_fetch_array($result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[task_name]</td>";
	$display_string .= "<td>$row[task_descr]</td>";
	$display_string .= "<td>$row[completed_date]</td>";
	$display_string .= "<td><a class=\"btn btn-success btn-sm\" href=\"mytasks.php?delete=$row[task_Id]\" role=\"button\">Delete</a></td>";
	$display_string .= "</tr>";
	
}
$display_string .= "</table>";
echo $display_string;
mysqli_close($dbc);
?>