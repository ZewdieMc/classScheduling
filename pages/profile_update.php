 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');

	$id = $_SESSION['id'];
	$name =$_POST['name'];
	$username =$_POST['username'];
	$password =$_POST['password'];
	$old =$_POST['passwordold'];
	$new =$_POST['new'];
	
	if($new<>$password)
	{
		echo "<script type='text/javascript'>alert('Password mismatch!');</script>";
		echo "<script>document.location='profile.php'</script>";  
	}
	else
	{	
		$query=mysqli_query($con,"select password from member where member_id='$id'")or die(mysqli_error());
			$row=mysqli_fetch_array($query);
	
				$passold=$row['password'];
				
				if ($passold==$old)
				{
					if ($password<>"")
					{
						mysqli_query($con,"update member set username='$username',password='$password' where member_id='$id'")or die(mysqli_error($con));
						echo "<script type='text/javascript'>alert('Successfully updated login details!');</script>";
						echo "<script>document.location='profile.php'</script>";  
					}
					else
					{
						mysqli_query($con,"update member set username='$username' where member_id='$id'")or die(mysqli_error($con));
						echo "<script type='text/javascript'>alert('Successfully changed username!');</script>";
						echo "<script>document.location='profile.php'</script>";  
					}
					
					
				}
				else{
		
					echo "<script type='text/javascript'>alert('Old Password is incorrect!');</script>";
					echo "<script>document.location='profile.php'</script>";  
				}
	}
?>
