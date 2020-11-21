<?php  include('../dist/includes/dbcon.php');
$result = mysqli_query($con, "select * from subject where dept_id='$_SESSION[dept_id]'");
$row = mysqli_num_rows($result);
$query = mysqli_query($con, "select * from section join cys on cys.cys_id=section.cys_id where cys.dept_id ='$_SESSION[dept_id]'")or die(mysqli_error());
$row1 = mysqli_num_rows($query);

$result2 = mysqli_query($con, "select * from member where status ='teacher' and dept_id='$_SESSION[dept_id]'");
$row2 = mysqli_num_rows($result2);
?>
<header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="home.php" class="navbar-brand"><b>Schedul</b>ing</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="home.php"><i class="fa fa-user"></i> Schedule <span class="sr-only">(current)</span></a></li>
              <!-- <li><a href="#">Link</a></li> -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-edit"></i> Entry <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="class.php">Study year</a></li>
                  <li class="divider"></li>
                  <li><a href="section.php">Study Section</a></li>
                  <li class="divider"></li>
                  <li><a href="subject.php">Course</a></li>
                  <li class="divider"></li>
                  <li><a href="teacher.php">Teacher & Student</a></li>
                  <li class="divider"></li>
                  <li><a href="signatories.php">Signatories</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Maintenance <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="designation.php">Designation</a></li>
                  <li class="divider"></li>
                  <li><a href="rank.php">Rank</a></li>
                  <li class="divider"></li>
                  <li><a href="salut.php">Salutation</a></li>
                  <li class="divider"></li>
                  <li><a href="time.php">Time</a></li>
                  </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
              </div>
            </form>
            <ul class="nav navbar-nav navbar-right ">
              
                <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../dist/img/adane.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['name'] . " (" . $_SESSION['dept_code'] . " | ".$_SESSION['type'].")"; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="background-color: #5F9EA0  ; color: yellow;">
                    <img src="../dist/img/adane.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['name']; ?>
                      <small>your role is <?=$_SESSION['type']?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body" >
                    <div class="col-xs-4 text-center">
                      <a href="subject.php"><span class="label label-success"><?php echo $row;?></span> Courses</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="section.php"><span class="label label-warning"><?php echo $row1;?></span> Sections</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"><i class="fa fa-envelope-o"></i><span class="label label-danger"><?php echo $row2;?></span> Teachers </a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer" >
                    <div class="pull-left">
                      <a href="admin_profile.php" class="btn btn-github">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-success">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
