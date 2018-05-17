<?php

if( isset($_GET['v']) && isset($_GET['sec']) && isset($_GET['third']) ){
$u_id=$_GET['v'];
$p_id=$_GET['sec'];
$name=$_GET['third'];

//echo $a;
    
$db=mysqli_connect("localhost","root","","jutti");
$sql="SELECT * FROM users where id='$u_id' ";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
{
    if($row[7]==$p_id && $row[14]==$name)
    { 
        $sql2="UPDATE users SET cart1='',cart_name1='' where id='$u_id' " ;
    mysqli_query($db,$sql2);
    echo "yes";}

    else if($row[8]==$p_id && $row[15]==$name)
    {$sql2="UPDATE users SET cart2='',cart_name2='' where id=$u_id ";
    mysqli_query($db,$sql2);
    echo "yes";}
    
    else if($row[9]==$p_id && $row[16]==$name)
    {$sql2="UPDATE users SET cart3='',cart_name3='' where id=$u_id";
    mysqli_query($db,$sql2);
    echo "yes";}


}

    
    
}

else echo "noooo";

?>