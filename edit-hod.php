<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role != 'admin') {
    echo '<script> location.replace("login.php"); </script>';
}
if (isset($_GET['userId']) && $_GET['userId'] != '') {
    $userId = $_GET['userId'];
    $sql = "SELECT * FROM hod WHERE id = '$userId'";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
        }
    } else {
        echo '<script> location.replace("list-hod.php"); </script>';
    }
} else {
    echo '<script> location.replace("list-hod.php"); </script>';
}

// execute when update button clicked.
if (isset($_POST['updateBtn'])) {
    $fullName = $_POST['fullName'];
    $mobileNo = $_POST['mobileNo'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $address = $_POST['address'];
    $updatedAt = date("Y-m-d H:m:s");
    $userId = $_GET['userId'];

    $sql = "UPDATE hod SET 
        fullName = '$fullName', mobileNo = '$mobileNo', 
        gender = '$gender', department = '$department', 
        dob = '$dob', doj = '$doj', 
        address = '$address', updatedAt = '$updatedAt'
        WHERE id = '$userId'";
    if ($result = $mysqli->query($sql)) {
        // check if number of affected rows is greater than 0
        // that means update query has been successfully executed.
        if (mysqli_affected_rows($mysqli) > 0) {
            $_SESSION['success-msg'] = "HOD details has been successfully updated.";
            echo '<script> location.replace("list-hod.php"); </script>';
        }
    }

}

?>

<div class="page-heading">
    <div class="row">
        <div class="col-lg-6">
            <h1>Update HOD Details</h1>
        </div>
        <div class="col-lg-6 text-right">
            <a href="list-hod.php" class="btn btn-primary">
                HOD List
            </a>
        </div>
    </div>
</div>

<div class="edit-user">
    <form action="" method="post">
        <div class="form-group row align-items-center">
            <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control" name="fullName" id="fullName" placeholder="Enter Full Name" value="<?php echo $row['fullName'] ?>">
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="emailAddress" class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-10">
                <input type="email" readonly disabled required class="form-control" name="emailAddress" id="emailAddress" placeholder="Email Address" value="<?php echo $row['emailAddress'] ?>">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="mobileNo" class="col-sm-2 col-form-label">Moblie No</label>
            <div class="col-sm-10">
                <input type="tel" required class="form-control" name="mobileNo" id="mobileNo" placeholder="Enter Moblie No" value="<?php echo $row['mobileNo'] ?>">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select name="gender" required class="form-control" id="gender">
                    <option value="">Select Gender</option>
                    <option <?php echo $row['gender'] == 'male' ? 'selected' : '' ?> value="male">Male</option>
                    <option <?php echo $row['gender'] == 'female' ? 'selected' : '' ?> value="female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="department" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-10">
                <select name="department" required class="form-control" id="department">
                    <option  value="">Select Department</option>
                    <option <?php echo $row['department'] == 'b.tech' ? 'selected' : '' ?> value="b.tech">B.Tech</option>
                    <option <?php echo $row['department'] == 'm.tech' ? 'selected' : '' ?> value="m.tech">M.Tech</option>
                    <option <?php echo $row['department'] == 'bca' ? 'selected' : '' ?> value="bca">BCA</option>
                    <option <?php echo $row['department'] == 'mca' ? 'selected' : '' ?> value="mca">MCA</option>
                </select>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="dob" class="col-sm-2 col-form-label">Date Of Birth</label>
            <div class="col-sm-10">
                <input type="date" required class="form-control" name="dob" value="<?php echo $row['dob'] ?>" id="dob" >
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="doj" class="col-sm-2 col-form-label">Date Of Joining</label>
            <div class="col-sm-10">
                <input type="date" required class="form-control" name="doj" value="<?php echo $row['doj'] ?>" id="doj">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea type="date" class="form-control" name="address" id="address"><?php echo $row['address'] ?></textarea>
            </div>
        </div>

        <div class="form-group row align-items-center justify-content-center">
            <div class="col-3">
                <button type="submit" name="updateBtn" value="submit" class="btn btn-lg btn-primary w-100">Update</button>
            </div>
        </div>

    </form>
</div>
<?php
include 'footer.php';
?>
