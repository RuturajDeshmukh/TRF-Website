<?php
include("includes/db.php");
include "admin/functions.php" ;
require 'vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();



$options = array(
    'cluster' => 'us2',
    'encrypted' => true
);

$pusher = new Pusher\Pusher(getenv('APP_KEY'), getenv('APP_SECRET'), getenv('APP_ID'), $options);




if($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
	$branch = trim($_POST['branch']);
	$year = trim($_POST['year']);
	$id=trim($_POST['grno']);
	$description= trim( $_POST['description']);
  $linkedin= trim( $_POST['linkedin']);
  $glink=trim($_POST['google']);
  $imgname=$_FILES['img']['name'];
   $tempname=$_FILES['img']['tmp_name'];
 move_uploaded_file($tempname,"admin/images/$imgname");


    $error = [

        'username'=> '',
        'email'=>'',
        'password'=>''

    ];


    if(strlen($username) < 4){

        $error['username'] = 'Username needs to be longer';


    }

     if($username ==''){

        $error['username'] = 'Username cannot be empty';


    }


     if(username_exists($username)){

        $error['username'] = 'Username already exists, pick another another';


    }



    if($email ==''){

        $error['email'] = 'Email cannot be empty';


    }


     if(email_exists($email)){

        $error['email'] = 'Email already exists, <a href="index.php">Please login</a>';


    }


    if($password == '') {


        $error['password'] = 'Password cannot be empty';

    }



    foreach ($error as $key => $value) {
        
        if(empty($value)){

            unset($error[$key]);

        }



    } // foreach

    if(empty($error)){

        register_user($username, $email, $password,$branch,$year,$id,$description,$linkedin,$glink,$imgname);

        $data['message'] = $username;

        $pusher->trigger('notifications', 'new_user', $data);

        login_user($username, $password);


    }

    





}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up For TRF</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img" style="background-color: coral;">
                    <img src="images/logo.jpg" alt="" style="border-radius: 50%; margin-top: 10%; margin-left: 10%;">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="register.php" enctype="multipart/form-data">
                        <h2>student registration form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name"><span id="star">* </span>Name :</label>
                                <input type="text" name="name" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="father_name"><span id="star">* </span>General Registration Number :</label>
                                <input type="text" name="grno" id="father_name" required/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name"><span id="star">* </span>E-Mail :</label>
                                <input type="email" name="email" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="state"><span id="star">* </span>Branch:</label>
                                <div class="form-select">
                                    <select name="branch" id="state" required>
                                        <option value=""></option>
                                        <option value="Computer">Computer</option>
                                        <option value="E&Tc">E&amp;TC</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="IT">IT</option>
                                        <option value="Mechanical">Mechanical</option>
                                        <option value="Instrumentation">Instrumentation</option>
                                        <option value="Indus & Production">Indus Prod</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label"><span id="star">* </span>Year :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="year" id="fy" value="FY" checked>
                                <label for="fy">FY</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="year" id="sy" value="SY">
                                <label for="sy">SY</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="year" id="ty" value="TY">
                                <label for="ty">TY</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="year" id="be" value="BE">
                                <label for="be">BE</label>
                                <span class="check"></span>
                            </div>
                        </div>                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="father_name"><span id="star">* </span>Password :</label>
                                <input type="text" name="password" id="father_name" required/>
                            </div>
                            <div class="form-group">
                                <label for="father_name1"><span id="star">* </span>Reconfirm Password :</label>
                                <input type="text" name="password1" id="father_name1" required/>
                            </div>
                        </div>
                            /* <div class="form-group">
                            <label for="story">Descrtiption:</label>

                            <textarea id="story" name="description" rows="5" cols="50">
                            </textarea> */
                            </div>  
                            <div class="form-group">
                                <label for="address">Linkedin Link :</label>
                                <input type="text" name="linkedin" id="address" />
                            </div>  
                            <div class="form-group">
                                <label for="address">Google Link :</label>
                                <input type="text" name="google" id="address" />
                            </div>
                            <div class="form-group">
                                <label for="pic">Profile Photo :</label>
                                <input type="file" name="img" id="prof-img">
                            </div>  
                        <div class="form-submit">
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>