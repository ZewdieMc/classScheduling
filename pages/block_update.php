<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$block =$_POST['block'];
	$dept_id =$_POST['department'];
	mysqli_query($con,"update block set block_number='$block', dept_id ='$dept_id' where block_id='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully updated a block!');</script>";	
	echo "<script>document.location='blocks.php'</script>";  
}	
	
?>
