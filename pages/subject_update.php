
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$code = $_POST['code'];
	$title =$_POST['title'];
	$cys  = $_POST['cys'];
	mysqli_query($con,"update subject set subject_code='$code',subject_title='$title',cys='$cys' where subject_id='$id'")or die(mysqli_error());
	echo "<script type='text/javascript'>alert('Successfully updated a subject!');</script>";	
	echo "<script>document.location='subject.php'</script>";  
}	
	
?>
