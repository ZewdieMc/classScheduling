<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

if($_POST)
{
include('../dist/includes/dbcon.php');

	$room = $_POST['room'];			
	$block_id = $_POST['block'];				
	$query=mysqli_query($con,"select * from room where room='$room' and block_id=$block_id")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
			{
				echo "<script type='text/javascript'>alert('Room already added!');</script>";	
				echo "<script>document.location='room.php'</script>";  
			}
			else
			{	
		
			mysqli_query($con,"INSERT INTO room(room,block_id) 
				VALUES('$room',$block_id)")or die(mysqli_error());
			}			
				echo "<script type='text/javascript'>alert('Successfully added a room!');</script>";	
				echo "<script>document.location='room.php'</script>";  
	
}					  
	
?>