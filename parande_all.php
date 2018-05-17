

<!DOCTYPE html>
<html>
<head>
	<title></title>

<style type="text/css">
*{margin: 0px;padding: 0px;}
body{background: url("login3.jpg");background-size: 100%;}
 #container{border:2px solid;width: 700px;height: 230px;margin-left: 300px;background: rgb(234,214,28);}
  

</style>

</head>
<body>




<?php 

$a=$_REQUEST['id'];

$db=mysqli_connect("localhost","root","","jutti");
$sql="SELECT * from parande";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result))
{
	?><div id="container" style="margin-top: 5px;border-radius: 5px;">
   <img  src="<?php echo $row['image']; ?>" width="345" height="215" style="border-radius: 5px;margin-top: 7px;margin-left: 10px" >

  <label style="font-size: 25px;font-family: cursive;position: relative;bottom:185px; ">₹<?php echo $row['price']; ?>.00</label>
   <textarea rows="5" cols="20" style="font-size: 25px;font-family: cursive;background-color:rgb(234,214,28) ;position: relative;bottom:185px;left:360px "><?php echo $row['description']; ?></textarea>
   
   </div>
        <button onclick="add('<?php echo $a; ?>','<?php echo $row[0]; ?>')" style="position:relative;float:right;bottom:120px;right:140px;width:200px;height:50px;background:black;color:rgb(234,214,28);font-size:25px;font-weight:bolder;font-family:cursive;border:2px solid rgb(234,214,28);border-radius:5px;"><b>Add to Cart</b></button><?php echo"";
}




?>

</div>

</body>

<script>
function add(user,product)
    {
        alert(user);
        alert(product);
        
var x="parande";        
var xhtt= new XMLHttpRequest();
xhtt.onreadystatechange=function(){
  if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("aa").src= this.responseText;
        alert("Item is Succesfully added into cart "); 
    }
};
xhtt.open("GET", 'addtocart.php?h='+user+"&second="+product+"&third="+x , true);
  xhtt.send();

       
    }
</script>

</html>




