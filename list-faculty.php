<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role != 'hod') {
    echo '<script> location.replace("login.php"); </script>';
}

if(isset($_GET['deleteUserId']) && $_GET['deleteUserId'] != ''){
    $delete_userId = $_GET['deleteUserId'];
    $sql = "DELETE FROM faculty WHERE id = '$delete_userId'";
    $result= $mysqli->query($sql);

    $sql = "DELETE FROM login WHERE user_id = '$delete_userId' AND role = 'faculty'";
    $result= $mysqli->query($sql);
}

if (isset($_POST['submitBtn'])) {
    $name = $_POST['name'];
    $sql = "SELECT * FROM faculty WHERE fullName LIKE '%$name%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM faculty ORDER BY id DESC";
}
if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    }
}
if(isset($_GET['deleteUserId']) && $_GET['deleteUserId'] != ''){
    $delete_userId = $_GET['deleteUserId'];
    $sql = "DELETE FROM faculty WHERE id = '$delete_userId'";
    $result= $mysqli->query($sql);

    $sql = "DELETE FROM login WHERE user_id = '$delete_userId' AND role = 'faculty'";
    $result= $mysqli->query($sql);
}

?>

<div class="page-heading">
    <div class="row">
        <div class="col-3">
            <h1>Faculty List</h1>
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
            <a href="add-faculty.php" class="btn btn-primary">
                Add New Faculty
            </a>
        </div>
    </div>
</div>

<div class="listing-page">
    <div class="row justify-content-md-center">
        <div class="col-lg-7">
            <form class="form-inline row" method="post" action="">
                <div class="col-8">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name" class="sr-only">Search</label>
                        <input type="text" class="form-control w-100" name="name" id="name" placeholder="Search by Name.." value="">
                    </div>
                </div>
                <div class="col-4">
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
                        <th scope="col">Mobile No</th>
                        <th scope="col">subject</th>
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
            <td>" . $row['mobileNo'] . "</td>
            <td>" . $row['subject'] . "</td>
            <td>
                <a href='edit-faculty.php?userId=" . $row['id'] . "' class='btn btn-outline-primary btn-sm'>Edit</a>
                <a href='list-faculty.php?deleteUserId=" . $row['id'] . "' class='btn btn-outline-danger btn-sm'>delete</a>
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