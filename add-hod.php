<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role != 'admin') {
    echo '<script> location.replace("login.php"); </script>';
}

if (isset($_POST['submitBtn'])) {
    $fullName = $_POST['fullName'];
    $emailAddress = $_POST['emailAddress'];
    $mobileNo = $_POST['mobileNo'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];
    $address = $_POST['address'];

    // fetch id from hod table where emailaddress is what we have entered..
    // this query is because when user want to add same entry multiple time then
    // there will be a prompt message that user is already exist.
    $sql = "SELECT id FROM hod WHERE emailAddress = '$emailAddress'";
    if ($result = $mysqli->query($sql)) {
        // check if there is no data exist in database table with same email id
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO
                    hod
                    (fullName, emailAddress, mobileNo, gender, department, dob, doj, address)
                    VALUES
                    ('$fullName', '$emailAddress', '$mobileNo', '$gender', '$department', '$dob', '$doj', '$address')";
            
            if ($result = $mysqli->query($sql)) {
                // get last inserted id.
                $insertId = $mysqli->insert_id;
        
                // by default we are setting all password to 111
                // we'll update it later when email functionality will been integrate.
                $password = md5('111');
                
                // data insert into login table.
                $sql = "INSERT INTO login (user_id, email , password, role) VALUES ('$insertId', '$emailAddress', '$password', 'hod')";
                if ($result = $mysqli->query($sql)) {
                    // check if number of affected rows is greater than 0
                    // that means insert query has been successfully executed.
                    if (mysqli_affected_rows($mysqli) > 0) {
                        $_SESSION['success-msg'] = "HOD has been successfully created.";
                        echo '<script> location.replace("list-hod.php"); </script>';
                    }
                }
            }
        }else {
            $_SESSION['error-msg'] = "$emailAddress is already registered.";
        }
    }

}

?>

<div class="page-heading">
    <div class="row">
        <div class="col-6">
            <h1>Add HOD Details</h1>
        </div>
        <div class="col-6 text-right">
            <a href="list-hod.php" class="btn btn-primary">
                HOD List
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
        <div class="form-group row align-items-center">
            <label for="emailAddress" class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-10">
                <input type="email" required class="form-control" name="emailAddress" id="emailAddress" placeholder="Email Address">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="mobileNo" class="col-sm-2 col-form-label">Moblie No</label>
            <div class="col-sm-10">
                <input type="tel" required class="form-control" name="mobileNo" id="mobileNo" placeholder="Enter Moblie No">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select name="gender" required class="form-control" id="gender">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="department" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-10">
                <select name="department" required class="form-control" id="department">
                    <option value="">Select Department</option>
                    <option value="b.tech">B.Tech</option>
                    <option value="m.tech">M.Tech</option>
                    <option value="bca">BCA</option>
                    <option value="mca">MCA</option>
                </select>
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="dob" class="col-sm-2 col-form-label">Date Of Birth</label>
            <div class="col-sm-10">
                <input type="date" required class="form-control" name="dob" id="dob" >
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="doj" class="col-sm-2 col-form-label">Date Of Joining</label>
            <div class="col-sm-10">
                <input type="date" required class="form-control" name="doj" id="doj">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <textarea type="date" class="form-control" name="address" id="address"></textarea>
            </div>
        </div>

        <div class="form-group row align-items-center justify-content-center">
        <div class="col-12">
                <div class="text-danger">
                <?php
if (isset($_SESSION['error-msg'])) {
    echo $_SESSION['error-msg'];
    unset($_SESSION['error-msg']);
}
?>
                </div>
            </div>
            <div class="col-3">
                <button type="submit" name="submitBtn" value="submit" class="btn btn-lg btn-primary w-100">Submit</button>
            </div>
        </div>

    </form>
</div>
<?php
include 'footer.php';
?>
