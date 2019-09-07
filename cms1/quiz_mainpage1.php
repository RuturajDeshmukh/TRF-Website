<html>
<head>
    <title>Quiz display</title>
    <link rel="stylesheet" href="quiz_mainpage_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
   <!-- headerstyle CSS -->
   <link rel="stylesheet" href="header/css/style.css">
</head>
<body>
     <!--::menu part start::-->
   <header class="main_menu home_menu" style="position: absolute;">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <nav class="navbar navbar-expand-lg navbar-light" >
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
                           <a class="nav-link headeranchors"  href="search4.php">Project Tables</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link headeranchors"  href="../blogs/index.php.">Blogs</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle headeranchors" href="#" id="navbarDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: red;">
                              Quiz
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item headeranchors" href="quiz_mainpage1.php">Quizes</a>
                              <a class="dropdown-item headeranchors" href="leaderboard3.php">Leaderboard</a>
                           </div>
                        </li>
                        <?php //include("includes/header.php");
						if(!isset($_SESSION['user_id']))
						{?>
                        <li class="nav-item">
                            <a class="nav-link headeranchors" href="javascript:void(0)" onclick="document.getElementById('modal-wrapper').style.display='block'" >Login</a>
                        </li>
						<?php }
						?>
						<?php //include("includes/header.php");
						if(isset($_SESSION['user_id']))
						{
							?>
						<li class="nav-item dropdown" style="width: 100px;">
                           <a class="nav-link dropdown-toggle headeranchors" href="#" id="navbarDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img class=" rounded-circle" src="https://cdn.bootstrapsnippet.net/assets/image/dummy-avatar.jpg" style="width: 50%; height: 50%;">
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						   <?php if($_SESSION['user_role']=="admin"){ ?>
							   <a class="dropdown-item headeranchors" href="admin/index.php" style="background:none !important;">Admin Page</a>
							  <?php } ?>
                              <a class="dropdown-item headeranchors" href="user page/blog.php?user=<?php echo $_SESSION['user_id']?>" style="background:none !important;">User Page</a>
                              <a class="dropdown-item headeranchors" href="user page/logout.php" style="background:none !important;">Logout</a>
                           </div>
                        </li>
						<?php }
						?>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </header>
   <!--::menu part end::-->
   <style>

/* Full-width input fields */
#usr, #pasw {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}

/* Set a style for all buttons */
#btn {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:20px;
}
#btn:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
	height:200px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 10% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>

   <!--::breadcrumb part start::-->
   <section class="breadcrumb blog_bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb_iner">
                  <div class="breadcrumb_iner_item">
                     <h2>Quizzes</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--::breadcrumb part start::-->
    <h1 class="main_title">ALL QUIZZES</h1>
    <hr>
    <div class="stats" style="margin-top: 30px;">
                    <h1>ONGOING QUIZZES</h1>
                </div>
    <?php

$arr=array();
$arr1=array();
$con=mysqli_connect("localhost","root","","trf_website");
$query="SELECT * FROM `quiz`  ORDER BY startDate DESC";
$run=mysqli_query($con,$query);
$total_number=mysqli_num_rows($run);
while($row=mysqli_fetch_assoc($run))
{
  $arr[]=$row;
}
//print_r($arr);
$results_per_page=5;//number of values to be displayed per page
$number_of_pages=ceil($total_number/$results_per_page);//total number of pages
if(!isset($_GET['page'])){
  $page=1;
}
  else {
    $page=$_GET['page'];
  }







$this_page_first=($page-1)*$results_per_page;
$qry1="SELECT * FROM `quiz`ORDER BY startDate DESC LIMIT ".$this_page_first. ','.$results_per_page;
$result=mysqli_query($con,$qry1);
while($row1=mysqli_fetch_assoc($result))
{
  $arr1[]=$row1;
}
//print_r($arr1);
?>





  <?php
