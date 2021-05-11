
  <?php
  ob_start();
    include "../db.php";

  ?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post"action="<?= $_SERVER['PHP_SELF']?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="First Name" name="fname">
                                <i class="fa fa-user"></i>
                            </span>
                             </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="User Name" name="username">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>

                        
                            <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="User Role" name="roll">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                            <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Reg. No." name="reg">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Phone No." name="phone">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        
                       
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" name="student_register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="login.php">Sign In</a>
                        </div>
                    </form>

             <?php
              
          if (isset($_POST['student_register'])) {

              $fname      =   $_POST['fname'];
              $lname      =   $_POST['lname'];
              $email      =   $_POST['email'];
              $username   =   $_POST['username'];
              $password   =   $_POST['password'];
              $roll       =   $_POST['roll'];
              $reg        =   $_POST['reg'];
              $phone      =   $_POST['phone'];

              $sql = "SELECT * FROM students WHERE email = '$email'";
              $registerUser = mysqli_query($db, $sql);
              $emailCount = mysqli_num_rows($registerUser);

              if ($emailCount > 0 ) {
                echo "This email already exist.";
              }
              else{



             $passwordHash   =  password_hash($password, PASSWORD_DEFAULT);

              $sql = "INSERT INTO students (fname, lname, email, username, password, roll, reg, status, phone) VALUES ('$fname', '$lname', '$email', '$username', '$passwordHash', '$roll', '$reg', '0', '$phone')";

              $AddStudent = mysqli_query($db, $sql);
              if ($AddStudent) { 
            
                
              header("Location:login.php");

              }
              else{
                 
                die("database not connected ".mysqli_error($db));
              }
                  
               } 
               }
              

           

          ?>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<?php

ob_end_flush();

?>
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>
