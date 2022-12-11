const submit = document.getElementById("signup-button");

const form = document.getElementById('donor-signup');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const nic = document.getElementById('nic');
const btype = document.getElementById('btype');
const dob = document.getElementById('dob');
const gender = document.getElementById('gender');
const number = document.getElementById('number');
const lane = document.getElementById('lane');
const city = document.getElementById('city');
const district = document.getElementById('district');
const province = document.getElementById('province');
const email = document.getElementById('email');
const tel = document.getElementById('tel');
const contno = document.getElementById('contno');
const emcontno = document.getElementById('emcontno');
const uname = document.getElementById('uname');
const password = document.getElementById('password');
const passwordcheck = document.getElementById('passwordcheck');

const fname_error = document.getElementById('fname-error');
const lname_error = document.getElementById('lname-error');
const nic_error = document.getElementById('nic-error');
const btype_error = document.getElementById('btype-error');
const dob_error = document.getElementById('dob-error');
const gender_error = document.getElementById('gender-error');
const number_error = document.getElementById('number-error');
const lane_error = document.getElementById('lane-error');
const city_error = document.getElementById('city-error');
const district_error = document.getElementById('district-error');
const province_error = document.getElementById('province-error');
const email_error = document.getElementById('email-error');
const tel_error = document.getElementById('tel-error');
const contno_error = document.getElementById('contno-error');
const emcontno_error = document.getElementById('emcontno-error');
const uname_error = document.getElementById('uname-error');
const password_error = document.getElementById('password-error');
const passwordcheck_error = document.getElementById('passwordcheck-error');

//email verification 
email?.addEventListener("input", function () {
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(email.value)) {
        email_error.innerHTML = "Invalid Email";
        email.style.borderColor = "red";
        submit.disabled = true;
    } else {
        email_error.innerHTML = "";
        email.style.borderColor = "#FBDAD9";
        submit.disabled = false;
    }

    emailValidation();

});

function emailValidation() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            if (response == "true") {
                email_error.innerHTML = "User already exists";
                submit.disabled = true;
            } else {
                email_error.innerHTML = "";
                submit.disabled = false;
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/emailValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email.value);
}
//firstname validation
fname?.addEventListener("input", function () {
    var reg = /^[a-zA-Z-]+$/;
    if (!reg.test(fname.value)) {
        fname_error.innerHTML = "Name can only include letters";
        fname.style.borderColor = "red";
        submit.disabled = true;
    } else {
        fname_error.innerHTML = "";
        fname.style.borderColor = "#FBDAD9";
        submit.disabled = false;
    }

});

//lastname validation
lname?.addEventListener("input", function () {
    var reg = /^[a-zA-Z-]+$/;
    if (!reg.test(lname.value)) {
        lname_error.innerHTML = "Name can only include letters";
        lname.style.borderColor = "red";
        submit.disabled = true;
    } else {
        lname_error.innerHTML = "";
        lname.style.borderColor = "#FBDAD9";
        submit.disabled = false;
    }

});

//NIC validation
nic?.addEventListener("input", function () {
    //NIC should be in format 123456789V or 123456789v or should contain 12 integers 
    var reg1 = /^[0-9]{9}[vV]$/;
    var reg2 = /^[0-9]{12}$/;
    if ((!reg1.test(nic.value)) && (!reg2.test(nic.value))) {
        nic_error.innerHTML = "Invalid NIC";
        nic.style.borderColor = "red";
        submit.disabled = true;
    } else {
        nic_error.innerHTML = "";
        nic.style.borderColor = "#FBDAD9";
        submit.disabled = false;
    }

});

//Date of birth validation
dob?.addEventListener("input", function () {
    //Get the difference between the current date and the date of birth
    var today = new Date();
    var birthDate = new Date(dob.value);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    if (age < 18 || age >= 60) {
        dob_error.innerHTML = "Donor must be between 18 and 60 years old";
        dob.style.borderColor = "red";
        submit.disabled = true;
    } else {
        dob_error.innerHTML = "";
        dob.style.borderColor = "#FBDAD9";
        submit.disabled = false;
    }
});

//Telephone number verification
// It must either have 0711111111 or +94111111111  format
(tel)?.addEventListener("input", function () {
    var reg1 = /^[0-9]{10}$/;
    var reg2 = /^\+94([0-9]){9}$/;
    if (!reg1.test(tel.value) && !reg2.test(tel.value)) {
        tel_error.innerHTML = "Invalid Telephone Number";
        tel.style.dorderColor = "red";
        submit.disabled = true;
    } else {
        tel_error.innerHTML = "";
        tel.style.borderColor = "#FBDAD9";
        submit.disabled = false;
    }
});

(contno)?.addEventListener("input", function () {
    var reg1 = /^[0-9]{10}$/;
    var reg2 = /^\+94([0-9]){9}$/;
    if (!reg1.test(contno.value) && !reg2.test(contno.value)) {
        contno_error.innerHTML = "Invalid Telephone Number";
        contno.style.dorderColor = "red";
        submit.disabled = true;
    } else {
        contno_error.innerHTML = "";
        contno.style.borderColor = "#949494";
        submit.disabled = false;
    }
});
(emcontno)?.addEventListener("input", function () {
    var reg1 = /^[0-9]{10}$/;
    var reg2 = /^\+94([0-9]){9}$/;
    if (!reg1.test(emcontno.value) && !reg2.test(emcontno.value)) {
        emcontno_error.innerHTML = "Invalid Telephone Number";
        emcontno.style.dorderColor = "red";
        submit.disabled = true;
    } else {
        emcontno_error.innerHTML = "";
        emcontno.style.borderColor = "#949494";
        submit.disabled = false;
    }
});



//Password validation
password?.addEventListener("input", function () {
    // Password should contain at least one number, one uppercase and one lowercase letter and should be at least 8 characters long and can contain special characters
    var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!reg.test(password.value)) {
        password_error.innerHTML = "Password must contain at least 8 characters, including uppercase letters, lowercase letters and numbers";
        password.style.borderolor = "red";
        submit.disabled = true;
    } else {
        password_error.innerHTML = "";
        password.style.borderColor = "#FBDAD9";
        submit.disabled = false;
    }
});

//Confirm password
passwordcheck?.addEventListener("input", function () {
    if (password.value != passwordcheck.value) {
        passwordcheck_error.innerHTML = "Passwords Do not Match";
        passwordcheck.style.borderolor = "red";
        submit.disabled = true;
    } else {
        passwordcheck_error.innerHTML = "";
        passwordcheck.style.borderColor = "#FBDAD9";
        submit.disabled = false;
    }

});



