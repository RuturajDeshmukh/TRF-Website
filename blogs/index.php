<?php
  require('../cms1/includes/db.php'); 
  session_start();
  $k1='a';
  if(isset($_SESSION["word"])){$k1=$_SESSION["word"];}

?>
<!doctype html>
<html lang="en">
  <head>
     
    <title>Blog Main Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="pagination.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
   <!-- style CSS -->
   <link rel="stylesheet" href="header/css/style.css">
  </head>
  <body>
  <style>
  /*FOOTER*/
          

footer {
  background: #16222A;
  background: -webkit-linear-gradient(59deg, #3A6073, #16222A);
  background: linear-gradient(59deg, #3A6073, #16222A);
  color: white;
  margin-top:100px;
}

footer a {
  color: #fff;
  font-size: 14px;
  transition-duration: 0.2s;
}

footer a:hover {
  color: #FA944B;
  text-decoration: none;
}

.copy {
  font-size: 12px;
  padding: 10px;
  border-top: 1px solid #FFFFFF;
}

.footer-middle {
  padding-top: 2em;
  color: white;
}


/*SOCİAL İCONS*/

/* footer social icons */

ul.social-network {
  list-style: none;
  display: inline;
  margin-left: 0 !important;
  padding: 0;
}

ul.social-network li {
  display: inline;
  margin: 0 5px;
}


/* footer social icons */

.social-network a.icoFacebook:hover {
  background-color: #3B5998;
}

.social-network a.icoLinkedin:hover {
  background-color: #007bb7;
}
.social-network a.icoInstagram:hover {
  background: #833ab4;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #fcb045, #fd1d1d, #833ab4);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #fcb045, #fd1d1d, #833ab4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

.social-network a.icoFacebook:hover i,
.social-network a.icoInstagram:hover i,
.social-network a.icoLinkedin:hover i {
  color: #fff;
}

.social-network a.socialIcon:hover,
.socialHoverClass {
  color: #44BCDD;
}

.social-circle li a {
  display: inline-block;
  position: relative;
  margin: 0 auto 0 auto;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
  text-align: center;
  width: 30px;
  height: 30px;
  font-size: 15px;
}

.social-circle li i {
  margin: 0;
  line-height: 30px;
  text-align: center;
}

.social-circle li a:hover i,
.triggeredHover {
  -moz-transform: rotate(360deg);
  -webkit-transform: rotate(360deg);
  -ms--transform: rotate(360deg);
  transform: rotate(360deg);
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}

.social-circle i {
  color: #595959;
  -webkit-transition: all 0.8s;
  -moz-transition: all 0.8s;
  -o-transition: all 0.8s;
  -ms-transition: all 0.8s;
  transition: all 0.8s;
}

.social-network a {
  background-color: #F9F9F9;
}
</style>
    </head>
  <body style="background-color: white;">

      
   <!--::menu part start::-->
   <header class="main_menu home_menu">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand" href="index.html" style="width: 15%; height: 10%;"> <img id="headimg"src="header/trflogo6.png" alt="logo" > </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse main-menu-item" id="navbarNav">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link headeranchors" href="index.html">Developer's Page</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link headeranchors"  href="about.html">Project Tables</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link headeranchors" style="color: red;" href="services.html">Blogs</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle headeranchors" href="#" id="navbarDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Quiz
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item headeranchors" href="blog.html" style="background:none !important;">Quizes</a>
                              <a class="dropdown-item headeranchors" href="single-blog.html" style="background:none !important;">Leaderboard</a>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link headeranchors" href="contact.html">Login</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </header>
   <!--::menu part end::-->

   <!--::breadcrumb part start::-->
   <section class="breadcrumb blog_bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb_iner">
                  <div class="breadcrumb_iner_item">
                     <h2>BLOGS</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

    <div class="wrap" style="margin-top: 40px; margin-bottom: 40px;">
<br>
      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Blogs</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <?php
			  if(!isset($_GET['page'])){
					$page=1;
				}
		else {
			$page=$_GET['page'];
			
				}$results_per_page=6;
				$this_page_first=($page-1)*$results_per_page;
                  if(isset($_POST['Submit']))
                  {
                    $cat = $_POST['categories'];
                    $_SESSION["word"] = $cat;
                    $queery = "SELECT * FROM `categories` WHERE cat_title='$cat'";
                    $reesult = mysqli_query($con,$queery);
                    $r = mysqli_fetch_array($reesult);
                    $k = $r['cat_id'];
                    
                     $qq = "SELECT * FROM `posts` WHERE post_category_id=$k ";
					 $rr = mysqli_query($con,$qq);
					  $total_number=mysqli_num_rows($rr);
					   $qqq = "SELECT * FROM `posts` WHERE post_category_id=$k ORDER BY `post_views_count` DESC LIMIT ".$this_page_first. ','.$results_per_page ;
					 
                  }
                  elseif (isset($_POST['Submit1']))
                   {
                      $p_name = $_POST['title'];
                      $qqq = "SELECT * FROM `posts` WHERE post_title='$p_name'";
                  }

                  else
                  {	
                  if(isset($_SESSION["word"]))
                  {
                    $cat = $_SESSION["word"];
                    $queery = "SELECT * FROM `categories` WHERE cat_title='$cat'";
                    $reesult = mysqli_query($con,$queery);
                    $r = mysqli_fetch_array($reesult);
                    $k = $r['cat_id'];
                    
                     $qq = "SELECT * FROM `posts` WHERE post_category_id=$k ";
           $rr = mysqli_query($con,$qq);
            $total_number=mysqli_num_rows($rr);
             $qqq = "SELECT * FROM `posts` WHERE post_category_id=$k ORDER BY `post_views_count` DESC LIMIT ".$this_page_first. ','.$results_per_page ;
                  }
                  else
                  {
                    $qq="SELECT * FROM `posts`";
					$rr = mysqli_query($con,$qq);
            $total_number=mysqli_num_rows($rr);
                    $qqq = "SELECT * FROM `posts` ORDER BY `post_views_count` DESC LIMIT ".$this_page_first. ','.$results_per_page;
                  
                  }}
                
						$rrr = mysqli_query($con,$qqq);
                      if(mysqli_num_rows($rrr)==0)
                        {echo "No projects found";
					
					}
                          ?>
                         
              <div class="row">
                <?php
                   while($row = mysqli_fetch_array($rrr))
                   {
                          $p_id = $row['post_id'];
                          $p_image = $row['post_image'];
                          $p_author = $row['post_author'];
                          $qq = "SELECT * FROM `users` WHERE username='$p_author'";
                          $rr = mysqli_query($con,$qq);
                          $row1 = mysqli_fetch_array($rr);
                          $p_author_image = $row1['user_image'];
						  $arr1[]=$row;
						  
				   
				   }
              if(!empty($arr1))
              {
						  for($i=0;$i<count($arr1);$i++)
						  {
							  ?>
                <div class="col-md-6">
                  <a href="../cms1/post.php<?php echo "?p_id=".$arr1[$i]['post_id']; ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="../cms1/admin/images/<?php echo $arr1[$i]['post_image']; ?>" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img style="height: 30px; width: 30px;"src="../cms1/admin/images/<?php echo $p_author_image ?>" alt="Batman"> <?php echo  $arr1[$i]['post_author']; ?></span>&bullet;
                        <span class="mr-2"><i class="fa fa-calendar"></i> <?php echo $arr1[$i]['post_date']; ?> </span> &bullet;
                      </div>
                      <h2><?php echo $arr1[$i]['post_title']; ?> </h2>
                      <p><?php echo $arr1[$i]['post_content']; ?>
                      </p>
                    </div>
                  </a>
                </div>  
              
						  <?php }}
				   						  ?>

              </div>
  <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                        <li  id="previous-page">
                            <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    </ul>
                  </nav>
                </div>
              </div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
                  var numberOfItems = "<?php echo $total_number ?>";
				  
                  var limitPerPage = 6;
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
                      window.location.replace("index.php?page="+currentPage);
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
                        window.location.replace("index.php?page="+currentPage);
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
                        window.location.replace("index.php?page="+currentPage);
                    });
            </script>


              

              

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap" style="margin-bottom: 50px;">
                <form action="" class="search-form" id="form2" method="post">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" name="title" placeholder="Type post title ">
                  </div>
                  <button type="submit" form="form2" value="Submit1" id="Submit1" name="Submit1" >Submit</button>
                </form>
              </div>
              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                  <form id="form1" name="form1" action="" method="post">
                  <?php 
                $qq1 = "SELECT * FROM `categories` WHERE 1";
                $rr1 = mysqli_query($con,$qq1);?>
                <input type="hidden" name="categories" id="categories" value="<?php if(isset($_POST['categories'])){echo $_POST['categories'];}else{echo '';} ?>">
                <?php
                while($row = mysqli_fetch_array($rr1))
                {
                  $val = $row['cat_title'];
                ?>
                
                  <li><a href="javascript:void(0)" onclick="catfunc(this)"><?php echo $val; ?></a></li>
                  <?php } ?>

               
                <button type="submit" form="form1" value="Submit" id="Submit" name="Submit" style="display: none;">Submit</button>
              </form>
                </ul>
              </div>
                
              <!-- <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                    <li>
                      <a href="">
                        <img src="images/img_10.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>Some Awesome Topic of a Personal  Amazing Blog</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <img src="images/img_4.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>Some Awesome Topic of a Personal  Amazing Blog</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="">
                        <img src="images/img_12.jpg" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4>Some Awesome Topic of a Personal  Amazing Blog</h4>
                          <div class="post-meta">
                            <span class="mr-2">March 15, 2018 </span>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- END sidebar-box --> 

              
            </div>
            <!-- END sidebar -->
	
			           
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
    
  
 
          </div>
        </div>
      </section>

    </div>
	 <style>
        #ftr {
          list-style: none;
          padding: 0;
        }
        .ftrl {
          padding-left: 1.3em;
        }
        #ftren:before {
          content: "\f0e0"; 
          font-family: FontAwesome;
          display: inline-block;
          margin-left: -1.3em; 
          width: 1.3em; 
        }
            #ftrph:before {
          content: "\f095"; 
          font-family: FontAwesome;
          display: inline-block;
          margin-left: -1.3em; 
          width: 1.3em; 
        }
            #ftrad:before {
          content: "\f015"; 
          font-family: FontAwesome;
          display: inline-block;
          margin-left: -1.3em; 
          width: 1.3em; 
        }
          

      </style>
	  
    <footer class="mainfooter" role="contentinfo">
    <div class="footer-middle">
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3 col-sm-6">
            <!--Column1-->
            <div class="footer-pad">
              <h4 style="color: white;">The Robotics Forum </h4>
              <ul class="list-unstyled " id="ftr">
               <li class="ftrl" id="ftrad"><span>666 Upper Indiranagar, <br></span><span>Bibwewadi, </span>Pune-411001 </li>
						<li class="ftrl" id="ftrph">1234567890  </li>
						<li class="ftrl" id="ftren">trf@vit.edu</li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <h4 style="color: white;">Follow Us</h4>
            <ul class="social-network social-circle">
              <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          <div class="col-md-3"></div>
        </div>
        <div class="row">
          <div class="col-md-12 copy">
            <p class="text-center">&copy; Copyright 2019 - The Robotics Forum. All rights reserved.</p>
          </div>
        </div>

      </div>
    </div>
  </footer>
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
	
    
    <script src="js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous">
    </script>
    <script>
        function catfunc(e){
            document.getElementById('categories').value=e.text;
        // document.form1.categories.value=e;
                $('#Submit').click();}
      </script>
      

   
  </body>
</html>