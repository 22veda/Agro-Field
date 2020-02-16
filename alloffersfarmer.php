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
<table border="2">
  <tbody>
  <form method="post" id="myform" name="myform">
	<select name="menu" id="menu" value="menu" >
		<option value="">--Select Crop--</option>
		<?php
				$sql = "SELECT * from products";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc())
				{
					echo "<option value=".$row["productID"].">".$row["productName"]."</option>";

				}

			}
?>
			</select>
	<input type="submit" name="check" id="check" value="Check"/>
	</form>
	<thead>
	<th>Farmer User ID</th>
      <th>Product Name</th>
	  <th>Description</th>
      <th>Minimum price</th>
	  <th>Quantity in quintals</th>
      <th>Offer creation time</th>
	  <th>Offer close date</th>
      <th>Offer status</th>
    </tr>
	</thead>
	<?php
	if ( isset( $_POST['check'] ) ) {
	   $productid=$_POST["menu"];
		$query="CALL allOffers('$productid')";
		$rs = $conn->query($query);
		if ($rs->num_rows > 0) {

	while($row = $rs->fetch_assoc())
{
	echo "<tr><td>{$row['farmerUserID']}</td><td>{$row['productName']}</td><td>{$row['description']}</td><td>{$row['MinPrice']}</td><td>{$row['qtyQuintals']}</td><td>{$row['offerCreationTS']}</td><td>{$row['offerCloseDate']}</td><td>{$row['offerStatus']}</td></tr>\n";
}
}
	  // }
	  // else {
		  // $error = "Invalid username or password";
	  // }
   }
   ?>
  </tbody>
</html>