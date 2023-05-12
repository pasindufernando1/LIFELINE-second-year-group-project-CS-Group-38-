const contactnumber = document.getElementById("teleNo");
const contactLabel = document.getElementById("teleNo-label");
var contact_flag = true;

/* const email = document.getElementById("em");
const emailLabel = document.getElementById("em-label");
var email_flag = true;
 */
/* const password = document.getElementById("currentPw");
const passwordLabel = document.getElementById("currentPw-label");
var password_flag = true; */

const newPassword = document.getElementById("newPw");
const newPasswordLabel = document.getElementById("newPw-label");
var newPassword_flag = true;

const confirmPassword = document.getElementById("confirmPw");
const confirmPasswordLabel = document.getElementById("confirmPw-label");
var confirmPassword_flag = true;

const quantity = document.getElementById("quant");
const quantityLabel = document.getElementById("quant-label");
var quantity_flag = true;

const beds = document.getElementById("beds");
const bedsLabel = document.getElementById("beds-label");
var beds_flag = true;

const donors = document.getElementById("donors");
const donorsLabel = document.getElementById("donors-label");
var donors_flag = true;

const date = document.getElementById("date");
const dateLabel = document.getElementById("date-label");
var date_flag = true;

const feedback = document.getElementById("feedback");
const feedbackLabel = document.getElementById("feedback-label");
var feedback_flag = true;

const Nemail= document.getElementById("email");
const emailLabel = document.getElementById("email-label");
var email_flag = true;



//const submit = document.getElementById("submit");
const submitQuantity = document.getElementById("submit-btn");
//const submitRequest = document.getElementById("submit-btn-request");
const submitFeedback = document.getElementById("feedback-btn");
const addform = document.getElementById("addform");
const emailform = document.getElementById("emailform");
const requestform = document.getElementById("requestform");
const feedbackform = document.getElementById("feedbackform");

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
Nemail?.addEventListener("input", function () {
    console.log("Invalid Email");
    var reg = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    if (!reg.test(Nemail.value)) {
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
                Nemail.readOnly = false;
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

emailform?.addEventListener('submit', function (e) {
    console.log("submitting");
    if (!(email_flag == true)) {
        e.preventDefault();
    }
});

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

addform?.addEventListener('submit', function (e) {
    console.log("submitting");
    if (!(contact_flag == true && newPassword_flag == true && confirmPassword_flag == true )) {
        e.preventDefault();
    }
}); 


//Submit button validation
/* submit?.addEventListener("click", function () {
    console.log("awa");
    if (contact_flag && newPassword_flag && confirmPassword_flag) {
        submit.disabled = false;
    } else {
        submit.disabled = true;
    }
}); */

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
/* location?.addEventListener("input", function () {
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
}); */

//number of beds validation
beds?.addEventListener("input", function () {
    var reg = /^[0-9]{1,4}$/;
    //.log("Invalid Number of Beds");
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

//number of donors validation
donors?.addEventListener("input", function () {
    var reg = /^[0-9]{1,4}$/;
    //.log("Invalid Number of Donors");
    if (!reg.test(donors.value)) {
        
        donors.readOnly = false;
        donorsLabel.innerHTML = "Invalid Number of Donors";
        donorsLabel.style.color = "red";
        donors_flag = false;
        // submit.disabled = true;
    } else {
        donorsLabel.innerHTML = "Number of Donors";
        donorsLabel.style.color = "#000000";
        donors_flag = true;
        // submit.disabled = false;
    }
});

//date should be a future date from today
date?.addEventListener("input", function () {
    var today = new Date();
    var dateValue = new Date(date.value);
    if (dateValue < today) {
        date.readOnly = false;
        dateLabel.innerHTML = "Invalid Date";
        dateLabel.style.color = "red";
        date_flag = false;
        // submit.disabled = true;
    } else {
        dateLabel.innerHTML = "Date";
        dateLabel.style.color = "#000000";
        date_flag = true;
        // submit.disabled = false;
    }
});
requestform?.addEventListener('submit', function (e) {
    console.log("submitting");
    if (!(beds_flag == true && donors_flag == true && date_flag == true)) {
        e.preventDefault();
    }
});


//Submit button validation
/* submitRequest?.addEventListener("click", function () {
    if (beds_flag && donors_flag && date_flag) {
        submitRequest.disabled = false;
    } else {
        submitRequest.disabled = true;
    }
}); */

//feedback input size should be less than 255 characters
feedback?.addEventListener("input", function () {
    //console.log("Invalid Feedback");
    if (feedback.value.length > 255) {

        feedback.readOnly = false;
        feedbackLabel.innerHTML = "Your Ideas should be less than 255 characters";
        feedbackLabel.style.color = "red";
        feedback_flag = false;
        // submit.disabled = true;
    } else {
        feedbackLabel.innerHTML = "Your Ideas:";
        feedbackLabel.style.color = "#000000";
        feedback_flag = true;
        // submit.disabled = false;
    }
});

//Submit button validation
feedbackform?.addEventListener('submit', function (e) {
    console.log("submitting");
    if (!(feedback_flag == true )) {
        e.preventDefault();
    }
}); 



  



