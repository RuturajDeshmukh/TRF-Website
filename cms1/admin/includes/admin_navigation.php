       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

              <!--   <li><a href="">Users Online: <?php //echo users_online(); ?></a></li> -->

                <li><a href="">Users Online: <span class="usersonline"></span></a></li>

               <li><a href="../index.php">HOME SITE</a></li>




                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>

<?php

if(isset($_SESSION['username'])) {


    echo $_SESSION['username'];


}




?>



                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>



                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../user page/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>



            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php"> View All Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add Posts</a>
                            </li>
                        </ul>
                    </li>
					 <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#quiz_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Quizes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="quiz_dropdown" class="collapse">
                            <li>
                                <a href="./searchQuiz.php"> View All Quizes</a>
                            </li>
                            <li>
                                <a href="./quiz_add.php">Add Quizes</a>
                            </li>
                            <li>
                                <a href="../leaderboard3.php">Leaderboard</a>
                            </li>
                            <li>
                                <a href="../quiz_mainpage1.php">Give Quiz</a>
                            </li>
                        </ul>

                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#projectTable_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Project <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="projectTable_dropdown" class="collapse">
                            <li>
                                <a href="./searchProject.php"> View All Project</a>
                            </li>
                            <li>
                                <a href="./addProject.php">Add New Project</a>
                            </li>
                        </ul>
                    </li>
<<<<<<< HEAD
					
=======
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#task_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Tasks<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="task_dropdown" class="collapse">
                            <li>
                                <a href="./searchProject.php"> View All Tasks</a>
                            </li>
                            <li>
                                <a href="./addtask.php">Add New Task</a>
                            </li>
                        </ul>
                    </li>
>>>>>>> ce04b03ac29e68137af835097b970b934e63be91
                    
                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>

                    <li class="">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add User</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>



                </ul>
            </div>



            <!-- /.navbar-collapse -->
        </nav>
