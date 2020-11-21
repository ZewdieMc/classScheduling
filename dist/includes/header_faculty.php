
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
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="faculty_home.php" style="color:#fff;" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-calendar"></i>
                            My Schedule
                        </a>
                    </li>
                    <!--                    <li class="">
                                             Menu toggle button
                                            <a href="#search_class" data-toggle="modal" class="dropdown-toggle" >
                                                <i class="glyphicon glyphicon-wrench"></i> Section Schedule

                                            </a>

                                        </li>-->

                    <!-- Tasks Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-arrow-down"></i> Year & Section

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <?php
                                    include('../dist/includes/dbcon.php');
                                    $fetched = mysqli_query($con, "select * from section join cys on cys.cys_id=section.cys_id where cys.dept_id ='$_SESSION[dept_id]'") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($fetched)) {
                                        ?>
                                        <li>
                                            <a href="faculty_section_sched.php?id=<?php echo "Yr".$row['cys']." Sec ".$row['section'] ?>" target="_blank">
                                                <i class="glyphicon glyphicon-education text-green" ></i><?php echo "Yr".$row['cys']." Sec ".$row['section'] ?>
                                            </a>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </li>

                        </ul>
                    </li>


                    <!-- Tasks Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-bed"></i> Room Schedule

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <?php
                                    include('../dist/includes/dbcon.php');
                                    $fetched = mysqli_query($con, " select * from room join block on room.block_id=block.block_id where block.dept_id ='$_SESSION[dept_id]'") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($fetched)) {
                                        ?>
                                        <li>
                                            <a href="faculty_room_sched.php?id=<?php echo $row['room'] ?>" target="_blank">
                                                <i class="glyphicon glyphicon-education text-green" ></i><?php echo $row['room']; ?>
                                            </a>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="feedback_faculty.php" style="color:#fff;" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-comment"></i>
                            Feedback
                        </a>
                    </li>

                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="profile.php" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-user"></i>
                            <?php echo $_SESSION['name'] . " (" . $_SESSION['dept_code'] . " | ".$_SESSION['type'].")"; ?>
                        </a>
                    </li>
                    <li class="">
                        <!-- Menu Toggle Button -->
                        <a href="logout.php" class="dropdown-toggle">
                            <i class="glyphicon glyphicon-off "></i> Logout

                        </a>
                    </li>

                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header> <style type="text/css">
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