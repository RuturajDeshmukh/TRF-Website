<?php


   if(isset($_POST['create_user'])) {

            $user_id=escape($_POST['user_id']);
            $user_firstname    = escape($_POST['user_firstname']);
            $user_lastname     = escape($_POST['user_lastname']);
            $user_role         = escape($_POST['user_role']);
            $username          = escape($_POST['username']);
            $user_email        = escape($_POST['user_email']);
            $user_password     = escape($_POST['user_password']);
            $user_glink        = escape($_POST['user_glink']);
            $user_linkedin     = escape($_POST['user_linkedin']);
            $user_img=$_FILES['img']['name'];
            $tempname=$_FILES['img']['tmp_name'];
            
            	move_uploaded_file($tempname,"./images/$user_img/");
            $qry1="SELECT * FROM `users` WHERE `username`='$username'";
            $run=mysqli_query($con,$qry1);
            $row=mysqli_num_rows($run);

            if($row<1){



            $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

            $query = "INSERT INTO users(user_firstname, user_lastname, user_role,username,user_email,user_password,google_link,linkedin_link,user_image,user_id) ";

            $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}', '{$user_password}','{$user_glink}','{$user_linkedin}','{$user_img}','{$user_id}') ";

            $create_user_query = mysqli_query($connection, $query);

            confirmQuery($create_user_query);


                 echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";
       }
       else {
         echo "<script>alert('Username already exists !!!')</script>";
       }


   }




?>

    <form action="" method="post" enctype="multipart/form-data">



      <div class="form-group">
         <label for="title">Firstname</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>




       <div class="form-group">
         <label for="post_status">Lastname</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>


         <div class="form-group">

       <select name="user_role" id="">
        <option value="subscriber">Select Options</option>
          <option value="admin">Admin</option>
          <option value="subscriber">Subscriber</option>


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
          <input type="text" class="form-control" name="username">
      </div>

      <div class="form-group">
         <label for="post_content">Email</label>
          <input type="email" class="form-control" name="user_email">
      </div>
      <div class="form-group">
         <label for="post_content">GR_No</label>
          <input type="text" class="form-control" name="user_id">
      </div>
      <div class="form-group">
         <label for="post_content">Google_link</label>
          <input type="text" class="form-control" name="user_glink">
      </div>
      <div class="form-group">
         <label for="post_content">Linkedin  link</label>
          <input type="email" class="form-control" name="user_linkedin">
      </div>

      <div class="form-group">
         <label for="post_content">Password</label>
          <input type="password" class="form-control" name="user_password">
      </div>
      <div class="form-group">
         <label for="post_content">User_image</label>
          <input type="file" class="form-control" name="img">
      </div>




       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
      </div>


</form>
