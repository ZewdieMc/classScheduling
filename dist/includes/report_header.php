<?php
session_start();
if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
?>
<style>
	span {
		font-size: 14px !important;
	}

	table td, th {
		border: 2px solid black;

	}

	table {
		border-collapse: collapse;
		text-align: center;
		font-size: 16px;
		margin-bottom: 10px;
	}

	tr {
		height: 45px;
	}

	thead tr {
		height: 40px;
		background-color: gray;
		color: white;
	}

	.logo {
		float: left;
		margin-left: 100px
	}

	.logo2 {
		float: right;
		margin-right: 100px
	}

	.wrapper_print {
		width: 80%;
		margin: auto;
	}

	.first {
		width: 80px
	}

	.action a {
		float: right;
		color: #ff0000;
		text-decoration: none;
		font-weight: bolder;
	}

	th {
		width: 11.5%;
	}

	#first_column {
		width: 20%;
		background-color: lightblue;
		font-weight: bold;
	}

	.hideme {
		display: none;
	}

	.showme {
		font-size: 12px !important;
	}

	ul li {
		list-style-type: none;
		display: block;
		text-align: center;
		margin-left: -40px;

	}

	ul {
		margin-bottom: 0px;
	}

	.options {

	}

	tr td {
		padding: 5px;
		width: auto;
	}
</style>
<h3>
	<div style="text-align: center;"><span><img src="../dist/img/logo.jpg" style="float:left;" height="50" width="50"></span>Debre Tabor University
		<span><img src="../dist/img/logo.jpg" style="float:right;" height="50" width="50"></span>
	</div>
</h3>
<h4>
	<center>Faculty of Technology</center>
</h4>
<h5 align="center">

    <?php
    $query = mysqli_query($con,"select * from dept where dept_id  ='$_SESSION[dept_id]'");
    $roww = mysqli_fetch_array($query);
    $department = $roww['dept_name'];
    if ($member <> "") {
        $room = "";
        $class = "";
        $text = "Teacher";
        $value = $row['member_salut'] . " " . $row['member_first'] . " " . $row['member_last'];
        echo "TEACHER Schedule for department of <font style = 'color:blue'><b> ".$_SESSION['dept_name']."</b></font>";
        $displaym = "hideme";
        $displayr = "showme";
        $displayc = "showme";
    } elseif ($room <> "") {
        $member = "";
        $class = "";
        $text = "Room";
        $value = $room;
        echo "ROOM Schedule for department of<font style = 'color:blue'><b> ".$_SESSION['dept_name']."</b></font>";
        $displayr = "hideme";
        $displayc = "showme";
        $displaym = "showme";
    } elseif ($class <> "") {
        $room = "";
        $member = "";
        $text = "Students";
        $value = $class;
        echo "STUDENT Schedule for department of<font style = 'color:blue'><b> ".$_SESSION['dept_name']."</b></font>";;
        $displayc = "hideme";
        $displaym = "showme";
        $displayr = "showme";
    }
    ?>

</h5>
<h5 align="center" style="margin-top: -15px;margin-bottom: 10px">

	<span style="margin-right: 5px"><?php echo $text; ?>: </span>
	<span style="color: blue;margin-right: 15px;border-radius: 4px;border: 2px solid black;padding: 4px;">
        <?php echo $value; ?>
    </span>
	<span style="margin-right: 5px">School Year:</span>
	<span style="color: blue;margin-right: 15px">
        <?php echo $rows['sy']; ?>
    </span>
	<span style="margin-right: 5px">Semester: </span>
	<span style="color: blue;margin-right: 15px">
        <?php echo $rows['sem']; ?>
    </span>
</h5>
<hr style="border:2px solid blue;margin-bottom: 9px;">