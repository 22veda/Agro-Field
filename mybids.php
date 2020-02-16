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
	<thead>
      <th>Product Name</th>
	  <th>Description</th>
      <th>Minimum price</th>
	  <th>Quantity in quintals</th>
      <th>Offer creation time</th>
	  <th>Offer close date</th>
      <th>Price Quoted</th>
	  <th>Bid Creation TimeStamp</th>
	   <th>Bid Status</th>
	   <th>Current Maximum</th>
	   <th>Update</th>
	</thead>
	<?php
	session_start();
	$userid=$_SESSION["userid"];
	$query="CALL currBid('$userid')";
	$rs = $conn->query($query);
	while($row = $rs->fetch_assoc())
{ ?>
	
	<tr>
	<td><?php echo $row['productName'];?></td>
	<td><?php echo $row['description'];?></td>
	<td><?php echo $row['MinPrice'];?></td>
	<td><?php echo $row['qtyQuintals'];?></td>
	<td><?php echo $row['offerCreationTS'];?></td>
	<td><?php echo $row['offerCloseDate'];?></td>
	<td><?php echo $row['QuotePrice'];?></td>
	<td><?php echo $row['BidCreationTS'];?></td>
	<td><?php echo $row['bidStatus'];?></td>
	<td><?php echo $row['CurrentMax'];?></td>
	<td><a href='updatebid.php?id=<?php echo $row["bidID"];?>' class="btn btn-primary">Update Bid</a></td>
	</tr>
<?php } ?>
</table>
  </tbody>
</html>
