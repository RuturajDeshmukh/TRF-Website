<?php  include "../includes/db.php "; ?>
<?php  include "../includes/header.php"; ?>


<?php

		checkIfUserIsLoggedInAndRedirect('../index.php');


		if(ifItIsMethod('post')){

			if(isset($_POST['username']) && isset($_POST['password'])){

				login_user($_POST['username'], $_POST['password']);


			}else {


				redirect('/cms1/login2.php');
			}

		}






?>


