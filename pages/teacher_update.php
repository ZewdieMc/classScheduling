
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$salut =$_POST['salut'];
	$last =$_POST['last'];
	$first =$_POST['first'];
	$rank =$_POST['rank'];
	$dept =$_POST['dept'];
	$status =$_POST['status'];
	$designation =$_POST['designation'];
	$username=strtolower($first.$dept);
	
	mysqli_query($con,"update member set member_salut='$salut',member_last='$last',member_first='$first',member_rank='$rank',dept_code='$dept',
	designation_id='$designation',username='$username',status='$status' where member_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated member details!');</script>";
	echo "<script>document.location='teacher.php'</script>";

	
?>
