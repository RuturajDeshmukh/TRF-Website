<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 
<?php


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
	$branch = trim($_POST['Department']);
	$year = trim($_POST['Year']);
	$id=trim($_POST['grno']);
	$description= trim( $_POST['description']);
  $linkedin= trim( $_POST['linkedin']));
  $glink=trim($_POST['google']);


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

        register_user($username, $email, $password,$branch,$year,$id,$description,$linkedin,$glink);

        $data['message'] = $username;

        $pusher->trigger('notifications', 'new_user', $data);

        login_user($username, $password);


    }

    

} 


?>
 

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"

                            autocomplete="on"

                            value="<?php echo isset($username) ? $username : '' ?>">

                            <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>

                       
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>" >

                             <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
              
                        </div>
						
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">

                            <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>


                        </div>
						      <div class="form-group">
                            <label for="id" class="sr-only">Gr-no</label>
                            <input type="text" name="Grno" id="key" class="form-control" placeholder="Gr-no">

                            

                        </div>
						<div class="form-group">
						
						<tr>
						<td>Department:</td>
						<td>
							<select name="Department">
							<option value="DESH">DESH</option>
							<option value="Computer">Computer</option>
							<option value="IT">IT</option>
							<option value="E&TC">E&TC</option>
							<option value="Electronics">Electronics</option>
							<option value="Instrumentation">Computer</option>
							<option value="Mechanical">Mechanical</option>
							<option value="Chemical">Chemical</option>
							<option value="Industrial and Production">Industrial and Production</option>
							</select>
							</td>
						</div>
						<div class="form-group">
						<tr>
						<td>Year:</td>
						<select name="Year">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
						</td>
						</div>
						
							
							
						
						
                        <input type="submit" name="resgister" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
