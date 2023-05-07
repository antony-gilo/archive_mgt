<?php
session_start();

error_reporting(error_reporting() & ~E_NOTICE);

include('connection.php');

$_SESSION['names'] = NULL;
$_SESSION['username'] = NULL;
$_SESSION['id-archive'] = NULL;
unset($_SESSION['names']);
unset($_SESSION['username']);
unset($_SESSION['id-archive']);
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">

<head>
    <!-- META SECTION -->
    <title>Archive Management</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>
    <?php

    if (isset($_POST['email'])) {

        $supplied_password = htmlentities($_POST['password']);

        $query = "SELECT * FROM users WHERE  email ='" . $_POST['email'] . "'";

        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);

        $row = mysqli_fetch_array($result);
        $hashed_password = $row['password'];

        $verify = password_verify($supplied_password, $hashed_password);
        // var_dump($verify);
        // exit;

        if ($count === 0 || !$verify) {
            echo "<font color='red'>Wrong Email  or Password Given</font>";
        } else {
            $_SESSION['names'] = $row['names'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['id-archive'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['email'] = $row['email'];

    ?>

            <script type="text/javascript">
                window.location = "index.php";
            </script>

    <?php
        }
    }



    ?>
    <form class="form-horizontal" method="post" action="#">
        <div class="login-container">

            <div class="login-box animated fadeInDown">

                <div class="login-body">
                    <h3 style="color: azure;"> TAL ARCHIVE MANAGEMENT SYSTEM </h3>
                    <br>
                    <hr>
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="index.html" class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" name='email' placeholder="Email Address" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" name='password' placeholder="Password" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-info btn-block">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?php echo date('Y') ?> TAL Admin Portal
                    </div>

                </div>
            </div>

        </div>
    </form>

</body>

</html>