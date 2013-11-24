<script type="application/javascript">
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '1414854992081022',                        // App ID from the app dashboard
      status     : true,                                 // Check Facebook Login status
      xfbml      : true,                                 // Look for social plugins on the page
	  cookie     : true,
	  channel	 : '../facebook/channel.php' //custom channel
    });
   FB.Event.subscribe('auth.statusChange', onStatus); 
    };
	
   
	function showAccountInfo() {
  FB.api(
    {
      method: 'fql.query',
      query: 'SELECT first_name,email,uid FROM user WHERE uid='+FB.getUserID()
    },
    function(response) {
      console.info('API Callback', response);
	  document.getElementById('account').innerHTML = (' <a href="mytasks.php">' + response[0].first_name + '\'s Tasks</a> ');
        var request = $.ajax({
			type: "POST",
			url: "loginhandler.php",
			data: { userid: response[0].uid, name: response[0].first_name, email: response[0].email },
		});		
    }
  );
}
 function doLogin(){
 FB.login(function(response) {
	 
 }, {scope: 'email'});
 event.preventDefault();
};
function showLoginButton() {
  document.getElementById('account').innerHTML = (
    '<a onclick="doLogin()">Login</a>'
  );
  document.getElementById('jumbotron').innerHTML = (
    '<div class="jumbotron"><h1>NEW. INNOVATIVE.</h1><p class="lead">Wow.</p><p><a class="btn btn-lg btn-success" href="create.php" role="button">Get Tasking!</a></p></div>'
  );
}
function onStatus(response) {
  console.info('onStatus', response);
  if (response.status === 'connected') {
    showAccountInfo();
  } else {
    showLoginButton();
  }
}
  // Load the SDK asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "https://connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
 FB.getLoginStatus(function(response) {
  onStatus(response); 
});
</script>