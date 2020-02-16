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
			  header( "Location: /farmerlogin.php" );
			  
		  }
		  else if($_SESSION["usertype"]=="Trader") {
			   header( "Location: /traderlogin.php" );
			  
		  }
	  }
	  else {
		  $error = "Invalid username or password";
	  }
 }
?>
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="/HomeAssets/css/login.css" rel="stylesheet" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<!------ Include the above in your HEAD tag ---------->
<div class="container-fluid login-container h-100">
            <div class="row">
                <div class="col-md-6 login-form-1 ">
					 <div style="padding:10px;border-radius:10px;background:#2C6700"><a href="/">
		  <h1 style="font-size:2rem;color:#fff;text-align:center;">Agro Field</h1></a> </div>
                    <h3>Sign Up</h3>
					<div class="text-danger text-center"><?php echo $error ?></div>
                    <form method="post" id="myform" name="myform" >
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" required placeholder="User Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" required placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="submit" id="submit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="forgotpassword.php" class="ForgetPwd">Forgot Password?</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <img src="/HomeAssets/image/crops.jpg" style="width:100%;height:100%;" />
                </div>
            </div>
        </div>
		</body>
	</html>