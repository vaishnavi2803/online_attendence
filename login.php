<?php
session_start();
include './db/db.php';
// check if userData is already set that means user is already login
// then user should be redirect to it's dashboard page.
if(isset($_SESSION['userData'])){
    $userData = $_SESSION['userData'];
    if ($userData['role'] == 'admin') {
        header('location:admin-dashboard.php');
    } else if ($userData['role'] == 'faculty') {
        header('location:faculty-dashboard.php');
    } else if ($userData['role'] == 'hod') {
        header('location:hod-dashboard.php');
    } else if ($userData['role'] == 'student') {
        header('location:dashboard.php');
    }
}

// this if condition is only executed when user click on submit button
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['submit'])) {
    if ($_POST['email'] != "" && $_POST['password'] != "") {
        $emailId = $_POST['email'];
        $password = md5($_POST['password']);
        $userType = $_POST['usertype'];

        $sql = "SELECT * FROM login WHERE email = '$emailId' AND password = '$password' AND role = '$userType'";
        if ($result = $mysqli->query($sql)) {
if ($result->num_rows > 0) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $_SESSION['userData'] = $row;
                if ($row['role'] == 'admin') {
                    header('location:admin-dashboard.php');
                } else if ($row['role'] == 'faculty') {
                    header('location:faculty-dashboard.php');
                } else if ($row['role'] == 'hod') {
                    header('location:hod-dashboard.php');
                } else if ($row['role'] == 'student') {
                    header('location:dashboard.php');
                }
            } else {
                $_SESSION['error-msg'] = "Please enter valid email id and password";
            }
            $result->close();
        }
    } else {
        $_SESSION['error-msg'] = "Please enter email id and password";
    }
}
?>


<!--HTML5 declaration -->
<!DOCTYPE>
<html>
<head>
    <!-- All Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>login form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstarp JS and other JS files-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./assets/styles/login.css">


</head>

<body>
    <div class="login-page-wrapper">
        <div class="page-container">
            <div class="left-wrap">
                <div class="text-wrap">
                    <h1>Welcome to</h1>
                    <h2>Online Attendance Portal</h2>
                </div>
                  <div class="image-wrap">
                    <img src="./assets/images/login-page-image.png" alt="login-page-image.png">
                </div>
            </div>
            <div class="right-wrap">
                <div class="form-wrapper">
                    <div class="align-items-center d-flex justify-content-between mb-3">
                        <h3>Login</h3>
                        <a href="registration.php" class="float-right btn btn-outline-primary">Register</a>
                    </div>
                    <form action="login.php" method="post">
                        <div class="form-group d-flex align-items-center">
                            <span class="mr-3">
                                User:-
                            </span>
                            <!--radio button-->
                            <div class="form-check-inline">
                                <input type="radio" name="usertype" value="student" id="student" class="form-check-input" checked>
                                <label class="form-check-label" for="student">Student</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" name="usertype" value="faculty" id="faculty" class="form-check-input">
                                <label class="form-check-label" for="faculty">Faculty</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" name="usertype" value="hod" id="hod" class="form-check-input">
                                <label class="form-check-label" for="hod">HOD</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" name="usertype" value="admin" id="admin" class="form-check-input">
                                <label class="form-check-label" for="admin">Admin</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email Id</label>
                            <input name="email" class="form-control" id="user" placeholder="Enter your email ids" type="text">
                        </div>
                        <!-- form-group -->
                        <div class="form-group">
                            <a class="float-right" href="#">Forgot?</a>
                            <label>Your password</label>
                            <input class="form-control" name="password" placeholder="******" type="password">
                        </div>
                        <!-- form-group -->
                        <div class="form-group">
                            <div class="checkbox">
                                <label> <input type="checkbox"> Save password </label>
                            </div>
                            <!-- checkbox -->
                        </div>
                        <!-- form-group -->
                        <div class="form-group">
                            <p style="color:red;">
                                <?php
if (isset($_SESSION['error-msg'])) {
    echo $_SESSION['error-msg'];
    unset($_SESSION['error-msg']);
}
?>
                            </p>
                            <button type="submit" name="submit" value="login" class="btn btn-primary btn-block"> Login  </button>
                        </div>
                        <!-- form-group -->
                        <!-- <hr />
                        Already have an account? <a href="registration.php">Click here </a>to login. -->
                </div>
                
                </form>

            </div>
        </div>
    </div>
    </div>
    <?php
include 'footer.php';
?>