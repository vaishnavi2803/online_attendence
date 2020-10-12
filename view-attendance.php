<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role != 'faculty') {
    echo '<script> location.replace("login.php"); </script>';
}

$department = "";
$semester = "";
$date = "";
$noStudentFound = false;

if (isset($_POST['searchBtn'])) {
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $date = $_POST['date'];
    $sql = "SELECT userId FROM attendance WHERE department = '$department' AND semester = '$semester' AND date = '$date'";
    if ($result = $mysqli->query($sql)) {
        $markStudentId = $result->fetch_all(MYSQLI_ASSOC);
        $markStudents = [];
        foreach($markStudentId as $attendance){
            array_push($markStudents, $attendance['userId']);
        }
        $sql = "SELECT * FROM student WHERE department = '$department' AND semester = '$semester' ORDER BY fullName";
        if ($result = $mysqli->query($sql)) {
            if ($result->num_rows > 0) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $studentData = [];
                if(count($rows)){
                    foreach($rows as $row){
                        $s_data = array();
                        $s_data['id'] = $row['id'];
                        $s_data['fullName'] = $row['fullName'];
                        $s_data['emailAddress'] = $row['emailAddress'];
                        $s_data['mobileNo'] = $row['mobileNo'];
                        $s_data['attendance'] = in_array($row['id'], $markStudents) ? 'Present' : 'Absent';
                        
                        array_push($studentData, $s_data);
                    }
                }
            }else{
                $noStudentFound = true;
            }
        }
    }
}
?>



<div class="page-heading">
    <div class="row">
        <div class="col-3">
            <h1>View Attendance</h1>
        </div>
        <div class="col-6">
            
        </div>
        <div class="col-3 text-right">

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
                            <select required name="department" class="form-control w-100" >
                                <option value="">Select Department</option>
                                <option <?php echo $department == 'b.tech' ? 'selected' : ''?> value="b.tech">B.Tech</option>
                                <option <?php echo $department == 'm.tech' ? 'selected' : ''?> value="m.tech">M.Tech</option>
                                <option <?php echo $department == 'bca' ? 'selected' : ''?> value="bca">BCA</option>
                                <option <?php echo $department == 'mca' ? 'selected' : ''?> value="mca">MCA</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="semester" required class="form-control w-100" id="semester">
                                <option value="">Select Semester</option>
                                <option <?php echo $semester == '1' ? 'selected' : ''?> value="1">1st</option>
                                <option <?php echo $semester == '2' ? 'selected' : ''?> value="2">2nd</option>
                                <option <?php echo $semester == '3' ? 'selected' : ''?> value="3">3rd</option>
                                <option <?php echo $semester == '4' ? 'selected' : ''?> value="4">4th</option>
                                <option <?php echo $semester == '5' ? 'selected' : ''?> value="5">5th</option>
                                <option <?php echo $semester == '6' ? 'selected' : ''?> value="6">6th</option>
                                <option <?php echo $semester == '7' ? 'selected' : ''?> value="7">7th</option>
                                <option <?php echo $semester == '8' ? 'selected' : ''?> value="8">8th</option>
                            </select>
                        </div>
                        <div class="col">
                            <input required type="date" value="<?php echo $date;?>" class="form-control w-100" name="date">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" name="searchBtn" value="submit" class="btn btn-primary mb-2 w-100">Search</button>
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
                        <th scope="col">Attendance</th>
                    </tr>
                </thead>
                <tbody>
                <?php
if (isset($studentData) && count($studentData) > 0) {
    foreach ($studentData as $key => $row) {
        $sNo = $key + 1;
        echo "<tr>
            <th>$sNo</th>
            <td>" . $row['fullName'] . "</td>
            <td>" . $row['emailAddress'] . "</td>
            <td>". $row['attendance'] ."</td>
        </tr>";
    }
}
?>
                </tbody>
            </table>


            <?php 
            if ($noStudentFound) {
            ?>
            <div class="h1 text-center mt-5 text-muted">
                No Student Found !
            </div>
            <?php 
            } 
            ?>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>