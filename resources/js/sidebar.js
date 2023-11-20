document.querySelector(".burger-icon").addEventListener("click", function () {
    var panel = document.querySelector(".panel");
    var burgerIcon = document.querySelector(".burger-icon");
    panel.classList.toggle("active");
    burgerIcon.classList.toggle("active");
});
