
<?php

/*  GOOGLE LOGIN BASIC - Tutorial
 *  file            - index.php
 *  Developer       - Krishna Teja G S
 *  Website         - http://packetcode.com/apps/google-login/
 *  Date            - 28th Aug 2015
 *  license         - GNU General Public License version 2 or later
*/

// REQUIREMENTS - PHP v5.3 or later
// Note: The PHP client library requires that PHP has curl extensions configured. 

/*
 * DEFINITIONS
 *
 * load the autoload file
 * define the constants client id,secret and redirect url
 * start the session
 

require_once __DIR__.'/gplus-lib/vendor/autoload.php';

const CLIENT_ID = '475619592570-4g5tk5odg7aoa12miq8oatvn2kve8dmh.apps.googleusercontent.com';
const CLIENT_SECRET = 'sTGBo1a2tYY4jnOrnFspgz9q';
const REDIRECT_URI = 'http://localhost/juti_website/firstpage.php';

session_start();

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
    
    //if (isset($authUrl)) {
       // echo "<a class='login' href='" . $authUrl . "'><img src='gplus-lib/signin_button.png' width='200' height='55'/></a>";
    //} else {
        //print "ID: {$id} <br>";
        //print "Name: {$name} <br>";
        //print "Email: {$email } <br>";
        //print "Image : {$profile_image_url} <br>";
        //print "Cover  :{$cover_image_url} <br>";
        //print "Url: {$profile_url} <br><br>";
        //echo "<a class='logout' href='?logout'><button>Logout</button></a>";
    
    
    
    $db=mysqli_connect("localhost","root","","jutti");
        $google_sql="SELECT * FROM users where email='$email' ";
        $google_result=mysqli_query($db,$google_sql);
        if(mysqli_num_rows($google_result)>0)
        { 
            //echo"hi";
            while($row_google=mysqli_fetch_array($google_result))
            {
            $user_id=$row_google[0];
                //echo "yesss";
            }
        }
         else {
             //echo "hi";
             $google_sql2="INSERT INTO users (email,image) values ('$email','$profile_image_url') ";
             mysqli_query($db,$google_sql2);
             
             $result_countt=mysqli_query($db,"SELECT COUNT FROM users");
             echo"$result_countt";
             $user_id=$result_countt;
             
             
         } 
    
    
    
    //}
    ?>
</div>

*/



////////gmail aur facebook ka code clash ho rha hai

?>






























































































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
  $redirect = 'http://localhost/fb22/New%20folder/index.php';


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
    //echo "Welcome !<br><br>";
    //echo 'Name: ' . 
        $fb_name=$userNode->getName().'<br>';
    
        //echo 'User ID: ' . $userNode->getId().'<br>';
        $fb_id=$userNode->getId();
    //echo 'Email: ' . $userNode->getProperty('email').'<br><br>';
         $fb_email=$userNode->getProperty('email');
    $fb_image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=200';
    //echo "Picture<br>";
    //echo "<img src='$fb_image' /><br><br>";
        //echo"hi";
        $db=mysqli_connect("localhost","root","","jutti");
        $fb_sql="SELECT * FROM users where email='$fb_email' ";
        $fb_result=mysqli_query($db,$fb_sql);
        if(mysqli_num_rows($fb_result)>0)
        { 
            //echo"hi";
            while($row_fb=mysqli_fetch_array($fb_result))
            {
            $user_id=$row_fb[0];
                //echo "yesss";
            }
        }
         else {
             //echo "hi";
             $fb_sql2="INSERT INTO users (email,image) values ('$fb_email','$fb_image') ";
             mysqli_query($db,$fb_sql2);
             
             $result_count=mysqli_query($db,"SELECT COUNT FROM users");
             echo"$result_count";
             $user_id=$result_count;
             
             
         }    
    
  }//else{
    //$permissions  = ['email'];
    //$loginUrl = $helper->getLoginUrl($redirect,$permissions);
    //echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
  //}
?>

































































<?php

if(isset($_POST['Login']))
{
  $email=$_POST['emai'];
  $pass=$_POST['pass'];


  if((!empty($email)) && (!empty($pass)))
     {
        $db4=mysqli_connect("localhost","root","","jutti");
        $sql4="SELECT * from users where email='$email' and pass='$pass' ";
        $result4=mysqli_query($db4,$sql4);
        $row4=mysqli_fetch_row($result4);
        $count4 = mysqli_num_rows($result4);
        if($count4>0)
          { $user_id= $row4[0];
           
           
           
            //echo $user_id;
      }
        else{header('Location: login_page.php');}
     }
else header('Location: login_page.php');

}



?>

