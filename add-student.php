<?php
include 'header.php';
ob_start();
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role == 'hod' || $role == 'faculty') {
}else{
    echo '<script> location.replace("login.php"); </script>';
}



if (isset($_POST['submitBtn'])) {
    $fullName = $_POST['fullName'];
    $emailAddress = $_POST['emailAddress'];
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

    // fetch id from student table where emailaddress is what we have entered..
    // this query is because when user want to add same entry multiple time then
    // there will be a prompt message that user is already exist.
    $sql = "SELECT id FROM student WHERE emailAddress = '$emailAddress'";
    if ($result = $mysqli->query($sql)) {
        // check if there is no data exist in database table with same email id
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO
            student
            (fullName, emailAddress, mobileNo, gender, department, year, semester, dob, doj, fatherName, fatherMobile, motherName, motherMobile, address, city, pincode)
            VALUES
            ('$fullName', '$emailAddress', '$mobileNo', '$gender', '$department', '$year', '$semester', '$dob', '$doj', '$fatherName', '$fatherMobile', '$motherName', '$motherMobile', '$address', '$city', '$pincode')";
            if ($result = $mysqli->query($sql)) {
                // get last inserted id.
                $insertId = $mysqli->insert_id;

                // by default we are setting all password to 111
                // we'll update it later when email functionality will been integrate.
                $password = md5('111');

                // data insert into login table.
                $sql = "INSERT INTO login (user_id, email , password, role) VALUES ('$insertId', '$emailAddress', '$password', 'student')";
                if ($result = $mysqli->query($sql)) {
                    // check if number of affected rows is greater than 0
                    // that means insert query has been successfully executed.
                    if (mysqli_affected_rows($mysqli) > 0) {
                        $_SESSION['success-msg'] = "Student has been successfully created.";
                        echo '<script> location.replace("list-student.php"); </script>';
                    }
                }
            }
        } else {
            $_SESSION['error-msg'] = "$emailAddress is already registered.";
        }
    }
}
?>

<div class="page-heading">
    <div class="row">
        <div class="col-3">
            <h1>Add Student Details</h1>
        </div>
        <div class="col-6">
            <div class="text-danger font-bold">
                <?php
if (isset($_SESSION['error-msg'])) {
    echo $_SESSION['error-msg'];
    unset($_SESSION['error-msg']);
}
?>
                </div>
        </div>
        <div class="col-3 text-right">
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
                <input type="text" required class="form-control" name="fullName" id="fullName" placeholder="Enter Full Name">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="emailAddress" class="col-sm-4 col-form-label">Email Address</label>
                    <div class="col-sm-8">
                        <input type="email" required class="form-control" name="emailAddress" id="emailAddress" placeholder="Email Address">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="mobileNo" class="col-sm-4 col-form-label">Moblie No</label>
                    <div class="col-sm-8">
                        <input type="tel" required class="form-control" name="mobileNo" id="mobileNo" placeholder="Enter Moblie No">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                        <select name="gender" required class="form-control" id="gender">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="department" class="col-sm-4 col-form-label">Department</label>
                    <div class="col-sm-8">
                        <select name="department" required class="form-control" id="department">
                            <option value="">Select Department</option>
                            <option value="b.tech">B.Tech</option>
                            <option value="m.tech">M.Tech</option>
                            <option value="bca">BCA</option>
                            <option value="mca">MCA</option>
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
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
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
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="5">5th</option>
                            <option value="6">6th</option>
                            <option value="7">7th</option>
                            <option value="8">8th</option>
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
                        <input type="date" required class="form-control" name="dob" id="dob" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="doj" class="col-sm-4 col-form-label">Date Of Joining</label>
                    <div class="col-sm-8">
                        <input type="date" required class="form-control" name="doj" id="doj">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="fatherName" class="col-sm-4 col-form-label">Father Name</label>
                    <div class="col-sm-8">
                        <input type="text" required class="form-control" name="fatherName" id="fatherName" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="fatherMobile" class="col-sm-4 col-form-label">Father Mobile No</label>
                    <div class="col-sm-8">
                        <input type="tel" required class="form-control" name="fatherMobile" id="fatherMobile">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="motherName" class="col-sm-4 col-form-label">Mother Name</label>
                    <div class="col-sm-8">
                        <input type="text" required class="form-control" name="motherName" id="motherName" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="motherMobile" class="col-sm-4 col-form-label">Mother Mobile No</label>
                    <div class="col-sm-8">
                        <input type="tel" required class="form-control" name="motherMobile" id="motherMobile">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group row align-items-center">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea type="date" class="form-control" name="address" id="address"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="city" class="col-sm-4 col-form-label">City</label>
                    <div class="col-sm-8">
                        <input type="text" required class="form-control" name="city" id="city" >
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group row align-items-center">
                    <label for="pincode" class="col-sm-4 col-form-label">Pincode</label>
                    <div class="col-sm-8">
                        <input type="tel" required class="form-control" name="pincode" id="pincode">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row align-items-center justify-content-center">
            <div class="col-3">
                <button type="submit" name="submitBtn" value="submit" class="btn btn-lg btn-primary w-100">Submit</button>
            </div>
        </div>

    </form>
</div>
<?php
include 'footer.php';
?>