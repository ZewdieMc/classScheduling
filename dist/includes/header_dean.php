<?php
include('../dist/includes/dbcon.php');
$status = "";
?>

<!-- bootstrap navbar -->
<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header" style="padding-left:20px">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">
                  <!--   <li class=""> -->
                        <!-- Menu toggle button -->
                        <!-- <a href="faculty_code.php" class="dropdown-toggle" >
                            <i class="glyphicon glyphicon-bed"></i> Home
                        </a>
                        </li> -->

                     <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="faculty_code.php" class="dropdown-toggle">
                                <i class="glyphicon glyphicon-home text-yellow"></i> Home

                        </a>
                    </li>


                    <li class="">
                        <!-- Menu toggle button -->
                        <a href="department.php" class="dropdown-toggle" >
                            <i class="glyphicon glyphicon-king text-yellow"></i>Departments

                        </a>

                    </li>
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="dept_heads.php" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-pencil text-yellow"></i> Dept. Heads

                        </a>
                    </li>

                   
                     <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="dean_sched.php" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-calendar text-yellow"></i> View Schedule

                        </a>
                    </li>


                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"style="color:#fff;">
                            <i class="glyphicon glyphicon-briefcase text-yellow"></i> Manage 
                             <span class="caret text-yellow"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="settings.php">
                                            <i class="glyphicon glyphicon-cog text-blue"></i> Settings
                                        </a>
                                    </li><!-- end notification -->

                                   

                                    <li><!-- start notification -->
                                        <a href="room.php">
                                            <i class="glyphicon glyphicon-home text-blue"></i> Class Room
                                        </a>
                                    </li><!-- end notification -->

                                    <li><!-- start notification -->
                                        <a href="blocks.php">
                                            <i class="glyphicon glyphicon-th-large text-blue"></i> Blocks
                                        </a>
                                    </li><!-- end notification -->

                                    <li><!-- start notification -->
                                        <a href="sy.php">
                                            <i class="glyphicon glyphicon-eye-open text-blue"></i> Academic Year
                                        </a>
                                    </li><!-- end notification -->
                                    <li><!-- start notification -->
                                        <a href="program.php">
                                            <i class="glyphicon glyphicon-cutlery text-blue"></i>Program
                                        </a>
                                    </li><!-- end notification -->
                                </ul>
                            </li>

                        </ul>
                    </li>


                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="faculty_profile.php" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-user text-yellow"></i>
                            <?php echo $_SESSION['name'] . " (" . $_SESSION['dept_code'] . " | ".$_SESSION['type'].")"; ?>
                        </a>
                    </li>
                    
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="logout.php" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-off text-yellow"></i> Logout

                        </a>
                    </li>

                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<!-- bootstrap navbar -->
<style type="text/css">
    ul li{
        padding-right: 30px;
    }
    ul li:hover{
        border-radius: 3px;
    }
    ul li ul li{
        background-color: lightblue;
    }



</style>