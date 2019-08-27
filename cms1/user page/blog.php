<!DOCTYPE html>
<?php
      include("db.php");
      $id=$_GET['user'];
      $query="SELECT * FROM `users`   WHERE `user_id`='$id' ";
      $run=mysqli_query($con,$query);
      $r1=mysqli_fetch_assoc($run);
      $name=$r1['username'];
	  $img=$r1['user_image'];
	  
      $qry="SELECT * FROM `posts`";
      $runn=mysqli_query($con,$qry);
	  ?>
	  
<html lang="en">
  <head>
    <title>Blogs Page</title>
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="index.html"><span class="img" style="background-image: url(../admin/images/<?php echo $img; ?>);"></span><?php echo $name;  ?></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="about.html">About Me</a></li>
					<li><a href="services.php?user=<?php echo $id;?>">Tasks</a></li>
					<li class="colorlib-active"><a href="blog.html">Blog</a></li>
					<li><a href="logout.php"><b>Logout</b></a></li>
				</ul>
			</nav>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-bread">
				<div class="container">
					<div class="row no-gutters slider-text justify-content-center align-items-center">
	          <div class="col-md-8 ftco-animate">
	            <p class="breadcrumbs"> <span>Blog</span></p>
	            <h1 class="bread">Read My Blog</h1>
				  </div>
	        </div>
				</div>
				</section>
				 <?php

      while($row=mysqli_fetch_assoc($runn))
      {
        $str=$row['post_user'];
        if($str==$name)
        {
          
        


       ?>
	          
			<section class="ftco-section">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-lg-12">
	    				<div class="row">
			    			<div class="col-md-12">
			    				<div class="blog-entry ftco-animate d-md-flex">
										<a href="single.html" class="img img-2" style="background-image: url(../admin/images/<?php echo $row['post_image'];?>);"></a>
										<div class="text text-2 p-4">
										
				              <h3 class="mb-2"><a href="single.html"><?php echo $row['post_title']; ?></a></h3>
				              <div class="meta-wrap">
												<p class="meta">
				              		<span><?php echo $row['post_date']; ?></span>
				              		<span><a href="single.html"><?php echo $row['post_tags']; ?></a></span>
				              		<span>x Comment</span>
				              	</p>
			              	</div>
				              <p class="mb-4"><?php echo $row['post_content']; ?></p>
				              <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
				            </div>
									</div>
			    			</div>
			    			
			    			</div>
			    			
			    		</div><!-- END-->
						<?php 
		}
	  }
	  ?>
			    		<div class="row">
			          <div class="col">
			            <div class="block-27">
			              <ul>
			                <li><a href="#">&lt;</a></li>
			                <li class="active"><span>1</span></li>
			                <li><a href="#">2</a></li>
			                <li><a href="#">3</a></li>
			                <li><a href="#">4</a></li>
			                <li><a href="#">5</a></li>
			                <li><a href="#">&gt;</a></li>
			              </ul>
			            </div>
			          </div>
			        </div>
			    	</div>
	    			<!-- END COL -->
	    		</div>
	    	</div>
	    </section>
	  
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
 