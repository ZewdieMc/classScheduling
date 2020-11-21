<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;?>
<!DOCTYPE hmtl>
<html>
<head>
<link rel="stylesheet" href="../dist/css/print.css" media="print">
<script src="../dist/js/jquery.min.js"></script>
<style>
	table td,th{
		border: 1px solid black;
		
	}
	table{
		border-collapse:collapse;
		text-align:center;
		font-size:12px;
		
	}
	tr{
		height:20px;
	}
	thead tr {
		height:5px!important;
	}
	.logo{
		float:left;
		margin-left:100px
	}
	.logo2{
		float:right;
		margin-right:100px
	}
	.wrapper_print{
		width:60%;
		margin:auto;
	}
	
	.action a{

		color:#ff0000;
		text-decoration:none;
		font-weight:bolder;
	}
	th{
		width:15%
	}
	th:last-child{
		width:5%;
	}
	
</style>
</head>
<body>
<?php 
include('../dist/includes/dbcon.php');
 ?>
 <script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function() {
			
		window.print()
			
			)};
			</script>
 
 <div class="wrapper_print">
 <?php 
 if (isset($_POST['search']))

$class=$_POST['class'];
$sid=$_SESSION['settings'];

$settings=mysqli_query($con,"select * from settings where settings_id='$sid'")or die(mysqli_error($con));
	$rows=mysqli_fetch_array($settings);
?> 

<img src = "../dist/img/logo.png" width ="60px" height="60px" class="logo"> 
<img src = "../dist/img/citlogo.png" width ="60px" height="60px" class="logo2" style="display:hidden"> 
<h5 align = "center">

CARLOS HILADO MEMORIAL STATE COLLEGE</br>
XYZ City, NPPL</br>
COLLEGE OF INDUSTRIAL TECHNOLOGY</br><br><br>	
CLASS <?php echo strtoupper($rows['term']);?> EXAM SCHEDULE</br>
</h5>
<h5 align="center">
Class: &nbsp; <font color="blue"><?php echo $class;  ?></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School Year:&nbsp;
<?php echo $rows['sy']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Semester:&nbsp;<?php echo $rows['sem']; ?> 

</h5>
<table style="width:100%;float:left">
							<thead>
							  <tr>
								<th>Subject</th>
								<th>Day</th>
								<th>Time</th>
								<th>Room</th>
								<th>Proctor</th>
								<th class="action">Action</th>
							  </tr>
							</thead>
							
							  
								
								<?php $query1=mysqli_query($con,"select * from exam_sched natural join member natural join time 
								where exam_sched.cys='$class'and settings_id='$sid' or exam_sched.cys1='$class' order by day,time_start")or die(mysqli_error($con));
										while($row1=mysqli_fetch_array($query1)){
											$id1=$row1['sched_id'];	
											$start=date("h:i a",strtotime($row1['time_start']));
											$end=date("h:i a",strtotime($row1['time_end']));										
									?>
									<tr class="show">
										<td class="name"><?php echo $row1['subject_code'];?></td>
										<td><?php echo $row1['day'];?> day</td>
										<td><?php echo $start."-".$end;?></td>
										<td><?php echo $row1['room'];?></td>
										<td><?php echo $row1['member_last'].", ".$row1['member_first'];?></td>
										<td class="action" style="text-align:center">
										<span class="action"><a href="exam_edit.php?id=<?php echo $id1;?>" title="edit" style="color:blue">Edit</a></span>
										<span class="action"><a href="#" id="<?php echo $id1;?>" class="delete" title="Delete">Delete</a></span></td>		
									</tr>		
																			
							
							
		<?php }?>					  
		</table>    

			
  
  
  
 </b>

  </body>
    <script src="jquery.js"></script>
<script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "exam_sched_del.php",
   data: info,
   success: function(){
 }
});
  $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});
</script>
  </html>
