<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="docs-assets/ico/favicon.png">

    <title>Jabberwocky</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-cerulean.css" rel="stylesheet">

    <!-- Custom styles for this template -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="create.php">Create Task</a></li>
      <li id="account-picture"></li>
      <li id="account"></li>
      </ul>

    </div>
    
    <!--/.nav-collapse --> 
  </div>
</div>
    <div class="container">

      <br>
      <div id="jumbotron">
      </div>
      <div class="bs-example">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><h3>Recent completed activities</h3></div>
        <div class="panel-body">
          <?php include('getrecenttasks.php'); ?>
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
  </body>
</html>
