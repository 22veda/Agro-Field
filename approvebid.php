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
<?php
echo "Congratulations!Your request has been approved!";
$bidid=$_GET["id"];
$query="update buybids set bidStatus='Approved' where bidID='$bidid'";
$rs=$conn->query($query);
$que="CALL FarmerDetails('$bidid');";
$res1=$conn->query($que);
//echo $res1->num_rows;
	 while($row=$res1->fetch_assoc()){
		 $quantf=$row["qtyQuintals"];
		 $fbank=$row["bankName"];
		 $accnof=$row["accountNo"];
		$branchf=$row["branch"];
		$ifscf=$row["IFSC"];
	 }

 mysqli_free_result($res1);
	mysqli_next_result($conn);
//echo $quantf;
$sql="CALL TraderDetails('$bidid');";
$res=$conn->query($sql);
if($res->num_rows>0){
	while($row=$res->fetch_assoc()){
		//echo $row;
		$qpt=$row["QuotePrice"];
		$tbank=$row["bankName"];
		$accnot=$row["accountNo"];
		$brancht=$row["branch"];
		$ifsct=$row["IFSC"];
	}
}
mysqli_free_result($res);
	mysqli_next_result($conn);
//echo gettype($qpt);
$transamount=intval($qpt)*(intval($quantf));
//echo "\nAMOUNT PAID: RS. ".$transamount;
//echo $transamount." ".$tbank." ".$accnot." ".$brancht." ".$ifsct." ".$fbank." ".$accnof." ".$branchf." ".$ifscf." ".$bidid;
//echo $qpt;
		//$query2="insert into banktransactions values(1,1000,'27-12-2019 00:00:00','xyx',1223,'ad',123,'gre',111,'aswe',11143,2)";
		
 $query2 = "CALL bankTransactionsInsert('$transamount','$tbank','$accnot','$brancht','$ifsct','$fbank','$accnof','$branchf','$ifscf','$bidid');";
	  $rs = $conn->query($query2);
	  session_start();
	  $userid=$_SESSION['userid'];
	  $query3="select phone from user_registration where userID='$userid';";
	  $rs1 = $conn->query($query3);
	  //echo $rs1;
	  if($rs1->num_rows>0){
		  while($row=$rs1->fetch_assoc()){
		  sendSMS($row["phone"],"Thank you for choosing Agro Field. You have quoted ".$transamount." Thank you");
	  }
	  }
	  else{
		  
	  }
	  
	  #echo $rs;
// echo $res2->num_rows;
// if ( isset($_GET['abid'] ) ) {
	  // $res=sendSMS(9121012208,"Thank you for choosing Agro Field.We will be closing the bidding in 5 hours.You can update your bid within 5 hours.Thank you");
// }
?>
 </body>
</html>