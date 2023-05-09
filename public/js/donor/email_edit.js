// Get the dialog box
var dialog = document.getElementById("myDialog");
var emaili = document.getElementById("myEmail");
var otp = document.getElementById("myOTP")
// Get the input field and buttons 
var input = document.getElementById("name");
var okButton = document.getElementById("okButton");
var cancelButton = document.getElementById("cancelButton"); // Show the dialog box whenthe page loads

function showalert() {
    dialog.style.display = "block";
} //Show the email dialog box when the page loads

function showemail() {
    emaili.style.display = "block";
} //Show the otp dialog box when the page loads
function showotp() {
    otp.style.display = "block";
}
// When the user clicks the OKbutton, get the input value and close the dialog box 

// When the user clicks the Cancelbutton, close the dialog box

function hidealert() {
    dialog.style.display = "none";
}

function hideemail() {
    emaili.style.display = "none";
    return false;
}

function hideotp() {
    otp.style.display = "none";
    return false;
}

var pword = document.getElementById('myPassword');

const confirm = document.getElementById('myConfirm');

function showPassword() {
    pword.style.display = "block";
}

function showConfirm() {
    confirm.style.display = "block";
}

function hidepalert() {
    pword.style.display = "none";
}

function hidecalert() {
    confirm.style.display = "none";
}