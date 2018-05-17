<?php

session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

<style type="text/css">
	*{margin: 0px; padding: 0px}
#container{border: 5px solid;background: url("login3.jpg");width: 1355px;height: 645px;background-size: 1350px 630px;overflow-y: hidden;}
 #login{border:5px solid;width: 700px;height: 200px;margin-left: 250px;background:#fffcb7;position: relative;top: 150px;}

   #login #email{position: relative;top: 30px;width: 230px;height: 35px;font-size: 17px;left: 50px;font-family: cursive;font-weight: bolder;border-radius: 5px;padding-left: 2px}
    #login #password{position: absolute;top: 80px;width: 230px;height: 35px;font-size: 17px;left: 50px;font-family: cursive;font-weight: bolder;border-radius: 5px;padding-left: 2px}
     #login #submit{position: absolute;top: 130px;width: 230px;height: 35px;font-size: 18px;left: 50px;font-family: cursive;font-weight: bolder;border-radius: 5px;border:3px solid ;} 
       #login #sign{position: absolute;top:130px;width: 230px;height: 35px;font-size: 18px;left: 50px;font-family: cursive;font-weight: bolder;border-radius: 5px;border:3px solid;margin-left: 47%; } 


#signin{border:5px solid;width: 800px;height: 500px;margin-left: 250px;background:#fffcb7;position: relative;top: 50px;display: none;}   
#signin #name{position: relative;top: 130px;width: 230px;height: 35px;font-size: 17px;left: 100px;font-family: cursive;font-weight: bolder;border-radius: 5px;padding-left: 2px;background:#fffcb7;}
#signin #email2{position:absolute;top: 190px;width: 230px;height: 35px;font-size: 17px;left: 100px;font-family: cursive;font-weight: bolder;border-radius: 5px;padding-left: 2px}
    #signin #password2{position: absolute;top: 250px;width: 230px;height: 35px;font-size: 17px;left: 100px;font-family: cursive;font-weight: bolder;border-radius: 5px;padding-left: 2px}
      .sub{position: absolute;top: 330px;width: 230px;height: 35px;font-size: 18px;left: 100px;font-family: cursive;font-weight: bolder;border-radius: 5px;border:3px solid ;} 
   #a{width: 230px;height: 35px;font-weight: bolder;font-size: 18px;position: absolute;border: 2px solid;float:bottom;left: 100px;}

      
       #svg_line{position: absolute;bottom: 185px;left: 450px}
        #line_signup{border:0px solid;position: absolute;bottom:275px;left: 370px;border-radius: 20%}



#fb{position: absolute;left: 650px;bottom: 400px;}

#gmail{position: absolute;left: 700px;bottom: 300px;}

</style>

</head>



<body>





<div id="container">

<div id="login">
 <form method="POST" action="firstpage.php" enctype="multipart/form-data">
 	<input id="email" type="email" name="emai" placeholder="Email id" />
 	<input id="password" type="password" name="pass" placeholder="Password">
 	<input id="submit" type="submit" name="Login" value="Login">
</form>
<button id="sign" onclick="sign_butt()">Signup</button>
</div>

<script type="text/javascript">
	function myFunction()
	{ 
       
        var w=document.getElementById("email2").value;
        var e=document.getElementById("password2").value;




var xhttp2=new XMLHttpRequest();
xhttp2.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) 
  {//document.getElementById("w_c").innerHTML = xhttp2.responseText;
  alert(xhttp2.responseText);

if(xhttp2.responseText=="succesfull")
{
   var c=document.getElementById("back");
   c.style.display="block";
}

}

};

xhttp2.open("GET", 'sign_verification.php?v='+q+"&sec="+w+"&third="+e, true);
  xhttp2.send();


}


</script>


<div id="signin">
	
		<input id="name" type="text" name="name" placeholder="Name">
		<br>
		<input id="email2" type="email" name="email" placeholder="Email id">
		<br>
		<input id="password2" type="password" name="pass" placeholder="Password">
		<br>
		


		<button  onclick="myFunction()" class="sub"  >Sign in</button>
	    
	    <a href="login_page.php" id="back" style="display: none;font-family: cursive;"><b>Now go back and login...</b></a>

