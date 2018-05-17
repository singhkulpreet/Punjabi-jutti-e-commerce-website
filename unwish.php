<?php
if (isset($_GET['v']) && !empty($_GET['v']))
{
	$user=$_GET['sec'];
    $product=$_GET['v'];
$a='';

    $db2=mysqli_connect("localhost","root","","jutti");
    
    $sql="SELECT * from users where id='$user' ";
    $result2=mysqli_query($db2,$sql);
   while($row2=mysqli_fetch_row($result2))
   {  
   	
if($row2[4]==$product)
  {$sql1="UPDATE users SET wish=$a where id='$user' ";
    mysqli_query($db2,$sql1);} 

else if($product==$row2[5])
  {$sql2="UPDATE users SET wish2=$a where id='$user' ";
    mysqli_query($db2,$sql2);}

  else if($product==$row2[6])
    { $sql3="UPDATE users SET wish3=$a where id='$user' ";
    mysqli_query($db2,$sql3);}
}
}

?>