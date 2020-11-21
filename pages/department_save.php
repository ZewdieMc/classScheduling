<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');

	$code = $_POST['code'];		
	$name = $_POST['name'];			
					
	
			mysqli_query($con,"INSERT INTO dept(dept_code,dept_name) 
				VALUES('$code','$name')")or die(mysqli_error());
				
			echo "<script type='text/javascript'>alert('Successfully added a department!');</script>";	
			echo "<script>document.location='department.php'</script>";  
	
}					  
	
?>