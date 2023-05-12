const form = document.getElementById('addform');
const amount = document.getElementById('amount');
var amountflag = true;
const amount_lable = document.getElementById('amount-label');

//amount validation
amount?.addEventListener("input", function () {
    var reg = /^[0-9]+$/;
    if (!reg.test(amount.value)) {
        amount_lable.innerHTML = "Donation amount can only include numbers";
        amount_lable.style.color = "red";
        amount.style.borderColor = "red";
        amountflag = false

    } else {
        amount_lable.innerHTML = "Amount(Rs.):";
        amount_lable.style.color = "black";
        amount.style.borderColor = "#FBDAD9";
        amountflag = true;
    }
});

form?.addEventListener("submit", function (e) {

    if (!(amountflag == true)) {
        e.preventDefault();
    }
});