<!DOCTYPE html>
<html>
<head>
	<title>firstpage_back.jpg</title>

<style type="text/css">
	
	*{margin: 0px;padding: 0px;}
	#container{background: url("login3.jpg");background-repeat: no-repeat;background-size:1600px 2000px ;border: 3px solid;width: auto;height: 2300px;position: relative;overflow:hidden;}

#header{border: 5px solid transparent;height: 100px;width: 1300px;margin-left: 20px;border-bottom-color:#8B4513;background-color:rgba(255,165,0,0.6) ;border-radius:10px; }
 #header #name{left: 450px;bottom: 90px;position: relative;} 
  #b1{animation: bhangra 5s linear infinite;}
  @keyframes bhangra{
  	0%{transform: rotate(0deg);}
  	25%{transform: rotate(30deg);}
  	50%{transform: rotate(0deg);}
  	75%{transform: rotate(-30deg);}
  	100%{transform: rotate(0deg);}
  }

  #name span{position: relative;font-weight:900;font-size: 40px;font-family:"Comic Sans MS", cursive, sans-serif}
   
   #name span:nth-child(1)
   {color: black;animation: span1 3s linear infinite;}
   #name span:nth-child(2)
   {color: black;animation: span2 3s linear infinite;}
   #name span:nth-child(3)
   {color: black;animation: span3 3s linear infinite;}
   #name span:nth-child(4)
   {color: black;animation: span4 3s linear infinite;}
   #name span:nth-child(5)
   {color: black;animation: span5 3s linear infinite;}
   #name span:nth-child(6)
   {color: red;animation: span6 3s linear infinite;}
   #name span:nth-child(7)
   {color: red;animation: span7 3s linear infinite;}
   #name span:nth-child(8)
   {color: red;animation: span8 3s linear infinite;}
   #name span:nth-child(9)
   {color: red;animation: span9 3s linear infinite;}
   #name span:nth-child(10)
   {color: red;animation: span10 3s linear infinite;}

@keyframes span1
{
	0%{color: red;font-size: 43px;}
    10%{color: red;}
}
@keyframes span2
{
	20%{color: red;font-size: 43px;}
	30%{color: red;}
}
@keyframes span3
{
	30%{color: red;font-size: 43px;}
	40%{color: red;}
}
@keyframes span4
{
	40%{color: red;font-size: 43px;}
	50%{color: red;}
}
@keyframes span5
{
	50%{color: red;font-size: 43px;}
	60%{color: red;}
}

@keyframes span7
{
	60%{color: black;font-size: 43px;}
	70%{color: black;}
}
@keyframes span8
{
	70%{color: black;font-size: 43px;}
	80%{color: black;}
}
@keyframes span9
{
	80%{color: black;font-size: 43px;}
	90%{color:black;}
}
@keyframes span10
{
	90%{color: black;font-size: 43px;}
	100%{color: black;}
}


#nav{margin-left: 440px;top: 20px;position: relative;}
#nav ul{list-style: none;float: left;}
#nav ul li{float: left;display: block;border: 5px solid transparent;width: 130px;height: 40px;line-height:40px ;font-size: 25px;font-weight: bolder;text-align: center;font-family:"Comic Sans MS", cursive;;border-bottom-color:#FFA500;background:rgba(255,165,0,0.2);border-radius: 5px }
#nav a{text-decoration: none;color:red}

#dp_container{border: 5px solid;width: 200px;height: 200px;margin-top: 20px;margin-left:20px;border-radius: 50%;background:url("default.jpeg");position: relative;}
 #profile_pic{}
#dp_container  #upload_dp{position: absolute;border: 1px solid;width: 200px;height: 200px;top: 0px;left: 0px;border-radius: 50%;background-color:rgba(255,165,0,0.6) ;opacity: 0;}
#dp_container:hover #upload_dp{opacity: 1}

#info{border: 1px solid;width: 200px;height: 200px;float: right;position: relative;right: 20px;bottom: 210px;background: url("jutti2.jpg");background-size: 200px 200px;border-radius: 50%;overflow: hidde;}
 #info ul{position: relative;left: 50px;list-style: none;margin-top: 20px;}
  #info ul li{font-size: 25px;font-family: cursive;color: orange}
   #info button{margin-left: 30px;margin-top: 55px;width: 150px;font-size: 25px;height: 60px;border-radius: 200%;line-height: 0px;background-color: orange;border:0px;color: blue;font-family: cursive;}



