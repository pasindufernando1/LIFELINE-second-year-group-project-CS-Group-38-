var form = document.getElementById("bb_search");

// Attach an event listener to the form's submit event
// form.addEventListener("submit", function (event) {
//     event.preventDefault();
    // var select = document.getElementById("mySelect");
    // var selectedValue = select.options[select.selectedIndex].value;
    // console.log(selectedValue);

    // // Get information from database based on the selected value
    // getDataFromDB(selectedValue);
    // getcontactinfo()
// });

// function emailValidation() {
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             var response = this.responseText;

//             if (response == "true") {
//                 email.readOnly = false;
//                 emailLabel.innerHTML = "User already exists";
//                 emailLabel.style.color = "red";
//                 email_flag = false;
//                 // submit.disabled = true;
//             } else {
//                 emailLabel.innerHTML = "Email";
//                 emailLabel.style.color = "#000000";
//                 email_flag = true;
//                 // submit.disabled = false;
//             }

//         }
//     };
    // xhttp.open("POST", "http://localhost/Validation/emailValidation", true);
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.send("email=" + email.value);
// }