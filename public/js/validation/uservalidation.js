
const email = document.getElementById("email");
const emailLabel = document.getElementById("email-label");
const regno = document.getElementById("regno");
const regnoLabel = document.getElementById("reg-label");
const regnum = document.getElementById("regnum");
const regnumLabel = document.getElementById("regnum-label");
const contactnumber = document.getElementById("contact");
const contactLabel = document.getElementById("contact-label");
const password = document.getElementById("password");
const passwordLabel = document.getElementById("password-label");
const dob = document.getElementById("dob");
const dobLabel = document.getElementById("dob-label");
const nic = document.getElementById("nic");
const nicLabel = document.getElementById("nic-label");
const quantity = document.getElementById("quantity");
const quantityLabel = document.getElementById("quantity-label");


const submit = document.getElementById("submit-btn");


//Email validation
email?.addEventListener("input", function () {
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(email.value)) {
        emailLabel.innerHTML = "Invalid Email";
        emailLabel.style.color = "red";
        submit.disabled = true;
    } else {
        emailValidation();
    }
});

//Check whether the email is already in use
function emailValidation() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                emailLabel.innerHTML = "User already exists";
                emailLabel.style.color = "red";
                submit.disabled = true;
            } else {
                emailLabel.innerHTML = "Email";
                emailLabel.style.color = "#000000";
                submit.disabled = false;
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/emailValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email="+email.value);
}

//Registation number validation
regno?.addEventListener("input", function () {  
    // check whether the hospital name is in format PHSRC/MC/01 or PHSRC/GH/01 or PHSRC/PH/01
    var reg = /^PHSRC\/(MC|GH|PH)\/[0-9]{1,5}$/;
    if (!reg.test(regno.value)) {
        regnoLabel.innerHTML = "Invalid Registration Number";
        regnoLabel.style.color = "red";
        submit.disabled = true;
    } else {
        regnoValidation();
    }
});

//Check whether the registration number is already in use
function regnoValidation() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                regnoLabel.innerHTML = "Registration number already exists";
                regnoLabel.style.color = "red";
                submit.disabled = true;
            } else {
                regnoLabel.innerHTML = "Registration number";
                regnoLabel.style.color = "#000000";
                submit.disabled = false;
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/regnoValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("regno="+regno.value);
}

//Contact number validation
contactnumber?.addEventListener("input", function () {
    var reg = /^[0-9]{10}$/;
    if (!reg.test(contactnumber.value)) {
        contactLabel.innerHTML = "Invalid Contact Number";
        contactLabel.style.color = "red";
        submit.disabled = true;
    } else {
        contactLabel.innerHTML = "Contact number";
        contactLabel.style.color = "#000000";
        submit.disabled = false;
    }
});

//Password validation
password?.addEventListener("input", function () {
    // Password should contain at least one number, one uppercase and one lowercase letter and should be at least 8 characters long and can contain special characters
    var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!reg.test(password.value)) {
        passwordLabel.innerHTML = "Password must contain at least 8 characters, including uppercase, lowercase letters and numbers";
        passwordLabel.style.color = "red";
        submit.disabled = true;
    } else {
        passwordLabel.innerHTML = "Password";
        passwordLabel.style.color = "#000000";
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

    if (age<18 || age>=60) {
        dobLabel.innerHTML = "Donor must be between 18 and 60 years old";
        dobLabel.style.color = "red";
        submit.disabled = true;
    } else {
        dobLabel.innerHTML = "DOB";
        dobLabel.style.color = "#000000";
        submit.disabled = false;
    }
});


//NIC validation
nic?.addEventListener("input", function () {
    //NIC should be in format 123456789V or 123456789v or should contain 12 integers 
    var reg1 = /^[0-9]{9}[vV]$/;
    var reg2 = /^[0-9]{12}$/;
    if ((!reg1.test(nic.value)) && (!reg2.test(nic.value))) {
        nicLabel.innerHTML = "Invalid NIC";
        nicLabel.style.color = "red";
        submit.disabled = true;
    } else {
        nicLabel.innerHTML = "NIC";
        nicLabel.style.color = "#000000";
        submit.disabled = false;
    }
    
});


regnum?.addEventListener("input", function () {  
        regnumValidation();
});


//Check whether the registration number of organizations/society is already in use
function regnumValidation() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                regnumLabel.innerHTML = "Registration number already exists";
                regnumLabel.style.color = "red";
                submit.disabled = true;
            } else {
                regnumLabel.innerHTML = "Registration number";
                regnumLabel.style.color = "#000000";
                submit.disabled = false;
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/orgregnoValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("regnum="+regnum.value);
}

//quantity validation
quantity?.addEventListener("input", function () {
    // Quantity should be greater than zero
    
    if ((quantity.value)) {
        quantityLabel.innerHTML = "Quantity should be greater than zero ";
        quantityLabel.style.color = "red";
        submit.disabled = true;
    } else {
        quantityLabel.innerHTML = "Quantity";
        quantityLabel.style.color = "#000000";
        submit.disabled = false;
    }
});