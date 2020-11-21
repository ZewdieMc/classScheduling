<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-warning" href="home.php">Back</a>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">User</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-4">
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Add New User</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="user_add.php" enctype="multipart/form-data">
  
                  <div class="form-group">
                    <label for="date">Full Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="name" placeholder="Full Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

	
					  <div class="form-group">
						<label for="date">Username</label>
						<div class="input-group col-md-12">
						  <input type="text" class="form-control pull-right" id="date" name="username" placeholder="Username" required>
						</div><!-- /.input group -->
					  </div><!-- /.form group -->

						  <div class="form-group">
							<label for="date">Password</label>
							<div class="input-group col-md-12">
							  <input type="password" class="form-control pull-right" id="date" name="password" placeholder="Password" required>
							</div><!-- /.input group -->
						  </div><!-- /.form group -->
              <div class="form-group">
              <label for="date">Teacher</label>
              
                <select class="form-control select2" name="program" required>
                  <?php 
                  $query2=mysqli_query($con,"select * from program order by prog_code")or die(mysqli_error($con));
                    while($row=mysqli_fetch_array($query2)){
                  ?>
                    <option><?php echo $row['prog_code'];?></option>
                  <?php }
                  
                  ?>
                </select>
              
              </div><!-- /.form group -->
						
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-primary" id="daterange-btn" name="">
                        Save
                      </button>
					  <button class="btn" id="daterange-btn">
                        Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-xs-8">
              <div class="box box-warning">
    
                <div class="box-header">
                  <h3 class="box-title">User List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Full Name</th>
						            <th>Username</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		
		$query=mysqli_query($con,"select * from user where username<>'admin' order by name")or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
						<td><?php echo $row['username'];?></td>
            <td><?php echo $row['program'];?></td>
                        <td><?php if ($row['status']=="active") 
							echo "<span class='badge bg-green'>".$row['status']."</span>";
							else
								echo "<span class='badge bg-red'>".$row['status']."</span>";
							?></td>
                        <td>
				<a href="#updateordinance<?php echo $row['user_id'];?>" data-target="#updateordinance<?php echo $row['user_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
			
						</td>
                      </tr>
<div id="updateordinance<?php echo $row['user_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update User Details</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="user_update.php">
                
				<div class="form-group">
					<label class="control-label col-lg-3" for="name">Full Name</label>
					<div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['user_id'];?>" required>  
					  <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name'];?>" required>  
					</div>
				</div> 
				
				<div class="form-group">
					<label class="control-label col-lg-3" for="price">Username</label>
					<div class="col-lg-9">
					  <input type="text" class="form-control" id="price" name="username" value="<?php echo $row['username'];?>" required>  
					</div>
				</div>
	
				<div class="form-group">
					<label class="control-label col-lg-3" for="price">Status</label>
					<div class="col-lg-9">
					  <select class="form-control" name="status">  
							<option><?php echo $row['status'];?></option>
							<option>active</option>
							<option>inactive</option>
					  </select>
					</div>
				</div>
				
              </div><br><br><br><br><br>
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->                    
<?php }?>					  
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Full Name</th>
						<th>Username</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>					  
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
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
  </body>
</html>