#wjutti_label{border:0pxsolid;height: 40px;width: 500px;top:450px;position: absolute;font-size: 25px;font-weight: bolder;background: orange;left: 420px;text-align: center;border-radius: 50%;line-height: 30px;font-family: cursive;}
#show_all_1{border:0pxsolid;float: right;position: absolute;right: 40px;top: 450px;width: 120px;height: 40px;border-radius: 50%;font-family: cursive;font-weight: bolder;font-size: 20px;background: black;color: orange}
#wjutti{border:0pxsolid;height: 235px;width: 1320px;margin-left: 15px;overflow: hidden;bottom: 45px;position: relative;}
 #img_container{border:0pxsolid ;height: 200px;width: 1260px;overflow: hidden;margin-left:25px;} 
   #image{border:4px solid orange;height: 200px;width: 300px;float: left;margin-left: 5px;border-radius: 7px;overflow: hidden;display: block;}
   #label_container{border:0pxsolid;height: 27px;width: 1260px;margin-left: 28px;margin-top: 4px}
    #label_container #labels{border: 4px solid orange;height: 27px;width: 300px;float: left;text-align:center;font-size: 22px;margin-left: 5px;background: orange;border-radius: 60%;}
     #wjutti #bu1{position: absolute;top: 100px;font-size: 40px;left: -2px;background: transparent;border: 0px}
      #wjutti #bu2{position: absolute;float:right;right:10px;top: 100px;font-size: 40px;background: transparent;border: 0px }



#mjutti_label{border:0pxsolid;height: 40px;width: 500px;top:830px;position: absolute;font-size: 25px;font-weight: bolder;font-family: cursive;background: orange;left: 420px;text-align: center;border-radius: 50%;line-height: 30px}
#show_all_2{border:0pxsolid;float: right;position: absolute;right: 60px;top:830px;width: 120px;height: 40px;border-radius: 50%;font-family: cursive;font-weight: bolder;font-size: 20px;background: black;color: orange;}
#mjutti{border:0pxsolid;height: 235px;width: 1320px;margin-left: 15px;top:98px;overflow: hidden;position: relative;}
 #mjutti #img_container2{border:0pxsolid ;height: 200px;width: 1260px;overflow: hidden;margin-left:25px} 
   #image2{border:4px solid orange;height: 200px;width: 300px;float: left;margin-left: 5px;border-radius: 7px;overflow: hidden;display: block;}
   #label_container2{border:0pxsolid;height: 27px;width: 1260px;margin-left: 28px;margin-top: 4px}
    #label_container2 #labels2{border: 4px solid orange;height: 27px;width: 300px;float: left;text-align:center;font-size: 22px;margin-left: 5px;background: orange;border-radius: 60%;}
     #mjutti #bu11{position: absolute;top: 100px;font-size: 40px;left: -2px;background: transparent;border: 0px}
      #mjutti #bu22{position: absolute;float:right;right:10px;top: 100px;font-size: 40px;background: transparent;border: 0px }



#parande_label{border:0px solid;height: 40px;width: 500px;top:185px;position: relative;font-size: 25px;font-weight: bolder;background: orange;left: 420px;text-align: center;border-radius: 50%;line-height: 30px;font-family: cursive;}
#show_all_3{border:0px solid;float: right;position: relative;right: 60px;top:147px;width: 120px;height: 40px;border-radius: 50%;font-family: cursive;font-weight: bolder;font-size: 20px;background: black;color: orange;}
#parande{border:0px solid;height: 235px;width: 1320px;margin-left: 15px;top:150px;overflow: hidden;position: relative;}
 #parande #img_container3{border:0px solid ;height: 200px;width: 1260px;overflow: hidden;margin-left:25px} 
   #image3{border:4px solid orange;height: 200px;width: 300px;float: left;margin-left: 5px;border-radius: 7px;overflow: hidden;display: block;}
   #label_container3{border:0px solid;height: 27px;width: 1260px;margin-left: 28px;margin-top: 4px}
    #label_container3 #labels3{border: 4px solid orange;height: 27px;width: 300px;float: left;text-align:center;font-size: 22px;margin-left: 5px;background: orange;border-radius: 60%;}
     #parande #bup1{position: absolute;top: 100px;font-size: 40px;left: -2px;background: transparent;border: 0px}
      #parande #bup2{position: absolute;float:right;right:10px;top: 100px;font-size: 40px;background: transparent;border: 0px }


#recommendations_label{border:0px solid;height:40px;width: 500px;position: relative;top:290px;border-radius: 50%;left:420px;font-size: 25px;font-family: cursive;text-align: center;font-weight: bold;background: orange }
#recommendations{border: 0px solid;height: 235px;width: 1320px;position:relative;top: 300px;margin-left: 15px;}
  #recommendations #img_container4{border: 0px solid;height: 200px;width: 1260px;margin-left: 25px; overflow: hidden; }
    #img_container4 .recom{margin-left: 7px;border: 4px solid orange;border-radius: 7px;} 

  #label_container4{border:0px solid;height: 28px;width: 1260px;margin-left: 28px;margin-top: 4px;overflow: hidden;}
 #label_container4 #labels4{border: 4px solid orange;height: 27px;width: 300px;float: left;text-align:center;font-size: 22px;margin-left: 5px;background: orange;border-radius: 60%;}  
