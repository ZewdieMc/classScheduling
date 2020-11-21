<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$designation =$_POST['designation'];
	
	mysqli_query($con,"update designation set designation_name='$designation' where designation_id='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully updated a designation!');</script>";	
	echo "<script>document.location='designation.php'</script>";  
}	
	
?>
