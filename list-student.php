<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role == 'hod' || $role == 'faculty') {
}else{
    echo '<script> location.replace("login.php"); </script>';
}

if(isset($_GET['deleteUserId']) && $_GET['deleteUserId'] != ''){
    $delete_userId = $_GET['deleteUserId'];
    $sql = "DELETE FROM student WHERE id = '$delete_userId'";
    $result= $mysqli->query($sql);

    $sql = "DELETE FROM login WHERE user_id = '$delete_userId' AND role = 'student'";
    $result= $mysqli->query($sql);
}


if (isset($_POST['submitBtn'])) {
    $whereCondition = "";
    $name = $_POST['name'];
    $year = $_POST['year'];
    $department = $_POST['department'];
    if ($department != '') {
        $whereCondition .= " AND department = '$department' ";
    }
    if ($year != '') {
        $whereCondition .= " AND year = '$year' ";
    }

    $sql = "SELECT * FROM student WHERE fullName LIKE '%$name%' " . $whereCondition . " ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM student ORDER BY id DESC";
}
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    }
}



?>

<div class="page-heading">
    <div class="row">
        <div class="col-3">
            <h1>Student List</h1>
        </div>
        <div class="col-6">
            <div class="text-success text-center font-weight-bold">
                <?php
if (isset($_SESSION['success-msg'])) {
    echo $_SESSION['success-msg'];
    unset($_SESSION['success-msg']);
}
?>
            </div>
        </div>
        <div class="col-3 text-right">
            <a href="add-student.php" class="btn btn-primary">
                Add New Student
            </a>
        </div>
    </div>
</div>

<div class="listing-page">
    <div class="row justify-content-md-center">
        <div class="col-lg-9">
            <form class="form-inline row" method="post" action="">
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control w-100" name="name" placeholder="Search by Name.." value="">
                        </div>
                        <div class="col">
                            <select name="department" class="form-control w-100" >
                                <option value="">Select Department</option>
                                <option value="b.tech">B.Tech</option>
                                <option value="m.tech">M.Tech</option>
                                <option value="bca">BCA</option>
                                <option value="mca">MCA</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="year" class="form-control w-100" >
                                <option value="">Select Year</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" name="submitBtn" value="submit" class="btn btn-primary mb-2 w-100">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Department</th>
                        <th scope="col">Year</th>
                        <th scope="col">Mobile No</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                <?php
if (isset($rows) && count($rows) > 0) {
    foreach ($rows as $key => $row) {
        $sNo = $key + 1;
        echo "<tr>
            <th>$sNo</th>
            <td>" . $row['fullName'] . "</td>
            <td>" . $row['emailAddress'] . "</td>
            <td>" . $row['department'] . "</td>
            <td>" . $row['year'] . "</td>
            <td>" . $row['mobileNo'] . "</td>
            <td>
                <a href='edit-student.php?userId=" . $row['id'] . "' class='btn btn-outline-primary btn-sm'>Edit</a>
                <a href='list-student.php?deleteUserId=" . $row['id'] . "' class='btn btn-outline-danger btn-sm'>delete</a>
            </td>
        </tr>";
    }
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>