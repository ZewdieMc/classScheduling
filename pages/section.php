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
        <title>Section | <?php include('../dist/includes/title.php'); ?></title>
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
        <script  src="../dist/js/sweetalert2.all.min.js"></script>

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
                                                        <tr class="bg-success">
                                                            <th>Section</th>
                                                            <th>Study Year</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <?php
                                                    include('../dist/includes/dbcon.php');
                                                    $dept_id = $_SESSION['dept_id'];
                                                    $query = mysqli_query($con, "select * from section join cys on cys.cys_id=section.cys_id where cys.dept_id ='$dept_id'")or die(mysqli_error());

                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $id = $row['sec_id'];
                                                        $section = $row['section'];
                                                        $cys = $row['cys'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo "Section ".$section; ?></td>
                                                            <td><?php echo "Year ".$cys; ?></td>
                                                            <td><a id="click" href="section.php?id=<?php echo $id; ?>&section=<?php echo $section; ?>&year=<?php echo $cys;?>">
                                                                    <i class="glyphicon glyphicon-edit text-blue"></i></a>
                                                                <a class="confirm" href="section_del.php?id=<?php echo $id; ?>">
                                                                    <i class="glyphicon glyphicon-trash text-red"></i></a>
                                                            </td>
                                                           
                                                           

                                                        </tr>


                                                    <?php } ?>
                                                </table>
                                        <?php if(isset($_GET['m'])):?>
                                            <div class="flash-data" data-flashdata = "<?php echo $_GET[m];?>"></div>
                                        <?php endif ?>
                                            </div><!--col end -->
                                            <div class="col-md-6">
                                                <form method="post" action="section_save.php">

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

                                                    <div class="form-group">
                                                        
                                                        <label for="date">Section</label>
                                                         <select class="form-control select2" name="section" required>
                                                            <option></option>
                                                            <option value="I">Section I</option>
                                                            <option value="II">Section II</option>
                                                            <option value="III">Section III</option>
                                                            <option value="IV">Section IV</option>
                                                            <option value="V">Section V</option>
                                                            <option value="VI">Section VI</option>
                                                            <option value="VII">Section VII</option>
                                                            <option value="VIII">Section VIII</option>
                                                            
                                                        </select>

                                                         <label for="date">Study Year</label>
                                                         <select class="form-control select2" name="class" required>
                                                            <option></option>
                                                            <?php
                                                            $dept_id = $_SESSION['dept_id'];
                                                            $query2 = mysqli_query($con, "select * from cys where dept_id ='$dept_id'")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option value="<?php echo $row['cys_id']?>"><?php echo "Year ".$row['cys']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>

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
                                        </div><!-- /.form group --><hr>
                                        </form>
                                    </div><!-- /.box-body -->
                                    <div class="box-body" style="" id="displayform">
                                        <!-- Date range -->
                                        <div id="form">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form method="post" action="section_update.php">
                                                        <div class="form-group">
                                                            <label for="date">Update Section</label><br>
                                                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_REQUEST['id']; ?>" placeholder="Class ID" readonly><!-- 
                                                            <input type="text" class="form-control" id="section" name="section" value="<?php echo $_REQUEST['section']; ?>" placeholder="Section" required> -->
                                                            <select class="form-control select2" name="section" required>
                                                            <option value="<?php echo $_REQUEST['section']; ?>"><?php echo "Section ".$_REQUEST['section']; ?></option>
                                                            <option value="I">Section I</option>
                                                            <option value="II">Section II</option>
                                                            <option value="III">Section III</option>
                                                            <option value="IV">Section IV</option>
                                                            <option value="V">Section V</option>
                                                            <option value="VI">Section VI</option>
                                                            <option value="VII">Section VII</option>
                                                            <option value="VIII">Section VIII</option>
                                                            
                                                        </select>
                                                            <label>Update Study Year</label>
                                                            <select class="form-control select2" name="cys" required>
                                                            <option value="<?php echo $_REQUEST['year']?>"><?php echo "Year ". $_REQUEST['year']?></option>
                                                            <?php
                                                            $dept_id = $_SESSION['dept_id'];
                                                            $query2 = mysqli_query($con, "select * from cys where dept_id ='$dept_id'")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_array($query2)) {
                                                                ?>
                                                                <option value="<?php echo $row['cys_id']?>"><?php echo "Year ".$row['cys']; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>
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
            
            $(".confirm").on('click',function(e){
                e.preventDefault();
                const href = $(this).attr("href");
                Swal.fire({
                    icon:'question',
                    title:'Do you want to delete the Section?',
                    showCancelButton: true,
                    confirmButtonColor:'green',
                    cancelButtonColor:'red',
                    confirmButtonText:'Delete Section'
                }).then((result)=>{
                    if (result.value) {
                        document.location.href =href;
                    }
                })
            })
            const flashdata = $('.flash-data').data('flashdata')
            if (flashdata) {
                Swal.fire({
                    icon:"success",
                    title:"Section Deleted!",
                   
                })
            }
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
