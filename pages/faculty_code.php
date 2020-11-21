<?php
session_start();
if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('../dist/includes/title.php'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <script src="../dist/js/jquery.min.js"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-yellow layout-top-nav" onload="myFunction()">
<div class="header">
    <img src="../dist/img/header.png" alt="site logo goes here." style="height: 150px;width: 100%;">
</div>
<div class="wrapper">
    <?php include('../dist/includes/header_dean.php'); ?>
    <!-- Full Width Column -->
    <!-- panel example -->
    <div class="container" style="margin-top: 50px;">
        <div class="row">


  <div class="col-sm-3">
   <div class = "panel panel-primary">
    <div class = "panel-heading">
      <h3 class = "panel-title">
         Schedule
      </h3>
    </div>
   
    <div class = "panel-body">
      <p class="panel-text">Registering department heads for the departments in this faculty also belongs to one of your tasks.</p>
        <a href="dean_sched.php" class="btn btn-lg btn-primary">View Schedule</a>
   </div>
 </div>
  </div>

  <div class="col-sm-3">
   <div class = "panel panel-success">
    <div class = "panel-heading">
      <h3 class = "panel-title">
         Department Heads
      </h3>
    </div>
   
    <div class = "panel-body">
      <p class="panel-text">Registering department heads for the departments in this faculty also belongs to one of your tasks.</p>
        <a href="dept_heads.php" class="btn btn-lg btn-success"> Department Heads</a>
   </div>
 </div>
  </div>



<div class="col-sm-3">
   <div class = "panel panel-danger">
    <div class = "panel-heading">
      <h3 class = "panel-title">
         Departments
      </h3>
    </div>
   
    <div class = "panel-body">
      <font style="font-family: 'Montserrat', sans-serif;"></font><p class="panel-text">Managing departments under this faculty can be performed by clicking the following button.</p></font>
        <a href="room.php" class="btn btn-lg btn-github"> Manage Departments</a>
   </div>
 </div>
  </div>

<div class="col-sm-3">
   <div class = "panel panel-info">
    <div class = "panel-heading">
      <h3 class = "panel-title">
         Blocks and Rooms
      </h3>
    </div>
   
    <div class = "panel-body">
      <p class="panel-text">Registering and assigning blocks to different departments for academic puroses is done here.</p>
        <a href="room.php" class="btn btn-lg btn-info"> Blocks and Rooms</a>
   </div>
 </div>
  </div>

</div>
    </div>
<!-- end of panel -->
            <?php include('../dist/includes/footer.php'); ?>

  </div><!-- ./wrapper -->


<div id="search_class" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="height:auto">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span></button>
                <h4 class="modal-title">Search Section Schedule</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="section_home.php">
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="name">Class</label>
                        <div class="col-lg-10">
                            <select class="select2" name="class" style="width:90%!important" required>
                                <?php
                                $query2 = mysqli_query($con, "select * from cys order by cys")or die(mysqli_error($con));
                                while ($row = mysqli_fetch_array($query2)) {
                                    ?>
                                    <option value="<?php echo $row['cys'] ?>"><?php echo $row['cys']; ?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>


            </div><hr>
            <div class="modal-footer">
                <button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div><!--end of modal-dialog-->
</div>
<!--end of modal-->



<script type="text/javascript" src="autosum.js"></script>
<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../dist/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.5 -->

<script src="../bootstrap2/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../bootstrap2/js/bootstrap.min.js"></script> -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>
</body>
</html>
