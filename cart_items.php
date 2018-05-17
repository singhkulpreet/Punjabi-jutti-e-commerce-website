<html>
<head>
    <style>
         *{premoveing:0px;margin:0px;}
    body{background: url("login3.jpg");background-size: 100%}
    #container{border:3px solid;width:700px;height:200px;margin-left: 300px;background: rgb(234,214,28);border-radius: 5px;overflow: hidden}

    </style>
</head>
<body>


<?php

$id=$_GET['id'];
echo $id;
$count=0;

$db=mysqli_connect("localhost","root","","jutti");
$sql="SELECT * from users where id=$id ";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
{
	if((!$row[7]=='') && ($row[14] == 'womenjutti'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
        $na='womenjutti';
         $sql2="SELECT * from wjutti where id=$row[7] ";
         $result2=mysqli_query($db,$sql2);
        
             while($row2=mysqli_fetch_array($result2))
             {   
                 $count=$count+$row2[2];
                 ////echo $row2['0'];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    </div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[7]; ?>','<?php echo $na; ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>
    <?php
             }
        

    
         echo"<br>";
        }

if((!$row[8]=='') && ($row[15] == 'womenjutti'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
    $na='womenjutti';
         $sql2="SELECT * from wjutti where id='$row[8]' ";
         $result2=mysqli_query($db,$sql3);

             while($row2=mysqli_fetch_array($result2))
             {
                 $count=$count+$row2[2];
                 ////echo $row2['0'];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    
                     
       </div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[8]; ?>','<?php echo $na; ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>
                 
    <?php                 
             }
    
        echo "<br>";
        }
    
    if((!$row[9]=='') && ($row[16] == 'womenjutti'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
        $na='womenjutti';
         $sql2="SELECT * from wjutti where id=$row[9] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 $count=$count+$row2[2];
                 ////echo $row2['0'];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    <?php
             }
        ?></div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[9]; ?>','<?php echo $na ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>

    <?php
         echo"<br>";
        }

    
    if((!$row[7]=='') && ($row[14] == 'menjutti'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
        $na='menjutti';
         $sql2="SELECT * from mjutti where id=$row[7] ";
         $result2=mysqli_query($db,$sql2);
        
             while($row2=mysqli_fetch_array($result2))
             {
                 $count=$count+$row2[2];
                 echo $row2[2];
                 ////echo $row2['0'];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    <?php
             }
        ?></div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[7]; ?>','<?php echo $na ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>

    <?php
         echo"<br>";
        }

    if((!$row[8]=='') && ($row[15] == 'menjutti'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
        $na='menjutti';
         $sql2="SELECT * from mjutti where id=$row[8] ";
        
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 
                 $count=$count+$row2[2];
                 
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    <?php
             }
        ?></div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[8]; ?>','<?php echo $na ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>

    <?php
         echo"<br>";
        }


if((!$row[9]=='') && ($row[16] == 'menjutti'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
    $na='menjutti';
         $sql2="SELECT * from mjutti where id=$row[9] ";
         $result2=mysqli_query($db,$sql2);
    $count=$count+$row[2];
             while($row2=mysqli_fetch_array($result2))
             {
                 ////echo $row2['0'];
                 $count=$count+$row2[2];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    <?php
             }
        ?></div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[9]; ?>','<?php echo $na ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>

    <?php
         echo"<br>";
        }
    
   if((!$row[7]=='') && ($row[14] == 'parande'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
       $na='parande';
         $sql2="SELECT * from parande where id=$row[7] ";
         $result2=mysqli_query($db,$sql2);
       $count=$count+$row[2];
             while($row2=mysqli_fetch_array($result2))
             {
                 ////echo $row2['0'];
                 $count=$count+$row2[2];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    <?php
             }
        ?></div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[7]; ?>','<?php echo $na ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>

    <?php
         echo"<br>";
        }
 
    
    if((!$row[8]=='') && ($row[15] == 'parande'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
        $na='parande';
         $sql2="SELECT * from parande where id=$row[8] ";
         $result2=mysqli_query($db,$sql2);
        
             while($row2=mysqli_fetch_array($result2))
             {
                 ////echo $row2['0'];
                 $count=$count+$row2[2];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    <?php
             }
        ?></div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[8]; ?>','<?php echo $na ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>
    
    <?php
         echo"<br>";
        }

    
    
if((!$row[9]=='') && ($row[16] == 'parande'))
		{?><div id="container"><?php
        //echo $row[7];
        //echo $row[14];
    $na='parande';
         $sql2="SELECT * from parande where id=$row[9] ";
         $result2=mysqli_query($db,$sql2);
    $count=$count+$row[2];
             while($row2=mysqli_fetch_array($result2))
             {
                 ////echo $row2['0'];
                 $count=$count+$row2[2];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    <?php
             }
        ?></div>
    <button onclick="remove('<?php echo $id; ?>','<?php echo $row[9]; ?>','<?php echo $na ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Remove</b></button>

    <?php
         echo"<br>";
        }
    
    
    ?><label style="font-size:25px;font-size:bolder;font-family:cursive;color:rgb(234,214,28);position:relative;left:800px;">TOTAL:- ₹<?php echo $count ?>.00</label>
    <BR>
    <BR>
        <form>
    <input type="submit" value="BUY NOW" style="background:black;width:200px;height:50px;font-size:25px;font-size:bolder;font-family:cursive;color:rgb(234,214,28);position:relative;left:800px;">
        </form>
    <br>
        <br>
    <?php
    
}

?>
    
</body>
    
<script>
     
    
function remove(u_id,p_id,na)
    {
       alert(u_id);
        alert(p_id);
        alert(na);
               
var xhtt= new XMLHttpRequest();
xhtt.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("aa").src= this.responseText;
        alert("Item is Succesfully removed from cart ");
      alert(this.responseText);
      header("Refresh:0");
      
    }
};
xhtt.open("GET", 'cart_items_remove.php?v='+u_id+"&sec="+p_id+"&third="+na , true);
  xhtt.send();

       
    }

    
</script>    
    
</html>
