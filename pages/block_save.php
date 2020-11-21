<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

if($_POST)
{
include('../dist/includes/dbcon.php');

	$block_number = $_POST['block'];	
	$dept_id = $_POST['department'];		
					
	$query=mysqli_query($con,"select * from block where block_number='$block_number'")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
			{
				echo "<script type='text/javascript'>alert('block already added!');</script>";	
				echo "<script>document.location='blocks.php'</script>";  
			}
			else
			{	
		
			mysqli_query($con,"INSERT INTO block(block_number,dept_id) 
				VALUES('$block_number','$dept_id')")or die(mysqli_error());
			}			
				echo "<script type='text/javascript'>alert('Successfully added a block!');</script>";	
				echo "<script>document.location='blocks.php'</script>";  
				
	
}					  
	
?>