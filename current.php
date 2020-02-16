<!DOCTYPE html>
<head></head>

<body>
<table border="1" valign="center">
<tr>
<th>OFFER ID</th>
<th>OFFER CREATION TIME</th>
<th>PRODUCT NAME</th>
<th>DESCRIPTION</th>
<th>QUANTITY IN QUINTALS</th>
<th>MINIMUM PRICE</th>
<th>OFFER CLOSE DATE</th>
<th>BID ID</th>
<th>TRADER USER ID</th>
<th>QUOTE PRICE</th>
<th>BID CREATION TIME STAMP</th>
<th>BID STATUS</th>
</tr>
<?php include "config/database.php" ;
include "api/functions.php";
$conn = mysqli_connect($host,$username,$password,$dbname);

if($conn->connect_error){
  die("connection failed : ".$conn->connect_error);
}
session_start();
$userid=$_SESSION['userid'];

$sql = "CALL currOffers('$userid')";
$result=$conn->query($sql);

if($result->num_rows<=0)
 {
  echo "no rows";
  exit();
}
 else
{

   while($row=$result->fetch_assoc())
  {

 echo "<tr>";
 echo "<td>".$row["offerID"]."</td>";
 echo "<td>".$row["offerCreationTS"]."</td>";
 echo "<td>".$row["productName"]."</td>";
 echo "<td>".$row["description"]."</td>";
 echo "<td>".$row["qtyQuintals"]."</td>";
 echo "<td>".$row["MinPrice"]."</td>";
 echo "<td>".$row["offerCloseDate"]."</td>";
 echo "<td>".$row["bidID"]."</td>";
 echo "<td>".$row["traderUserID"]."</td>";
 echo "<td>".$row["QuotePrice"]."</td>";
 echo "<td>".$row["BidCreationTS"]."</td>";
 echo "<td>".$row["bidStatus"]."</td>";
 echo "</tr>";
   }
 }
?>
</table>
</body>
</html>
