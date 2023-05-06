var selected = 0;
var same_star_count = 0;

console.log('star-ratings.js loaded');

function change_stars(num) {
    for (let i = 1; i <= num; i++) {
        document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
    }
    for (let i = (num + 1); i <= 5; i++) {
        document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
    }

}
