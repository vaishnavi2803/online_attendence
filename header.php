<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
// check if user is login or not..
// if userdata is not set in session that means user is not login
// then user should be redirected to login page.
if (!isset($_SESSION['userData'])) {
    session_destroy();
    session_unset();
    echo '<script> location.replace("login.php"); </script>';
} else {

    // include database..
    include './db/db.php';

    $userData = $_SESSION['userData'];
    $userId = $userData['user_id'];
    $dashboardUrl = '';
    if ($userData['role'] == 'admin') {
        $sql = "SELECT * FROM admin WHERE id = '$userId'";
        $dashboardUrl = 'admin-dashboard.php';
    } else if ($userData['role'] == 'faculty') {
        $sql = "SELECT * FROM faculty WHERE id = '$userId'";
        $dashboardUrl = 'faculty-dashboard.php';
    } else if ($userData['role'] == 'hod') {
        $sql = "SELECT * FROM hod WHERE id = '$userId'";
        $dashboardUrl = 'hod-dashboard.php';
    } else if ($userData['role'] == 'student') {
        $sql = "SELECT * FROM student WHERE id = '$userId'";
        $dashboardUrl = 'dashboard.php';
    }

    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $name = isset($row['name']) ? $row['name'] : $row['fullName'];
            $role = ucfirst($userData['role']);
        }
        $result->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstarp JS and other JS files-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-wrapper d-flex align-items-center justify-content-between">
                <div class="logo-wrap">
                    <a href="<?php echo $dashboardUrl; ?>">
                        <img src="./assets/images/logo.png" alt="college logo">
                    </a>
                </div>
                <div class="user-info-wrap">
                    <div class="top-wrap">
                        <ul>
                            <li class="user-name">
                                <?php echo "$name [$role]"; ?>
                            </li>
                            <li class="mr-4" id="clockDisplay"></li>
                            <li class="logout">
                                <a href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="bottom-wrap">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $dashboardUrl; ?>">Home <span class="sr-only">(current)</span></a>
                                    </li>

                                    <!-- admin section -->
                                    <?php 
                                    if($userData['role'] == 'admin') {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin-profile.php">Profile</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            HOD Management
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="add-hod.php">Add HOD</a>
                                            <a class="dropdown-item" href="list-hod.php">View All HOD</a>
                                            
                                            
                                        </div>
                                    </li>
                                    <?php }?>

                                    <!-- hod section -->
                                    <?php 
                                    if($userData['role'] == 'hod') {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="hod-profile.php">Profile</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Faculty Management
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="add-faculty.php">Add New Faculty</a>
                                            <a class="dropdown-item" href="list-faculty.php">View All Faculty</a>
                                           
                                            
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Student Management
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="add-student.php">Add New Student</a>
                                            <a class="dropdown-item" href="list-student.php">View All Student</a>
                                            
                                        </div>
                                    </li>
                                    <?php }?>
                                    <!-- hod section -->

                                    <!-- faculty section -->
                                    <?php 
                                    if($userData['role'] == 'faculty') {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="faculty-profile.php">Profile</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Attendance Management
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="mark-attendance.php">Mark Attendance</a>
                                            <a class="dropdown-item" href="view-attendance.php">View Attendance</a>
                                            <a class="dropdown-item" href="update-attendance.php">Update Attendance</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Student Management
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="add-student.php">Add New Student</a>
                                            <a class="dropdown-item" href="list-student.php">View All Student</a>
                                        </div>
                                    </li>
                                    <?php }?>
                                    <!-- faculty section -->

                                    <!-- student section -->
                                    <?php 
                                    if($userData['role'] == 'student') {
                                    ?>
                                     <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Profile
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="student-profile.php">Show Profile</a>
                                            <a class="dropdown-item" href="edit-student-profile.php">Edit Profile</a>
                                        </div>
                                    </li>
                                    
                                   
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Attendance Management
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="view-today-attendance.php">View Today Attendance</a>
                                            <a class="dropdown-item" href="view-monthly-attendance.php">View Month wise Attendance</a>
                                        </div>
                                    </li>
                                    <?php }?>
                                    <!-- student section -->

                                    <li class="nav-item">
                                        <a class="nav-link" href="change-password.php">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="container">
