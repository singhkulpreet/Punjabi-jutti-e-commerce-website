<html>
<head>
<title></title>
<style>
    *{padding:0px;margin:0px;}
    body{background: url("login3.jpg");background-size: 100%}
    #container{border:3px solid;width:700px;height:200px;margin-left: 300px;background: rgb(234,214,28);border-radius: 5px;overflow: hidden}
</style> 
</head>
<body>
    
    
    
    <?php

$id=$_GET['id'];
echo $id;
echo"<br>";
$db=mysqli_connect("localhost","root","","jutti");
$sql="SELECT * from users where id=$id ";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
{
	if(!$row[4]=='' && ($row[11]=="womenjutti"))
		{ ?><div id="container"><?php
        //echo $row[4]." and ".$row[11];
        
        $sql2="SELECT * from wjutti where id=$row[4] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 ////echo $row2['0'];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                    
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;"><b>₹<?php echo $row2['2']; ?></b></label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
    <?php
             }
        ?></div><?php
         echo"<br>";
        }
    
	if(!$row[5]=='' && ($row[12]=="womenjutti"))
		{
        ?><div id="container"><?php
        //echo $row[5]."and".$row[12];
        
        $sql2="SELECT * from wjutti where id=$row[5] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 //echo $row2['0'];
                                  ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                  <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;" > ₹<?php echo $row2['2']; ?> </label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
                    <?php
             }
    ?></div><?php
         echo"<br>";
}
    
	if(!$row[6]=='' && ($row[13]=="womenjutti"))
		{?><div id="container"><?php
        //echo $row[6]."and".$row[13];
        echo"<br>";
        $sql2="SELECT * from wjutti where id=$row[6] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 //echo $row2['0'];
                                  ?><img src="<?php echo $row2['1'];?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;" > ₹<?php echo $row2['2']; ?> </label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
                    <?php
                 
             }
    ?></div><?php
         echo"<br>";
}

    
    
    if(!$row[4]=='' && ($row[11]=="menjutti"))
		{?><div id="container"><?php
        //echo $row[4]." and ".$row[11];
        
         $sql2="SELECT * from mjutti where id=$row[4] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 //echo $row2['0'];
                                  ?><img src="<?php echo $row2['1'];?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">

                 <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;" > ₹<?php echo $row2['2']; ?> </label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
                    <?php
                
             }?></div><?php
         echo"<br>";
        }
    
	if(!$row[5]=='' && ($row[12]=="menjutti"))
		{?><div id="container"><?php
        //echo $row[5]."and".$row[12];
         
         $sql2="SELECT * from mjutti where id=$row[5] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 //echo $row2['0'];
                                  ?><img src="<?php echo $row2['1'];?>" width="300" height="200px"style="border-top-right-radius:5px;border-bottom-right-radius:5px" >
    <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;" > ₹<?php echo $row2['2']; ?> </label>
                 <br>
                    <b><textarea style="font-family:cursive;background: rgb(234,214,28);font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
                    <?php
                
                    
             }
    ?></div><?php

        echo"<br>";}
    
	if(!$row[6]=='' && ($row[13]=="menjutti"))
		{ ?><div id="container"><?php
        
        //echo $row[6]."and".$row[13];
        $sql2="SELECT * from mjutti where id=$row[6] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 //echo $row2['0'];
                                  ?><img src="<?php echo $row2['1'];?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
    <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;" > ₹<?php echo $row2['2']; ?> </label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
                    <?php
    
             }
    ?></div><?php
         echo"<br>";
}

    
    
    if(!$row[4]=='' && ($row[11]=="parande"))
		{ ?><div id="container"><?php
        //echo $row[4]." and ".$row[11];
        $sql2="SELECT * from parande where id=$row[4] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 //echo $row2['0'];
                                  ?><img src="<?php echo $row2['1'];?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">
<label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;" > ₹<?php echo $row2['2']; ?> </label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
                    <?php
    
                 
             }
    ?></div><?php
         echo"<br>";
}
    
	if(!$row[5]=='' && ($row[12]=="parande"))
		{  ?><div id="container"><?php
        
        //echo $row[5]."and".$row[12];
        
        $sql2="SELECT * from parande where id=$row[5] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 //echo $row2['0'];
                 ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">

            <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;" > ₹<?php echo $row2['2']; ?> </label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
                    <?php
    
                 
             }
    ?></div><?php
         echo"<br>";
}
    
	if(!$row[6]=='' && ($row[13]=="parande"))
		{?><div id="container"><?php
        //echo $row[6]."and".$row[13];
        
        $sql2="SELECT * from parande where id=$row[6] ";
         $result2=mysqli_query($db,$sql2);
             while($row2=mysqli_fetch_array($result2))
             {
                 ////echo $row2['0'];
                                  ?><img src="<?php echo $row2['1']; ?>" width="300" height="200px" style="border-top-right-radius:5px;border-bottom-right-radius:5px">

            <label style="font-weight:bolder;font-family:cursive;position:relative;font-size:20px;bottom:170px;" > ₹<?php echo $row2['2']; ?> </label>
                 <br>
                    <b><textarea style="background: rgb(234,214,28);font-family:cursive;font-size:20px;position:relative;bottom:165px;left:305px;" cols="30" rows="5"  >Description:-<?php echo $row2['3']?>;</textarea></b>
                    <?php
    
                 
             }
    ?></div><?php
         echo"<br>";
}

	
}

?>
   
    
</body>
</html>


