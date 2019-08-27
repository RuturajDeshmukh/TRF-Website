<?php
  require('includes/header.php'); 
  require('includes/db.php'); 
?>

<?php 
if(isset($_SESSION['user_id']))
{
	
  ?>

<html>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="leaderboard_style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
              <form id="sampleForm" name="sampleForm" method="post" action="">
                    <input type="hidden" name="dep" id="dep" value="">  
                    <input type="hidden" name="year" id="year" value="">
                    <input type="hidden" name="dep_id" id="dep_id" value="<?php if(isset($_POST['dep_id'])){echo $_POST['dep_id'];} else{echo "";}?>">
                    <input type="hidden" name="year_id" id="year_id" value="<?php if(isset($_POST['year_id'])){echo $_POST['year_id'];} else{echo "";}?>">
                    <input type="hidden" name="quizName" id="quizName" value="">
                    <input type="hidden" name="kk1" id="kk1" value="<?php if(isset($_POST['kk1'])){echo $_POST['kk1'];} else{echo "0";}?>">
                    <input type="submit" name="submit" id="submit_dep" value="submit" style="display: none;">
            </form>
 
        <div class="wrapper">
            <div class="container">
            <div class="row">
                    <div class="col-xs-12">
          <div class="list" style="display: inline; float: left;">
             <!------------------------------------------------HEADER-------------------------------------------------------------->
            <div class="list__header" style="width: 100%;">
              <h1 id="title">Leaderboard</h1>
              <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn" id="butnn" style="font-weight: bold; font-size: 23px;"><?php if(isset($_POST['quizName'])){echo $_POST['quizName'];} else{echo "QUIZ TITLE";}?></button>
                  <?php 
    
                      //Search bar for quiz ids
                    $query = "SELECT * FROM `quiz` WHERE 1 ";
                    $result = mysqli_query($con,$query);
                    
                    ?>
                    <div id="myDropdown" class="dropdown-content">
                        <input type="text" placeholder="Search.." id="myInput" >
                        <?php
                        $k=1;
                        while($row = mysqli_fetch_array($result))
                      {?>
                        <a href="javascript:void(0)" id="<?php echo $k ?>" name="<?php echo $k ?>"><?php echo $row['quizName'];?></a>
                        <?php
                        $k++;
                        } 
                        ?>
                      </div>
                </div>
            </div>
              <!-------------------------------------------------TABLE---------------------------------------------------------------->

            <div class="list__body">
                            <?php
      if(!empty($_POST['submit'] ))
        {
          if(!empty($_POST['quizName']))
            { ?>
              <table class="list__table">
                <tr class="first__row" >
                  <td class="list__cell"><span class="list__value" style="text-align: center;">Rank</span></td>
                    <td class="list__cell"><span class="list__value" style="text-align: center;">Username</span></td>
                    <td class="list__cell"><span class="list__value">Score</span></td>
                    <td class="list__cell"><span class="list__value">Department</span></td>
                    <td class="list__cell"><span class="list__value">Year</span></td>
                    
                </tr>
                <?php
    $quiz_name=$_POST['quizName'];
    if(empty($_POST['dep']) AND empty($_POST['year']))
        {
        //Getting quiz id from quiz name
        $qq="SELECT * FROM `quiz` WHERE `quizName`='$quiz_name'";
        $rr = mysqli_query($con,$qq);
        $row11 = mysqli_fetch_array($rr);
        $quiz_id=$row11['quizId'];
        
        $depart=$_POST['dep'];
        $year=$_POST['year'];     
    
        $query1q = "SELECT * FROM `quizresponse` where `quizId`='$quiz_id'  ORDER BY `quizresponse`.`score` DESC";
        $result1r = mysqli_query($con,$query1q);
        $iid = $_SESSION['user_id'];
        $q = "SELECT * FROM `quizresponse` where `quizresponse`.`quizId`='$quiz_id' and `quizresponse`.`userId`= $iid";
        $r = mysqli_query($con,$q);
        $r3 = mysqli_fetch_array($r);
        if (!$result1r)
          {
            printf("Error: %s\n", mysqli_error($con));
            exit();
          }
          $ranking = 1;
          $ran = 1;
          $sc = 0;
          if(isset($r3['score']))
          {
            $sc = $r3['score'];
          }
        while($row1r = mysqli_fetch_array($result1r))
        {
           if($row1r['score'] > $sc)
            $ran+=1;
        }
        $quer = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$iid ";  
          $resul = mysqli_query($con,$quer);
          if (!$resul)
            {
              printf("Error: %s\n", mysqli_error($con));
              exit();
            }
          $ro = mysqli_fetch_array($resul);
          if(isset($r3['score']))
          {
          ?>
                          <tr class="list__row" >

                  <td class="list__cell"><span class="list__value"><?php echo $ran;?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $_SESSION['username'];?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $r3['score'];?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $ro['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $ro['Year']; ?></span></td>
                </tr>
    <?php
    }
    else
    {?>
      <tr class="list__row" >

                  <td class="list__cell"><span class="list__value"><?php echo $ran;?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $_SESSION['username'];?></span></td>
                  <td class="list__cell"><span class="list__value">-</span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $ro['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $ro['Year']; ?></span></td>
                </tr>

    <?php }
    $ranking = 1;
    $query = "SELECT * FROM `quizresponse` where `quizresponse`.`quizId`='$quiz_id'  ORDER BY `quizresponse`.`score` DESC";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result))
          {
          $user_id=$row['userId'];
          $query1 = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";  
          $result1 = mysqli_query($con,$query1);
          if (!$result1)
            {
              printf("Error: %s\n", mysqli_error($con));
              exit();
            }
          $row1 = mysqli_fetch_array($result1);
            ?>
                  <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row['score']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
                </tr>
                <?php
              
              $ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
            } // END OF WHILE LOOP 
          ?>  </table> 
          <?php
          }
          else if(!empty($_POST['dep']) AND !empty($_POST['year'])) 
          
          {
            //Getting quiz id from quiz name
        $qq="SELECT * FROM `quiz` WHERE `quizName`='$quiz_name'";
        $rr = mysqli_query($con,$qq);
        $row11 = mysqli_fetch_array($rr);
        $quiz_id=$row11['quizId'];
        
        $depart=$_POST['dep'];
        $year=$_POST['year'];     
    
        $query1q = "SELECT * FROM `quizresponse`,`users` where `users`.`Branch`='$depart' and `users`.`Year`=$year and `quizresponse`.`quizId`='$quiz_id' and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
        $result1r = mysqli_query($con,$query1q);
        $iid = $_SESSION['user_id'];
        $q = "SELECT * FROM `quizresponse` where `quizresponse`.`quizId`='$quiz_id' and `quizresponse`.`userId`= $iid";
        $r = mysqli_query($con,$q);
        $r3 = mysqli_fetch_array($r);
        $sc = 0;
        if(isset($r3['score']))
        {
          $sc = $r3['score']; 
        }
        if (!$result1r)
          {
            printf("Error: %s\n", mysqli_error($con));
            exit();
          }
          $ranking = 1;
          $ran = 1;
        while($row1r = mysqli_fetch_array($result1r))
        {
           if($row1r['score'] > $sc)
            $ran+=1;
        }
        $quer = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$iid ";  
          $resul = mysqli_query($con,$quer);
          if (!$resul)
            {
              printf("Error: %s\n", mysqli_error($con));
              exit();
            }
          $ro = mysqli_fetch_array($resul);
          if(isset($r3['score']))
          {
          ?>
                          <tr class="list__row" >

                  <td class="list__cell"><span class="list__value"><?php echo $ran;?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $_SESSION['username'];?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $r3['score'];?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $ro['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $ro['Year']; ?></span></td>
                </tr>
    <?php
    }
    else
    {?>
      <tr class="list__row" >

                  <td class="list__cell"><span class="list__value"><?php echo $ran;?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $_SESSION['username'];?></span></td>
                  <td class="list__cell"><span class="list__value">-</span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $ro['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $ro['Year']; ?></span></td>
                </tr>

    <?php }
    $ranking = 1;
    $query = "SELECT * FROM `quizresponse`,`users` where `users`.`Branch`='$depart' and `users`.`Year`=$year and `quizresponse`.`quizId`='$quiz_id' and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result))
          {
          $user_id=$row['userId'];
          $query1 = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";  
          $result1 = mysqli_query($con,$query1);
          if (!$result1)
            {
              printf("Error: %s\n", mysqli_error($con));
              exit();
            }
          $row1 = mysqli_fetch_array($result1);
            ?>
                  <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row['score']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
                </tr>
                <?php
              
              $ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
            } // END OF WHILE LOOP 
          ?>  </table> 
          <?php
          }
          else if(empty($_POST['dep']) AND !empty($_POST['year'])) 
          
          {
            //Getting quiz id from quiz name
        $qq="SELECT * FROM `quiz` WHERE `quizName`='$quiz_name'";
        $rr = mysqli_query($con,$qq);
        $row11 = mysqli_fetch_array($rr);
        $quiz_id=$row11['quizId'];
        
        $depart=$_POST['dep'];
        $year=$_POST['year'];     
    
        $query1q = "SELECT * FROM `quizresponse`,`users` where `users`.`Year`=$year and `quizresponse`.`quizId`='$quiz_id' and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
        $result1r = mysqli_query($con,$query1q);
        $iid = $_SESSION['user_id'];
        $q = "SELECT * FROM `quizresponse` where `quizresponse`.`quizId`='$quiz_id' and `quizresponse`.`userId`= $iid";
        $r = mysqli_query($con,$q);
        $r3 = mysqli_fetch_array($r);
        $sc = 0;
        if(isset($r3['score']))
        {
          $sc = $r3['score'];
        }
        if (!$result1r)
          {
            printf("Error: %s\n", mysqli_error($con));
            exit();
          }
          $ranking = 1;
          $ran = 1;
        while($row1r = mysqli_fetch_array($result1r))
        {
           if($row1r['score'] > $sc)
            $ran+=1;
        }
        $quer = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$iid ";  
          $resul = mysqli_query($con,$quer);
          if (!$resul)
            {
              printf("Error: %s\n", mysqli_error($con));
              exit();
            }
          $ro = mysqli_fetch_array($resul);
          if(isset($r3['score']))
          {
          ?>
                          <tr class="list__row" >

                  <td class="list__cell"><span class="list__value"><?php echo $ran;?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $_SESSION['username'];?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $r3['score'];?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $ro['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $ro['Year']; ?></span></td>
                </tr>
    <?php
    }
    else
    {?>
      <tr class="list__row" >

                  <td class="list__cell"><span class="list__value"><?php echo $ran;?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $_SESSION['username'];?></span></td>
                  <td class="list__cell"><span class="list__value">-</span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $ro['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $ro['Year']; ?></span></td>
                </tr>

    <?php }
    $ranking = 1;
    $query = "SELECT * FROM `quizresponse`,`users` where `users`.`Year`=$year and `quizresponse`.`quizId`='$quiz_id' and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result))
          {
          $user_id=$row['userId'];
          $query1 = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";  
          $result1 = mysqli_query($con,$query1);
          if (!$result1)
            {
              printf("Error: %s\n", mysqli_error($con));
              exit();
            }
          $row1 = mysqli_fetch_array($result1);
            ?>
                  <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row['score']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
                </tr>
                <?php
              
              $ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
            } // END OF WHILE LOOP 
          ?>  </table> 
          <?php
          }
          
else if(!empty($_POST['dep']) AND empty($_POST['year'])) 
          
          {
            //Getting quiz id from quiz name
        $qq="SELECT * FROM `quiz` WHERE `quizName`='$quiz_name'";
        $rr = mysqli_query($con,$qq);
        $row11 = mysqli_fetch_array($rr);
        $quiz_id=$row11['quizId'];
        
        $depart=$_POST['dep'];
        $year=$_POST['year'];     
    
        $query1q = "SELECT * FROM `quizresponse`,`users` where `users`.`Branch`='$depart'and `quizresponse`.`quizId`='$quiz_id' and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
        $result1r = mysqli_query($con,$query1q);
        $iid = $_SESSION['user_id'];
        $q = "SELECT * FROM `quizresponse` where `quizresponse`.`quizId`='$quiz_id' and `quizresponse`.`userId`= $iid";
        $r = mysqli_query($con,$q);
        $r3 = mysqli_fetch_array($r);
        $sc = 0;
        if(isset($r3['score']))
        {
          $sc = $r3['score'];
        }
        if (!$result1r)
          {
            printf("Error: %s\n", mysqli_error($con));
            exit();
          }
          $ranking = 1;
          $ran = 1;
        while($row1r = mysqli_fetch_array($result1r))
        {
           if($row1r['score'] > $sc)
            $ran+=1;
        }
        $quer = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$iid ";  
          $resul = mysqli_query($con,$quer);
          if (!$resul)
            {
              printf("Error: %s\n", mysqli_error($con));
              exit();
            }
          $ro = mysqli_fetch_array($resul);
          if(isset($r3['score']))
          {
          ?>
                          <tr class="list__row" >

                  <td class="list__cell"><span class="list__value"><?php echo $ran;?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $_SESSION['username'];?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $r3['score'];?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $ro['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $ro['Year']; ?></span></td>
                </tr>
    <?php
    }
    else
    {?>
      <tr class="list__row" >

                  <td class="list__cell"><span class="list__value"><?php echo $ran;?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $_SESSION['username'];?></span></td>
                  <td class="list__cell"><span class="list__value">-</span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $ro['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $ro['Year']; ?></span></td>
                </tr>

    <?php }
    $ranking = 1;
    $query = "SELECT * FROM `quizresponse`,`users` where `users`.`Branch`='$depart'and `quizresponse`.`quizId`='$quiz_id' and `users`.`user_id`=`quizresponse`.`userId` ORDER BY `score` DESC";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result))
          {
          $user_id=$row['userId'];
          $query1 = "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id ";  
          $result1 = mysqli_query($con,$query1);
          if (!$result1)
            {
              printf("Error: %s\n", mysqli_error($con));
              exit();
            }
          $row1 = mysqli_fetch_array($result1);
            ?>
                  <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row['score']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
                </tr>
                <?php
              
              $ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
            } // END OF WHILE LOOP 
          ?>  </table> 
          <?php
          }



      }//title if
      else {
            echo "Please select quiz name";
            }
          
        }//submit if 
          else
          {
        
      $query2 = "SELECT * FROM `quiz` WHERE 1 ";
      $result2 = mysqli_query($con,$query2);
      if (!$result2)
       {
          printf("Error: %s\n", mysqli_error($con));
          exit();
        }?>
        <table class="list__table">
        <tr class="first__row" >
                  <td class="list__cell"><span class="list__value" style="text-align: center;">Rank</span></td>
                    <td class="list__cell"><span class="list__value" style="text-align: center;">Username</span></td>

                    <td class="list__cell"><span class="list__value">Department</span></td>
                    <td class="list__cell"><span class="list__value">Year</span></td>
                    
                </tr>
        <?php
        while($row2 = mysqli_fetch_array($result2))
         {
          $quizId=$row2['quizId'];
          $query3 = "SELECT * FROM `quizresponse` where `quizresponse`.`quizId`='$quizId' ORDER by `score` DESC LIMIT 1";
          $result3 = mysqli_query($con,$query3);
          if (!$result3) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
          }
          $ranking = 1;
        while($row3 = mysqli_fetch_array($result3))
          {
            $user_id=$row3['userId'];
            $query1 =  "SELECT `user_id`, `username`, `Branch`, `Year` FROM `users` WHERE `user_id`=$user_id "; 
            $result1 = mysqli_query($con,$query1);
            if (!$result1)
              {
                  printf("Error: %s\n", mysqli_error($con));
                  exit();
                }
            $row1 = mysqli_fetch_array($result1);
                ?>
      <tr class="list__row" >
                  <td class="list__cell"><span class="list__value"><?php echo $ranking; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['username']; ?></span></td>
                    <td class="list__cell"><span class="list__value"><?php echo $row1['Branch']; ?></span></td>
                  <td class="list__cell"><span class="list__value"><?php echo $row1['Year']; ?></span></td>
                </tr>     
             
           <?php
              
              $ranking = $ranking + 1; /* INCREMENT RANKING BY 1 */
           
         } // END OF WHILE LOOP 
       ?>  
       <?php
            }
      
     
            ?></table>
          <?php 
          }
          
          
        ?>


              
                
            </div>
              
          </div>
             <div class="continput" style="position: relative; display: inline; float: left;margin-top:50px; margin-left: 3% !important;">
    <h1>DEPARTMENT</h1>
  <ul>
        <li>
      <input checked type="radio" name="1" id="all1" value="">
      <label for="all1">All</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>
      <input type="radio" name="1" id="DESH" value="DESH">
      <label for="DESH">DESH</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>
      <input  type="radio" name="1" id="Computer" value="Computer">
      <label for="Computer">Computer</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>
      <input type="radio" name="1" id="IT" value="IT">
      <label for="IT">IT</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>
      <input type="radio" name="1" id="entc" value="E&TC">
      <label for="E&TC">E&amp;TC</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="Electronics" value="Electronics">
      <label for="Electronics">Electronics</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="Instrumentation" value="Instrumentation">
      <label for="Instrumentation">Instrumentation</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="Mechanical" value="Mechanical">
      <label for="mech">Mechanical</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="Chemical" value="Chemical">
      <label for="chem">Chemical</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input type="radio" name="1" id="indus" value="Indus & Production">
      <label for="Indus & Production">Indus & Production</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        
  </ul>
    <br>
    <hr>
    <h1>YEAR</h1>
    <ul>
        <li>
      <input checked type="radio" name="2" id="all2" value="">
      <label for="all2">All</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
    <li>
      <input type="radio" name="2" id="fy"  value="1">
      <label for="fy">First Year</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input  type="radio" name="2" id="sy" value="2">
      <label for="sy">Second Year</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input  type="radio" name="2" id="ty" value="3">
      <label for="ty">Third Year</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
        <li>
      <input  type="radio" name="2" id="final" value="4">
      <label for="final">Fourth Year</label>
      <div class="bullet">
        <div class="line zero"></div>
        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
        <div class="line four"></div>
        <div class="line five"></div>
        <div class="line six"></div>
        <div class="line seven"></div>
      </div>
    </li>
   </ul>
</div>
                </div>
                </div>
            </div>
        </div>
        


        <script>
            var temp_1 = document.getElementsByName("1");
            var name_of_dep = document.getElementById("dep_id").value;

            for(var y=0;y<temp_1.length;y++){
                if(temp_1[y].id==name_of_dep){
                    temp_1[y].checked=true;
                }
            }  
            
            var temp_2 = document.getElementsByName("2");
            var name_of_branch = document.getElementById("year_id").value;
            for(var p=0;p<temp_2.length;p++){
                if(temp_2[p].id==name_of_branch){
                    temp_2[p].checked=true;
                }
            }

        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
              if(!event.target.matches('#myInput')){
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            
          }
        }

        function changeFunction(){
            alert($("this").html());


        }
          var kk;
            $('a').click(function(){
                var quiz_title = $(this).get(0).innerHTML;
                kk = $(this).get(0).name;
               
                document.getElementById("butnn").innerHTML=quiz_title;
                document.sampleForm.quizName.value=quiz_title;
                document.sampleForm.kk1.value=kk;
                $('#submit_dep').click();

            });
           
            $('input[type=radio]').on('change', function() {
              var dep = "";
              var year = "";
              var dep_id = "";
              var year_id = "";
                 dep = $('input[name=1]:checked').val();
                 year = $('input[name=2]:checked').val();
                 dep_id = $('input[name=1]:checked').attr('id');
                 year_id = $('input[name=2]:checked').attr('id');
                document.sampleForm.dep.value=dep;
                document.sampleForm.year.value=year;
                document.sampleForm.dep_id.value=dep_id;
                document.sampleForm.year_id.value=year_id;
                var kkk = $('input[name=kk1]').val();

                $('a[name='+ kkk + ']').click();

                 



            });
            <?php
          }
          else
          {
            echo "Please login";
          }
            ?>
          
            
    </script>
        
    </body>
</html>