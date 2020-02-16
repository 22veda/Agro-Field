<!DOCTYPE html>
<?php 
include "config/database.php" ;
include "api/functions.php";
$conn = new mysqli($host,$username,$password,$dbname);

if($conn->connect_error){
  die("connection failed : " .$conn->connect_error);
}
 //$productid=$_POST["menu"];
 //$sql = "CALL allOffers('$producid')";
 //$result = $conn->query($sql);

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
	<input type="number" name="bidprice" id="bidprice" required placeholder="Enter your bid price"/>
	<input type="submit" name="submit" id="submit" value="Submit"/>
	</form>
	
	<?php
	if ( isset( $_POST['submit'] ) ) {
	   $offerid=$_GET["id"];
	   session_start();
	   $userid=$_SESSION["userid"];
	   $bidprice=mysqli_real_escape_string($conn,$_POST["bidprice"]);
		$query="CALL buyBidsInsert('$offerid','$userid','$bidprice')";
		$rs = $conn->query($query);
		if($rs=="1"){
			echo "Bid placed successfully!";
		}
}
	  // }
	  // else {
		  // $error = "Invalid username or password";
	  // }
   
   ?>
  </tbody>
</html>