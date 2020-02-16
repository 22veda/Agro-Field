<?php 
	// Account details
	function sendSMS($mobile,$text)
	{
		$apiKey = urlencode('5J7k0Eutf8g-POg6eOGyrlBrmC0XZrfqnz7j2uGKqR');
	
	// Message details
	$numbers = array($mobile);
	$sender = urlencode('');
	$message = rawurlencode($text);
	
	$numbers = implode(',', $numbers);
	$data = 'apikey=' . $apiKey . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;
	$res = file_get_contents('https://api.textlocal.in/send/?'.$data);
	
	// Process your response here
	if(strstr($res,'success')) {
		return 1;
	}
	else {
		return 0;
	}
	}
	function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
	}
	function checkOtp($otp,$userid)
	{
		include "config/database.php" ;
		$conn = new mysqli($host,$username,$password,$dbname);
		if($conn->connect_error){
			die("connection failed : " .$conn->connect_error);

		}
		$sql = "CALL checkOtp('$otp','$userid')";
		$result = $conn->query($sql);
		$conn->close();
		if($result->num_rows>0)
		{
			$conn = new mysqli($host,$username,$password,$dbname);
			$sql ="CALL updateUserStatus('$userid')";
			
			$r = $conn->query($sql);
			
			$conn->close();
			return "1";
		}
		else {
			return "0";
			}
		
	}
		function checklogin($userid,$pass)
	{
		include "config/database.php" ;
		$conn = new mysqli($host,$username,$password,$dbname);
		if($conn->connect_error){
			die("connection failed : " .$conn->connect_error);

		}
		//echo $pass;
		$sql = "CALL checkLogin('$userid','$pass')";
		$result = $conn->query($sql);
		$conn->close();
		//echo $result->num_rows;
		if($result->num_rows > 0) {
			
		$row = $result->fetch_assoc();
		session_start();
		$_SESSION["logged_in"] = true; 
        $_SESSION["userid"] = $row["userID"];
		$_SESSION["usertype"] = $row["userType"];
		
		return "1";
		}
		else {
			 //session_destroy();
		  return "0";
		}
		
	}

?>
