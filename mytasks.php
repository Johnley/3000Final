<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>Jabberwocky - My Tasks</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-cerulean.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple.css" rel="stylesheet">
  </head>

  <body>
<?php include("facebookdiv.php") ?>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.php">Project Jabberwocky</a> </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="create.php">Create Task</a></li>
      <li id="account-picture"></li>
      <li class="active" id="account"></li>
      </ul>

    </div>
    
    <!--/.nav-collapse --> 
  </div>
</div>
    <div class="container">

      <br>
      <div class="bs-example">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3>Incomplete tasks</h3></div>
        <div class="panel-body">
          <?php 
		  require("mysqli_connect.php");
		  require("phpfacebook.php");
		  
		  $userID = $facebook->api('me?fields=id','GET');
		  $userID = $userID['id'];
		  $complete = mysqli_real_escape_string($dbc,$_GET['complete']);
		  $delete = mysqli_real_escape_string($dbc,$_GET['delete']);
		  
		  
		  
		  $q_update = "UPDATE tasks SET complete = 1, completed_date = CURDATE() WHERE task_Id=".$complete.";";
		  $q_delete = "DELETE FROM tasks WHERE task_Id = '".$delete."'";
		  $q_select = " SELECT * FROM tasks WHERE user_Id=".$userID." AND complete=0 ORDER BY task_Id DESC";
		  if($_GET['complete']){
			  $q = $q_update;
			  $result = mysqli_query($dbc,$q);
		  }else if($_GET['delete']){
			  $q = $q_delete;
			  $result = mysqli_query($dbc,$q);
		  }
		  $q = $q_select;
		  $result = mysqli_query($dbc,$q);


$display_string = "<table class=\"table table-responsive\">";
$display_string .= "<tr>";
$display_string .= "<th>Task</th>";
$display_string .= "<th>Description</th>";
$display_string .= "<th>Due Date</th>";
$display_string .= "<th></th>";
$display_string .= "</tr>";

while($row = mysqli_fetch_array($result)){
	$display_string .= "<tr>";
	$display_string .= "<td>$row[task_name]</td>";
	$display_string .= "<td>$row[task_descr]</td>";
	$display_string .= "<td>$row[due_date]</td>";
	$display_string .= "<td><a class=\"btn btn-success btn-sm\" href=\"mytasks.php?complete=$row[task_Id]\" role=\"button\">Complete</a><br><br><a class=\"btn btn-danger btn-sm\" href=\"mytasks.php?delete=$row[task_Id]\" role=\"button\">Delete</a></td>";
	$display_string .= "</tr>";
	
}
$display_string .= "</table>";
echo $display_string;
?>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3>Completed Tasks</h3></div>
        <div class="panel-body">
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
		
		
		$display_string = "<table class=\"table table-responsive\">";
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
	$display_string .= "<td><a class=\"btn btn-danger btn-sm\" href=\"mytasks.php?delete=$row[task_Id]\" role=\"button\">Delete</a></td>";
	$display_string .= "</tr>";
	
}
$display_string .= "</table>";
echo $display_string;
mysqli_close($dbc);
?>
        </div>
        </div>
        </div>
<!-- insert php code to load completed tasks sorted by date from database, reloading with ajax every 5 seconds. -->
          </div>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
