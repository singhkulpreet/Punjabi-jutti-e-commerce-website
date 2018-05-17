<!DOCTYPE html>
<html>
<head>
	<title></title>

<style type="text/css">
	*{margin: 0px; padding: 0px}
#container{background: url("login3.jpg");width: 1366px;height: 613px;background-size: 1350px 500px;}
 #login{border:5px solid;width: 800px;height: 500px;margin-left: 250px;background:#fffcb7;position: relative;top: 50px;}

   #login #email{position: relative;top: 120px;width: 230px;height: 35px;font-size: 17px;left: 50px;font-family: cursive;font-weight: bolder;border-radius: 5px;}
    #login #password{position: absolute;top: 180px;width: 230px;height: 35px;font-size: 17px;left: 50px;font-family: cursive;font-weight: bolder;border-radius: 5px;}
     #login #submit{position: absolute;top: 240px;width: 230px;height: 35px;font-size: 18px;left: 50px;font-family: cursive;font-weight: bolder;border-radius: 5px;border:3px solid ;} 
      #login #signin{position: absolute;top:330px;width: 230px;height: 35px;font-size: 18px;left: 50px;font-family: cursive;font-weight: bolder;border-radius: 5px;border:3px solid } 
       #svg_line{position: absolute;bottom: 150px;left: 450px}
        #line_signup{border:0px solid;position: absolute;bottom:235px;left: 370px;border-radius: 20%}
</style>

</head>
<body>





<div id="container">

<div id="login">
 <form>
 	<input id="email" type="email" name="name" placeholder="Email id" />
 	<input id="password" type="password" name="password" placeholder="Password">
 	<input id="submit" type="submit" name="Login">
</form>
<button id="signin">Signup</button>
</div>

<svg height="3" width="100" id="line_signup" >
  <line x1="0" y1="2" x2="100" y2="2" style="stroke:rgb(255,0,0);stroke-width:2;" />
</svg>



<svg height="300" width="500" id="svg_line" >
  <line x1="200" y1="0" x2="200" y2="300" style="stroke:rgb(255,0,0);stroke-width:2;" />
</svg>

</div>

</body>
</html>

<?php
	

	# Start the session 
	session_start();
	
	# Autoload the required files
	require_once __DIR__ . '/vendor/autoload.php';

	# Set the default parameters
	$fb = new Facebook\Facebook([
	  'app_id' => '851317321689779',
	  'app_secret' => 'c4fb12d90a6363e501e3c4fbf845cec9',
	  'default_graph_version' => 'v2.5',
	]);
	$redirect = 'http://localhost/juti_website/login222.php';


	# Create the login helper object
	$helper = $fb->getRedirectLoginHelper();

	# Get the access token and catch the exceptions if any
	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	# If the 
	if (isset($accessToken)) {
	  	// Logged in!
	 	// Now you can redirect to another page and use the
  		// access token from $_SESSION['facebook_access_token'] 
  		// But we shall we the same page

		// Sets the default fallback access token so 
		// we don't have to pass it to each request
		$fb->setDefaultAccessToken($accessToken);

		try {
		  $response = $fb->get('/me?fields=email,name');
		  $userNode = $response->getGraphUser();
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}


		// Print the user Details
		echo "Welcome !<br><br>";
		echo 'Name: ' . $userNode->getName().'<br>';
		echo 'User ID: ' . $userNode->getId().'<br>';
		echo 'Email: ' . $userNode->getProperty('email').'<br><br>';

		$image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
		echo "Picture<br>";
		echo "<img src='$image' /><br><br>";
		
	}else{
		$permissions  = ['email'];
		$loginUrl = $helper->getLoginUrl($redirect,$permissions);
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
