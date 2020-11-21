<?php
session_start();
if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
    <body>
        <div style="width:150px;margin:auto;height:500px;margin-top:300px">
            <?php
            include('../dist/includes/dbcon.php');
            //$date = date("Y-m-d H:i:s");
            //$id=$_SESSION['id'];
            //$remarks="has logged out the system at ";
            //mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));

            session_destroy();
            $type = $_SESSION['type'];
            switch ($type) {
                case 'head':
                    echo '<meta http-equiv="refresh" content="2;url=../admin_index.php">';
                    break;
                 case 'faculty':
                    echo '<meta http-equiv="refresh" content="2;url=../faculty_dean_index.php">';
                    break;   
                 case 'teacher':
                    echo '<meta http-equiv="refresh" content="2;url=../Instructor_index.php">';
                    break;                               
                default:
                    echo '<meta http-equiv="refresh" content="2;url=../index.php">';
                    break;
            }
            // echo '<meta http-equiv="refresh" content="2;url=../index.php">';
            echo'<progress max=100><strong>Progress: 90% done. </strong></progress><br>';
            echo'<span class="itext">Logging out please wait!...</span>';
            ?>
        </div>
    </body>
</html>