for($i=0;$i<count($arr1);$i++){
?>
      <div id='main' onclick='runscript(this)'>

        <div class='container'>
            <div class='row'>

                <div class='col-md-8'>
                    <h3 id='quiz_title'><?php echo $arr1[$i]['quizName'];?></h3>
                </div>

                <div class='col-md-2'>
                    <h5 id='date'><?php  echo $arr1[$i]['startDate'].' to '.$arr1[$i]['endDate'];?></h5>
                </div>

                <div class='col-md-2'>
                    <button id='start' type='button'  onclick="window.location='quiz_debug.php?bid=<?php echo $arr1[$i]['quizId'] ?>' ">START </button>
                </div>

            </div>
        </div>


        <div id='hidden-content' style='display: none;'>
            <hr>
            <h4>Description:</h4>
            <p><?php echo $arr1[$i]['discription'];?></p>
            <h4>Time:<?php echo $arr1[$i]['duration'] ?></h4>
        </div>

    </div>
<?php
  }
  ?>
  <?php
/*
if($page>1)
{
echo '<a href="quiz_mainpage1.php?page=' .($page-1). '" > Previous </a>';

}
for($i=1;$i<=$number_of_pages;$i++){
  if($i==$page)
  echo '<a class="active">'.  $i  .'</a>';
  else
  echo "<a href='quiz_mainpage1.php?page=".$i. "' >$i</a>";
}
if($page<$number_of_pages)
{
echo '<a href="quiz_mainpage1.php?page=' .($page+1). '" > Next </a>';

}*/


 ?>

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
 <div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate" action="login/login2.php" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="blank.jpg" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Modal Popup Box</h1>
    </div>

    <div class="container">
      <input id="usr" type="text" placeholder="Enter Username" name="username">
      <input id="pasw" type="password" placeholder="Enter Password" name="password">        
      <button id="btn" type="submit">Login</button>
      <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
    </div>
    
  </form>
  
</div>

    <script>

        function runscript(object){

            if(object.querySelector('#hidden-content').style.display=="none"){
                object.querySelector('#hidden-content').style.display="block";
            }
            else if(object.querySelector('#hidden-content').style.display=="block"){
                object.querySelector('#hidden-content').style.display="none";
            }
}

</script>
</script>

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
              window.location.replace("quiz_mainpage1.php?page="+currentPage);
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
                window.location.replace("quiz_mainpage1.php?page="+currentPage);
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
                window.location.replace("quiz_mainpage1.php?page="+currentPage);
            });
            </script>

    <ul id="pagination-demo" class="pagination-lg pull-right" ></ul>



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
    <footer class="mainfooter" role="contentinfo" style="margin: 0px;">
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
    <script>
        
        function runscript(object){
            
            if(object.querySelector('#hidden-content').style.display=="none"){
                object.querySelector('#hidden-content').style.display="block";
            }
            else if(object.querySelector('#hidden-content').style.display=="block"){
                object.querySelector('#hidden-content').style.display="none";
            }
}
  
</script>
    <script src="header/js/jquery-3.2.1.min.js"></script>
    <script src="header/js/jquery-migrate-3.0.0.js"></script>
    <script src="header/js/popper.min.js"></script>
    <script src="header/js/bootstrap.min.js"></script>
    <script src="header/js/owl.carousel.min.js"></script>
    <script src="header/js/jquery.waypoints.min.js"></script>
    <script src="header/js/jquery.stellar.min.js"></script>
    <!-- jquery -->
   <script src="header/js/jquery-1.12.1.min.js"></script>
   <!-- popper js -->
   <script src="header/js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="header/js/bootstrap.min.js"></script>
   <!-- easing js -->
   <script src="header/js/jquery.magnific-popup.min.js"></script>
   <!-- owl carousel js -->
   <script src="header/js/owl.carousel.min.js"></script>
   <script src="header/js/slick.min.js"></script>
   <!-- easing js -->
   <script src="header/js/jquery.easing.min.js"></script>
   <!--masonry js-->
   <script src="header/js/masonry.pkgd.min.js"></script>
   <script src="header/js/masonry.pkgd.js"></script>
   <!--form validation js-->
   <script src="header/js/jquery.nice-select.min.js"></script>
   <script src="header/js/contact.js"></script>
   <script src="header/js/jquery.ajaxchimp.min.js"></script>
   <script src="header/js/jquery.form.js"></script>
   <script src="header/js/jquery.validate.min.js"></script>
   <script src="header/js/mail-script.js"></script>
   <!-- counter js -->
   <script src="header/js/jquery.counterup.min.js"></script>
   <script src="header/js/waypoints.min.js"></script>
   <!-- custom js -->
   <script src="header/js/custom.js"></script>
   <script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    
</body>
    
    
</html>