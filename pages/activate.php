<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_REQUEST['id'];
	
	mysqli_query($con,"update settings set status='active' where settings_id='$id'")or die(mysqli_error());
	
	mysqli_query($con,"update settings set status='inactive' where settings_id<>'$id'")or die(mysqli_error());
		echo "<script type='text/javascript'>alert('Successfully update settings!');</script>";
		echo "<script>document.location='settings.php'</script>";  
	
		$_SESSION['settings']=$id;

		$query2=mysqli_query($con,"select term from settings where settings_id='$id'")or die(mysqli_error());
			$row2=mysqli_fetch_array($query2);
				$_SESSION['term']=$row2['term'];

	
?>
