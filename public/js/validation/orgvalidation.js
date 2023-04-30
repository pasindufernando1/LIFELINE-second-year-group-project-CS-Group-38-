const contactnumber = document.getElementById("teleNo");
const contactLabel = document.getElementById("teleNo-label");
var contact_flag = true;

const email = document.getElementById("em");
const emailLabel = document.getElementById("em-label");
var email_flag = true;

const password = document.getElementById("currentPw");
const passwordLabel = document.getElementById("currentPw-label");
var password_flag = true;

const newPassword = document.getElementById("newPw");
const newPasswordLabel = document.getElementById("newPw-label");
var newPassword_flag = true;

const confirmPassword = document.getElementById("confirmPw");
const confirmPasswordLabel = document.getElementById("confirmPw-label");
var confirmPassword_flag = true;

const quantity = document.getElementById("quant");
const quantityLabel = document.getElementById("quant-label");
var quantity_flag = true;

/* const location = document.getElementById("location-input");
const locationLabel = document.getElementById("location-label");
var location_flag = true;
 */
const beds = document.getElementById("beds");
const bedsLabel = document.getElementById("beds-label");
var beds_flag = true;

const submit = document.getElementById("submit");
const submitQuantity = document.getElementById("submit-btn");

//Contact number validation
contactnumber?.addEventListener("input", function () {
    console.log("Invalid Contact Number");
    var reg = /^[0-9]{10}$/;
    if (!reg.test(contactnumber.value)) {
        
        contactnumber.readOnly = false;
        contactLabel.innerHTML = "Invalid Contact Number";
        contactLabel.style.color = "red";
        contact_flag = false;
        // submit.disabled = true;
    } else {
        contactLabel.innerHTML = "Contact number";
        contactLabel.style.color = "#000000";
        contact_flag = true;
        // submit.disabled = false;
    }
});

//Email validation 
email?.addEventListener("input", function () {
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(email.value)) {
        // email.readOnly = false;
        emailLabel.innerHTML = "Invalid Email";
        emailLabel.style.color = "red";
        email_flag = false;
        // submit.disabled = true;
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
                // submit.disabled = true;
            } else {
                emailLabel.innerHTML = "Email";
                emailLabel.style.color = "#000000";
                email_flag = true;
                // submit.disabled = false;
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/emailValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + email.value);
}
//Password validation
/* password?.addEventListener("input", function () {
    // Password should contain at least one number, one uppercase and one lowercase letter and should be at least 8 characters long and can contain special characters
    var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!reg.test(password.value)) {
        password.readOnly = false;
        passwordLabel.innerHTML = "Password must contain at least 8 characters, including uppercase, lowercase letters and numbers";
        passwordLabel.style.color = "red";
        password_flag = false;
        // submit.disabled = true;
    } else {
        passwordValidation();
        // submit.disabled = false;
    }
});

//check whether the hash value of password is equal to the current password
function passwordValidation() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            
            if (response == "true") {
                passwordLabel.innerHTML = "Password";
                passwordLabel.style.color = "#000000";
                password_flag = true;
                // submit.disabled = false;
            } else {
                password.readOnly = false;
                passwordLabel.innerHTML = "Incorrect Password";
                passwordLabel.style.color = "red";
                password_flag = false;
                // submit.disabled = true;
            }

        }
    };
    xhttp.open("POST", "http://localhost/Validation/passwordValidation", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("password=" + password.value);
} */

//New password validation
newPassword?.addEventListener("input", function () {
    // Password should contain at least one number, one uppercase and one lowercase letter and should be at least 8 characters long and can contain special characters
    var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!reg.test(newPassword.value)) {
        newPassword.readOnly = false;
        newPasswordLabel.innerHTML = "Password must contain at least 8 characters, including uppercase, lowercase letters and numbers";
        newPasswordLabel.style.color = "red";
        newPassword_flag = false;
        // submit.disabled = true;
    } else {
        newPasswordLabel.innerHTML = "New Password";
        newPasswordLabel.style.color = "#000000";
        newPassword_flag = true;
        // submit.disabled = false;
    }
}
);

//Confirm password validation
confirmPassword?.addEventListener("input", function () {
    if (confirmPassword.value != newPassword.value) {
        confirmPassword.readOnly = false;
        confirmPasswordLabel.innerHTML = "Password does not match";
        confirmPasswordLabel.style.color = "red";
        confirmPassword_flag = false;
        // submit.disabled = true;
    } else {
        confirmPasswordLabel.innerHTML = "Confirm Password";
        confirmPasswordLabel.style.color = "#000000";
        confirmPassword_flag = true;
        // submit.disabled = false;
    }
});

//Submit button validation
submit?.addEventListener("click", function () {
    if (contact_flag && email_flag && password_flag && newPassword_flag && confirmPassword_flag) {
        submit.disabled = false;
    } else {
        submit.disabled = true;
    }
});

//Quantity validation
quantity?.addEventListener("input", function () {
    var reg = /^[0-9]{1,3}$/;
    if (!reg.test(quantity.value)) {
        quantity.readOnly = false;
        quantityLabel.innerHTML = "Invalid Quantity";
        quantityLabel.style.color = "red";
        quantity_flag = false;
        // submit.disabled = true;
    } else {
        quantityLabel.innerHTML = "Quantity";
        quantityLabel.style.color = "#000000";
        quantity_flag = true;
        // submit.disabled = false;
    }
});

//Submit button validation
submitQuantity?.addEventListener("click", function () {
    if (quantity_flag) {
        submitQuantity.disabled = false;
    } else {
        submitQuantity.disabled = true;
    }
});

//location should be in address format
location?.addEventListener("input", function () {
    var reg = /^[a-zA-Z0-9\s,'-]*$/;
    if (!reg.test(location.value)) {
        location.readOnly = false;
        locationLabel.innerHTML = "Invalid Location";
        locationLabel.style.color = "red";
        location_flag = false;
        // submit.disabled = true;
    } else {
        locationLabel.innerHTML = "Location";
        locationLabel.style.color = "#000000";
        location_flag = true;
        // submit.disabled = false;
    }
});

//number of beds validation
beds?.addEventListener("input", function () {
    var reg = /^[0-9]{1,2}$/;
    if (!reg.test(beds.value)) {
        beds.readOnly = false;
        bedsLabel.innerHTML = "Invalid Number of Beds";
        bedsLabel.style.color = "red";
        beds_flag = false;
        // submit.disabled = true;
    } else {
        bedsLabel.innerHTML = "Number of Beds";
        bedsLabel.style.color = "#000000";
        beds_flag = true;
        // submit.disabled = false;
    }
});



