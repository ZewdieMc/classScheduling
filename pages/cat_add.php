 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
//$year = $_REQUEST['year'];
echo "<select  class='form-control select2' name='subject' required>";
$query = mysqli_query($con, "select * from subject where cys = '4'") or die(mysqli_error($con));
while ($row = mysqli_fetch_array($query)) {
	echo "<option>$row[subject_title]</option>";
	}
	echo "</select>";
?>