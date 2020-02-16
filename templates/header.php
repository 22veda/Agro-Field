<!DOCTYPE html>
<html lang="en">
<head>
<title>Agro Field</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="e-commerce site well design with responsive view." />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:300,400,500,700&display=swap" rel="stylesheet">
<link href="/HomeAssets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="/HomeAssets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/HomeAssets/css/stylesheet.css?v=1.1" rel="stylesheet">
<link href="/HomeAssets/css/responsive.css" rel="stylesheet">
<link href="/HomeAssets/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
<link href="/HomeAssets/owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />
</head>
<body>
<div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="/HomeAssets/image/loader.gif"  alt="#"/></div>
<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="top-left pull-left">
            </div>
          <div class="top-right pull-right">
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">
			  <?php session_start(); ?>
			  <?php if(isset($_SESSION["logged_in"])==false) { session_destroy();?>
			  <li><a href="reg.php"><i class="fa fa-user"></i> Register</a></li>
              <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
			  <?php } else { 
			  
			  ?>
			  <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i><span><?php echo $_SESSION["userid"] ?></span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#">My Bids</a></li>
					<li><a href="#">My Bid History</a></li>
					<li><a href="#">All offers</a></li>
					<li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>

			  <?php } ?>
                
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="header-inner">
      <div class="col-sm-4 col-xs-6 header-left">
        <div class="shipping">
          <div class="shipping-img"></div>
          <div class="shipping-text">+91 9121012208<span class="shipping-detail">Week From 9:00am To 7:00pm</span></div>
        </div>
      </div>
      <div class="col-sm-4 col-xs-12 header-middle">
        <div class="header-middle-top">
          <div id="logo"> <a href="/">
		  <div style="padding:10px;border-radius:10px;background:#2C6700">
		  <h1 style="font-size:4rem;color:#fff">Agro Field</h1></a> </div>
        </div>
      </div>
	  </div>
      <div class="col-sm-4 col-xs-12 header-right">
      </div>
    </div>
  </div>
</header>
<nav id="menu" class="navbar">
  <div class="nav-inner container">
    <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
      <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
    </div>
    <div class="navbar-collapse">
      <ul class="main-navigation">
        <li><a href="index.php"   class="parent"  >Home</a> </li>
        <li><a href="about-us.html" >About us</a></li>
        <li><a href="contact.html" >Contact Us</a> </li>
      </ul>
    </div>
  </div>
</nav>
