<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role != 'admin') {
    echo '<script> location.replace("login.php"); </script>';
}
?>

<div class="page-heading">
    <div class="row">
        <div class="col-lg-6">
            <h1>My Profile</h1>
        </div>
    </div>
</div>

<div class="my-profile">
    <div class="card">
        <div class="card-header">
            Admin Profile
        </div>
        <div class="card-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">Label</th>
                <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th>Name</th>
                <td><?php echo $row['name'] ?></td>
                </tr>
                <tr>
                <th>Role</th>
                <td><?php echo $role; ?></td>
                </tr>
                <tr>
                <th>Email Id</th>
                <td><?php echo $userData['email']; ?></td>
                </tr>
                <tr>
                <th>Mobile No</th>
                <td><?php echo $row['mobile_no']; ?></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>