</div>







</div>



</body>
</html>

<script type="text/javascript">
	function sign_butt()
	{
		var a=document.getElementById("login");
		var b=document.getElementById("signin");
		
		a.style.display="none";
		b.style.display="block";
		//c.style.display="block";
	}
</script>

<?php
	

	# Start the session 
	//session_start();
	
	# Autoload the required files
	require_once __DIR__ . '/vendor/autoload.php';

	# Set the default parameters
	$fb = new Facebook\Facebook([
	  'app_id' => '851317321689779',
	  'app_secret' => 'c4fb12d90a6363e501e3c4fbf845cec9',
	  'default_graph_version' => 'v2.5',
	]);
	$redirect = 'http://localhost/juti_website/firstpage.php';


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
		// we don't have to pass it to each reques
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
		?>  <div id="fb">
		<?php echo '  <a href="' . $loginUrl . '">  <img src="loginfacebook.png" width="200" height="50" ></a> ';?>
</div>
<?php


	  

	}

?>
















<?php
/*  GOOGLE LOGIN BASIC - Tutorial
 *  file            - index.php
 *  Developer       - Krishna Teja G S
 *  Website         - http://packetcode.com/apps/google-login/
 *  Date            - 28th Aug 2015
 *  license         - GNU General Public License version 2 or later
/*

// REQUIREMENTS - PHP v5.3 or later
// Note: The PHP client library requires that PHP has curl extensions configured. 

/*
 * DEFINITIONS
 *
 * load the autoload file
 * define the constants client id,secret and redirect url
 * start the session
 */
/*
require_once __DIR__.'/gplus-lib/vendor/autoload.php';

const CLIENT_ID = '475619592570-4g5tk5odg7aoa12miq8oatvn2kve8dmh.apps.googleusercontent.com';
const CLIENT_SECRET = 'sTGBo1a2tYY4jnOrnFspgz9q';
const REDIRECT_URI = 'http://localhost/juti_website/firstpage.php';

//session_start();

/* 
 * INITIALIZATION
 *
 * Create a google client object
 * set the id,secret and redirect uri
 * set the scope variables if required
 * create google plus object
 
$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);

/*
 * PROCESS
 *
 * A. Pre-check for logout
 * B. Authentication and Access token
 * C. Retrive Data
 */

/* 
 * A. PRE-CHECK FOR LOGOUT
 * 
 * Unset the session variable in order to logout if already logged in    
 
if (isset($_REQUEST['logout'])) {
   session_unset();
}

/* 
 * B. AUTHORIZATION AND ACCESS TOKEN
 *
 * If the request is a return url from the google server then
 *  1. authenticate code
 *  2. get the access token and store in session
 *  3. redirect to same url to eleminate the url varaibles sent by google
 
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

/* 
 * C. RETRIVE DATA
 * 
 * If access token if available in session 
 * load it to the client object and access the required profile data
 
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $me = $plus->people->get('me');

  // Get User data
  $id = $me['id'];
  $name =  $me['displayName'];
  $email =  $me['emails'][0]['value'];
  $profile_image_url = $me['image']['url'];
  $cover_image_url = $me['cover']['coverPhoto']['url'];
  $profile_url = $me['url'];

} else {
  // get the login url   
  $authUrl = $client->createAuthUrl();
}


?>

<!-- HTML CODE with Embeded PHP-->
<div id="gmail">
    <?php
    /*
     * If login url is there then display login button
     * else print the retieved data
    
    if (isset($authUrl)) {
        echo "<a class='login' href='" . $authUrl . "'><img src='gplus-lib/signin_button.png' width='200' height='55'/></a>";
    } else {
        print "ID: {$id} <br>";
        print "Name: {$name} <br>";
        print "Email: {$email } <br>";
        print "Image : {$profile_image_url} <br>";
        print "Cover  :{$cover_image_url} <br>";
        print "Url: {$profile_url} <br><br>";
        echo "<a class='logout' href='?logout'><button>Logout</button></a>";
    }
    ?>
</div>*/









	






