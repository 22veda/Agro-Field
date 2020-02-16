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
	  <th>FARMER USER ID</th>
	  <th>OFFER CREATION TIME STAMP</th>
	  <th>OFFER CLOSE DATE</th>
	  <th>PRODUCT NAME</th>
      <th>DESCRIPTION</th>
	  <th>QUANTITY IN QUINTALS</th>
      <th>MINIMUM SELLING PRICE</th>
	   <th>QUOTE PRICE</th>
	  <th>BID CREATION TS</th>
	  <th>BID STATUS</th>
	   <th>Payment</th>
	   <th>Payment</th>
	</thead>
	<?php
	
	session_start();
	$userid=$_SESSION["userid"];
	$query="CALL BidHist('$userid')";
	$rs = $conn->query($query);
	//echo $rs->num_rows;
	if($rs->num_rows>0){
	while($row = $rs->fetch_assoc())
{ ?>
	
	<tr>
	<td><?php echo $row['farmerUserID'];?></td>
	<td><?php echo $row['offerCreationTS'];?></td>
	<td><?php echo $row['offerCloseDate'];?></td>
	<td><?php echo $row['productName'];?></td>
	<td><?php echo $row['description'];?></td>
	<td><?php echo $row['qtyQuintals'];?></td>
	<td><?php echo $row['MinPrice'];?></td>
	<td><?php echo $row['QuotePrice'];?></td>
	<td><?php echo $row['BidCreationTS'];?></td>
	<td><?php echo $row['bidStatus'];?></td>
	<?php
		if($row["bidStatus"]=='Awarded'):?>
		<td><a href='approvebid.php?id=<?php echo $row["bidID"];?>' class="btn btn-primary" id="abid">Approve Bid</a></td>
		<?php endif; ?>
	</tr>
	<?php 	
	}}
else{
	echo "No rows";
}?>

</tbody>
  </table>
</html>
