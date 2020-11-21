<?php

session_start();

include('dist/includes/dbcon.php');

if (isset($_POST['login'])) {

    $user_unsafe = $_POST['username'];
    $pass_unsafe = $_POST['password'];

    $user = mysqli_real_escape_string($con, $user_unsafe);
    $pass = mysqli_real_escape_string($con, $pass_unsafe);

    /* $pass=md5($pass1);
      $salt="a1Bz20ydqelm8m1wql";
      $pass=$salt.$pass; */

    $query = mysqli_query($con, "select * from member where username='$user' and password='$pass' and status='teacher'")or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);

    $name = $row['member_salut'] . " " . $row['member_first'] . " " . $row['member_last'];
    $counter = mysqli_num_rows($query);
    $id = $row['member_id'];
    $status = $row['status'];
    $dept_id = $row['dept_id'];
    if ($counter == 0) {
        echo "<script type='text/javascript'>alert('Invalid Username or Password!');
          document.location='Instructor_index.php'</script>";
    } else {

        $query = mysqli_query($con, "select * from settings where status='active'")or die(mysqli_error());
        $row = mysqli_fetch_array($query);
        $q = mysqli_query($con, "select * from dept where dept_id='$dept_id'");
        $r = mysqli_fetch_array($q);
        $_SESSION['settings'] = $row['settings_id'];
        $_SESSION['term'] = $row['term'];
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['type'] = $status;
        $_SESSION['dept_code'] = $r['dept_code'];
        $_SESSION['dept_id'] = $dept_id;
        $_SESSION['dept_name'] = $r['dept_name'];

        if ($status == 'head') {

            echo "<script type='text/javascript'>document.location='pages/home.php'</script>";
        } else if ($status == 'teacher') {

            echo "<script type='text/javascript'>document.location='pages/faculty_home.php'</script>";
        }
        else if ($status =='faculty') {
            echo "<script type='text/javascript'>document.location='pages/faculty_code.php'</script>";
        } else {
            echo "<script type='text/javascript'>document.location='pages/student_home.php'</script>";
        }

        // echo "<script type='text/javascript'>document.location='pages/home.php'</script>";
    }
}
?>