#recommendations #bup71{font-size: 40px;position: absolute;background-color: transparent;border:0px solid;top: 100px;}
#recommendations #bup72{font-size: 40px;position: absolute;float: right;right: 10px;background-color: transparent;border:0px solid;top: 100px}




#last_box{border: 5px solid transparent;border-radius: 15px ; width:1270px ;height: 200px;position: absolute;left: 35px;background-color:rgba(255,165,0,0.9) ;animation: lastt 2s linear infinite;top: 1980px}
@keyframes lastt{
  0%{border-bottom-color: red}
  25%{border-bottom-color: blue}
  50%{border-bottom-color: black}
  75%{border-bottom-color: deeppink}
  100%{border-bottom-color: green}
}

#last_box #company{border: 0px solid;width:200px;height:200px;position: absolute;left: 85px;font-size:18px;text-align: left;}
  #last_box #support{border: 0px solid;width:200px;height:200px;position: absolute;left: 385px;font-size:18px;text-align: left;}
   #last_box #Follow_Us{border: 0px solid;width:250px;height:200px;position: absolute;left: 685px;font-size:18px;text-align: left;}
    #last_box #address{border: 0px solid;width:200px;height:200px;position: absolute;left: 1035px;font-size:18px;text-align: left;}

</style>
	

</head>
<body>

<div id="container">

  <div id="header">
  	<img id="b1" src="trans.png" width="150" height="100" style="opacity: 0.8">
  	<img id="b1" src="trans.png" width="150" height="100" style="opacity: 0.8;float: right;">
  	<div id="name">
  		<span>J</span>
  		<span>U</span>
  		<span>T</span>
  		<span>T</span>
  		<span>I</span>
  		<span> &nbsp;</span>
  		<span>W</span>
  		<span>A</span>
  		<span>L</span>
  		<span>A</span>
  	</div>
</div>


<div id="nav">
<ul>
	<li><a href="women_juttis.php?id=<?php echo $user_id; ?> ">Women</a></li>
	<li><a href="men_juttis.php?id=<?php echo $user_id; ?> ">Men</a></li>
	<li><a href="parande_all.php?id=<?php echo $user_id; ?>">Parande</a></li>
</ul>
</div>

<div id="dp_container">
<div id="profile_pic">
	
 <?php


 
 $db6=mysqli_connect("localhost","root","","jutti");
        $sql6="SELECT * from users where id='$user_id' ";
        $result6=mysqli_query($db6,$sql6);
        $row6=mysqli_fetch_row($result6);
        $count6= mysqli_num_rows($result6);
        ?><div ><img id="aa" src="<?php echo $row6[3];  ?>"  height="200" width="200" style=" border: 0px solid;border-radius: 50%;position: relative;bottom: 25px "></div>    
 <label style="font-size: 25px;font-weight: bolder;font-family: cursive;position: relative;left: 30px;bottom: 20px;"><?php echo $row6[10]; ?></label>
<?php

  ?>

</div>
<div id="upload_dp">
     <input style="font-weight: bolder;font-family: cursive;margin-top: 100px;margin-left: 4px" id="mySelect" type="file" name="load" onchange="lo()">
 
   
</div>

</div>  

   <script type="text/javascript">
     function lo()
     {//alert(x);
      //var l=document.getElementById("mySelect");
        //alert(mySelect.files.item(0).name);
        var z=mySelect.files.item(0).name;


var xhtt= new XMLHttpRequest();
xhtt.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     document.getElementById("aa").src= this.responseText;
        //alert(this.responseText); 
    }
};
xhtt.open("GET", 'dp.php?h='+<?php echo $user_id; ?>+"&secon="+z , true);
  xhtt.send();

}

   </script>








<div id="info">
	
 <ul>
 
<?php


$count_cart_items=0;
$db=mysqli_connect("localhost","root","","jutti");
    
//$b=$_GET['v'];

    $sql="SELECT * from users where id='$user_id' ";
    $result=mysqli_query($db,$sql);
   while($row=mysqli_fetch_row($result))
   { 


    if($row[7]==""){
    }
    else{++$count_cart_items;}

    if($row[8]==""){
    }
    
    else{++$count_cart_items;}
    
if($row[9]==""){
    }
    else{++$count_cart_items;}

   }

       

