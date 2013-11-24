<?php
require_once("facebook/facebook.php");

  $config = array(
      'appId' => '1414854992081022',
      'secret' => '4f02b1de5ec711c4bbba4ef6644a8a05',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
 /*$user_profile = $facebook->api('/me','GET');

$userID = $user_profile['id'];
$userName = $user_profile['first_name'];
$email = $user_profile['email'];

if($_GET['id']){
	echo $userID;
}
if($_GET['name']){
	echo $userName;
}
if($_GET['email']){
	echo $email;
}
if($_POST['id']){
	echo $userID;
}
if($_POST['name']){
	echo $userName;
}
if($_POST['email']){
	echo $email;
}
*/
?>