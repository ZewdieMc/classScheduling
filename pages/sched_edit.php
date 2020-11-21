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
          <!-- Font Awesome -->
          <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
          <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../dist/css/AdminLTE.css">
        <link rel="stylesheet" href="../plugins/select2/select2.min.css">
        <link rel="stylesheet" href="../dist/toastr/build/toastr.min.css">

        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
        <script src="../dist/js/jquery.min.js"></script>
        <script src="../dist/toastr/build/toastr.min.js"></script>
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue layout-top-nav" onload="myFunction()">
        <div class="header">
            <img src="../dist/img/header.png" alt="site logo goes here." style="height: 150px;width: 100%;">
        </div>
        <div class="wrapper">
            <?php include('../dist/includes/header.php'); ?>
            <!-- Full Width Column -->
            <div class="content-wrapper">
                <div class="container">
                    <!-- Content Header (Page header) -->


                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="box box-warning">
                                    <div style="text-align: center">
                                        <h4>Print Schedule <i class="glyphicon glyphicon-hand-right"></i>
                                            <a href="#searcht" data-target="#searcht" data-toggle="modal" class="dropdown-toggle btn btn-facebook btn-lg">

                                                Teacher
                                            </a>
                                            <a href="#searchclass" data-target="#searchclass" data-toggle="modal" class="dropdown-toggle btn btn-google btn-lg">

                                                Students
                                            </a>

                                            <a href="#searchroom" data-target="#searchroom" data-toggle="modal" class="dropdown-toggle btn btn-github btn-lg">

                                                Room
                                            </a>
                                        </h4>
                                    </div>
                                    <form method="post" id="reg-form">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped" style="margin-right:-10px">
                                                        <thead>
                                                            <tr class="bg-blue">
                                                                <th>Time</th>
                                                                <th>Monday</th>
                                                                <th>Tuesday</th>
                                                                <th>Wednesday</th>
                                                                <th>Thursday</th>
                                                                <th>Friday</th>
                                                                <th>Saturday</th>
                                                                <th>Sunday</th>

                                                            </tr>
                                                        </thead>

                                                        <?php
                                                        include('../dist/includes/dbcon.php');
                                                        $sched_id = $_REQUEST['id'];
                                                        $query1 = mysqli_query($con, "select * from schedule where sched_id='$sched_id'")or die(mysqli_error());
                                                        $row1 = mysqli_fetch_array($query1);
                                                        $time_id = $row1['time_id'];
                                                        $day = $row1['day'];
                                                        //$day=$row1['day'];

                                                        $query = mysqli_query($con, "select * from time where days='mwf' order by time_start")or die(mysqli_error());
                                                        $row_number = 0;
                                                        while ($row = mysqli_fetch_array($query)) {
                                                            $row_number++;
                                                            $id = $row['time_id'];
                                                            $start = date("h:i a", strtotime($row['time_start']));
                                                            $end = date("h:i a", strtotime($row['time_end']));
                                                            ?>
                                                            <tr >
                                                                <td><?php echo $start . "-" . $end; ?></td>
                                                                <td><input type="checkbox"<?php if($row_number==4){?> disabled="disabled"<?php }?> name="m[]" value="<?php echo $id; ?>" style="width: 30px; height: 30px;margin-left: 25px;"
                                                                           <?php if (($id == $time_id) and ( $day == 'm')) echo "checked"; ?>>
                                                                </td>
                                                                <td><input type="checkbox" <?php if($row_number==4){?> disabled="disabled"<?php }?> name="t[]" value="<?php echo $id; ?>" style="width: 30px; height: 30px;margin-left: 25px;"
                                                                           <?php if (($id == $time_id) and ( $day == 't')) echo "checked"; ?>></td>
                                                                <td><input type="checkbox" <?php if($row_number==4){?> disabled="disabled"<?php }?> name="w[]" value="<?php echo $id; ?>" style="width: 30px; height: 30px;margin-left: 25px;"
                                                                           <?php if (($id == $time_id) and ( $day == 'w')) echo "checked"; ?>></td>
                                                                <td><input type="checkbox"<?php if($row_number==4){?> disabled="disabled"<?php }?> name="th[]" value="<?php echo $id; ?>" style="width: 30px; height: 30px;margin-left: 25px;"
                                                                           <?php if (($id == $time_id) and ( $day == 'th')) echo "checked"; ?>></td>
                                                                <td><input type="checkbox"<?php if($row_number==4){?> disabled="disabled"<?php }?> name="f[]" value="<?php echo $id; ?>" style="width: 30px; height: 30px;margin-left: 25px;"
                                                                           <?php if (($id == $time_id) and ( $day == 'f')) echo "checked"; ?>></td>
                                                                <td><input type="checkbox"<?php if($row_number==4){?> disabled="disabled"<?php }?> name="sa[]" value="<?php echo $id; ?>" style="width: 30px; height: 30px;margin-left: 25px;"
                                                                           <?php if (($id == $time_id) and ( $day == 'sa')) echo "checked"; ?>></td>
                                                                <td><input type="checkbox"<?php if($row_number==4){?> disabled="disabled"<?php }?> name="su[]" value="<?php echo $id; ?>" style="width: 30px; height: 30px;margin-left: 25px;"
                                                                           <?php if (($id == $time_id) and ( $day == 'su')) echo "checked"; ?>></td>

                                                            </tr>

                                                        <?php } ?>
                                                    </table>
                                                    <div class="result" id="form">
                                                    </div>
                                                </div><!--col end -->

                                            </div><!--row end-->


                                        </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col (right) -->

                            <div class="col-md-3">
                                <div class="box box-warning">
                                    <?php
                                    $query = mysqli_query($con, "select * from schedule natural join member where sched_id='$sched_id'")or die(mysqli_error());
                                    $row = mysqli_fetch_array($query);
                                    ?>
                                    <div class="box-body">
                                        <!-- Date range -->
                                        <div id="form">
                                            <input type="hidden" name="id" value="<?php echo $sched_id; ?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                        <label for="date"> Yr & Section</label>
                                                           <select class="form-control select2" name="cys" onchange="getCourses(this.value)"required>
                                                            <option><?php echo $row1['cys']?></option>
                                                            <?php
                                                            $dept_id = $_SESSION['dept_id'];
                                                            $query2 = mysqli_query($con, "select * from section join cys on cys.cys_id=section.cys_id where cys.dept_id ='$dept_id'")or die(mysqli_error($con));
                                                            while ($row2 = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option><?php echo "Yr".$row2['cys']." Sec ".$row2['section'] ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div><!-- /.form group -->
                                                    <div class="form-group">
                                                        <label for="date">Teacher</label>

                                                        <select class="form-control select2" name="teacher" required>
                                                            <option value="<?php echo $row['member_id']; ?>"><?php echo $row['member_first'] . " " . $row['member_last']; ?></option>
                                                              <?php
                                                            $query2 = mysqli_query($con, "select * from member where (status ='head' or status='teacher') and dept_id = '$_SESSION[dept_id]' order by member_last")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option value="<?php echo $row['member_id']; ?>"><?php echo $row['member_first'] . " " . $row['member_last']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>

                                                    </div><!-- /.form group -->
                                                    <div class="form-group">
                                                        <label for="date">Course</label>

                                                        <select id="courses" class="form-control select2" name="subject" required>
                                                            <option><?php echo $row1['subject_code']; ?></option>
                                                           <?php
                                                            $dept  = $_SESSION['dept_id'];
                                                            $query2 = mysqli_query($con, "select * from subject where dept_id = '$dept'")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option><?php echo $row['subject_title']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>

                                                    </div><!-- /.form group -->
                                                
                                                    <div class="form-group">
                                                        <label for="date">Room</label>
                                                        <select class="form-control select2" name="room" required>
                                                            <option><?php echo $row1['room']?></option>
                                                            <?php
                                                            $query2 = mysqli_query($con, "select * from room join block on room.block_id=block.block_id where block.dept_id ='$_SESSION[dept_id]' order by room.room")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option><?php echo $row['room']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </div><!-- /.form group -->
                                                    <div class="form-group">
                                                        <label for="date">Remarks</label><br>
                                                        <!--<textarea name="remarks" cols="30" placeholder="enclose remarks with parenthesis()"><?php echo $row['remarks']; ?></textarea>-->
                                                        <select class="form-control select2" name="remarks">
                                                            <option><?php echo $row1['remarks']?></option>
                                                            <option>Tut.</option>
	                                                        <option>Lab G-1</option>
	                                                        <option>Lab G-2</option>
	                                                        <option>Lab G-3</option>
	                                                        <option>Lab G-4</option>
	                                                        <option>Lec.</option>
                                                        </select>
                                                    </div><!-- /.form group -->
                                                </div>



                                            </div>


                                            <div class="form-group">

                                                <button class="btn btn-lg btn-block btn-facebook" id="daterange-btn" name="save" type="submit">
                                                    update
                                                </button>
                                                <button class="btn btn-lg btn-google btn-block" id="daterange-btn" type="reset">
                                                    Cancel
                                                </button>
                                        <button class="uncheck btn btn-lg btn-block btn-github">Uncheck All</button>
                                            </div>
                                        </div><!-- /.form group --><hr>

                                        </form>	
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col (right) -->


                        </div><!-- /.row -->


                    </section><!-- /.content -->
                </div><!-- /.container -->
            </div><!-- /.content-wrapper -->
            <?php include('../dist/includes/footer.php'); ?>
        </div><!-- ./wrapper -->

        <script type="text/javascript">

            $(document).on('submit', '#reg-form', function ()
            {
                $.post('submit_update.php', $(this).serialize(), function (data)
                {
                    $(".result").html(data);

                });

                return false;


            })
        </script>
         <script type="text/javascript">
    
           function getCourses(string){
             $.ajax({
                 url : "section_course.php?year="+string.substring(2,4),
                 cache : false,
                 beforeSend : function (){
                      // alert("year "+string.substring(2,4));
                 },
                 complete : function(response, status){
                     if (status != "error" && status != "timeout") {
                         $('#courses').html(response.responseText);
                         // alert(response.responseText);
                     }
                 },
                 error : function (responseObj){
                     alert("Something went wrong while processing your request.\n\nError => "
                         + responseObj.responseText);
                 }
             }); 
    }

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
<div id="searcht" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="height:auto">
            <div class="modal-header" id="teacherModal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Teacher Schedule</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="faculty_sched.php" target="_blank">

                    <div class="form-group">
                        <label class="control-label col-lg-2" for="name">Teacher</label>
                        <div class="col-lg-10">
                            <select class="select2" name="faculty" style="width:90%!important"  required>
                                <?php
                                                            $query2 = mysqli_query($con, "select * from member where (status ='head' or status='teacher') and dept_id = '$_SESSION[dept_id]' order by member_last")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option value="<?php echo $row['member_id']; ?>"><?php echo $row['member_first'] . " " . $row['member_last']; ?></option>
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

<div id="searchclass" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="height:auto">
            <div class="modal-header" id="classModal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Class Schedule</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="class_sched.php" target="_blank">

                    <div class="form-group">
                        <label class="control-label col-lg-2" for="name">Class</label>
                        <div class="col-lg-10">
                            <select class="select2" name="class" style="width:90%!important" required>
                                                          <option></option>
                                                            <?php
                                                            $dept_id = $_SESSION['dept_id'];
                                                            $query2 = mysqli_query($con, "select * from section join cys on cys.cys_id=section.cys_id where cys.dept_id ='$dept_id'")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option><?php echo "Yr".$row['cys']." Sec ".$row['section'] ?></option>
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

<div id="searchroom" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="height:auto">
            <div class="modal-header" id="roomModal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Room Schedule</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="room_sched.php" target="_blank">

                    <div class="form-group">
                        <label class="control-label col-lg-2" for="name">Room</label>
                        <div class="col-lg-10">
                            <select class="select2" name="room" style="width:90%!important"  required>
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
       
            #teacherModal{
                background-color: #3b5998;
                color: white;
            }
            #classModal{
                background-color: #0F9D58;
                color: white;
            }
            #roomModal{
               background-color: #4285F4;
               color: white;
            }
        </style>