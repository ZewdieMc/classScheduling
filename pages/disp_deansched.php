  <?php
session_start();
if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
error_reporting(0);
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
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../dist/css/AdminLTE.css">
        <link rel="stylesheet" href="../plugins/select2/select2.min.css">
        <link rel="stylesheet" href="../dist/toastr/build/toastr.min.css">

        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <!--<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">-->
        <script src="../dist/js/jquery.min.js"></script>
        <script src="../dist/toastr/build/toastr.min.js"></script>

    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-yellow layout-top-nav" onload="myFunction()">
        <div class="header">
            <img src="../dist/img/header.png" alt="site logo goes here." style="height: 150px;width: 100%;">
        </div>
        <div class="wrapper">
            <?php include('../dist/includes/header.php'); ?>
            <!-- Full Width Column -->
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="box box-info" style="margin-top: 5px">
                        <!--     <div style="text-align: center">
                                        <h4>Print Schedule <i class="glyphicon glyphicon-hand-right"></i>&nbsp;&nbsp;&nbsp;
                                            <a href="#searcht" data-target="#searcht" data-toggle="modal" class="dropdown-toggle btn btn-facebook btn-lg">

                                                Teacher
                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                     
                                            <a href="#searchclass" data-target="#searchclass" data-toggle="modal" class="dropdown-toggle btn btn-google btn-lg">

                                                Students
                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;

                                            <a href="#searchroom" data-target="#searchroom" data-toggle="modal" class="dropdown-toggle btn btn-github btn-lg">

                                                Room
                                            </a>
                                        </h4>
                                    </div> -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-warning" style="margin-top: 5px">
                            <div class="box box-body">
                                <div id="#">
                               <div class="row">
                                 <div class="col-md-12">
                                     <form method="post" action="dean_sched.php">
                                    <div class="form-group">
                                          <label>Department</label>
                                        <select class="form-control select2" name="department" required>
                                        <option></option>
                                        <?php
                                        $query2 = mysqli_query($con, "select * from dept")or die(mysqli_error($con));
                                        while ($row = mysqli_fetch_array($query2)) {
                                            ?>
                                            <option value="<?php echo $row[dept_id]?>"><?php echo $row['dept_name']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                     
                                    </div>

                                            <div class="form-group">
                                        <button class="btn btn-lg btn-success "  name="show" type="submit">
                                            Show More
                                        </button>         


                                            </div>
                                     </form>
                           
                            </div>
                                        
                           </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php include('../dist/includes/footer.php'); ?>
        </div><!-- ./wrapper -->
        <div id="searcht" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content" style="height:auto">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Search Teacher Schedule</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="faculty_sched.php" target="_blank">

                            <div class="form-group">
                                <label class="control-label col-lg-2" for="name">Teacher</label>
                                <div class="col-lg-10">
                                    <select class="select2" name="faculty" style="width:90%!important" required>
                                        <?php
                                          $dept_id = $_SESSION['dept_id'];
                                        $q0 = mysqli_query($con,"select * from member where  dept_id = '$dept_id'");
                                        $member_id = "";
                                        while ($row = mysqli_fetch_array($q0)) {
                                            $member_id = $row['member_id'];
                                            echo "<option value ='$member_id'>". $row['member_first'] . " " . $row['member_last']."</option>";
                                        }
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

        <div id="searchclass" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content" style="height:auto">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span></button>
                        <h4 class="modal-title">Search Class Schedule</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="class_sched.php" target="_blank">

                            <div class="form-group">
                                <label class="control-label col-lg-2" for="name">Class</label>
                                <div class="col-lg-10">
                                    <select class="select2" name="class" style="width:90%!important" required>
                                        <?php 
                                         $q1 = mysqli_query($con,"select * from cys where dept_id = '$_SESSION[dept_id]'") ;
                                        while ($row = mysqli_fetch_array($q1)) {
                                            echo "<option >".$row['cys']."</option>";
                                        }
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

        <div id="searchroom" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content" style="height:auto">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Search Room Schedule</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="room_sched.php" target="_blank">

                            <div class="form-group">
                                <label class="control-label col-lg-2" for="name">Room</label>
                                <div class="col-lg-10">
                                    <select class="select2" name="room" style="width:90%!important" required>
                                        <?php 
                                        $q2 = mysqli_query($con, "select * from room join block on room.block_id=block.block_id where block.dept_id ='$_SESSION[dept_id]' ");
                                         while ($row = mysqli_fetch_array($q2)) {
                                             echo "<option vlaue='$row[room_id]'>".$row['room']."</option>";
                                         }
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
        <style type="text/css">
            .modal-header{
                background-color:blueviolet;
                color: white;
            }
        </style>
        <script type="text/javascript">

            $(document).on('submit', '#reg-form', function ()
            {
                $.post('submit.php', $(this).serialize(), function (data)
                {
                    $(".result").html(data);
                    $("#form1")[0].reset();
                    // $("#check").reset();

                });

                return false;


            })
        </script>
        <script>
            $(".uncheck").click(function () {
                $('input:checkbox').removeAttr('checked');
            });
        </script>

        <script type="text/javascript" src="autosum.js"></script>
        <!-- jQuery 2.1.4 -->
        <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="../dist/js/jquery.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="../bootstrap/js/bootstrap.min.js"></script>
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
