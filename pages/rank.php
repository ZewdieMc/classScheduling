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
          <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../dist/css/AdminLTE.css">
        <!--<link rel="stylesheet" href="../plugins/select2/select2.min.css">-->
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
        <script src="../dist/js/jquery.min.js"></script>
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

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table id="example1" class="table table-bordered table-striped" style="margin-right:-10px">
                                                    <thead>
                                                        <tr>
                                                            <th>Rank (ማዕረግ)</th>
                                                            <th>Action</th>


                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    include('../dist/includes/dbcon.php');
                                                    $query = mysqli_query($con, "select * from rank order by rank")or die(mysqli_error());

                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $id = $row['rank_id'];
                                                        $rank = $row['rank'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $rank; ?></td>

                                                            <td><a id="click" href="rank.php?id=<?php echo $id; ?>&rank=<?php echo $rank; ?>">
                                                                    <i class="glyphicon glyphicon-edit text-blue"></i></a>
                                                                <a id="removeme" href="rank_del.php?id=<?php echo $id; ?>">
                                                                    <i class="glyphicon glyphicon-remove text-red"></i></a>
                                                            </td>

                                                        </tr>


                                                    <?php } ?>
                                                </table>

                                            </div><!--col end -->
                                            <div class="col-md-6">


                                            </div><!--col end-->
                                        </div><!--row end-->


                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col (right) -->

                            <div class="col-md-3">
                                <div class="box box-warning">
                                    <div class="box-body">
                                        <!-- Date range -->
                                        <div id="form">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="rank_save.php">
                                                        <div class="form-group">
                                                            <label for="date">Add Rank</label><br>
                                                            <input type="text" class="form-control" name="rank" placeholder="Rank" required>

                                                        </div><!-- /.form group -->
                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="save" type="submit">
                                                    Save
                                                </button>
                                                <button class="btn btn-lg btn-block" id="daterange-btn" type="reset">
                                                    Cancel
                                                </button>


                                            </div>
                                        </div><!-- /.form group -->
                                        </form>
                                        <div id="form">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="rank_update.php">
                                                        <div class="form-group">
                                                            <label for="date">Update Rank</label><br>
                                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_REQUEST['id']; ?>" readonly>
                                                            <input type="text" class="form-control" id="class" name="rank" value="<?php echo $_REQUEST['rank']; ?>" placeholder="Rank" required>
                                                        </div><!-- /.form group -->
                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="save" type="submit">
                                                    Update
                                                </button>

                                                </form>

                                            </div>
                                        </div><!-- /.form group --><hr>

                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col (right) -->


                        </div><!-- /.row -->


                    </section><!-- /.content -->
                </div><!-- /.container -->
            </div><!-- /.content-wrapper -->
            <?php include('../dist/includes/footer.php'); ?>
        </div><!-- ./wrapper -->
        <script>
            $(document).ready(function () {

                $(".result").load("rank_list.php");


            });
            //--------------------


        </script>

        <script type="text/javascript">
            $("#reg-form").on('submit', function ()
            {
                $.post('rank_save.php', $(this).serialize(), function (data)
                {
                    //$(".result").html(data);
                    $(".result").load("rank_list.php");
                });

                return false;


            })

            //-------------------------------------------------------------

        </script>
        <script type="text/javascript">
            $("#saveclass").on('submit', function ()
            {
                $.post('rank_update.php', $(this).serialize(), function (data)
                {
                    //$(".result").html(data);
                    $(".result").load("rank_list.php");
                });

                return false;


            })
            //-------------------------------------------------------------

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
