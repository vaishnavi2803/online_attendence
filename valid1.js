function validate(e) {
    e.preventDefault();
    var alphaNumericPattern = /^[a-zA-Z0-9] {2,15}$/;
    var mobilePattern = /^[a-zA-Z0-9] {7,15}$/;
    var emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var rollNoPattern = /^(?=.*[a-z]) (?=.*[A-Z]) (?=.*[0-9]).{11,11}$/;

    // declare all fields here as a variable
    var username = document.getElementById("username");
    var email = document.getElementById("email");
    var mobile = document.getElementById('mobile-no');
    var admission = document.getElementById('Adm');
    var Rollno = document.getElementById('Rno');
    var Course = document.getElementById('Crse');
    var Branch = document.getElementById('Brnch');
    var Year = document.getElementById('Yr');
    var Semester = document.getElementById('Sem');
    var Section = document.getElementById('Sec');
    var DOB = document.getElementById('dob');
    var gender = document.getElementById('gen');
    var FatherName = document.getElementById('Fm');
    var FatherMobNo = document.getElementById('Fmno');
    var MotherName = document.getElementById('Mm');
    var MotherMobNo = document.getElementById('Mmno');
    var Address = document.getElementById('Add');
    var City = document.getElementById('city');
    var State = document.getElementById('state');
    var Zip = document.getElementById('zip');




    // check if username value is not exist then this section will be execute
    if (username.value == '') {
        var userError = document.getElementById('user-error-msg');
        userError.innerHTML = "Please Enter valid username";
    } else {
        // if username exist but it is not valid then this section will be execute
        if (!usernamePattern.test(user.value)) {
            userError = document.getElementById('user-error-msg');
            userError.innerHTML = "Please Enter valid username";
        }
    }

    // check if email value is not exist (empty) then this section will be execute
    if (email.value == '') {
        var emailError = document.getElementById('email-error-msg');
        emailError.innerHTML = "Please Enter email id";
    } else {
        // if email id exist but it is not valid then this section will be execute
        if (!emailPattern.test(email.value)) {
            emailError = document.getElementById('email-error-msg');
            emailError.innerHTML = "Please Enter valid email id";
        }
    }

    // check if mobile value is not exist (empty) then this section will be execute
    if (mobile.value == '') {
        var mobileError = document.getElementById('mobile-error-msg');
        mobileError.innerHTML = "Please Enter mobile no";
    } else {
        // if mobile exist but it is not valid then this section will be execute
        if (!mobilePattern.test(mobile.value)) {
            mobileError = document.getElementById('mobile-error-msg');
            mobileError.innerHTML = "Please Enter valid mobile no";
        }
    }

    // check if admission no is not exist (empty) then this section will be execute
    if (admission.value == '') {
        var admissionError = document.getElementById('admission-error-msg');
        admissionError.innerHTML = "Please Enter Admission no";
    } else {
        // if admission no exist but it is not valid then this section will be execute
        if (!rollNoPattern.test(admission.value)) {
            admissionError = document.getElementById('admission-error-msg');
            admissionError.innerHTML = "Please Enter valid Admissiion no";
        }
    }


    // check if roll no is not exist (empty) then this section will be execute
    if (Rollno.value == '') {
        var RollnoError = document.getElementById('Rollno-error-msg');
        RollnoError.innerHTML = "Please Enter Roll no";
    } else {
        // if roll no exist but it is not valid then this section will be execute
        if (!rollNoPattern.test(Rollno.value)) {
            RollnoError = document.getElementById('Rollno-error-msg');
            RollnoError.innerHTML = "Please Enter valid Roll no";
        }
    }

    // check if course is not exist (empty) then this section will be execute
    if (Course.value == '') {
        var CrseError = document.getElementById('Course-error-msg');
        CrseError.innerHTML = "Please Enter Course";
    }

    // check if branch is not exist (empty) then this section will be execute
    if (Branch.value == '') {
        var BrnchError = document.getElementById('Brnch-error-msg');
        BrnchError.innerHTML = "Please Enter Branch";
    }

    // check if year is not exist (empty) then this section will be execute
    if (Year.value == '') {
        var YrError = document.getElementById('Yr-error-msg');
        YrError.innerHTML = "Please Enter Year";
    }

    // check if Semester is not exist (empty) then this section will be execute
    if (Semester.value == '') {
        var SemError = document.getElementById('Sem-error-msg');
        SemError.innerHTML = "Please Enter Semester";
    }

    // check if Section is not exist (empty) then this section will be execute
    if (Section.value == '') {
        var SecError = document.getElementById('Sec-error-msg');
        SecError.innerHTML = "Please Enter Section";
    }
    // check if dateofbirth is not exist (empty) then this section will be execute
    if (DOB.value == '') {
        var dobError = document.getElementById('dob-error-msg');
        dobError.innerHTML = "Please Enter DOB";
    }

    // check if gender is not exist (empty) then this section will be execute
    if (gender.value == '') {
        var genError = document.getElementById('gen-error-msg');
        genError.innerHTML = "Please Enter gender";
    }

    // check if father's name is not exist (empty) then this section will be execute
    if (FatherName.value == '') {
        var FatherNameError = document.getElementById('Fm-error-msg');
        FatherNameError.innerHTML = "this field is required";
    } else {
        // if father's name exist but it is not valid then this section will be execute
        if (!alphaNumericPattern.test(FatherName.value)) {
            FatherNameError = document.getElementById('Fm-error-msg');
            FatherNameError.innerHTML = "this field is required";
        }
    }

    // check if father's mobileno is not exist (empty) then this section will be execute
    if (FatherMobNo.value == '') {
        var FatherMobNoError = document.getElementById('Fmno-error-msg');
        FatherMobNoError.innerHTML = "this field is required";
    } else {
        // if father's mobileno exist but it is not valid then this section will be execute
        if (!mobilePattern.test(FatherMobNo.value)) {
            FatherMobNoError = document.getElementById('Fmno-error-msg');
            FatherMobNoError.innerHTML = "this field is required";
        }
    }
    // check if mother's name is not exist (empty) then this section will be execute
    if (MotherName.value == '') {
        var MotherNameError = document.getElementById('MotherName-error-msg');
        MotherNameError.innerHTML = "this field is required";
    } else {
        // if mother's name exist but it is not valid then this section will be execute
        if (!alphaNumericPattern.test(MotherName.value)) {
            MotherNameError = document.getElementById('MotherName-error-msg');
            MotherNameError.innerHTML = "this field is required";
        }
    }
    // check if mother's mobileno is not exist (empty) then this section will be execute
    if (MotherMobNo.value == '') {
        var MotherMobNoError = document.getElementById('MotherMobNo-error-msg');
        MotherMobNoError.innerHTML = "this field is required";
    } else {
        // if mother's mobileno exist but it is not valid then this section will be execute
        if (!mobilePattern.test(MotherMobNox.value)) {
            MotherMobNoError = document.getElementById('MotherMobNo-error-msg');
            MotherMobNoError.innerHTML = "this field is required";
        }
    }
    // check if address is not exist (empty) then this section will be execute
    if (Address.value == '') {
        var AddError = document.getElementById('Add-error-msg');
        AddError.innerHTML = "Please Enter Address";
    }
    // check if city is not exist (empty) then this section will be execute
    if (City.value == '') {
        var cityError = document.getElementById('city-error-msg');
        cityError.innerHTML = "Please Enter City";
    }
    // check if state is not exist (empty) then this section will be execute
    if (State.value == '') {
        var stateError = document.getElementById('state-error-msg');
        stateError.innerHTML = "Please Enter State";
    }
    // check if zipcode is not exist (empty) then this section will be execute
    if (Zip.value == '') {
        var zipError = document.getElementById('zip-error-msg');
        zipError.innerHTML = "Please Enter zipcode";
    }
    return false;
}