?>
<?php
function dest()
{
  //session_destroy();
  echo("efefef");
  header('Location:login_page.php');
}
?>


      <li><b>
      
      <a href="cart_items.php?id=<?php echo $user_id; ?>" style="text-decoration:none;color:orange;">Cart(<?php echo $count_cart_items;  ?>)</a></b></li>



<script type="text/javascript">

function wish_cou(){
var xhttp2=new XMLHttpRequest();
xhttp2.onreadystatechange=function(){
  
  if (this.readyState == 4 && this.status == 200) 
  {document.getElementById("w_c").innerHTML = xhttp2.responseText; }

};

xhttp2.open("GET", 'wish_count.php?v='+<?php echo $user_id; ?>, true);
  xhttp2.send();
}

wish_cou();
</script>    

<li><b><a href="wish_items.php?id=<?php echo $user_id; ?>" style="text-decoration:none;color:orange;">Wish(<label id=w_c >0</label>)</a></b></li>
 </ul>






<button onclick="destry_all()"><b>Log Out</b></button>
<script type="text/javascript">
function destry_all()
{
  alert("yess");
   <?php echo dest(); ?>
}
</script>

</div>




<div id="wjutti_box">
<div id="wjutti_label">
  <label>punjabi jutti for women</label>
</div>
</div>


<form method="POST" action="women_juttis.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $user_id; ?>">
<input type="submit" id="show_all_1" value="Show All" name="show" style="text-decoration: none;color: orange">
</form>

<div id="wjutti">

<button id="bu1" onclick="nextimg(-1)"><b>&#x21AB</b></button>
<button id="bu2" onclick="nextimg(1)"><b>&#x21AC</b></button>

<div id="img_container">
  <?php

     $db=mysqli_connect("localhost","root","","jutti");
     $sql="SELECT image,id from wjutti ";
     $result=mysqli_query($db,$sql); 
    
     while ($row=mysqli_fetch_array($result)) {
        
      ?>
             
            <form method="POST" action="w_juttis.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <input type="hidden" name="user_id_for" value="<?php echo $user_id; ?>"> 
            <input type="image" class="w_img" id="image" name="image1" src="<?php echo $row["image"]; ?>" width="300" height="200" >
            </form>
            

     <?php echo"";
     }

?> 

</div>


<div id="label_container">
  <?php

     $db=mysqli_connect("localhost","root","","jutti");
     $sql="SELECT price,id from wjutti ";
     $result=mysqli_query($db,$sql); 
    
     while ($row=mysqli_fetch_array($result)) {
        
      ?>
           
        <img  class="wis" onclick="wish1('<?php echo $row['id']; ?>')" ondblclick="unwish('<?php echo $row['id']; ?>')" style="position: absolute;margin-top: 8px;background: white;margin-left: 50px;border:0px solid;overflow: hidden;border-radius: 8px;" src="oie_transparent.png" width="20" height="20">

        <label id="labels" class="wjlab"><b>₹<?php echo $row['price']; ?>.00</b></label>
        

     <?php echo"";
     }

?> 
</div>




    </div>   
    
<div>   
    
    
    
    
    
    
    
    
<script type="text/javascript">
  var col=0;
  function wish1(x)
  { 
    

    var a=document.getElementsByClassName('wis');
    
   a[x-1].style.background="red";





var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("demo").innerHTML = this.responseText;
        wish_cou(); 
    }
};
xhttp.open("GET", 'data.php?v='+x+"&second="+<?php echo $user_id ?>, true);
  xhttp.send();

  
  }



  function unwish(y)
  {
    
      var b=document.getElementsByClassName('wis');
      b[y-1].style.background="white";
      var w="womenjutti"

var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     
        wish_cou(); 
    }
};
xhttp.open("GET", 'unwis.php?v='+y+"&sec="+<?php echo $user_id ?>+"&third="+w, true);
  xhttp.send();



  }

</script>






<div id="mjutti_label">
  <label>punjabi jutti for Men</label>
</div>
    <form method="POST" action="men_juttis.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $user_id; ?>">
<input type="submit" id="show_all_2" value="Show All" name="show" style="text-decoration: none;color: orange">
</form>


<div id="mjutti">
 
<button id="bu11" onclick="nextimg2(-1)"><b>&#x21AB</b></button>
<button id="bu22" onclick="nextimg2(1)"><b>&#x21AC</b></button>

