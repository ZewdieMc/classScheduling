
 
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

if($_POST)
{
include('../dist/includes/dbcon.php');

	$code = $_POST['code'];			
	$title = $_POST['title'];					
	$dept=$_SESSION['dept_id'];
	$cys=$_POST['cys'];

	$query=mysqli_query($con,"select * from subject where subject_code='$code' and dept_id = '$dept'")or die(mysqli_error());
			$count=mysqli_num_rows($query);		
			if ($count>0)
				{
					echo "<script type='text/javascript'>alert('Subject already added!');</script>";	
				echo "<script>document.location='subject.php'</script>";  
				}
			else
			{	
				mysqli_query($con,"INSERT INTO subject(subject_code,subject_title,dept_id,cys) 
				VALUES('$code','$title','$dept','$cys')")or die(mysqli_error());
				
				// echo "<script type='text/javascript'>alert('Successfully added a subject!');</script>";	
				echo "<script type='text/javascript'>
					
				</script>";	
				echo "<script>document.location='subject.php'</script>";  
			}
}					  
	
?>