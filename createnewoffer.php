<!DOCTYPE html>
<?php 
include "config/database.php" ;
include "api/functions.php";
$conn = new mysqli($host,$username,$password,$dbname);

if($conn->connect_error){
  die("connection failed : " .$conn->connect_error);
}
 $sql = "SELECT * from products";

 $result = $conn->query($sql);
	session_start();
	$userid=$_SESSION['userid'];
   if ( isset( $_POST['create'] ) ) {
	   $productid=$_POST["menu"];
	  $descrip=mysqli_real_escape_string($conn,$_POST["description"]);
		$quant=mysqli_real_escape_string($conn,$_POST["qty"]);
	  $minsprice=mysqli_real_escape_string($conn,$_POST["minprice"]);
	  $add1=mysqli_real_escape_string($conn,$_POST["address"]);
	  $add2=mysqli_real_escape_string($conn,$_POST["address1"]);
	  $city=md5(mysqli_real_escape_string($conn,$_POST["city"]));
	  $state=mysqli_real_escape_string($conn,$_POST["state"]);
	  $pincode=mysqli_real_escape_string($conn,$_POST["pincode"]);
	$closedate=mysqli_real_escape_string($conn,$_POST["closedate"]);
	$dt=$closedate." 00:00:00";
	  $query="CALL sellOffersInsert('$userid','$productid','$descrip','$quant','$minsprice','$add1','$add2','$city','$pincode','$state','$dt')";
	  $rs = $conn->query($query);
	  
	  // }
	  // else {
		  // $error = "Invalid username or password";
	  // }
   }
?>
<html lang="en">
<head>
    <title>Agro Field</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="e-commerce site well design with responsive view." />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/HomeAssets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/HomeAssets/css/register.css?v=1.1" rel="stylesheet">
</head>
<body>
<form method="post" id="myform" name="myform">
	<select name="menu" id="menu" value="menu" >
		<option value="">--Select Crop--</option>
		<?php

			if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc())
				{
					echo "<option value=".$row["productID"].">".$row["productName"]."</option>";

				}

			}

		?>
	</select><br/>
	<textarea row="2" cols="10" placeholder="Description" id="description" name="description"></textarea><br/>
	<input type="number" name="qty" id="qty" placeholder="Quantity in quintals"/><br/>
	<input type="number" name="minprice" id="minprice" placeholder="Minimum Selling price"/><br/>
	<input type="text" name="address" id="address" placeholder="Product address"/><br/>
	<input type="text" name="address1" id="address1" placeholder="Product address"/><br/>
	<input type="text" name="city" id="city" placeholder="City"/><br/>
	<input type="text" name="state" id="state" placeholder="State"/><br/>
	<input type="number" name="pincode" id="pincode" placeholder="Pincode"/><br/>
	<input type="date" name="closedate" id="closedate" placeholder="Closing date"/><br/>
	<input type="submit" name="create" id="create" value="Create"/>
</form>
</body>
</html>