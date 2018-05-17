<?php

$a=0;
$db=mysqli_connect("localhost","root","","jutti");
    
$b=$_GET['v'];

    $sql="SELECT * from users where id='$b' ";
    $result=mysqli_query($db,$sql);
   while($row=mysqli_fetch_row($result))
   { 


    if($row[4]==""){
    }
    else{++$a;}

    if($row[5]==""){
    }
    
    else{++$a;}
    
if($row[6]==""){
    }
    else{++$a;}

   }

echo $a;
    ?>