<?php
include 'header.php';

// execute when user click on submit button
if (isset($_POST['submit'])) {
    // check if old password, new password and confirm password is filled or not
    if ($_POST['old-password'] != '' && $_POST['new-password'] != '' && $_POST['confirm-password'] != '') {
        $oldPassword = md5($_POST['old-password']);
        $newPassword = $_POST['new-password'];
        $confirmPassword = $_POST['confirm-password'];

        // check if entered new password is same as confirm password.
        if ($newPassword == $confirmPassword) {
            // check if old password is same as already saved password in database.
            if ($userData['password'] == $oldPassword) {
                $userId = $userData['user_id'];
                $newPassword = md5($newPassword);
                $updatedAt = date("Y-m-d H:m:s");
                $sql = "UPDATE login SET password = '$newPassword', updated_at = '$updatedAt' WHERE id = '$userId'";

                if ($result = $mysqli->query($sql)) {
                    // check if number of affected rows is greater than 0 
                    // that means update query has been successfully executed.
                    if (mysqli_affected_rows($mysqli) > 0) {
                        $_SESSION['success-msg'] = "Your password has been successfully changed.";
                    }
                }
            } else {
                $_SESSION['error-msg'] = "Your old password is incorrect";
            }
        } else {
            $_SESSION['error-msg'] = "New password and confirm password is not match";
        }
    } else {
        $_SESSION['error-msg'] = "Please enter all fields.";
    }
}
?>
<div class="page-heading">
    <div class="row">
        <div class="col-lg-6">
            <h1>Change Password</h1>
        </div>
    </div>
</div>
<div class="change-password">
    <div class="row justify-content-md-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    Change Password
                </div>
                <div class="card-body">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="old-password">Old Password</label>
                        <input type="password" required name="old-password" class="form-control" id="old-password" placeholder="old Password">
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" required name="new-password" class="form-control" id="new-password" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" required name="confirm-password" class="form-control" id="confirm-password" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <div class="text-danger">
                            <?php
if (isset($_SESSION['error-msg'])) {
    echo $_SESSION['error-msg'];
    unset($_SESSION['error-msg']);
}
?>
                        </div>
                        <div class="text-success">
                            <?php
if (isset($_SESSION['success-msg'])) {
    echo $_SESSION['success-msg'];
    unset($_SESSION['success-msg']);
}
?>
                        </div>
                    </div>
                    <button type="submit" name="submit" value="submit-btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>