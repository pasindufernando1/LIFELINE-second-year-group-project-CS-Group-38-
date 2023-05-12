const password = document.getElementById('password');
var passwordflag = true;
const passwordcheck = document.getElementById('confirm-password');
var passwordcheckflag = true;

const password_error = document.getElementById('password-label');
const passwordcheck_error = document.getElementById('confirm-password-label');
const update_button = document.getElementById('update-button');



//Password validation
password?.addEventListener("input", function () {
    // Password should contain at least one number, one uppercase and one lowercase letter and should be at least 8 characters long and can contain special characters
    var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!reg.test(password.value)) {
        password_error.innerHTML = "Password must contain at least 8 characters, including uppercase letters, lowercase letters and numbers";
        password_error.style.color = "red";
        password.style.borderColor = "red";
        update_button.style.background = "grey";
        update_button.disabled = true;
        passwordflag = false;
    } else {
        // signupformenable();
        password_error.innerHTML = "Password";
        password_error.style.color = "black";
        password.style.borderColor = "#a7a7a7";
        passwordflag = true;
        // update_button.style.background = "#640E0B";
        
    }
});

//Confirm password
passwordcheck?.addEventListener("input", function () {
    if (password.value != passwordcheck.value) {
        passwordcheck_error.innerHTML = "Passwords Do not Match";
        passwordcheck_error.style.color = "red";
        password.style.borderColor = "red";
        update_button.disabled = true;
        update_button.style.background = "grey";
        passwordcheckflag = false;
    } else {
        passwordcheck_error.innerHTML = "Confirm Password";
        passwordcheck_error.style.color = "black";
        passwordcheck.style.borderColor = "#a7a7a7";
        update_button.style.background = "#640E0B";
        update_button.disabled = false;
        passwordcheckflag = true;
    }

});