<div id="img_container2">
  <?php

     $db2=mysqli_connect("localhost","root","","jutti");
     $sql2="SELECT image,id from mjutti ";
     $result2=mysqli_query($db2,$sql2); 
    
     while ($row2=mysqli_fetch_array($result2)) {
        
      ?>

            <form method="POST" action="m_juttis.php" enctype="multipart/form-data">
            <input type="hidden" name="id2" value="<?php echo $row2['id']; ?>" >
            <input type="hidden" name="user" value="<?php echo $user_id; ?>" > 
            <input type="image" class="m_img" id="image2" name="image2" src="<?php echo $row2["image"]; ?>" width="300" height="200" >
            </form> 
            
          
            

     <?php echo"";
     }

?> 

</div>

<div id="label_container2">
  <?php

     $db=mysqli_connect("localhost","root","","jutti");
     $sql="SELECT price,id from mjutti ";
     $result=mysqli_query($db,$sql); 
    
     while ($row=mysqli_fetch_array($result)) {
        
      ?>
        

        <img  class="wis2" onclick="wish2('<?php echo $row['id']; ?>')" ondblclick="unwish2('<?php echo $row['id']; ?>')" style="position: absolute;margin-top: 8px;background: white;margin-left: 50px;border:0pxsolid;overflow: hidden;border-radius: 8px;" src="oie_transparent.png" width="20" height="20">

        <label id="labels2" class="mjlab"><b>₹<?php echo $row['price']; ?>.00</b></label>
        

     <?php echo"";
     }

?> 
</div>

</div>
<script type="text/javascript">
  //var col=0;
  function wish2(x)
  { 
    

    var a2=document.getElementsByClassName('wis2');
    
   a2[x-1].style.background="red";





var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("demo").innerHTML = this.responseText;
        wish_cou(); 
    }
};
xhttp.open("GET", 'data1.php?v='+x+"&second="+<?php echo $user_id ?>, true);
  xhttp.send();

  
  }



  function unwish2(y)
  {
      var m="menjutti";
      var b2=document.getElementsByClassName('wis2');
      b2[y-1].style.background="white";


var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     
        wish_cou(); 
    }
};
xhttp.open("GET", 'unwis.php?v='+y+"&sec="+<?php echo $user_id ?>+"&third="+m, true);
  xhttp.send();



  }

</script>







<div id="parande_label">
  <label>parande for Women</label>
</div>
    <form method="POST" action="parande_all.php" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $user_id; ?>">
<input type="submit" id="show_all_3" value="Show All" name="show" style="text-decoration: none;color: orange">
</form>

<div id="parande">
 
<button id="bup1" onclick="nextimg3(-1)"><b>&#x21AB</b></button>
<button id="bup2" onclick="nextimg3(1)"><b>&#x21AC</b></button>

<div id="img_container3">
  <?php

     $db3=mysqli_connect("localhost","root","","jutti");
     $sql3="SELECT image,id from parande ";
     $result3=mysqli_query($db3,$sql3); 
    
     while ($row3=mysqli_fetch_array($result3)) {
        
      ?>

          <form method="POST" action="parande_id.php" enctype="multipart/form-data">
            <input type="hidden" name="id3" value="<?php echo $row3['id']; ?>" >
            <input type="hidden" name="user" value="<?php echo $user_id; ?>" > 
            <input type="image" class="p_img" id="image3" src="<?php echo $row3["image"]; ?>" width="300" height="200" >
            </form> 
            
          

     <?php echo"";
     }

?> 

</div>

<div id="label_container3">
  <?php

     $db3=mysqli_connect("localhost","root","","jutti");
     $sql3="SELECT price,id from parande ";
     $result3=mysqli_query($db3,$sql3); 
    
     while ($row3=mysqli_fetch_array($result3)) {
        
      ?>
        
        <img  class="wis3" onclick="wish3('<?php echo $row3['id']; ?>')" ondblclick="unwish3('<?php echo $row3['id']; ?>')" style="position: absolute;margin-top: 8px;background: white;margin-left: 50px;border:0pxsolid;overflow: hidden;border-radius: 8px;" src="oie_transparent.png" width="20" height="20">

        <label id="labels3" class="plab"><b>₹<?php echo $row3['price']; ?>.00</b></label>
        

     <?php echo"";
     }

?> 
</div>

</div>


</div>
<script type="text/javascript">
function wish3(x)
  { 
    

    var a3=document.getElementsByClassName('wis3');
    
   a3[x-1].style.background="red";





var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("demo").innerHTML = this.responseText;
        wish_cou(); 
    }
};
xhttp.open("GET", 'data3.php?v='+x+"&second="+<?php echo $user_id ?>, true);
  xhttp.send();

  
  }



  function unwish3(y)
  {
    var p="parande";
      var b3=document.getElementsByClassName('wis3');
      b3[y-1].style.background="white";


var xhttp=new XMLHttpRequest();
xhttp.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     
        wish_cou(); 
    }
};
xhttp.open("GET", 'unwis.php?v='+y+"&sec="+<?php echo $user_id ?>+"&third="+p, true);
  xhttp.send();



  }

