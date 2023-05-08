const email = document.getElementById("email");
const emailLabel = document.getElementById("email-label");
var email_flag = true;
const regno = document.getElementById("regno");
const regnoLabel = document.getElementById("reg-label");
var regno_flag = true;
const regnum = document.getElementById("regnum");
const regnumLabel = document.getElementById("regnum-label");
var regnum_flag = true;
const contactnumber = document.getElementById("contact");
const contactLabel = document.getElementById("contact-label");
var contact_flag = true;
const password = document.getElementById("password");
const passwordLabel = document.getElementById("password-label");
var password_flag = true;
const dob = document.getElementById("dob");
const dobLabel = document.getElementById("dob-label");
var dob_flag = true;
const nic = document.getElementById("nic");
const nicLabel = document.getElementById("nic-label");
var nic_flag = true;
const quantity = document.getElementById("quantity");
const quantityLabel = document.getElementById("quantity-label");
var quantity_flag = true;
const confirmPassword = document.getElementById("confirmPassword");
const confirmPasswordLabel = document.getElementById("confirmPassword-label");
var confirmPassword_flag = true;
const adminform = document.getElementById("addform");

const submit = document.getElementById("submit-btn");


//Email validation
email?.addEventListener("input", function () {
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(email.value)) {
        // email.readOnly = false;
        emailLabel.innerHTML = "Invalid Email";
        emailLabel.style.color = "red";
        email_flag = false;
        submit.disabled = true;
        submit.style.background = "grey";
    } else {
        emailValidation();
    }
});

//Check whether the email is already in use
function emailValidation() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                email.readOnly = false;
                emailLabel.innerHTML = "User already exists";
                emailLabel.style.color = "red";
                email_flag = false;
                submit.disabled = true;
                submit.style.background = "grey";

            } else {
                emailLabel.innerHTML = "Email";
                emailLabel.style.color = "#000000";
                email_flag = true;
                submit.disabled = false;
                submit.style.background = "#640E0B";
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/emailValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email.value);
}

//Registation number validation
regno?.addEventListener("input", function () {
    // check whether the hospital name is in format PHSRC/MC/01 or PHSRC/GH/01 or PHSRC/PH/01
    var reg = /^PHSRC\/(MC|GH|PH)\/[0-9]{1,5}$/;
    if (!reg.test(regno.value)) {
        regno.readOnly = false;
        regnoLabel.innerHTML = "Invalid Registration Number";
        regnoLabel.style.color = "red";
        regno_flag = false;
        // submit.disabled = true;
    } else {
        regnoValidation();
    }
});

//Check whether the registration number is already in use
function regnoValidation() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                regno.readOnly = false;
                regnoLabel.innerHTML = "Registration number already exists";
                regnoLabel.style.color = "red";
                // submit.disabled = true;
            } else {
                regnoLabel.innerHTML = "Registration number";
                regnoLabel.style.color = "#000000";
                regno_flag = true;
                // submit.disabled = false;
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/regnoValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("regno=" + regno.value);
}

//Contact number validation
contactnumber?.addEventListener("input", function () {
    var reg = /^[0-9]{10}$/;
    if (!reg.test(contactnumber.value)) {
        contactnumber.readOnly = false;
        contactLabel.innerHTML = "Invalid Contact Number";
        contactLabel.style.color = "red";
        contact_flag = false;
        submit.disabled = true;
        submit.style.background = "grey";
    } else {
        contactLabel.innerHTML = "Contact number";
        contactLabel.style.color = "#000000";
        contact_flag = true;
        submit.disabled = false;
        submit.style.background = "#640E0B";
    }
});

//Password validation
password?.addEventListener("input", function () {
    // Password should contain at least one number, one uppercase and one lowercase letter and should be at least 8 characters long and can contain special characters
    var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!reg.test(password.value)) {
        password.readOnly = false;
        passwordLabel.innerHTML = "Password must contain at least 8 characters, including uppercase, lowercase letters and numbers";
        passwordLabel.style.color = "red";
        password_flag = false;
        // submit.disabled = true;
    } else {
        passwordLabel.innerHTML = "Password";
        passwordLabel.style.color = "#000000";
        password_flag = true;
        // submit.disabled = false;
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
        dob.readOnly = false;
        dobLabel.innerHTML = "Donor must be between 18 and 60 years old";
        dobLabel.style.color = "red";
        dob_flag = false;
        // submit.disabled = true;
    } else {
        dobLabel.innerHTML = "DOB";
        dobLabel.style.color = "#000000";
        dob_flag = true;
        // submit.disabled = false;
    }
});


