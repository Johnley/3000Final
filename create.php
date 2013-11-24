<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>Jabberwocky - Create Task</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-cerulean.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js" type="application/javascript"></script>
    <script src="js/bootstrap.min.js" type="application/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="application/javascript">    
	$('#datepickbox input').datepicker({
    format: "mm-dd-yyyy",
    todayBtn: true,
	autoclose: true
    });
	</script>
<script type="application/javascript">
window.onbeforeunload = function()
{
  if($('#task_name').val() != '')
  {
    return "Are you sure you want to navigate away?";
	
  }
  if($('#task_description').val() != '')
  {
    return "Are you sure you want to navigate away?";
	
  }
  if($('#date_due').val() != '')
  {
    return "Are you sure you want to navigate away?";
	
  }
};
function submitLogin(){
	doLogin();
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			window.onbeforeunload = null;
			post_data();
		};
	});
};
function doTaskSubmit(){
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			window.onbeforeunload = null;
			post_data();
		}else{
			submitLogin();
			
		}
	});
}

function post_data(){
	document.getElementById("progressbox").className = "progress progress-striped active";
	FB.getLoginStatus(function(response){
	var task_name = $('#task_name').val();
	var task_description = $('#task_description').val();
	var userid;
	var date_due = $('#date_due').val();
	document.getElementById("progressActual").setAttribute("style","width: 50%")
  if (response.status === 'connected') {
    var userid = response.authResponse.userID;
  };
  	document.getElementById("progressActual").setAttribute("style","width: 80%%")
    $.post("taskhandler.php",
    {
      func:"put",
	  name:task_name,
      descr:task_description,
	  userid:userid,
	  date:date_due
    },
	function(data){
    document.getElementById("progressActual").setAttribute("style","width: 100%");
		window.open("mytasks.php","_self");
  });
		
	}, {scope: 'email'});
	
	
};
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = mm+'/'+dd+'/'+yyyy;
var elem = document.getElementById("date_due");
elem.value = today;
</script>
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
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="create.php">Create a Task</a></li>
       <li id="account-picture"></li>
      <li id="account"></li>
      </ul>
    </div>
    
    <!--/.nav-collapse --> 
  </div>
</div>
    <div class="container">
<br>
  <form>
    <div class="input-group">
      <input type="text" id="task_name" class="form-control" placeholder="Task Name">
      <span class="input-group-addon"><span class="glyphicon glyphicon-plus"</span></div>
    <br>
    <div class="input-group"></span>
      <input type="text" class="form-control" placeholder="Task Description" id="task_description">
      <span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span></div>
    <br><div class="input-group">
     <input class="form-control" placeholder="Date Due" data-provide="datepicker" data-date-autoclose="true" data-date-start-date="" data-date-format="yyyy-mm-dd" id="date_due"><span id="" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
     </div>
    <br>
    <div class="input-group">
      <button type="button" class="btn btn-default" onClick="doTaskSubmit()">Submit Task</button>
    </div>
  </form>
  <br>
  <div id ="progressbox">
  <div class="progress-bar"  role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%" id="progressActual">
  </div>
</div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