</script>





<div id="recommendations_label">
<label>Recommendations</label>
</div>


<div id="recommendations">
  <button id="bup71" ><b>&#x21AB</b></button>
  <button id="bup72"><b>&#x21AC</b></button>
  <div id="img_container4">

    <?php
       $db5=mysqli_connect("localhost","root","","jutti");
       $sql7="SELECT * from recommend where user_id=$user_id ";
       $result7=mysqli_query($db5,$sql7);
       $row7=mysqli_fetch_row($result7);


       
      
 if($row7[10]=="wjutti")
       {
         $sql8="SELECT image,price from wjutti where id=$row7[9]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
       }

        else if($row7[10]=="mjutti")
        {
           $sql8="SELECT image,price from mjutti where id=$row7[9]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
        }

          else if($row7[10]=="parande")
          {
             $sql8="SELECT image,price from parande where id=$row7[9]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
          }





if($row7[8]=="wjutti")
       {
         $sql8="SELECT image,price from wjutti where id=$row7[7]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
       }

        else if($row7[8]=="mjutti")
        {
           $sql8="SELECT image,price from mjutti where id=$row7[7]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
        }

          else if($row7[8]=="parande")
          {
             $sql8="SELECT image,price from parande where id=$row7[7]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
          }






if($row7[6]=="wjutti")
       {
         $sql8="SELECT image,price from wjutti where id=$row7[5]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
       }

        else if($row7[6]=="mjutti")
        {
           $sql8="SELECT image,price from mjutti where id=$row7[5]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
        }

          else if($row7[6]=="parande")
          {
             $sql8="SELECT image,price from parande where id=$row7[5]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
          }     


if($row7[4]=="wjutti")
       {
        $sql8="SELECT image,price from wjutti where id=$row7[3]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
       }

        else if($row7[4]=="mjutti")
        {
          $sql8="SELECT image,price from mjutti where id=$row7[3]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
        }

          else if($row7[4]=="parande")
          {
            $sql8="SELECT image,price from parande where id=$row7[3]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
          }


if($row7[2]=="wjutti")
       {
           $sql8="SELECT image,price from wjutti where id=$row7[1]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
       }

        else if($row7[2]=="mjutti")
        {
          $sql8="SELECT image,price from mjutti where id=$row7[1]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px "><?php 
        }

          else if($row7[2]=="parande")
          {
            $sql8="SELECT image,price from parande where id=$row7[1]";
           $result8=mysqli_query($db5,$sql8);
           $row8=mysqli_fetch_array($result8);
           ?><img class="recom" src="<?php echo $row8["image"]; ?>"  style="width:300px ;height:200px"><?php 
          }


    ?>    

  </div>



<div id="label_container4">
<?php

 $db6=mysqli_connect("localhost","root","","jutti");
       $sql8="SELECT * from recommend where user_id=$user_id ";
       $result8=mysqli_query($db6,$sql8);
       $row8=mysqli_fetch_row($result8);


     if($row8[10]=="wjutti")
       {
         $sql9="SELECT image,price from wjutti where id=$row8[9]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
           ?><label id="labels4"><b>₹<?php echo $row9['price']; ?>.00</b></label><?php 
       }

        else if($row8[10]=="mjutti")
        {
           $sql9="SELECT image,price from mjutti where id=$row8[9]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
           ?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php
        }

          else if($row8[10]=="parande")
          {
             $sql9="SELECT image,price from parande where id=$row8[9]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
          ?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php
          }




if($row8[8]=="wjutti")
       {
         $sql9="SELECT image,price from wjutti where id=$row8[7]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
           ?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php 
       }

        else if($row8[8]=="mjutti")
        {
           $sql9="SELECT image,price from mjutti where id=$row8[7]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php  
        }

          else if($row8[8]=="parande")
          {
             $sql9="SELECT image,price from parande where id=$row8[7]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
           ?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php  
          }






if($row8[6]=="wjutti")
       {
         $sql9="SELECT image,price from wjutti where id=$row8[5]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
           ?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php  
       }

        else if($row8[6]=="mjutti")
        {
           $sql9="SELECT image,price from mjutti where id=$row8[5]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php  
        }

          else if($row8[6]=="parande")
          {
             $sql9="SELECT image,price from parande where id=$row8[5]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00<b>₹</label><?php  
          }     


