<?php

session_start();
if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
$status = $_SESSION['type'];
$page   = "";
if ($status == 'head') {
    $page = "home.php";
} elseif ($status == 'faculty') {
    $page = "faculty_code.php";
} elseif ($status == 'teacher') {
    $page = "faculty_home.php";
} elseif ($status == 'stu') {
    $page = "student_home.php";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Profile | <?php include '../dist/includes/title.php';?></title>
        <!-- Tell the browser to be responsive to screen width -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta http-equiv="x-ua-compatible" content="ie=edge">        <!-- Bootstrap 3.3.5 -->
          <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <script src="../dist/js/jquery.min.js"></script>
            <!-- Google Font: Source Sans Pro -->
          <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
                  <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <!-- <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css"> -->
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="header">
            <img src="../dist/img/header.png" alt="site logo goes here." style="height: 150px;width: 100%;">
        </div>
        <div class="wrapper">
            <?php
include '../dist/includes/header.php';
include '../dist/includes/dbcon.php';
?>
            <!-- Full Width Column -->
            <div class="content-wrapper">
                <div class="container">
                    <!-- Content Header (Page header) -->


                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                          <div class="container-fluid">
                            <div class="row mb-2">
                              <div class="col-sm-6">
                                <h1>Profile</h1>
                              </div>
                              <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                                  <li class="breadcrumb-item active">Profile</li>
                                </ol>
                              </div>
                            </div>
                          </div><!-- /.container-fluid -->
                        </section>

                    <section class="content-header">

                    </section>
                    <?php
$id    = $_SESSION['id'];
$query = mysqli_query($con, "select * from member where member_id='$id'") or die(mysqli_error());
$row   = mysqli_fetch_array($query);
?>
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-4"><style type="text/css">
                                    .col-md-4 {
                                        margin-left: 400px;

                                    }
                                </style>
                                <div class="box box-warning">
                                    <div class="box-header">
                                        <h3 class="box-title">Update Account Details</h3>
                                    </div>
                                    <div class="box-body">
                                        <!-- Date range -->
                                        <form method="post" action="profile_update.php">

                                            <div class="form-group">
                                                <label for="date">Full Name</label>
                                                <div class="input-group col-md-12">
                                                    <input type="text" class="form-control pull-right" value="<?php echo $row['member_first'] . " " . $row['member_last']; ?>" name="name" placeholder="Full Name" required readonly>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                            <div class="form-group">
                                                <label for="date">Username</label>
                                                <div class="input-group col-md-12">
                                                    <input type="text" class="form-control pull-right" value="<?php echo $row['username']; ?>" name="username" placeholder="Username" required>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                            <div class="form-group">
                                                <label for="date">Change Password</label>
                                                <div class="input-group col-md-12">
                                                    <input type="password" class="form-control pull-right" id="date" name="password" placeholder="Type new password">
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->

                                            <div class="form-group">
                                                <label for="date">Confirm New Password</label>
                                                <div class="input-group col-md-12">
                                                    <input type="password" class="form-control pull-right" id="date" name="new" placeholder="Type new password">
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                            <hr>
                                            <div class="form-group">
                                                <label for="date">Enter Old Password to confirm changes</label>
                                                <div class="input-group col-md-12">
                                                    <input type="password" class="form-control pull-right" id="date" name="passwordold" placeholder="Type old password" required>
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->

                                            <div class="form-group" style="margin-bottom: 70px;">
                                                <div class="input-group">
                                                    <button class="btn btn-success" id="daterange-btn" name="">
                                                        Save
                                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-danger " id="daterange-btn">
                                                        Clear
                                                    </button>
                                                </div>
                                            </div><!-- /.form group -->
                                        </form>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col (right) -->



                        </div><!-- /.row -->


                    </section><!-- /.content -->
                </div><!-- /.container -->
            </div><!-- /.content-wrapper -->
            <?php include '../dist/includes/footer.php';?>

<!-- section schedule modal -->
      <div class="modal fade" id="searchclass">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-teal">
              <h4 class="modal-title">Section Schedule</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="class_sched.php" target="_blank">
                 <select class="form-control select2" name="class" style="width:90%!important" required>
                   <?php
$dept_id = $_SESSION['dept_id'];
$query2  = mysqli_query($con, "select * from section join cys on cys.cys_id=section.cys_id where cys.dept_id ='$dept_id'") or die(mysqli_error($con));
while ($row2 = mysqli_fetch_array($query2)) {
    ?>
                                            <option><?php echo "Yr" . $row2['cys'] . " Sec " . $row2['section'] ?></option>
                                        <?php }
?>
                </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" name="search"class="btn btn-success">Display Schedule</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- room schedule modal -->
      <div class="modal fade" id="searchr">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-teal">
              <h4 class="modal-title">Room Schedule</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="room_sched.php" target="_blank">
                 <select class="form-control select2" name="room" style="width:90%!important" required>
                        <?php
$q2 = mysqli_query($con, "select * from room join block on room.block_id=block.block_id where block.dept_id ='$_SESSION[dept_id]' ");
while ($row = mysqli_fetch_array($q2)) {
    echo "<option vlaue='$row[room_id]'>" . $row['room'] . "</option>";
}
?>
                </select>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" name="search"class="btn btn-success">Display Schedule</button>
            </div>
        </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        </div><!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
    </body>
</html>
