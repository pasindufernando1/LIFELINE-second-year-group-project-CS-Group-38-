function showPopup(event) {
    event.preventDefault(); // prevent following the link
    var popup = document.querySelector(".popup");
    popup.style.display = "block"; // show the pop-up box
    var yesButton = document.querySelector(".yes-button");
    yesButton.onclick = function () {
        window.location.href = event.target.href; // follow the link
    };
    var noButton = document.querySelector(".no-button");
    noButton.onclick = function () {
        popup.style.display = "none"; // hide the pop-up box
    };
}

function showPopupc(event) {
    event.preventDefault(); // prevent following the link
    var popup = document.getElementById("popupc");
    popup.style.display = "block"; // show the pop-up box
    var yesButton = document.getElementById("yes-button");
    yesButton.onclick = function () {
        window.location.href = event.target.href; // follow the link
    };

}

function hidealert() {
    var popup = document.querySelector(".popup");
    popup.style.display = "none";
}

function hidealertc() {
    var popup = document.getElementById("popupc");
    popup.style.display = "none";
}