<?php 
include "templates/header.php" ;
include "config/database.php" ;
include "api/functions.php";
$conn = new mysqli($host,$username,$password,$dbname);
   if($conn->connect_error){
      die("connection failed : " .$conn->connect_error);
	  
   }
  $sql = "select p.productID,p.productName,p.imgLocation,(select min(MinPrice) from selloffers ss where ss.productId=p.productId and ss.offerStatus='Open') minprice ,(select max(MinPrice) from selloffers ss where ss.productId=p.productId and ss.offerStatus='Open') maxprice ,(select count(*) from selloffers ss where ss.productId=p.productId and ss.offerStatus='Open') count from products p;";

 $result = $conn->query($sql);
   
   $conn->close();
?>


          <div class="box">
            <div id="latest-slidertab" class="row owl-carousel product-slider">
			
			<?php if ($result->num_rows > 0) {
			
			while($row = $result->fetch_assoc()) { ?>
              <div class="item">
			  <div class="product-thumb transition">
                  <div class="image product-imageblock"> <a href="reg.php"><img src="<?php echo $row["imgLocation"]?>" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"><a href="#" title="lorem ippsum dolor dummy"><?php echo $row["productName"]?></a></h4>
                    <p class="price product-price"><?php if($row["minprice"]){echo "Rs.".$row["minprice"]."-".$row["maxprice"];} else{echo "Currently Unavailable";}?><span class="price-tax">Ex Tax: $100.00</span></p>
					<p class="price product-price"><?php if($row["count"]){echo $row["count"]." "."Crops available";}?><span class="price-tax">Ex Tax: $100.00</span></p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                </div>
			</div>
			<?php } } ?>

</div>
			  
			  
			  
<?php include "templates/footer.php"?>
