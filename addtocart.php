<?php

if(isset($_GET['h']) && isset($_GET['second']) && isset($_GET['third']) )
{
$a=$_GET['h'];
$b=$_GET['second'];
$c=$_GET['third'];



$db=mysqli_connect("localhost","root","","jutti");
$sql="SELECT * FROM users where id='$a' ";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
{
    if($row[7]=="")
    {  echo"value".$b;
        $sql2="UPDATE users SET cart1='$b',cart_name1='$c' where id='$a' " ;
    mysqli_query($db,$sql2);}

    else if($row[8]=="")
    {$sql2="UPDATE users SET cart2='$b',cart_name2='$c' where id=$a ";
    mysqli_query($db,$sql2);}
    
    else if($row[9]=="")
    {$sql2="UPDATE users SET cart3='$b',cart_name3='$c' where id=$a";
    mysqli_query($db,$sql2);}


}
}

else echo"nooooo";
?>