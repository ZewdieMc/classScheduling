

<header class="main-header">
    <nav class="navbar navbar-default navbar-static-top " role="navigation" style="margin-bottom: 0">
        <div class="container">
            <div class="navbar-header" >

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".nav-collapse">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu nav-collapse">
                <ul class="nav navbar-nav">
                    <!-- Tasks Menu -->
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="home.php" class="" style="font-size:14px;color: white"><i class="glyphicon glyphicon-tasks text-yellow"></i> Schedule</a>
                    </li>
                    <!-- Tasks Menu -->
                    <!-- Tasks Menu -->
 
                    <!-- Tasks Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"style="color:#fff;">
                            <i class="glyphicon glyphicon-briefcase text-yellow"></i> Entry 
                            <span class="caret text-yellow"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="class.php">
                                            <i class="glyphicon glyphicon-user text-green"></i> Study Year
                                        </a>
                                    </li><!-- end notification -->
                                    
                                    <li><!-- start notification -->
                                            <a href="section.php">
                                                <i class="glyphicon glyphicon-user text-green"></i> Study Section
                                            </a>
                                    </li><!-- end notification -->

                                   

                                    <li><!-- start notification -->
                                        <a href="subject.php">
                                            <i class="glyphicon glyphicon-book text-green"></i> Course
                                        </a>
                                    </li><!-- end notification -->

                                    <li><!-- start notification -->
                                        <a href="teacher.php">
                                            <i class="glyphicon glyphicon-hand-down text-green"></i> Teacher & Student
                                        </a>
                                    </li><!-- end notification -->

                                    <li><!-- start notification -->
                                        <a href="signatories.php">
                                            <i class="glyphicon glyphicon-eye-open text-green"></i> Signatories
                                        </a>
                                    </li><!-- end notification -->
                                </ul>
                            </li>

                        </ul>
                    </li>
                 <!--  -->
                    <!-- Tasks Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"style="color:#fff;" >
                            <i class="glyphicon glyphicon-wrench text-yellow"></i> Maintenance
                            <span class="caret text-yellow"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">

                                    <li><!-- start notification -->
                                        <a href="designation.php">
                                            <i class="glyphicon glyphicon-cutlery text-green"></i> Designation
                                        </a>
                                    </li><!-- end notification -->
                                  

                                    <li><!-- start notification -->
                                        <a href="rank.php">
                                            <i class="glyphicon glyphicon-send text-green"></i> Rank
                                        </a>
                                    </li><!-- end notification -->

                                    <li><!-- start notification -->
                                        <a href="salut.php">
                                            <i class="glyphicon glyphicon-user text-green"></i> Salutation
                                        </a>
                                    </li><!-- end notification -->

                                    

                                    <li><!-- start notification -->
                                        <a href="time.php">
                                            <i class="glyphicon glyphicon-calendar text-green"></i> Time
                                        </a>
                                    </li><!-- end notification -->

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                   
                    <!-- Tasks Menu -->
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="profile.php" class="dropdown-toggle" style="color:#fff;">
                            <i class="glyphicon glyphicon-user text-yellow"></i>
                            <?php echo $_SESSION['name'] . " (" . $_SESSION['dept_code'] . " | ".$_SESSION['type'].")"; ?>
                        </a>
                    </li>
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="logout.php" class="dropdown-toggle"style="color:#fff;">
                            <i class="glyphicon glyphicon-off text-yellow"></i> Logout

                        </a>
                    </li>

                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
    <style type="text/css">
        ul li{
            padding-right: 30px;
        }
        ul li:hover{
            border-radius: 3px;
        }



    </style>


</header>
