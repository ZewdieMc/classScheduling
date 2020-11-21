
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
error_reporting();
include('../dist/includes/dbcon.php');

	//$term = $_POST['term'];			
	$sem = $_POST['sem'];	
	$sy = $_POST['sy'];		
	
			$query=mysqli_query($con,"select * from settings where sem='$sem' and sy='$sy'")or die(mysqli_error($con));
				 $count=mysqli_num_rows($query);

				 if ($count>0)
				 {
					echo "<script type='text/javascript'>alert('Settings already added!');</script>";	
					echo "<script>document.location='settings.php'</script>";  
				}
				else
					{
					
					mysqli_query($con,"INSERT INTO settings(sem,sy,status) 
					VALUES('$sem','$sy','inactive')")or die(mysqli_error($con));
				
					echo "<script type='text/javascript'>alert('Successfully added settings!');</script>";	
					echo "<script>document.location='settings.php'</script>";  
				}

	
?>