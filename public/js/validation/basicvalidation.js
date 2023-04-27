const badge_name = document.getElementById('badge-name');
const badge_lable = document.getElementById('badge-lable');
var badge_name_flag = true;

const donation_constraint = document.getElementById('don-cons');
const donation_constraint_lable = document.getElementById('don-cons-lable');
var donation_constraint_flag = true;

const description = document.getElementById('description');
const description_lable = document.getElementById('description-lable');
var description_flag = true;

const quantity = document.getElementById("quantity");
const quantityLabel = document.getElementById("quantity-label");
var quantity_flag = true;


const badge_form = document.getElementById('addform');
const submit = document.getElementById('submit-btn');


// Badge name should be a text name
badge_name?.addEventListener("input",function(){
    // Badge name should be a text name
    var reg = /^[a-zA-Z ]*$/;
    if(!reg.test(badge_name.value)){
        badge_lable.innerHTML = "Invalid Badge Name";
        badge_lable.style.color = "red";
        badge_name_flag = false;
    } else{
        badge_lable.innerHTML = "Badge Name";
        badge_lable.style.color = "#000";
        badge_name_flag = true;
    }
});


//Donation constraint validation
donation_constraint?.addEventListener("input", function () {
    // Quantity should be greater than zero
    var reg = /^\d+$/;
    if ((!reg.test(donation_constraint.value)) || (donation_constraint.value <= 0)) {

        donation_constraint.readOnly = false;
        donation_constraint_lable.innerHTML = "Donation constraint should be greater than zero";
        donation_constraint_lable.style.color = "red";
        donation_constraint_flag = false;
    } else {
        donation_constraint_lable.innerHTML = "Donation Constraint";
        donation_constraint_lable.style.color = "#000";
        donation_constraint_flag = true;
        
    }
});

// Description should be less than 100 characters
description?.addEventListener("input", function () {
    console.log(description.value.length);
    if (description.value.length > 255) {
        description_lable.innerHTML = "Description too long";
        description_lable.style.color = "red";
        description_flag = false;
    } else {
        description_lable.innerHTML = "Description";
        description_lable.style.color = "#000";
        description_flag = true;
    }
});

//quantity validation
quantity?.addEventListener("input", function () {
    // Quantity should be greater than zero
    var reg = /^\d+$/;
    if ((!reg.test(quantity.value)) || (quantity.value <= 0)) {

        quantity.readOnly = false;
        quantityLabel.innerHTML = "Amount should be greater than zero";
        quantityLabel.style.color = "red";
        quantity_flag = false;
        // submit.disabled = true;
    } else {
        quantityLabel.innerHTML = "Total amount:";
        quantityLabel.style.color = "#000000";
        quantity_flag = true;
        // submit.disabled = false;
    }
});







badge_form?.addEventListener("submit",function(e){
    if(!(badge_name_flag==true && donation_constraint_flag==true && description_flag==true && quantity_flag==true))
    {
        e.preventDefault();
    }
});



