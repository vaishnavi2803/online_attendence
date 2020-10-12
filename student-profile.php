<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role != 'student') {
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
            Student Profile
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
                <td><?php echo $row['fullName'] ?></td>
                </tr>
                <tr>
                <th>Role</th>
                <td><?php echo $role; ?></td>
                </tr>
                <tr>
                <th>Email Id</th>
                <td><?php echo $row['emailAddress']; ?></td>
                </tr>
                <tr>
                <th>Mobile No</th>
                <td><?php echo $row['mobileNo']; ?></td>
                </tr>
                <tr>
                <th>Gender</th>
                <td><?php echo $row['gender']; ?></td>
                </tr>
                <tr>
                <th>Department</th>
                <td><?php echo $row['department']; ?></td>
                </tr>
                <tr>
                <th>Year</th>
                <td><?php echo $row['year']; ?></td>
                </tr>
                <tr>
                <th>Semester</th>
                <td><?php echo $row['semester']; ?></td>
                </tr>
                <tr>
                <th>Date of Birth</th>
                <td><?php echo $row['dob']; ?></td>
                </tr>
                <tr>
                <th>Date of Joining</th>
                <td><?php echo $row['doj']; ?></td>
                </tr>
                <tr>
                <th>Father Name</th>
                <td><?php echo $row['fatherName']; ?></td>
                </tr>
                <tr>
                <th>Father Mobile</th>
                <td><?php echo $row['fatherMobile']; ?></td>
                </tr>
                <tr>
                <th>Mother Name</th>
                <td><?php echo $row['motherName']; ?></td>
                </tr>
                <tr>
                <th>Mother Name</th>
                <td><?php echo $row['motherMobile']; ?></td>
                </tr>
                <tr>
                <th>Address</th>
                <td><?php echo $row['address']; ?></td>
                </tr>
                <tr>
                <th>City</th>
                <td><?php echo $row['city']; ?></td>
                </tr>
                <tr>
                <th>Pincode</th>
                <td><?php echo $row['pincode']; ?></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>