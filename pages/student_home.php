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
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta http-equiv="x-ua-compatible" content="ie=edge">        <!-- Bootstrap 3.3.5 -->
        <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"> -->
          <!-- Font Awesome -->
          <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
          <!-- Ionicons -->
          <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
          <!-- SweetAlert2 -->
          <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
          <!-- Toastr -->
          <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
          <!-- Select2 -->
          <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
          <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="../dist/css/adminlte.css">
            <!-- Google Font: Source Sans Pro -->
          <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-yellow layout-top-nav" onload="myFunction()">
        <div class="header">
            <img src="../dist/img/header.png" alt="site logo goes here." style="height: 150px;width: 100%;">
        </div>
        <div class="wrapper">
            <?php include('../dist/includes/header_student.php'); ?>
            <!-- Full Width Column -->
            <h1>Something goes here.</h1>
            <h1>Something goes here.</h1>
            <h1>Something goes here.</h1>
            <h1>Something goes here.</h1>
            <?php include('../dist/includes/footer.php'); ?>

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
                                        $query2 = mysqli_query($con, "select * from section join cys on cys.cys_id=section.cys_id where cys.dept_id ='$dept_id'")or die(mysqli_error($con));
                                        while ($row2 = mysqli_fetch_array($query2)) {
                                            ?>
                                            <option><?php echo "Yr".$row2['cys']." Sec ".$row2['section'] ?></option>
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
                             echo "<option vlaue='$row[room_id]'>".$row['room']."</option>";
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
