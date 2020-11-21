<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

	$section = $_POST['section'];			
	$cys = $_POST['class'];			

	$query=mysqli_query($con,"select * from section where section = '$section' and cys_id='$cys'")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
			{
				echo "<script type='text/javascript'>alert('section already added!');</script>";	
				echo "<script>document.location='section.php'</script>";  
			}
			else
			{	
				mysqli_query($con,"INSERT INTO section(section,cys_id) 
				VALUES('$section','$cys')")or die(mysqli_error());
			}	
				echo "<script type='text/javascript'>alert('Successfully added a Section!');</script>";	
				echo "<script>document.location='section.php'</script>";  
		
					  
	
?>
