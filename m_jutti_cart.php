<?php
if (isset($_GET['v']) && !empty($_GET['v']))
{
	
	$product_id=$_GET['sec'];
    
    $user_id=$_GET['v'];


    $db=mysqli_connect("localhost","root","","jutti");
    
    $sql="SELECT * from users where id='$user_id' ";
    $result=mysqli_query($db,$sql);
   while($row=mysqli_fetch_row($result))
   {  
   	
if($product_id==$row[7] || $product_id==$row[8] || $product_id==$row[9]){}

   	
else{
   	if($row[7]==""){

    $sql1="UPDATE users SET cart1=$product_id,cart_name1='menjutti' where id='$user_id' ";
    mysqli_query($db,$sql1);
}



   else if($row[8]==""){
    $sql2="UPDATE users SET cart2=$product_id,cart_name2='menjutti' where id='$user_id' ";
    mysqli_query($db,$sql2);
 }
  


	else if($row[9]==""){
    		$sql3="UPDATE users SET cart3=$product_id,cart_name3='menjutti' where id='$user_id' ";
    		mysqli_query($db,$sql3);}
   }
}
}


?>