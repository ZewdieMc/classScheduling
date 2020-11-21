<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('dist/includes/title.php'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap2/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- <link rel="stylesheet" href="../dist/css/AdminLTE.css"> -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <script src="dist/js/jquery.min.js"></script>
</head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition login-page" style="background:lightblue;background-image: url('sched_back.jpg');">
        <div class="header">
           <img src="dist/img/header.png" alt="site logo goes here." style="height: 170px;width: 100%;">
        </div>
        <?php include('dist/includes/header_login.php'); ?>


<!-- bootstrap loing -->
<div class="login-form">    
    <form action="admin_login.php" method="post">
             <img src="dist/img/logo.png"alt="University logo appears here." height="50" width="50">
        <h4 class="modal-title">Department Head Login</h4>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
        </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" class="btn btn-success btn-lg" name="login" default>Sign In</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
        <button type="reset" class="btn btn-danger btn-lg">Clear</button>
       
    </form>         
</div>
<!-- bootstrap loing -->

     <script type="text/javascript" src="autosum.js"></script>
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="dist/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.5 -->

<script src="bootstrap2/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../bootstrap2/js/bootstrap.min.js"></script> -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    </body>
</html>
<style type="text/css">
    

 .form-control {
        box-shadow: none;
        border-color: green;
    }
    .form-control:focus {
        border-color: #4aba70; 
    }
    .login-form {
        width: 350px;
        margin: 0 auto;
        margin-top: 30px;
        border-radius: 10px;
        background-color: transparent;
    }
    .login-form form {
        color: #434343;
        border-radius: 1px;
        margin-bottom: 15px;
        background: #fff;
        border: 1px solid #f3f3f3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
        border-radius: 10px;
    }
   
    .login-form h4 {
        text-align: center;
        font-size: 18px;
        margin-bottom: 20px;
    }
   
    }
    .login-form .avatar i {
        font-size: 62px;
    }
    .login-form .form-group {
        margin-bottom: 20px;
    }
    .login-form .form-control, .login-form {
        min-height: 40px;
        border-radius: 10px; 
        
    }
    .login-form img{
        margin-left: 40%;
    }
    .login-form .close {
        position: absolute;
        top: 15px;
        right: 15px;
    }
    .login-form  {
        background: #4aba70;
        border: none;
        line-height: normal;
    }
    
    .login-form .checkbox-inline {
        float: left;
    }
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .forgot-link {
        float: right;
    }
    .login-form .small {
        font-size: 13px;
    }
    .login-form a {
        color: #4aba70;
    }
</style>