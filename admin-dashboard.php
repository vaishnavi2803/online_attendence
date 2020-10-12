<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if($role != 'admin'){
    echo '<script> location.replace("login.php"); </script>';
}
?>

<div class="page-heading">
    <div class="row">
        <div class="col-lg-6">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>
<div class="dashboard">
    <div class="card-deck">
    <div class="card">
        <a href="admin-profile.php">
            <div class="card-body text-center">
                <div class="image-wrap">
                    <img src="./assets/images/profile.png" alt="profile">
                </div>
                <h5 class="card-title">My Profile</h5>
            </div>
        </a>
    </div>
    <div class="card">
        <a href="list-hod.php">
            <div class="card-body text-center">
                <div class="image-wrap">
                    <img src="./assets/images/user.png" alt="HOD Management">
                </div>
                <h5 class="card-title">HOD Management</h5>
            </div>
        </a>
    </div>
    <div class="card">
        <a href="change-password.php">
            <div class="card-body text-center">
                <div class="image-wrap">
                    <img src="./assets/images/change-password.png" alt="change password">
                </div>
                <h5 class="card-title">Change Password</h5>
            </div>
        </a>
    </div>
    </div>
</div>

<?php
include 'footer.php';
?>