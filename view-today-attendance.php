<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role != 'student') {
    echo '<script> location.replace("login.php"); </script>';
}
$userId = $userData['user_id'];
$date = date('Y-m-d');
$sql = "SELECT * FROM attendance WHERE userId = '$userId' AND date = '$date'";
$result = $mysqli->query($sql);
$isPresent = $result->num_rows > 0 ? 1 : 0;
?>

<div class="page-heading">
    <div class="row">
        <div class="col-lg-6">
            <h1>Today Attendance</h1>
        </div>
    </div>
</div>
<div class="today-attendance">
    <?php 
        if($isPresent){
    ?>
        <div class="text-center h1 text-success">
            Present
        </div>
    <?php
        }
    ?>

    <?php 
        if(!$isPresent){
    ?>
        <div class="text-center h1 text-danger">
            Absent
        </div>
    <?php
        }
    ?>
</div>
<?php
include 'footer.php';
?>