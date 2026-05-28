// Show image main
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("galeri-item")) {
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-img").src = src;
        const myModal = new bootstrap.Modal(
            document.getElementById("galeri-popup")
        );
        myModal.show();
    }
});

// scroll up
function scrollUp() {
    const scrollUp = document.getElementById("scroll-up");
    // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if (this.scrollY >= 560) scrollUp.classList.add("show-scroll");
    else scrollUp.classList.remove("show-scroll");
}
window.addEventListener("scroll", scrollUp);
