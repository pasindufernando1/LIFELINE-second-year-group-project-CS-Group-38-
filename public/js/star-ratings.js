var count = 0;
var selected = 0;
var same_star_count = 0;

function edit_stars(num) {

    // if (count == 0) {
    //     console.log("count is 0")
    //     console.log(num);
    //     for (let i = 1; i <= num; i++) {
    //         console.log("star" + i + "yellow");
    //         document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
    //     }
    //     for (let i = (num + 1); i <= 5; i++) {
    //         console.log("star" + i + "grey");
    //         document.getElementById("in-star" + i).src = "./../../public/img/donordashboard/grey_star.png";
    //     }
    // }
    if (selected != num) {
        // console.log("count is odd");
        for (let i = 1; i <= num; i++) {
            console.log("star" + i + "yellow")
            document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
        }
        for (let i = (num + 1); i <= 5; i++) {
            console.log("star" + i + "grey");
            document.getElementById("in-star" + i).src = "./../../public/img/donordashboard/grey_star.png";
        }
        for (let i = 1; i <= 5; i++) {
            document.getElementById("in-star" + i).disabled = false;
        }
        // for (let i = 1; i <= num; i++) {
        //     console.log("star" + i + "yellow")
        //     document.getElementById("star" + i).src = "./../../public/img/donordashboard/yellow_star.png";
        // }
        // for (let i = (num + 1); i <= 5; i++) {
        //     console.log("star" + i + "grey");
        //     document.getElementById("in-star" + i).src = "./../../public/img/donordashboard/grey_star.png";
        // }

    } else if (selected == num) {
        // same_star_count = 1;
        for (let i = 1; i <= 5; i++) {
            console.log("star" + i + "disabled");
            document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
            document.getElementById("in-star" + i).disabled = true;
        }
    }
    selected = num;
    count++;
}

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
        for (let i = 1; i <= 5; i++) {
            document.getElementById("star" + i).src = "./../../public/img/donordashboard/grey_star.png";
            document.getElementById("in-star" + i).disabled = true;
            //unset the post variable of rating
            // document.querySelector("#rating_star").value = 0;


        }
    }
    count++;

}



