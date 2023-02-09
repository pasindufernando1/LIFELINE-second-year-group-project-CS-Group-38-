// var x = 5;
// console.log(x);

// function rate(num) {
//     for (let i = 1; i <= num; i++) {
//         document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
//     }
//     for (let i = num + 1; i <= 5; i++) {
//         document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
//     }
// }

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

// var img = document.getElementById("hoverImg");

// img.addEventListener("mouseover", function () {
//     img.src = "image2.jpg";
// });

// img.addEventListener("mouseout", function () {
//     img.src = "image1.jpg";
// });

// function rate(num) {
//     for (let i = 1; i <= num; i++) {
//         document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
//     }
//     for (let i = num + 1; i <= 5; i++) {
//         document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
//     }
//     return;
// }

// function hov(num) {
//     for (let i = 1; i <= num; i++) {
//         document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";

//     }
// }

// function norm(num) {
//     for (let i = 1; i <= num; i++) {
//         document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
//     }
// }



// function hov(num) {
//     for (let i = 1; i <= num; i++) {
//         document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";

//     }
// }

// function norm() {
//     for (let i = 1; i <= 5; i++) {
//         document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
//     }
// }

// var rate_flag = false;

// function rate(num) {
//     if (rate_flag == false) {
//         for (let i = 1; i <= num; i++) {
//             document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
//         }
//         for (let i = num + 1; i <= 5; i++) {
//             document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
//         }
//         rate_flag = true;
//         return true;
//     }
//     else {
//         for (let i = 1; i <= 5; i++) {
//             document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
//         }
//         rate_flag = false;
//         return false;
//     }
// }

// var img = document.getElementsByClassName("rating_star");

// for (i = 0; i < img.length; i) {
//     img[i].addEventListener("mouseover", function () {
//         for (j = 0; j < 5; i++) {
//             img[i].src = "./../../public/img/donordashboard/yellow_star.png";
//         }
//     }
//     )
// }
// img.addEventListener("mouseout", function () {
//     img.src = "./../../public/img/donordashboard/grey_star.png";
// });