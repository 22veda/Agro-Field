<?php include "../config/database.php" ;
$conn = new mysqli($host,$username,$password,$dbname);
if($conn->connect_error){
  die("connection failed : " .$conn->connect_error);

}
 $sql = "SELECT * from Districts where StateId=".$_GET["id"];
 

 $result = $conn->query($sql);
 
  while($row = $result->fetch_assoc()) {
                                    echo "<option value=".$row["Districtid"].">".$row["distname"]."</option>";
  }
 $conn->close();
?>