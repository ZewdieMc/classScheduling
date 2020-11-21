 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
$year = $_REQUEST['year'];
$query = mysqli_query($con, "select * from subject where cys = '$year' and dept_id='$_SESSION[dept_id]'") or die(mysqli_error($con));
echo "<option></option>";
while ($row = mysqli_fetch_array($query)) {
	echo "<option>$row[subject_title]</option>";
	}

?>