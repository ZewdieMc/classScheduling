<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include("../dist/includes/dbcon.php");
$id=$_REQUEST['id'];
$result=mysqli_query($con,"DELETE FROM settings WHERE settings_id ='$id'")
	or die(mysqli_error());

	echo "<script>document.location='settings.php'</script>";  
?>