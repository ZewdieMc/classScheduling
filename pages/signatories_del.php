<?php
include("../dist/includes/dbcon.php");
$id=$_REQUEST['id'];
$result=mysqli_query($con,"DELETE FROM signatories WHERE sign_id ='$id'")
	or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully deleted a signatory!');</script>";	
		
	echo "<script>document.location='signatories.php'</script>";  
?>