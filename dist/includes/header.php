<?php

if (empty($_SESSION['id'])):
    header('Location:../index.php');
endif;
date_default_timezone_set("Asia/Manila");

if ($_SESSION['type'] == "faculty") {
    include('../dist/includes/header_dean.php');
}
else if ($_SESSION['type'] == "head") {
    include('../dist/includes/header_admin.php');
} else if ($_SESSION['type'] == "teacher") {
    include('../dist/includes/header_faculty.php');
} else {
    include ('../dist/includes/header_student.php');
}
?>


