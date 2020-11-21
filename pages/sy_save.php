
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

if($_POST)
{
include('../dist/includes/dbcon.php');

	$sy = $_POST['sy'];			
					
	
			mysqli_query($con,"INSERT INTO sy(sy) 
				VALUES('$sy')")or die(mysqli_error());
				
			echo "<span class='text-success'>Successfully added new school year!</span>";	
	
}					  
	
?>