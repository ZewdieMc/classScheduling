<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

if($_POST)
{
include('../dist/includes/dbcon.php');

	$salut = $_POST['salut'];			
					
		$query=mysqli_query($con,"select * from salut where salut='$salut'")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
			{
				echo "<script type='text/javascript'>alert('Salutation already added!');</script>";	
				echo "<script>document.location='salut.php'</script>";  
			}	
			else
			{	
			mysqli_query($con,"INSERT INTO salut(salut) 
				VALUES('$salut')")or die(mysqli_error());
				
				echo "<script type='text/javascript'>alert('Successfully added a salutation!');</script>";	
				echo "<script>document.location='salut.php'</script>";  
			}
}					  
	
?>