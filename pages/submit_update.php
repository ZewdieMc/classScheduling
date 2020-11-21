
<?php

session_start();
if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
error_reporting(0);
if ($_POST) {
    include('../dist/includes/dbcon.php');

    $member = $_POST['teacher'];
    $subject = $_POST['subject'];
    $room = $_POST['room'];
    $cys = $_POST['cys'];
    $remarks = $_POST['remarks'];

    $m = $_POST['m'];
    $w = $_POST['w'];
    $f = $_POST['f'];
    $t = $_POST['t'];
    $th = $_POST['th'];
    $sa = $_POST['sa'];
    $su = $_POST['su'];
    $id = $_POST['id'];

    $set_id = $_SESSION['settings'];
    $program = $_SESSION['id'];

    //monday sched
    foreach ($m as $daym) {
        //check conflict for member
        $query_member = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='m' and sched_id<>'$id'")or die(mysqli_error($con));
        $row = mysqli_fetch_array($query_member);
        $count_t = $row['count'];
        $time1 = date("h:i a", strtotime($row['time_start'])) . "-" . date("h:i a", strtotime($row['time_end']));
        $member1 = $row['member_first'] . " " . $row['member_last'];

        $error_t = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Monday</td>
					<td>$time1</td>
					<td>$member1</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$member1 at Monday $time1</b> is not idle.')</script> ";
        //check conflict for room
        $query_room = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='m' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowr = mysqli_fetch_array($query_room);
        $count_r = $rowr['count'];
        $timer = date("h:i a", strtotime($rowr['time_start'])) . "-" . date("h:i a", strtotime($rowr['time_end']));
        $roomr = $rowr['room'];

        $error_r = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
                                <td>Monday</td>
					<td>$timer</td>
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>Room $roomr at Monday $timer</b> is not idle.')</script> ";
        //check conflict for class
        $query_class = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='m' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowc = mysqli_fetch_array($query_class);
        $count_c = $rowc['count'];
        $cysc = $rowc['cys'];
        $timec = date("h:i a", strtotime($rowc['time_start'])) . "-" . date("h:i a", strtotime($rowc['time_end']));

        $error_c = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Monday</td>
					<td>$timec</td>
					<td>$cysc</td>
					<td class='text-danger'><b>Not Free</b>	</td>
				</tr>
			</table></span>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$cysc at Monday $timec </b> is not idle.')</script> ";


        $queryt = mysqli_query($con, "select * from member where member_id='$member'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($queryt);
        $membert = $rowt['member_last'] . ", " . $rowt['member_last'];

        $querytime = mysqli_query($con, "select * from time where time_id='$daym'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($querytime);
        $timet = date("h:i a", strtotime($rowt['time_start'])) . "-" . date("h:i a", strtotime($rowt['time_end']));


        if (($count_t == 0) and ( $count_r == 0) and ( $count_c == 0)) {
            mysqli_query($con, "update schedule set time_id='$daym',day='m',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));

            /* mysqli_query($con,"INSERT INTO schedule(time_id,day,member_id,subject_code,cys,room,remarks,settings_id,encoded_by)
              VALUES('$daym','m','$member','$subject','$cys','$room','$remarks','$set_id','$program')")or die(mysqli_error()); */

            echo "<span class='text-success'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-success'>
					<td>Monday</td>
					<td>$timet</td>
                    <td>$membert</td>
					<td><b>Success</b></td>
				</tr>
			</table></span><br>
                    <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.success('Schedule for Monday $timet successfully added.')</script> ";
        } else if ($count_t > 0)
            echo $error_t . "<br>";
        else if ($count_r > 0)
            echo $error_r . "<br>";
        else {
            echo $error_c . "<br>";
        }

        //echo "</table>";
    }
    //------------------------------------------------
    //wednesday sched
    foreach ($w as $daym) {
        //check conflict for member
        $query_member = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='w' and sched_id<>'$id'")or die(mysqli_error($con));
        $row = mysqli_fetch_array($query_member);
        $count_t = $row['count'];
        $time1 = date("h:i a", strtotime($row['time_start'])) . "-" . date("h:i a", strtotime($row['time_end']));
        $member1 = $row['member_first'] . " " . $row['member_last'];

        $error_t = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Wednesday</td>
					<td>$time1</td>
					<td>$member1</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$member1 at Wednesday $time1</b> is not idle.')</script> ";

        //check conflict for room
        $query_room = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='w' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowr = mysqli_fetch_array($query_room);
        $count_r = $rowr['count'];
        $timer = date("h:i a", strtotime($rowr['time_start'])) . "-" . date("h:i a", strtotime($rowr['time_end']));
        $roomr = $rowr['room'];

        $error_r = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>a
					<td>Wednesday</td>
					<td>$timer</td>
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>Room $roomr at Wednesday $timer</b> is not idle.')</script> ";;
        //check conflict for class
        $query_class = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='w' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowc = mysqli_fetch_array($query_class);
        $count_c = $rowc['count'];
        $cysc = $rowc['cys'];
        $timec = date("h:i a", strtotime($rowc['time_start'])) . "-" . date("h:i a", strtotime($rowc['time_end']));

        $error_c = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Wednesday</td>
					<td>$timec</td>
					<td>$cysc</td>
					<td class='text-danger'><b>Not Free</b>	</td>
				</tr>
			</table></span>
                        <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$cysc at Wednesday $timec </b> is not idle.')</script> ";


        $queryt = mysqli_query($con, "select * from member where member_id='$member'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($queryt);
        $membert = $rowt['member_first'] . " " . $rowt['member_last'];

        $querytime = mysqli_query($con, "select * from time where time_id='$daym'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($querytime);
        $timet = date("h:i a", strtotime($rowt['time_start'])) . "-" . date("h:i a", strtotime($rowt['time_end']));


        if (($count_t == 0) and ( $count_r == 0) and ( $count_c == 0)) {
            mysqli_query($con, "update schedule set time_id='$daym',day='w',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));

            echo "<span class='text-success'>
			<table class ='table table-stripped table-bordered' width='100%'>
                <tr class='bg-success'>
					<td>Wednesday</td>
					<td>$timet</td>
                    <td>$membert</td>
                    <td><b>Success</b></td>
				</tr>
			</table></span><br>
                    <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.success('Schedule for Wednesday $timet successfully added.')</script> ";
        } else if ($count_t > 0)
            echo $error_t . "<br>";
        else if ($count_r > 0)
            echo $error_r . "<br>";
        else {
            echo $error_c . "<br>";
        }

        //echo "</table>";
    }

    //-------------------------------------------------------------
    //friday sched
    foreach ($f as $daym) {
        //check conflict for member
        $query_member = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='f' and sched_id<>'$id'")or die(mysqli_error($con));
        $row = mysqli_fetch_array($query_member);
        $count_t = $row['count'];
        $time1 = date("h:i a", strtotime($row['time_start'])) . "-" . date("h:i a", strtotime($row['time_end']));
        $member1 = $row['member_first'] . " " . $row['member_last'];

        $error_t = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Friday</td>
					<td>$time1</td>
					<td>$member1</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>
            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$member1 at Friday $time1</b> is not idle.')</script> ";
        //check conflict for room
        $query_room = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='f' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowr = mysqli_fetch_array($query_room);
        $count_r = $rowr['count'];
        $timer = date("h:i a", strtotime($rowr['time_start'])) . "-" . date("h:i a", strtotime($rowr['time_end']));
        $roomr = $rowr['room'];

        $error_r = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Friday</td>
					<td>$timer</td>
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>Room $roomr at Friday $timer</b> is not idle.')</script> ";
        //check conflict for class
        $query_class = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='f' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowc = mysqli_fetch_array($query_class);
        $count_c = $rowc['count'];
        $cysc = $rowc['cys'];
        $timec = date("h:i a", strtotime($rowc['time_start'])) . "-" . date("h:i a", strtotime($rowc['time_end']));

        $error_c = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Friday</td>
					<td>$timec</td>
					<td>$cysc</td>
					<td class='text-danger'><b>Not Free</b>	</td>
				</tr>
			</table></span>
                        <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$cysc at Friday $timec </b> is not idle.')</script> ";

        $queryt = mysqli_query($con, "select * from member where member_id='$member'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($queryt);
        $membert = $rowt['member_first'] . " " . $rowt['member_last'];

        $querytime = mysqli_query($con, "select * from time where time_id='$daym'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($querytime);
        $timet = date("h:i a", strtotime($rowt['time_start'])) . "-" . date("h:i a", strtotime($rowt['time_end']));


        if (($count_t == 0) and ( $count_r == 0) and ( $count_c == 0)) {
            mysqli_query($con, "update schedule set time_id='$daym',day='f',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));

            echo "<span class='text-success'>
			<table class ='table table-stripped table-bordered' width='100%'>
                <tr class='bg-success'>
					<td>Friday</td>
					<td>$timet</td>
                    <td>$membert</td>
                    <td><b>Success</b></td>
				</tr>
			</table></span><br>
                    <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.success('Schedule for Friday $timet successfully added.')</script> ";
        } else if ($count_t > 0)
            echo $error_t . "<br>";
        else if ($count_r > 0)
            echo $error_r . "<br>";
        else {
            echo $error_c . "<br>";
        }

        //echo "</table>";
    }
    //------------------------------------------------
    //tuesday sched
    foreach ($t as $daym) {
        //check conflict for member
        $query_member = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='t' and sched_id<>'$id'")or die(mysqli_error($con));
        $row = mysqli_fetch_array($query_member);
        $count_t = $row['count'];
        $time1 = date("h:i a", strtotime($row['time_start'])) . "-" . date("h:i a", strtotime($row['time_end']));
        $member1 = $row['member_first'] . " " . $row['member_last'];

        $error_t = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Tuesday</td>
					<td>$time1</td>
					<td>$member1</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$member1 at Tuesday $time1</b> is not idle.')</script> ";

        //check conflict for room
        $query_room = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='t' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowr = mysqli_fetch_array($query_room);
        $count_r = $rowr['count'];
        $timer = date("h:i a", strtotime($rowr['time_start'])) . "-" . date("h:i a", strtotime($rowr['time_end']));
        $roomr = $rowr['room'];

        $error_r = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Tuesday</td>
					<td>$timer</td>
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>Room $roomr at Tuesday $timer</b> is not idle.')</script> ";;
        //check conflict for class
        $query_class = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='t' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowc = mysqli_fetch_array($query_class);
        $count_c = $rowc['count'];
        $cysc = $rowc['cys'];
        $timec = date("h:i a", strtotime($rowc['time_start'])) . "-" . date("h:i a", strtotime($rowc['time_end']));

        $error_c = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Tuesday</td>
					<td>$timec</td>
					<td>$cysc</td>
					<td class='text-danger'><b>Not Free</b>	</td>
				</tr>
			</table></span>
                        <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$cysc at Tuesday $timec </b> is not idle.')</script> ";


        $queryt = mysqli_query($con, "select * from member where member_id='$member'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($queryt);
        $membert = $rowt['member_first'] . " " . $rowt['member_last'];

        $querytime = mysqli_query($con, "select * from time where time_id='$daym'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($querytime);
        $timet = date("h:i a", strtotime($rowt['time_start'])) . "-" . date("h:i a", strtotime($rowt['time_end']));


        if (($count_t == 0) and ( $count_r == 0) and ( $count_c == 0)) {
            mysqli_query($con, "update schedule set time_id='$daym',day='t',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));

            echo "<span class='text-success'>
			<table class ='table table-stripped table-bordered' width='100%'>
                <tr class='bg-success'>
					<td>Tuesday</td>
					<td>$timet</td>
                    <td>$membert</td>
                    <td><b>Success</b></td>
				</tr>
			</table></span><br>
                    <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.success('Schedule for Tuesday $timet successfully added.')</script> ";
        } else if ($count_t > 0)
            echo $error_t . "<br>";
        else if ($count_r > 0)
            echo $error_r . "<br>";
        else {
            echo $error_c . "<br>";
        }

        //echo "</table>";
    }

    //--------------------------------------------------
    //thursday sched
    foreach ($th as $daym) {
        //check conflict for member
        $query_member = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='th' and sched_id<>'$id'")or die(mysqli_error($con));
        $row = mysqli_fetch_array($query_member);
        $count_t = $row['count'];
        $time1 = date("h:i a", strtotime($row['time_start'])) . "-" . date("h:i a", strtotime($row['time_end']));
        $member1 = $row['member_first'] . " " . $row['member_last'];

        $error_t = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Thursday</td>
					<td>$time1</td>
					<td>$member1</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$member1 at Thursday $time1</b> is not idle.')</script> ";;

        //check conflict for room
        $query_room = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='th' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowr = mysqli_fetch_array($query_room);
        $count_r = $rowr['count'];
        $timer = date("h:i a", strtotime($rowr['time_start'])) . "-" . date("h:i a", strtotime($rowr['time_end']));
        $roomr = $rowr['room'];

        $error_r = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Thursday</td>
					<td>$timer</td>
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>Room $roomr at Thursday $timer</b> is not idle.')</script> ";
        //check conflict for class
        $query_class = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='th' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowc = mysqli_fetch_array($query_class);
        $count_c = $rowc['count'];
        $cysc = $rowc['cys'];
        $timec = date("h:i a", strtotime($rowc['time_start'])) . "-" . date("h:i a", strtotime($rowc['time_end']));

        $error_c = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Thursday</td>
					<td>$timec</td>
					<td>$cysc</td>
					<td class='text-danger'><b>Not Free</b>	</td>
				</tr>
			</table></span>

                        <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$cysc at Thursday $timec </b> is not idle.')</script> ";


        $queryt = mysqli_query($con, "select * from member where member_id='$member'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($queryt);
        $membert = $rowt['member_first'] . " " . $rowt['member_last'];

        $querytime = mysqli_query($con, "select * from time where time_id='$daym'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($querytime);
        $timet = date("h:i a", strtotime($rowt['time_start'])) . "-" . date("h:i a", strtotime($rowt['time_end']));


        if (($count_t == 0) and ( $count_r == 0) and ( $count_c == 0)) {
            mysqli_query($con, "update schedule set time_id='$daym',day='th',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));

            echo "<span class='text-success'>
			<table class ='table table-stripped table-bordered' width='100%'>
                <tr class='bg-success'>
					<td>Thursday</td>
					<td>$timet</td>
                    <td>$membert</td>
                    <td><b>Success</b></td>
				</tr>
			</table></span><br>
                    <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.success('Schedule for Thursday $timet successfully added.')</script> ";
        } else if ($count_t > 0)
            echo $error_t . "<br>";
        else if ($count_r > 0)
            echo $error_r . "<br>";
        else {
            echo $error_c . "<br>";
        }

        //echo "</table>";
    }

    //saturday schedule
    foreach ($sa as $daym) {
        //check conflict for member
        $query_member = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='sa' and sched_id<>'$id'")or die(mysqli_error($con));
        $row = mysqli_fetch_array($query_member);
        $count_t = $row['count'];
        $time1 = date("h:i a", strtotime($row['time_start'])) . "-" . date("h:i a", strtotime($row['time_end']));
        $member1 = $row['member_first'] . " " . $row['member_last'];

        $error_t = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Saturday</td>
					<td>$time1</td>
					<td>$member1</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$member1 at Saturday $time1</b> is not idle.')</script> ";

        //check conflict for room
        $query_room = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='sa' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowr = mysqli_fetch_array($query_room);
        $count_r = $rowr['count'];
        $timer = date("h:i a", strtotime($rowr['time_start'])) . "-" . date("h:i a", strtotime($rowr['time_end']));
        $roomr = $rowr['room'];

        $error_r = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Saturday</td>
					<td>$timer</td>
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>Room $roomr at Saturday $timer</b> is not idle.')</script> ";
        //check conflict for class
        $query_class = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='sa' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowc = mysqli_fetch_array($query_class);
        $count_c = $rowc['count'];
        $cysc = $rowc['cys'];
        $timec = date("h:i a", strtotime($rowc['time_start'])) . "-" . date("h:i a", strtotime($rowc['time_end']));

        $error_c = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Saturday</td>
					<td>$timec</td>
					<td>$cysc</td>
					<td class='text-danger'><b>Not Free</b>	</td>
				</tr>
			</table></span>
           <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$cysc at Saturday $timec </b> is not idle.')</script> ";


        $queryt = mysqli_query($con, "select * from member where member_id='$member'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($queryt);
        $membert = $rowt['member_first'] . " " . $rowt['member_last'];

        $querytime = mysqli_query($con, "select * from time where time_id='$daym'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($querytime);
        $timet = date("h:i a", strtotime($rowt['time_start'])) . "-" . date("h:i a", strtotime($rowt['time_end']));


        if (($count_t == 0) and ( $count_r == 0) and ( $count_c == 0)) {
            mysqli_query($con, "update schedule set time_id='$daym',day='sa',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));

            echo "<span class='text-success'>
			<table class ='table table-stripped table-bordered' width='100%'>
                <tr class='bg-success'>
					<td>Saturday</td>
					<td>$timet</td>
                    <td>$membert</td>
					<td>Success</td>
				</tr>
			</table></span><br>
                        <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.success('Schedule for Saturday $timet successfully added.')</script> ";
        } else if ($count_t > 0)
            echo $error_t . "<br>";
        else if ($count_r > 0)
            echo $error_r . "<br>";
        else {
            echo $error_c . "<br>";
        }

        //echo "</table>";
    }

    //sunday schedule
    foreach ($su as $daym) {
        //check conflict for member
        $query_member = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where member_id='$member' and schedule.time_id='$daym' and day='su' and sched_id<>'$id'")or die(mysqli_error($con));
        $row = mysqli_fetch_array($query_member);
        $count_t = $row['count'];
        $time1 = date("h:i a", strtotime($row['time_start'])) . "-" . date("h:i a", strtotime($row['time_end']));
        $member1 = $row['member_first'] . " " . $row['member_last'];

        $error_t = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Sunday</td>
					<td>$time1</td>
					<td>$member1</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>
            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$member1 at Sunday $time1</b> is not idle.')</script> ";

        //check conflict for room
        $query_room = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where room='$room' and schedule.time_id='$daym' and day='su' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowr = mysqli_fetch_array($query_room);
        $count_r = $rowr['count'];
        $timer = date("h:i a", strtotime($rowr['time_start'])) . "-" . date("h:i a", strtotime($rowr['time_end']));
        $roomr = $rowr['room'];

        $error_r = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Sunday</td>
					<td>$timer</td>
					<td>Room $roomr</td>
					<td class='text-danger'><b>Not Free</b></td>
				</tr>
				</span>
			</table>            <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>Room $roomr at Sunday $timer</b> is not idle.')</script> ";
        //check conflict for class
        $query_class = mysqli_query($con, "select *,COUNT(*) as count from schedule
		natural join member natural join time where cys='$cys' and schedule.time_id='$daym' and day='su' and sched_id<>'$id'")or die(mysqli_error($con));
        $rowc = mysqli_fetch_array($query_class);
        $count_c = $rowc['count'];
        $cysc = $rowc['cys'];
        $timec = date("h:i a", strtotime($rowc['time_start'])) . "-" . date("h:i a", strtotime($rowc['time_end']));

        $error_c = "<span class='text-danger'>
			<table class ='table table-stripped table-bordered' width='100%'>
				<tr class='bg-danger'>
					<td>Sunday</td>
					<td>$timec</td>
					<td>$cysc</td>
					<td class='text-danger'><b>Not Free</b>	</td>
				</tr>
			</table></span>
                        <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.error('A duplicate schedule! <b>$cysc at Sunday $timec </b> is not idle.')</script> ";


        $queryt = mysqli_query($con, "select * from member where member_id='$member'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($queryt);
        $membert = $rowt['member_first'] . " " . $rowt['member_last'];

        $querytime = mysqli_query($con, "select * from time where time_id='$daym'")or die(mysqli_error($con));
        $rowt = mysqli_fetch_array($querytime);
        $timet = date("h:i a", strtotime($rowt['time_start'])) . "-" . date("h:i a", strtotime($rowt['time_end']));


        if (($count_t == 0) and ( $count_r == 0) and ( $count_c == 0)) {
            mysqli_query($con, "update schedule set time_id='$daym',day='su',subject_code='$subject',cys='$cys',room='$room',remarks='$remarks',member_id='$member' where sched_id='$id'")or die(mysqli_error($con));

            echo "<span class='text-success'>
			<table class ='table table-stripped table-bordered' width='100%'>
                <tr class='bg-success'>
					<td>Sunday</td>
					<td>$timet</td>
                    <td>$membert</td>
                    <td><b>Success</b></td>
				</tr>
			</table></span><br>  
        <script>
            toastr.options = {
             'closeButton': true,
            'debug': false,
             'positionClass': 'toast-bottom-left'
 
}
     toastr.success('Schedule for Sunday $timet successfully added.')</script> ";
        } else if ($count_t > 0)
            echo $error_t . "<br>";
        else if ($count_r > 0)
            echo $error_r . "<br>";
        else {
            echo $error_c . "<br>";
        }

        //echo "</table>";
    }
}
?>