
<?php

session_start();

include './db/db.php';

$con = new mysqli("localhost","root","","k-project");
//db connected

/*
$email = $_SESSION['e'];
$rs= "select * from students where email= '$email'";
  $sp=  $con->query($rs);
  $row= $sp->fetch_array();
*/



?>




<!--HTML5 declaration -->
<!DOCTYPE>
<html>
<head>
    <!-- All Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>login form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstarp JS and other JS files-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="valid1.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<!-- onsubmit="return validate(event);" -->
<body>
    <div class="registration-page">
        <div class="page-container">
            <h1>Registration Form</h1>
            <form action="myregformdata.php" method="post" >
                <div class="form-wrapper">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" id="un" name="username" placeholder="Username">
                                <div id="user-error-msg" class="error-msg"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email" class="form-control" name="e" id="email" placeholder="E-Mail">
                                <div id="email-error-msg" class="error-msg"></div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="Mobile No" class="form-control" name="mo" id="mobile-no" placeholder="Mobile No">
                                <div id="mobile-error-msg" class="error-msg"></div>
                            </div>
                        </div>
                    </div>
                    <!--adm no.,roll no..courses,branches-->
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label>Admission No</label>
                            <input type="text" class="form-control" name="ad" id="Adm" placeholder="Admission No">
                            <div id="admission-error-msg" class="error-msg"></div>
                        </div>
                        <div class="form-group col-4">
                            <label>Roll No</label>
                            <input type="text" class="form-control" name="roll" id="Rno" placeholder="Roll No">
                            <div id="Rollno-error-msg" class="error-msg"></div>
                        </div>
                        <div class="form-group col-2">
                            <!--drop-down state-->
                            <label>Course</label>
                            <select class="form-control" name="course" id="Crse">
								<option></option>
								<option value="MCA">MCA</option>
								<option value="B-TECH">B-TECH</option>
								<option value="MBA">MBA</option>
								<option value="M-TECH">M-TECH</option>
								<option value="BCA">BCA</option>
							</select>
                            <div id="Course-error-msg" class="error-msg"></div>
                        </div>
                        <div class="form-group col-2 ">
                            <!--drop-down state-->
                            <label>Branch</label>
                            <select class="form-control" name="branch" id="Brnch">
								<option></option>
								<option value="CSE">CSE</option>
								<option value="IT">IT</option>
								<option value="CS">CS</option>
								<option value="EC">EC</option>
								<option value="ME">ME</option>
								<option value="None">None</option>
							</select>
                            <div id="Brnch-error-msg" class="error-msg"></div>
                        </div>
                    </div>
                    <!--year,semester,section,dob,gender-->
                    <div class="row">
                        <div class="form-group col-3">
                            <!--drop-down state-->
                            <label>Year</label>
                            <select class="form-control" name="year" id="Yr">
								<option></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
                            <div id="Yr-error-msg" class="error-msg"></div>
                        </div>
                        <div class="form-group col-3 ">
                            <!--drop-down state-->
                            <label>Semester</label>
                            <select class="form-control" name="sem" id="Sem">
								<option></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
                            <div id="Sem-error-msg" class="error-msg"></div>
                        </div>
                        <div class="form-group col-2 ">
                            <!--drop-down state-->
                            <label>Section</label>
                            <select class="form-control" id="Sec" name="sec">
								<option></option>
								<option value="A">A</option>
								<option value="B">B</option>
                                <option value="C">C</option>
								<option value="D">D</option>
							</select>
                            <div id="Sec-error-msg" class="error-msg"></div>
                        </div>
                        <div class="col-2 form-group ">
                            <label>Date of birth</label>
                            <input type="date" class="form-control" name="dob" id="dob" placeholder="DOB">
                            <div id="dob-error-msg" class="error-msg"></div>
                        </div>
                        <div class="col-2 form-group ">
                            <!--drop-down state-->
                            <label>gender</label>
                            <select class="form-control" name="gen" id="gen">
                            <option></option>
                            <option value="Male">Male</option>
                            <option  value="Female" >Female</option>c
                            </select>
                            <div id="gen-error-msg" class="error-msg"></div>
                        </div>
                    </div>

                    <!--father name and mobile no-->
                    <div class="form-row ">
                        <div class="form-group col-3 ">
                            <label>Father's Name</label>
                            <input type="text" class="form-control" name="FatherName" id="Fm" placeholder="Father 's Name">
                            <div id="Fm-error-msg" class="error-msg "></div>
                        </div>

                        <div class="form-group col-3 ">
                            <label>Father's Mobile No</label>
                            <input type="text" class="form-control" name="FatherMobNo" id="Fmno" placeholder="Father 's Mobile No">
                            <div id="Fmno-error-msg" class="error-msg "></div>
                        </div>
                        <!--Mother name and mobile no-->
                        <div class="form-group col-3 ">
                            <label>Mother's Name</label>
                            <input type="text" class="form-control" name="MotherName" id="Mm" placeholder="Mother 's Name">
                            <div id="MotherName-error-msg" class="error-msg "></div>
                        </div>
                        <div class="form-group col-3 ">
                            <label>Mother's Mobile No</label>
                            <input type="text" class="form-control" name="MotherMobNo" id="Mmno" placeholder="Mother 's Mobile No">
                            <div id="MotherMobNo-error-msg" class="error-msg "></div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group col-12 ">
                            <label>Address</label>
                            <input type="text" class="form-control" name="Address" id="Add" placeholder="Address">
                            <div id="Add-error-msg" class="error-msg "></div>
                        </div>
                    </div>
                    <!--city,state,zip code-->
                    <div class="form-row ">
                        <div class="form-group col-md-6 ">
                            <label for="inputCity ">City</label>
                            <input type="text" class="form-control" name="City" id="city">
                            <div id="city-error-msg" class="error-msg "></div>
                        </div>
                    
                        <div class="form-group col-md-6 ">
                            <label for="inputZip ">Zip</label>
                            <input type="text" class="form-control" id="zip" name="pin">
                            <div id="zip-error-msg" class="error-msg "></div>
                        </div>
                    </div>


                    <div class="button-wrapper text-center ">
                        <button type="submit" name="s" class="btn btn-primary ">register</button>
                        <button type="reset" class="btn btn-info ">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
include 'footer.php';
?>