//NIC validation
nic?.addEventListener("input", function () {
    //NIC should be in format 123456789V or 123456789v or should contain 12 integers 
    var reg1 = /^[0-9]{9}[vV]$/;
    var reg2 = /^[0-9]{12}$/;
    if ((!reg1.test(nic.value)) && (!reg2.test(nic.value))) {
        nic.readOnly = false;
        nicLabel.innerHTML = "Invalid NIC";
        nicLabel.style.color = "red";
        nic_flag = false;
        submit.disabled = true;
        submit.style.background="grey";
    } else {
        nicLabel.innerHTML = "NIC";
        nicLabel.style.color = "#000000";
        nic_flag = true;
        submit.disabled = false;
        submit.style.background="#640E0B";

    }

});


regnum?.addEventListener("input", function () {
    regnumValidation();
});


//Check whether the registration number of organizations/society is already in use
function regnumValidation() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            if (response == "true") {
                regnum.readOnly = false;
                regnumLabel.innerHTML = "Registration number already exists";
                regnumLabel.style.color = "red";
                regnum_flag = false;
                // submit.disabled = true;
            } else {
                regnumLabel.innerHTML = "Registration number";
                regnumLabel.style.color = "#000000";
                regnum_flag = true;
                // submit.disabled = false;
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/orgregnoValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("regnum=" + regnum.value);
}

// //quantity validation
// quantity?.addEventListener("input", function () {
//     // Quantity should be greater than zero
//     if ((quantity.value <= 0)) {
//         quantity.readOnly = false;
//         quantityLabel.innerHTML = "Quantity should be a number greater than zero ";
//         quantityLabel.style.color = "red";
//         quantity_flag = false;
//         // submit.disabled = true;
//     } else {
//         quantityLabel.innerHTML = "Quantity";
//         quantityLabel.style.color = "#000000";
//         quantity_flag = true;
//         // submit.disabled = false;
//     }
// });

//quantity validation
quantity?.addEventListener("input", function () {
    // Quantity should be greater than zero
    var reg = /^\d+$/;
    if ((!reg.test(quantity.value)) || (quantity.value <= 0)) {

        quantity.readOnly = false;
        quantityLabel.innerHTML = "Quantity should be a number greater than zero ";
        quantityLabel.style.color = "red";
        quantity_flag = false;
        // submit.disabled = true;
    } else {
        quantityLabel.innerHTML = "Packet quantity:";
        quantityLabel.style.color = "#000000";
        quantity_flag = true;
        // submit.disabled = false;
    }
});

confirmPassword?.addEventListener("input", function () {
    if (password.value != confirmPassword.value) {
        // email.readOnly = false;
        confirmPasswordLabel.innerHTML = "Password Doesn't Match";
        confirmPasswordLabel.style.color = "red";
        confirmPassword_flag = false;
        // submit.disabled = true;
    } else {
        confirmPasswordLabel.innerHTML = "confirm password";
        confirmPasswordLabel.style.color = "#000000";
        confirmPassword_flag = true;
        // submit.disabled = false;
    }
});

// //Function to enable the submit button when all the fields are valid on moving the cursor on the submit button
// submit?.addEventListener("mouseover", function () {
//     console.log("function called");
//     if (email_flag==true && regno_flag==true && regnum_flag==true && contact_flag==true && password_flag==true && dob_flag==true && nic_flag==true && quantity_flag==true && confirmPassword_flag==true) {
//         // console.log("true");
//         submit.disabled = false;
//     }else{
//         submit.disabled = true;
//     }
// });

adminform?.addEventListener("submit", function (e) {
    if (!(email_flag == true && regno_flag == true && regnum_flag == true && contact_flag == true && password_flag == true && dob_flag == true && nic_flag == true && quantity_flag == true && confirmPassword_flag == true)) {
        e.preventDefault();
    }
});

