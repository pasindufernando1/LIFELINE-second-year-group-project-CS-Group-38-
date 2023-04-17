
function hov(num) {
    for (let i = 1; i <= num; i++) {
        document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
        document.getElementById("star" + i).addEventListener("click", function () {
            for (let j = 1; j <= i; j++) {
                document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
            }
        });
    }
}

function norm(num) {
    for (let i = 1; i <= num; i++) {
        document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
        document.getElementById("star" + i).addEventListener("mouseout", function () {

        });
    }
}


function rate(num) {
    for (let i = 1; i <= num; i++) {
        document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
    }
}

// rating function for star rating system
window.onload = function () {
    setInterval(function () {
        for (let i = 1; i <= 5; i++) {
            document.getElementById("star" + i).addEventListener("mouseover", function () {
                hov(i);
            });
            document.getElementById("star" + i).addEventListener("mouseout", function () {
                norm(i);
            });
            // document.getElementById("star" + i).addEventListener("click", function () {
            //     rate(i);
            // }
        }
    }, 1000);

};

