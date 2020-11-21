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
	$id = $_SESSION['id'];

	$member = $_POST['member'];
	$subject = $_POST['subject'];
	$room = $_POST['room'];
	$cys = $_POST['cys'];
	if ($_POST['merge']=="merge")
	{
		$cys1 = $_POST['cys1'];
	}
	else
	{
		$cys1="";
	}
	$remarks = $_POST['remarks'];
	$merge = $_POST['merge'];
	
	$first = $_POST['first'];
	$second = $_POST['second'];
	$third = $_POST['third'];

	
	$set_id=$_SESSION['settings'];
					
	//first day sched
	foreach ($first as $daym){
		//check conflict for member
		
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where member_id='$member' and exam_sched.time_id='$daym' and day='first' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td style='text-align:left'>$time1</td>
					<td style='text-align:left'>First Day</td> 
					<td style='text-align:left'>$member1</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where room='$room' and exam_sched.time_id='$daym' and day='first' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timer</td>
					<td style='text-align:left'>First Day</td> 
					<td style='text-align:left'>$roomr</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where cys='$cys' and exam_sched.time_id='$daym' and day='first' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timec</td>
					<td style='text-align:left'>First Day</td> 
					<td style='text-align:left'>$cysc</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO exam_sched(time_id,day,member_id,subject_code,cys,cys1,room,remarks,settings_id,term,encoded_by) 
				VALUES('$daym','first','$member','$subject','$cys','$cys1','$room','$remarks','$set_id','$term','$id')")or die(mysqli_error());
			
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timet</td>
					<td style='text-align:left'>First Day</td> 
					<td style='text-align:left'>$membert</td>
					<td style='text-align:left'>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	//------------------------------------------------
	//second day sched
	foreach ($second as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where member_id='$member' and exam_sched.time_id='$daym' and day='second' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td style='text-align:left'>$time1</td>
					<td style='text-align:left'>Second Day</td> 
					<td style='text-align:left'>$member1</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where room='$room' and exam_sched.time_id='$daym' and day='second' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timer</td>
					<td style='text-align:left'>Second Day</td> 
					<td style='text-align:left'>$roomr</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where cys='$cys' and exam_sched.time_id='$daym' and day='second' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timec</td>
					<td style='text-align:left'>Second Day</td> 
					<td style='text-align:left'>$cysc</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO exam_sched(time_id,day,member_id,subject_code,cys,cys1,room,remarks,settings_id,term,encoded_by) 
				VALUES('$daym','second','$member','$subject','$cys','$cys1','$room','$remarks','$set_id','$term','$id')")or die(mysqli_error());
			
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timet</td>
					<td style='text-align:left'>Second Day</td> 
					<td style='text-align:left'>$membert</td>
					<td style='text-align:left'>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	
	//-------------------------------------------------------------
	//Third day sched
	foreach ($third as $daym){
		//check conflict for member
		$query_member=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where member_id='$member' and exam_sched.time_id='$daym' and day='third' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$row=mysqli_fetch_array($query_member);
			$count_t=$row['count'];
			$time1=date("h:i a",strtotime($row['time_start']))."-".date("h:i a",strtotime($row['time_end']));
			$member1=$row['member_last'].", ".$row['member_first'];
			
			$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td style='text-align:left'>$time1</td>
					<td style='text-align:left'>Third day</td> 
					<td style='text-align:left'>$member1</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b></td>					
				</tr>
				</span>
			</table>";
		
		//check conflict for room
		$query_room=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where room='$room' and exam_sched.time_id='$daym' and day='third' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$rowr=mysqli_fetch_array($query_room);
			$count_r=$rowr['count'];
			$timer=date("h:i a",strtotime($rowr['time_start']))."-".date("h:i a",strtotime($rowr['time_end']));
			$roomr=$rowr['room'];
			
			$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timer</td>
					<td style='text-align:left'>Third day</td> 
					<td style='text-align:left'>$roomr</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b></td>					
				</tr>
				</span>
			</table>";
			//check conflict for class
		$query_class=mysqli_query($con,"select *,COUNT(*) as count from exam_sched 
		natural join member natural join time where cys='$cys' and exam_sched.time_id='$daym' and day='third' and settings_id='$sid' and term='$term'")or die(mysqli_error($con));
			$rowc=mysqli_fetch_array($query_class);
			$count_c=$rowc['count'];
			$cysc=$rowc['cys'];
			$timec=date("h:i a",strtotime($rowc['time_start']))."-".date("h:i a",strtotime($rowc['time_end']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timec</td>
					<td style='text-align:left'>Third day</td> 
					<td style='text-align:left'>$cysc</td>
					<td class='text-danger' style='text-align:left'><b>Conflict</b>	</td>					
				</tr>
			</table></span>";	
		
				
		$queryt=mysqli_query($con,"select * from member where member_id='$member'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($queryt);
				$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($con,"select * from time where time_id='$daym'")or die(mysqli_error($con));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['time_start']))."-".date("h:i a",strtotime($rowt['time_end']));	
		
		
		if (($count_t==0) and ($count_r==0) and ($count_c==0))
		{
			mysqli_query($con,"INSERT INTO exam_sched(time_id,day,member_id,subject_code,cys,cys1,room,remarks,settings_id,term,encoded_by) 
				VALUES('$daym','third','$member','$subject','$cys','$cys1','$room','$remarks','$set_id','$term','$id')")or die(mysqli_error());
			
		
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td style='text-align:left'>$timet</td>
					<td style='text-align:left'>Third day</td> 
					<td style='text-align:left'>$membert</td>
					<td style='text-align:left'>Success</td>					
				</tr>
			</table></span><br>";	
		}
					
		else if ($count_t>0) echo $error_t."<br>";
		else if ($count_r>0) echo $error_r."<br>";
		else {echo $error_c."<br>";}	
		
		//echo "</table>";
	}
	
		
}					  
	
?>
