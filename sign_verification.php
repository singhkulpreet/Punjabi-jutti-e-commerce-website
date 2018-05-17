<?php

$a=$_GET['v'];
$b=$_GET['sec'];
$c=$_GET['third'];

if(!empty($a) && !empty($b) && !empty($c)){
	$db=mysqli_connect("localhost","root","","jutti");
	$sql="SELECT * FROM users where email='$b' ";
	$result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)>0)
    {
    	echo "SORRY...!!!this email id is already registered.";
    }

    else{echo "succesfull";
    $sql2="INSERT INTO users (name,email,pass) values ('$a','$b','$c')";
    mysqli_query($db,$sql2);
//header("location:login_page.php");}
}

}
else echo "please fill all feilds of form";
?>