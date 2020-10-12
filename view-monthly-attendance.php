<?php
include 'header.php';
$userData = $_SESSION['userData'];
$role = $userData['role'];
if ($role != 'student') {
    echo '<script> location.replace("login.php"); </script>';
}

$date = "";
$date_now = date("Y-m-d"); 
$noStudentFound = false;


if (isset($_POST['searchBtn'])) {
    $date = $_POST['date'];
    $d =  explode("-", $_POST['date']);
    $year = $d[0];
    $month = $d[1];
    $start_date = "01-".$month."-".$year;
    $start_time = strtotime($start_date);
    $end_time = strtotime("+1 month", $start_time);
    $startDate = date('Y-m-d', $start_time);
    $endDate = date('Y-m-d', $end_time);
    
    $userId = $userData['user_id'];
    $sql = "SELECT date FROM attendance WHERE  date >=  '$startDate' AND date < '$endDate' AND userId = '$userId'";
    $result = $mysqli->query($sql);
    $resultData = $result->fetch_all(MYSQLI_ASSOC);
    $markStudents = [];
    foreach ($resultData as $row) {
        array_push($markStudents, $row['date']);
    }

    $dateData = [];
    for($i = $start_time; $i < $end_time; $i +=86400) {
        $dateArr = array();
        $dateArr['date'] = date('d F Y (l)', $i);
        if(date('Y-m-d', $i) <= $date_now ){
            $dateArr['attendance'] = in_array(date('Y-m-d', $i), $markStudents) ? 'Present' : 'Absent';
        }else{
            $dateArr['attendance'] = '';
        }
        array_push($dateData, $dateArr);
    }
}
?>



<div class="page-heading">
    <div class="row">
        <div class="col-3">
            <h1>View Attendance</h1>
        </div>
    </div>
</div>

<div class="listing-page">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <form class="form-inline row" method="post" action="">
                <div class="col-8">
                    <div class="row">
                        <div class="col">
                            <input required type="month" value="<?php echo $date; ?>" class="form-control w-100" name="date">
                        </div>
                    </div>
                </div>
                <div class="col-4">
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
                        <th scope="col">Date</th>
                        <th scope="col">Attendance</th>
                    </tr>
                </thead>
                <tbody>
<?php
if (isset($dateData) && count($dateData) > 0) {
    foreach ($dateData as $key => $row) {
        $sNo = $key + 1;
        echo "<tr>
            <th>$sNo</th>
            <td>" . $row['date'] . "</td>
            <td class='". ($row['attendance'] == 'Present' ? 'text-success' : 'text-danger') ."'>" . $row['attendance']. "</td>
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