<!DOCTYPE html>
<?php include "config/database.php" ;
include "api/functions.php";
$conn = new mysqli($host,$username,$password,$dbname);
$error="";
$userid="";
if($conn->connect_error){
  die("connection failed : " .$conn->connect_error);
}
 
if(isset($_POST["submit"])) 
    {     

	  $userid=mysqli_real_escape_string($conn,$_POST["username"]);
	  $pass=md5(mysqli_real_escape_string($conn,$_POST["password"]));
	  
	  $result=checklogin($userid,$pass);
	  if($result=="1")
	  {
		  if($_SESSION["usertype"]=="Farmer")
		  {
			  header( "Location: /farmersDashboard.php" );
			  exit ;
		  }
		  else if($_SESSION["usertype"]=="Trader") {
			   header( "Location: /tradersDashboard.php" );
			  exit ;
		  }
	  }
	  else {
		  $error = "Invalid username or password";
	  }
 }
?>