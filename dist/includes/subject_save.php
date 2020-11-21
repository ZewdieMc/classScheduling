
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

if($_POST)
{
include('../dist/includes/dbcon.php');

	$code = $_POST['code'];			
	$title = $_POST['title'];					
	$member=$_SESSION['id'];

	$query=mysqli_query($con,"select * from subject where subject_code='$code'")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
				{
				echo "<script type='text/javascript'>alert('Subject already added!');</script>";	
				echo "<script>document.location='subject.php'</script>";  
				}
			else
			{	
				mysqli_query($con,"INSERT INTO subject(subject_code,subject_title,member_id) 
				VALUES('$code','$title','$member')")or die(mysqli_error());
				
				echo "<script type='text/javascript'>alert('Successfully added a subject!');</script>";	
				echo "<script>document.location='subject.php'</script>";  
			}
}					  
	
?>