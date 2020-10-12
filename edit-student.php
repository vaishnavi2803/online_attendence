<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role == 'hod' || $role == 'faculty') {
} else {
    echo '<script> location.replace("login.php"); </script>';
}
if (isset($_GET['userId']) && $_GET['userId'] != '') {
    $userId = $_GET['userId'];
    $sql = "SELECT * FROM student WHERE id = '$userId'";
    if ($result = $mysqli->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
        }
    } else {
        echo '<script> location.replace("list-student.php"); </script>';
    }
} else {
    echo '<script> location.replace("list-student.php"); </script>';
}

// execute when update button clicked.
if (isset($_POST['updateBtn'])) {
    $fullName = $_POST['fullName'];
    $mobileNo = $_POST['mobileNo'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $fatherName = $_POST['fatherName'];
    $fatherMobile = $_POST['fatherMobile'];
    $motherName = $_POST['motherName'];
    $motherMobile = $_POST['motherMobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $updatedAt = date("Y-m-d H:m:s");
    $userId = $_GET['userId'];

    $sql = "UPDATE student   SET
        fullName = '$fullName',
        mobileNo = '$mobileNo',
        gender = '$gender',
        department = '$department',
        year = '$year',
        semester = '$semester',
        dob = '$dob',
        doj = '$doj',
        fatherName = '$fatherName',
        fatherMobile = '$fatherMobile',
        motherName = '$motherName',
        motherMobile = '$motherMobile',
        address = '$address',
        city = '$city',
        pincode = '$pincode',
        updatedAt = '$updatedAt'
        WHERE id = '$userId'";

    if ($result = $mysqli->query($sql)) {
        // check if number of affected rows is greater than 0
        // that means update query has been successfully executed.
        if (mysqli_affected_rows($mysqli) > 0) {
            $_SESSION['success-msg'] = "Student details has been successfully updated.";
            echo '<script> location.replace("list-student.php"); </script>';
        }
    }

}

?>

<div class="page-heading">
    <div class="row">
        <div class="col-6">
            <h1>Update Student Details</h1>
        </div>
        <div class="col-6 text-right">
            <a href="list-student.php" class="btn btn-primary">
                Student List
            </a>
        </div>
    </div>
</div>
<div class="add-new-user">
    <form action="" method="post">
        <div class="form-group row align-items-center">
            <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control" name="fullName" value="<?php echo $row['fullName'] ?>" id="fullName" placeholder="Enter Full Name">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="emailAddress" class="col-sm-4 col-form-label">Email Address</label>
                    <div class="col-sm-8">
                        <input type="email" disabled readonly class="form-control" name="emailAddress" value="<?php echo $row['emailAddress'] ?>" id="emailAddress" placeholder="Email Address">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="mobileNo" class="col-sm-4 col-form-label">Moblie No</label>
                    <div class="col-sm-8">
                        <input type="tel" required class="form-control" name="mobileNo" value="<?php echo $row['mobileNo'] ?>" id="mobileNo" placeholder="Enter Moblie No">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                        <select name="gender" value="<?php echo $row['gender'] ?>" required class="form-control" id="gender">
                            <option value="">Select Gender</option>
                            <option <?php echo $row['gender'] == 'male' ? 'selected' : '' ?> value="male">Male</option>
                            <option <?php echo $row['gender'] == 'female' ? 'selected' : '' ?> value="female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="department" class="col-sm-4 col-form-label">Department</label>
                    <div class="col-sm-8">
                        <select name="department" value="<?php echo $row['department'] ?>" required class="form-control" id="department">
                            <option value="">Select Department</option>
                            <option <?php echo $row['department'] == 'b.tech' ? 'selected' : '' ?> value="b.tech">B.Tech</option>
                            <option <?php echo $row['department'] == 'm.tech' ? 'selected' : '' ?> value="m.tech">M.Tech</option>
                            <option <?php echo $row['department'] == 'bca' ? 'selected' : '' ?> value="bca">BCA</option>
                            <option <?php echo $row['department'] == 'mca' ? 'selected' : '' ?> value="mca">MCA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="year" class="col-sm-4 col-form-label">Year</label>
                    <div class="col-sm-8">
                        <select name="year" required class="form-control" id="year">
                            <option value="">Select Year</option>
                            <option <?php echo $row['year'] == '1' ? 'selected' : '' ?> value="1">1st Year</option>
                            <option <?php echo $row['year'] == '2' ? 'selected' : '' ?> value="2">2nd Year</option>
                            <option <?php echo $row['year'] == '3' ? 'selected' : '' ?> value="3">3rd Year</option>
                            <option <?php echo $row['year'] == '4' ? 'selected' : '' ?> value="4">4th Year</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
            <div class="form-group row align-items-center">
                    <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                    <div class="col-sm-8">
                        <select name="semester" required class="form-control" id="semester">
                            <option value="">Select Semester</option>
                            <option <?php echo $row['semester'] == '1' ? 'selected' : '' ?> value="1">1st Year</option>
                            <option <?php echo $row['semester'] == '2' ? 'selected' : '' ?> value="2">2nd Year</option>
                            <option <?php echo $row['semester'] == '3' ? 'selected' : '' ?> value="3">3rd Year</option>
                            <option <?php echo $row['semester'] == '4' ? 'selected' : '' ?> value="4">4th Year</option>
                            <option <?php echo $row['semester'] == '5' ? 'selected' : '' ?> value="5">5th Year</option>
                            <option <?php echo $row['semester'] == '6' ? 'selected' : '' ?> value="6">6th Year</option>
                            <option <?php echo $row['semester'] == '7' ? 'selected' : '' ?> value="7">7th Year</option>
                            <option <?php echo $row['semester'] == '8' ? 'selected' : '' ?> value="8">8th Year</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="dob" class="col-sm-4 col-form-label">Date Of Birth</label>
                    <div class="col-sm-8">
                        <input type="date" required class="form-control" name="dob" value="<?php echo $row['dob'] ?>" id="dob" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="doj" class="col-sm-4 col-form-label">Date Of Joining</label>
                    <div class="col-sm-8">
                        <input type="date" required class="form-control" name="doj" value="<?php echo $row['doj'] ?>" id="doj">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="fatherName" class="col-sm-4 col-form-label">Father Name</label>
                    <div class="col-sm-8">
                        <input type="text" required class="form-control" name="fatherName" value="<?php echo $row['fatherName'] ?>" id="fatherName" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="fatherMobile" class="col-sm-4 col-form-label">Father Mobile No</label>
                    <div class="col-sm-8">
                        <input type="tel" required class="form-control" name="fatherMobile" value="<?php echo $row['fatherMobile'] ?>" id="fatherMobile">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="motherName" class="col-sm-4 col-form-label">Mother Name</label>
                    <div class="col-sm-8">
                        <input type="text" required class="form-control" name="motherName" value="<?php echo $row['motherName'] ?>" id="motherName" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="motherMobile" class="col-sm-4 col-form-label">Mother Mobile No</label>
                    <div class="col-sm-8">
                        <input type="tel" required class="form-control" name="motherMobile" value="<?php echo $row['motherMobile'] ?>" id="motherMobile">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea type="date" class="form-control" name="address" id="address"><?php echo $row['address'] ?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="city" class="col-sm-4 col-form-label">City</label>
                    <div class="col-sm-8">
                        <input type="text" required class="form-control" name="city" value="<?php echo $row['city'] ?>" id="city" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="pincode" class="col-sm-4 col-form-label">Pincode</label>
                    <div class="col-sm-8">
                        <input type="tel" required class="form-control" name="pincode" value="<?php echo $row['pincode'] ?>" id="pincode">
                    </div>
                </div>
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
