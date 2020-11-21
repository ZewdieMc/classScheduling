<?php 
if($_POST)
{
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$code =$_POST['code'];
	$name =$_POST['name'];
	
	mysqli_query($con,"update program set prog_code='$code',prog_title='$name' where prog_id='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully updated a program!');</script>";	
	echo "<script>document.location='program.php'</script>";  
}	
	
?>
