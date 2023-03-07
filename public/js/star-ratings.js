var count = 0;

function change_stars(num) {

    if (count == 0) {
        for (let i = 1; i <= num; i++) {
            document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
        }
    }
    if (count % 2 == 0) {
        for (let i = 1; i <= num; i++) {
            document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
        }
    } else {
        for (let i = 1; i <= num; i++) {
            document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
        }
    }
    count++;

}



