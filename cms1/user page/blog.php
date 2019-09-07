<!DOCTYPE html>
<?php
      include("../includes/db.php");
	     include ("../includes/header.php"); 
      $id=$_GET['user'];
      $query="SELECT * FROM `users`   WHERE `user_id`='$id' ";
      $run=mysqli_query($con,$query);
      $r1=mysqli_fetch_assoc($run);
	  
		
      $name=$r1['username'];
	  $img=$r1['user_image'];
	  $results_per_page=5;
	   
	   if(!isset($_GET['page'])){
			$page=1;
		}
  else {
    $page=$_GET['page'];
		}
			  $this_page_first=($page-1)*$results_per_page;
	 
	  $qq="SELECT * FROM `posts` WHERE `post_user`='$name' ";
      $qry="SELECT * FROM `posts` WHERE `post_user`='$name' ORDER BY `post_date` DESC LIMIT $this_page_first,$results_per_page";
      $runn=mysqli_query($con,$qry);
	  $run=mysqli_query($con,$qq);
	  $total_number=mysqli_num_rows($run);
	  
	  
	 
		
	  
	  
	  ?>
	  
<html lang="en">
  <head>
    <title>Blogs Page</title>
	<link rel="stylesheet" href="quiz_mainpage_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="pagination.css" rel="stylesheet">
    
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
<link rel="stylesheet" href="quiz_mainpage_style.css">
 <link href="pagination.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.solodev.com/assets/pagination/jquery.twbsPagination.js"></script>
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="index.html"><span class="img" style="background-image: url(../admin/images/<?php echo $img; ?>);"></span><?php echo $r1['user_firstname']."  ".$r1['user_lastname']  ; ?></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="about.php?user=<?php echo $id;?>">About Me</a></li>
					<li><a href="services.php?user=<?php echo $id;?>">Tasks</a></li>
					<li class="colorlib-active"><a href="blog.php?user=<?php echo $id;?>">Blog</a></li>
					<li><a href="blog.html">Change Settings</a></li>
					<li><a href="../../home4/tp.php">HOME</a></li>
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
       
          
       $arr1[]=$row;
	$img1 = $row['post_image']; 
		
	  }
	  
	if(!empty($arr1)){  
	for($i=0;$i<count($arr1);$i++)
	{
       ?>
	          
			<section class="ftco-section">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-lg-12">
	    				<div class="row">
			    			<div class="col-md-12">
			    				<div class="blog-entry ftco-animate d-md-flex">
										<a href="single.html" class="img img-2" style="background-image: url(../admin/images/<?php echo $arr1[$i]['post_image']; ?>);"></a>
										<div class="text text-2 p-4">
										
				              <h3 class="mb-2"><a href="single.html"><?php echo $arr1[$i]['post_title']; ?></a></h3>
				              <div class="meta-wrap">
												<p class="meta">
				              		<span><?php echo $arr1[$i]['post_date']; ?></span>
				              		<span><a href="single.html"><?php echo $arr1[$i]['post_tags']; ?></a></span>
				              		
				              	</p>
			              	</div>
				              <p class="mb-4"><?php echo $arr1[$i]['post_content']; ?></p>
				              <p><a href="../post.php?p_id=<?php echo $arr1[$i]['post_id']; ?>" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
				            </div>
									</div>
			    			</div>
			    			
			    			</div>
			    			
			    		</div><!-- END-->
						<?php 
	}
		
	}
	  ?>
			    		<div class="row mt-5" style="margin-top: 0px !important; margin-left: 35%;">
                <div class="col-md-12 text-center">
			              <nav aria-label="Page navigation example">
 <ul class="pagination">
 <li  id="previous-page">
   <a class="page-link" href="javascript:void(0)" aria-label="Previous">
     <span aria-hidden="true">&laquo;</span>
   </a>
 </li>
 <!-- <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
 <li class="page-item"><a class="page-link" href="javascript:void(0" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>-->
 </ul>
 </nav>
             
			    	</div>
	    			<!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		
	  
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous">
    </script>
  <script>
      'use strict';
      var curr="<?php echo $page ?>"
          var numberOfItems = "<?php echo $total_number;?>";
          var limitPerPage = 5;
		  
		  
		  
          var totalPages = Math.ceil(numberOfItems / limitPerPage);
		  
          $(".pagination").append("<li class='page-item '><a href='javascript:void(0)' class='page-link'>" + 1 + "</a></li>");
          for (var i = 2; i <= totalPages; i++) {
              $(".pagination").append("<li class='page-item '><a href='javascript:void(0)' class='page-link'>" + i + "</a></li>"); // Insert page number into pagination tabs
            }

          $(".pagination").append("<li id='next-page'><a class='page-link' href='javascript:void(0' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
          var temp = document.getElementsByClassName("page-link")
        for(var c=1;c<temp.length;c++){
            if(temp[c].innerHTML==curr){
                var t = document.getElementsByClassName("page-item");
                t[c-1].classList.add("active");
                break;

         }
        }

          $(".pagination li.page-item").on("click", function() {
              // Check if page number that was clicked on is the current page that is being displayed
              if ($(this).hasClass('active')) {
                return false; // Return false (i.e., nothing to do, since user clicked on the page number that is already being displayed)
              } else {
                var currentPage = $(this).index();
                // Get the current page number
                $(".pagination li").removeClass('active'); // Remove the 'active' class status from the page that is currently being displayed
                $(this).addClass('active'); // Add the 'active' class status to the page that was clicked on
              }
              window.location.replace("blog.php?page="+currentPage+"&user=<?php echo $id;?>");
            });

          $("#next-page").on("click", function() {
              var currentPage = $(".pagination li.active").index(); // Identify the current active page
              // Check to make sure that navigating to the next page will not exceed the total number of pages
              if (currentPage === totalPages) {
                return false; // Return false (i.e., cannot navigate any further, since it would exceed the maximum number of pages)
              } else {
                currentPage++; // Increment the page by one
                $(".pagination li").removeClass('active'); // Remove the 'active' class status from the current page
                $(".pagination li.page-item:eq(" + (currentPage - 1) + ")").addClass('active'); // Make new page number the 'active' page
              }
                window.location.replace("blog.php?page="+currentPage+"&user=<?php echo $id;?>");
            });

          $("#previous-page").on("click", function() {
              var currentPage = $(".pagination li.active").index(); // Identify the current active page
              // Check to make sure that users is not on page 1 and attempting to navigating to a previous page
              if (currentPage === 1) {
                return false; // Return false (i.e., cannot navigate to a previous page because the current page is page 1)
              } else {
                currentPage--; // Decrement page by one
                $(".pagination li").removeClass('active'); // Remove the 'activate' status class from the previous active page number
                $(".pagination li.page-item:eq(" + (currentPage - 1) + ")").addClass('active'); // Make new page number the 'active' page
              }
                window.location.replace("blog.php?page="+currentPage+"&user=<?php echo $id;?>");
            });
            </script>

    <ul id="pagination-demo" class="pagination-lg pull-right" ></ul>

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
 