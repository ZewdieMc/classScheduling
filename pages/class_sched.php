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
            if (isset($_POST['search'])) {
                $class = $_POST['class'];
            }
            $sid = $_SESSION['settings'];

            $settings = mysqli_query($con, "select * from settings where settings_id='$sid'")or die(mysqli_error($con));
            $rows = mysqli_fetch_array($settings);

            include('../dist/includes/report_header.php');
            include('../dist/includes/report_body.php');
            include('../dist/includes/report_footer.php');
            ?>


    </body>
    <script src="jquery.js"></script>
    <script type="text/javascript">
                    $(function() {
                    $(".delete").click(function(){
                    var element = $(this);
                            var del_id = element.attr("id");
                            var info = 'id=' + del_id;
                            if (confirm("Are you sure you want to delete this?"))
                    {
                    $.ajax({
                    type: "POST",
                            url: "class_sched_del.php",
                            data: info,
                            success: function(){
                            }
                    });
                            $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
                            .animate({ opacity: "hide" }, "slow");
                    }
                    return false;
                    });
                    });
    </script>
</html>
