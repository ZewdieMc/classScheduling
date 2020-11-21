<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$salut =$_POST['salut'];
	
	mysqli_query($con,"update salut set salut='$salut' where salut_id='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully updated a salutation!');</script>";	
	echo "<script>document.location='salut.php'</script>";  
}	
	
?>
