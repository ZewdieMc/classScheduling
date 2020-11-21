
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if($_POST)
{
include('../dist/includes/dbcon.php');

	$id = $_POST['id'];	
	$seq = $_POST['seq'];	
	$mid = $_SESSION['id'];	
	
			mysqli_query($con,"INSERT INTO signatories(member_id,seq,set_by) 
				VALUES('$id','$seq','$mid')")or die(mysqli_error());
				
			echo "<script type='text/javascript'>alert('Successfully added a signatory!');</script>";	
			echo "<script>document.location='signatories.php'</script>";  
	
}					  
	
?>