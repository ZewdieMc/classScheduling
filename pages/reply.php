<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');

	$receiver = $_POST['receiver'];	
	$sender = $_SESSION['id'];	
	$feedback = $_POST['feedback'];	
	$date = date("Y-m-d H:i");	
	
			mysqli_query($con,"INSERT INTO feedback(receiver_id,sender_id,feedback,date_sent) 
				VALUES('$receiver','$sender','$feedback','$date')")or die(mysqli_error());
			echo "<script type='text/javascript'>alert('Successfully sent a reply for feedback!');</script>";	
			echo "<script>document.location='feedback.php'</script>";  
	
}					  
	
?>