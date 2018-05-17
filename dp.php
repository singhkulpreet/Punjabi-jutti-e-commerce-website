



<?php

if(isset($_GET['h']) && !empty($_GET['h']))
{ 
  $u_id=$_GET['h'];
  $dp=$_GET['secon'];

  $db=mysqli_connect("localhost","root","","jutti");
        $sql="UPDATE users SET image='$dp' where id='$u_id' ";
        mysqli_query($db,$sql);
        echo"$dp";
 
}

else echo "noooo";
?>
