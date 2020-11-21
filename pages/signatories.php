
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
                                                            <th>Order</th>
                                                            <th>Name</th>
                                                            <th>Designation</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    $id = $_SESSION['id'];
                                                    include('../dist/includes/dbcon.php');
                                                    $query = mysqli_query($con, "select * from signatories natural join member natural join designation where set_by='$id' order by seq")or die(mysqli_error());

                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $sid = $row['sign_id'];
                                                        $name = $row['member_first'] . " " . $row['member_last'];
                                                        $designation = $row['designation_name'];
                                                        $seq = $row['seq'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $seq; ?></td>
                                                            <td><?php echo $name; ?></td>
                                                            <td><?php echo $designation; ?></td>
                                                            <td>

                                                                <a id="removeme" href="signatories_del.php?id=<?php echo $sid; ?>">
                                                                    <i class="glyphicon glyphicon-trash text-red"></i></a>

                                                            </td>

                                                        </tr>


                                                    <?php } ?>
                                                </table>

                                            </div><!--col end -->
                                            <form method="post" action="signatories_save.php">
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
                                                    <table style="font-style: italic;">
                                                        <tr>
                                                            <th><h4>Order of signatories</h4></th>
                                                        </tr>
                                                        <tr>
                                                            <td><b>1</b> Prepared by <b>(Chairperson)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>2</b> Recommending Approval <b>(Dean)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>3</b> Recommending Approval <b>(VPAA)</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>4</b> Approved <b>(President)</b></td>
                                                        </tr>
                                                    </table><hr>
                                                    <h4>Add Signatories</h4>
                                                    <div class="form-group">
                                                        <label for="date">Name</label>

                                                        <select class="form-control select2" name="id" required>
                                                            <?php
                                                            include('../dist/includes/dbcon.php');
                                                            $query2 = mysqli_query($con, "select * from member order by member_last")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option value="<?php echo $row['member_id']; ?>"><?php echo $row['member_first'] . " " . $row['member_last']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>

                                                    </div><!-- /.form group -->
                                                    <div class="form-group">
                                                        <label for="date">Sequence</label><br>
                                                        <input type="number" class="form-control" name="seq" placeholder="Write the order of appearance. (Ex. 1)" required>
                                                    </div><!-- /.form group -->



                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <button class="btn btn-lg btn-primary" id="daterange-btn" name="save" type="submit">
                                                    Send
                                                </button>
                                                <button class="btn btn-lg" id="daterange-btn" type="reset">
                                                    Cancel
                                                </button>


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
