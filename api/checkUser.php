<?php include "../config/database.php" ;
$conn = new mysqli($host,$username,$password,$dbname);
if($conn->connect_error){
  die("connection failed : " .$conn->connect_error);

}
$userid=$_GET["userid"];
 $sql = "CALL checkuser('$userid')";
 

 $result = $conn->query($sql);
 if($result->num_rows > 0)
	 echo "1";
 else
	 echo "0";
 $conn->close();
?>