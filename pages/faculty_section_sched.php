<?php
session_start();
if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
?>
<?php error_reporting(0); ?>
<!DOCTYPE hmtl>
<html>
    <head>
        <link rel="stylesheet" href="../dist/css/print.css" media="print">
        <script src="../dist/js/jquery.min.js"></script>
        <title>Student Schedule</title>
    </head>
    <body>
        <?php
        include('../dist/includes/dbcon.php');
        ?>
        <script type="text/javascript" charset="utf-8">
            jQuery(document).ready(function() {

            window.print()

                    )};
        </script>

        <div class="wrapper_print">
            <?php
            $class = $_REQUEST['id'];
            $sid = $_SESSION['settings'];

            $search = mysqli_query($con, "select * from member where member_id='$member'")or die(mysqli_error($con));
            $row = mysqli_fetch_array($search);

            $settings = mysqli_query($con, "select * from settings where settings_id='$sid'")or die(mysqli_error($con));
            $rows = mysqli_fetch_array($settings);

            include('../dist/includes/report_header.php');
            include('../dist/includes/report_body.php');

            include('../dist/includes/report_footer.php');
            ?>


    </body>
    <script src="jquery.js"></script>

</html>
