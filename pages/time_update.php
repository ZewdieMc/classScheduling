
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');

	$id = $_POST['id'];
	$start =$_POST['start'];
	$end =$_POST['end'];
	$day =$_POST['day'];
	
	mysqli_query($con,"update time set time_start='$start',time_end='$end',days='$day' where time_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated time!');</script>";	
			echo "<script>document.location='time.php'</script>";  
}	
	
?>
