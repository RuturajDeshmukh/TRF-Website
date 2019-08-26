

<?php  // Get request user id and database data extraction


if(isset($_GET['edit_user'])){


    $the_user_id =  $_GET['edit_user'];


    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users_query = mysqli_query($connection,$query);

      while($row = mysqli_fetch_assoc($select_users_query)) {

          $user_id        = $row['user_id'];
          $username       = $row['username'];
          $user_password  = $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname  = $row['user_lastname'];
          $user_email     = $row['user_email'];
          $user_glink     =$row['google_link'];
          $user_linkedin  =$row['linkedin_link'];
          $user_image     = $row['user_image'];
          $user_role      = $row['user_role'];

      }




?>



 <?php  // Post request to update user


   if(isset($_POST['edit_user'])) {


            $user_firstname   = escape($_POST['user_firstname']);
            $user_lastname    = escape($_POST['user_lastname']);
            $user_role        = escape($_POST['user_role']);

           // $post_image = $_FILES['image']['name'];
           // $post_image_temp = $_FILES['image']['tmp_name'];


            $username      = escape($_POST['username']);
            $user_email    = escape($_POST['user_email']);
            $user_password = escape($_POST['user_password']);
            $post_date     = escape(date('d-m-y'));
            $user_glink = escape($_POST['user_glink']);
            $user_linkedin=escape($_POST['user_linkedin']);
            $user_img=$_FILES['img']['name'];

            $tempname=$_FILES['img']['tmp_name'];
            $post_date     = escape(date('d-m-y'));




        if(!empty($user_password)) {

          $query_password = "SELECT user_password FROM users WHERE user_id =  $the_user_id";
          $get_user_query = mysqli_query($connection, $query_password);
          confirmQuery($get_user_query);

          $row = mysqli_fetch_array($get_user_query);

          $db_user_password = $row['user_password'];


        if($db_user_password != $user_password) {

            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

          }

          	if(isset($_FILES['img']['name']) AND ($_FILES['img']['name']!="")){
              $user_img=$_FILES['img']['name'];
              $tempname=$_FILES['img']['tmp_name'];
              move_uploaded_file($tempname,"./images/$user_img/");
              $query = "UPDATE users SET ";
              $query .="user_firstname  = '{$user_firstname}', ";
              $query .="user_lastname = '{$user_lastname}', ";
              $query .="user_role   =  '{$user_role}', ";
              $query .="username = '{$username}', ";
              $query .="user_email = '{$user_email}', ";
              $query .="user_password   = '{$hashed_password}', ";
              $query .="user_image   = '{$user_img}',";
			   $query .="google_link   = '{$user_glink}', ";
			    $query .="linkedin_link   = '{$user_linkedin}' ";
              $query .= "WHERE user_id = '{$the_user_id}' ";
              $edit_user_query = mysqli_query($connection,$query);

              confirmQuery($edit_user_query);


            echo "User Updated" . " <a href='users.php'>View Users?</a>";


            }
            else{
          $query = "UPDATE users SET ";
          $query .="user_firstname  = '{$user_firstname}', ";
          $query .="user_lastname = '{$user_lastname}', ";
          $query .="user_role   =  '{$user_role}', ";
          $query .="username = '{$username}', ";
          $query .="user_email = '{$user_email}', ";
          $query .="user_password   = '{$hashed_password}', ";
		  $query .="google_link   = '{$user_glink}', ";
		$query .="linkedin_link   = '{$user_linkedin}' ";

          $query .= "WHERE user_id = '{$the_user_id}'";


            $edit_user_query = mysqli_query($connection,$query);

            confirmQuery($edit_user_query);


          echo "User Updated" . " <a href='users.php'>View Users?</a>";
        }



             }  // if password empty check end






        } // Post reques to update user end





 } else {  // If the user id is not present in the URL we redirect to the home page


        header("Location: index.php");


      }






?>



    <form action="" method="post" enctype="multipart/form-data">



      <div class="form-group">
         <label for="title">Firstname</label>
          <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
      </div>




       <div class="form-group">
         <label for="post_status">Lastname</label>
          <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
      </div>


         <div class="form-group">

       <select name="user_role" id="">

    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
       <?php

          if($user_role == 'admin') {

             echo "<option value='subscriber'>subscriber</option>";

          } else {

            echo "<option value='admin'>admin</option>";

          }

      ?>

       </select>




      </div>

<!--
      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>
-->

      <div class="form-group">
         <label for="post_tags">Username</label>
          <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
      </div>

      <div class="form-group">
         <label for="post_content">Email</label>
          <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
      </div>
      <div class="form-group">
         <label for="post_content">Google_link</label>
          <input type="text" value="<?php echo $user_glink; ?>" class="form-control" name="user_glink">
      </div>
      <div class="form-group">
         <label for="post_content">Linkedin  link</label>
          <input type="text"  value ="<?php echo $user_linkedin ?>" class="form-control" name="user_linkedin">
      </div>


      <div class="form-group">
         <label for="post_content">Password</label>
          <input type="password" value="<?php //echo $user_password; ?>" class="form-control" name="user_password">
      </div>
    </div>
    <div class="form-group">
       <label for="post_content">User_image</label>
        <input type="file" class="form-control" name="img"> <img src="images/<?php echo $user_image;?>" style="width:80px;height:60px">
    </div>




       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
      </div>


</form>
