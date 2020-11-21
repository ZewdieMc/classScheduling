<div style="clear:both;"><br></div>
<table class="table table-striped" >
    <tr><td style="border:none;">
            <span>Prepared by:</span><br><hr>
            <?php
            include('../dist/includes/dbcon.php');
            $id = $_SESSION['id'];
            // $query = mysqli_query($con, "select * from signatories natural join member natural join designation where seq='1'")or die(mysqli_error($con)); 
            $query = mysqli_query($con, "select * from member natural join designation where dept_id = '$_SESSION[dept_id]' and status='head'")or die(mysqli_error($con));
            $row = mysqli_fetch_array($query);
            $head_id = $row['member_id'];
            echo "<span><b>$row[member_first] $row[member_last]</b></span><br>";
            echo "<span>$row[designation_name]</span>";
            ?>
            <br><br></td><td style="border: none;">
            <span>Approved by:</span><br><hr>
            <?php
            $query = mysqli_query($con, "select * from member natural join designation where  member.status='faculty'")or die(mysqli_error($con));
            $row = mysqli_fetch_array($query);
            echo "<span><b>$row[member_first] $row[member_last]</b></span><br>";
            echo "<span>$row[designation_name]</span>";
            ?><br><br></td></tr></table>