<?php

if(isset($_POST['upload_new_dp']))
{ 
$ap=$_FILES['upload']['name'];
  $u_id=$_POST['u_id'];
  $db10=mysqli_connect("localhost","root","","jutti");
        $sql10="UPDATE users SET image='$ap' where id='$u_id' ";
        mysqli_query($db10,$sql10);
 

}

?>