if($row8[4]=="wjutti")
       {
        $sql9="SELECT image,price from wjutti where id=$row8[3]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php 
       }

        else if($row8[4]=="mjutti")
        {
          $sql9="SELECT image,price from mjutti where id=$row8[3]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php  
        }

          else if($row8[4]=="parande")
          {
            $sql9="SELECT image,price from parande where id=$row8[3]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php 
          }


if($row8[2]=="wjutti")
       {
           $sql9="SELECT image,price from wjutti where id=$row8[1]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php 
       }

        else if($row8[2]=="mjutti")
        {
          $sql9="SELECT image,price from mjutti where id=$row8[1]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php 
        }

          else if($row8[2]=="parande")
          {
            $sql9="SELECT image,price from parande where id=$row8[1]";
           $result9=mysqli_query($db6,$sql9);
           $row9=mysqli_fetch_array($result9);
?><label id="labels4"><b>₹<?php echo $row9["price"]; ?>.00</b></label><?php 
          }
 
  ?>
</div>






</div>








<div id="last_box">
  
<table id="company">
  <tr>
    <th><b>Company</b></th>
  </tr>
  <tr><td><a href="#">About Us</a></td></tr>
  <tr><td><a href="#">Privacy Policy</a></td></tr>
  <tr><td><a href="#">Terms and Conditions</a></td></tr>
  <tr><td><a href="#">Contact Us</a></td></tr>
</table>


<table id="support">
  <tr>
    <th><b>Support</b></th>
  </tr>
  <tr><td><a href="#">About Us</a></td></tr>
  <tr><td><a href="#">Privacy Policy</a></td></tr>
  <tr><td><a href="#">Terms and Conditions</a></td></tr>
  <tr><td><a href="#">Contact Us</a></td></tr>
</table>


<table id="Follow_Us">
  <tr>
    <th><b>Follow Us</b></th>
  </tr>
  <tr><td><img src="fb_logo2.jpg" width="20" height="20">  singhkulpreet05@gmail.com</td></tr>
  <tr><td>Instagram</td></tr>
  <tr><td>Email id</td></tr>
</table>



<table id="address">
  <tr>
    <th><b>Address</b></th>
  </tr>
  <tr><td>Kulpreet Singh</td></tr>
  <tr><td>Address</td></tr>
  <tr><td>Phone no.</td></tr>
  <tr><td>Email id</td></tr>
</table>

</div>



</div>


</div>
</body>



<script type="text/javascript">

  var index=1;
function nextimg(q)
{
   if(q==1)
    {index=index+1;
      show(index);}

  else {index=index-1;
        show(index);}
}


show(1);

function show(x)
{
   var a=document.getElementsByClassName("w_img");
   var b=document.getElementsByClassName("wjlab");
   
if(x>a.length-3){index=a.length-3}
  else if(x<1){index=1;}


for(var i=0;i<a.length;i++)
   {
    a[i].style.display="none";
    b[i].style.display="none";
   }


a[index-1].style.display="block";
a[index].style.display="block";
a[index+1].style.display="block";
a[index+2].style.display="block";


b[index-1].style.display="block";
b[index].style.display="block";
b[index+1].style.display="block";
b[index+2].style.display="block";


}





 var index2=1;
function nextimg2(q)
{
   if(q==1)
    {index2=index2+1;
      show2(index2);}

  else {index2=index2-1;
        show2(index2);}
}


show2(1);

function show2(x)
{
   var a=document.getElementsByClassName("m_img");
   var b=document.getElementsByClassName("mjlab");
   
if(x>a.length-3){index2=a.length-3}
  else if(x<1){index2=1;}


for(var i=0;i<a.length;i++)
   {
    a[i].style.display="none";
    b[i].style.display="none";
   }


a[index2-1].style.display="block";
a[index2].style.display="block";
a[index2+1].style.display="block";
a[index2+2].style.display="block";


b[index2-1].style.display="block";
b[index2].style.display="block";
b[index2+1].style.display="block";
b[index2+2].style.display="block";


}



var index3=1;
function nextimg3(q)
{
   if(q==1)
    {index3=index3+1;
      show3(index3);}

  else {index3=index3-1;
        show3(index3);}
}


show3(1);

function show3(x)
{
   var a=document.getElementsByClassName("p_img");
   var b=document.getElementsByClassName("plab");
   
if(x>a.length-3){index3=a.length-3}
  else if(x<1){index3=1;}


for(var i=0;i<a.length;i++)
   {
    a[i].style.display="none";
    b[i].style.display="none";
   }


a[index3-1].style.display="block";
a[index3].style.display="block";
a[index3+1].style.display="block";
a[index3+2].style.display="block";


b[index3-1].style.display="block";
b[index3].style.display="block";
b[index3+1].style.display="block";
b[index3+2].style.display="block";


}


  
  
</script>




</html>