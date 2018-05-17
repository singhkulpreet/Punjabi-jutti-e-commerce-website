<?php
if (isset($_GET['v']) && !empty($_GET['v']))
{
	$a=0;
	$b=0;
	$c=0;
	
	$user_id=$_GET['second'];
    $product_id=$_GET['v'];


    $db=mysqli_connect("localhost","root","","jutti");
    
    $sql="SELECT * from users where id='$user_id' ";
    $result=mysqli_query($db,$sql);
   while($row=mysqli_fetch_row($result))
   {  
   	
if($product_id==$row[4] && $row[11]=="menjutti" || $product_id==$row[5] && $row[12]=="menjutti" || $product_id==$row[6] && $row[13]=="menjutti"){}

   	
else{
   	if($row[4]==""){

    $sql1="UPDATE users SET wish='$product_id',wish1_name='menjutti' where id='$user_id' ";
    mysqli_query($db,$sql1);
}



   else if($row[5]==""){
    $sql2="UPDATE users SET wish2='$product_id',wish2_name='menjutti' where id='$user_id' ";
    mysqli_query($db,$sql2);
 }
  


	else if($row[6]==""){
    		$sql3="UPDATE users SET wish3='$product_id',wish3_name='menjutti' where id='$user_id' ";
    		mysqli_query($db,$sql3);}
   }
}
}


?>