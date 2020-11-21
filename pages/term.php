<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$term = $_POST['term'];
	$id=$_SESSION['settings'];
	mysqli_query($con,"update settings set term='$term' where settings_id='$id'")or die(mysqli_error());

	$_SESSION['term']=$term;

	echo "<script type='text/javascript'>alert('Successfully set the term!');</script>";
	echo "<script>document.location='settings.php'</script>";  
	
?>
