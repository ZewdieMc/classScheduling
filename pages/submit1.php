
 <?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
error_reporting(0);
if($_POST)
{
include('../dist/includes/dbcon.php');
	$sid = $_SESSION['settings'];
	$term = $_SESSION['term'];
	$teacher = $_POST['teacher'];
	$subject = $_POST['subject'];
	$room = $_POST['room'];
	$cys = $_POST['cys'];
	$remarks = $_POST['remarks'];
	
	$m = $_POST['m'];
	$w = $_POST['w'];
	$f = $_POST['f'];
	$t = $_POST['t'];
	$th = $_POST['th'];
	

			
					
	//monday sched
	foreach ($m as $daym){
		//check conflict
		$query=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join teacher natural join time where teacher_id='$teacher' and schedule.time_id='$daym' and room='$room' 
		and day='m' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
			$count=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$teacher1=$row['teacher_last'].", ".$row['teacher_first'];
			$cys1=$row['cys'];
			$room1=$row['room'];
			
		$queryt=mysqli_query($con,"select * from teacher where teacher_id='$teacher'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$teachert=$rowt['teacher_last'].", ".$rowt['teacher_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if ($count==0)
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,teacher_id,subject_code,cys,room,remarks) 
				VALUES('$daym','m','$teacher','$subject','$cys','$room','$remarks')")or die(mysqli_error());
				
			echo "<span class='text-success'>$timet $teachert $cys at room $room every monday successfully added!</span><br>";	
		}			
		else{
			
			echo "<span class='text-danger'>$time1 is already taken by $teacher1 $cys1 at room $room1 every monday </span><br>";
			
		}
	
	}
	//wed sched
	foreach ($w as $dayw){
		//check conflict
		$query=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join teacher natural join time where teacher_id='$teacher' and room='$room' and day='w' and schedule.time_id='$daym'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
			$count=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$teacher1=$row['teacher_last'].", ".$row['teacher_first'];
			$cys1=$row['cys'];
			$room1=$row['room'];
			
		$queryt=mysqli_query($con,"select * from teacher where teacher_id='$teacher'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$teachert=$rowt['teacher_last'].", ".$rowt['teacher_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$dayw'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if ($count==0)
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,teacher_id,subject_code,cys,room,remarks) 
				VALUES('$dayw','w','$teacher','$subject','$cys','$room','$remarks')")or die(mysqli_error());
				
			echo "<span class='text-success'>$timet $teachert $cys at room $room every wednesday successfully added!</span><br>";	
		}			
		else{
			
			echo "<span class='text-danger'>$time1 is already taken by $teacher1 $cys1 at room $room1 every wednesday </span><br>";
			
		}
	
	}
	//friday sched
	foreach ($f as $dayf){
		//check conflict
		$query=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join teacher natural join time where teacher_id='$teacher' and room='$room' and day='f' and schedule.time_id='$dayf'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
			$count=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$teacher1=$row['teacher_last'].", ".$row['teacher_first'];
			$cys1=$row['cys'];
			$room1=$row['room'];
			
		$queryt=mysqli_query($con,"select * from teacher where teacher_id='$teacher'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$teachert=$rowt['teacher_last'].", ".$rowt['teacher_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$dayf'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if ($count==0)
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,teacher_id,subject_code,cys,room,remarks) 
				VALUES('$dayf','f','$teacher','$subject','$cys','$room','$remarks')")or die(mysqli_error());
				
			echo "<span class='text-success'>$timet $teachert $cys at room $room every friday successfully added!</span><br>";	
		}			
		else{
			
			echo "<span class='text-danger'>$time1 is already taken by $teacher1 $cys1 at room $room1 every friday </span><br>";
			
		}
	
	}
	//tuesday sched
	foreach ($t as $dayt){
		//check conflict
		$query=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join teacher natural join time where teacher_id='$teacher' and room='$room' and day='t' and schedule.time_id='$dayt'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
			$count=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$teacher1=$row['teacher_last'].", ".$row['teacher_first'];
			$cys1=$row['cys'];
			$room1=$row['room'];
			
		$queryt=mysqli_query($con,"select * from teacher where teacher_id='$teacher'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$teachert=$rowt['teacher_last'].", ".$rowt['teacher_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$dayt'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if ($count==0)
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,teacher_id,subject_code,cys,room,remarks) 
				VALUES('$dayt','t','$teacher','$subject','$cys','$room','$remarks')")or die(mysqli_error());
				
			echo "<span class='text-success'>$timet $teachert $cys at room $room every tuesday successfully added!</span><br>";	
		}			
		else{
			
			echo "<span class='text-danger'>$time1 is already taken by $teacher1 $cys1 at room $room1 every tuesday </span><br>";
			
		}
	
	}
	//thursday sched
	foreach ($th as $dayth){
		//check conflict
		$query=mysqli_query($con,"select *,COUNT(*) as count from schedule 
		natural join teacher natural join time where teacher_id='$teacher' and room='$room' and day='th' and schedule.time_id='$dayth'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query);
			$count=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$teacher1=$row['teacher_last'].", ".$row['teacher_first'];
			$cys1=$row['cys'];
			$room1=$row['room'];
			
		$queryt=mysqli_query($con,"select * from teacher where teacher_id='$teacher'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$teachert=$rowt['teacher_last'].", ".$rowt['teacher_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$dayth'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if ($count==0)
		{
			mysqli_query($con,"INSERT INTO schedule(time_id,day,teacher_id,subject_code,cys,room,remarks) 
				VALUES('$dayth','th','$teacher','$subject','$cys','$room','$remarks')")or die(mysqli_error());
				
			echo "<span class='text-success'>$timet $teachert $cys at room $room every thursday successfully added!</span><br>";	
		}			
		else{
			
			echo "<span class='text-danger'>$time1 is already taken by $teacher1 $cys1 at room $room1 every thursday </span><br>";
			
		}
	
	}
	
		
}					  
	
?>