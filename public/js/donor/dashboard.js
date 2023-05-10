function scrollToDiv() {
    console.log("scrolling");
    var div = document.getElementById("see-more-container");
    var offset = 100;
    var bodyRect = document.body.getBoundingClientRect().top;
    var elementRect = div.getBoundingClientRect().top;
    var elementPosition = elementRect - bodyRect;
    var offsetPosition = elementPosition - offset;

    window.scrollTo({
        top: offsetPosition,
        behavior: "smooth"
    });
}
