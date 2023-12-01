document.addEventListener("click", (event) => {
    const clickedLine = event.target.closest(".line");
    if (clickedLine) {
        const placeContainers = document.querySelectorAll(".place-container");
        placeContainers.forEach((container) => {
            container.classList.toggle("show");
        });
    }
});

document.addEventListener("click", (event) => {
    const clickedElement = event.target;

    if (clickedElement.classList.contains("place-container")) {
        const placeContainer = clickedElement;
        const bakkenElement = placeContainer.querySelector(".bakken");

        // Hide all bakken elements
        const allBakkenElements = document.querySelectorAll(".bakken");
        allBakkenElements.forEach((bakken) => {
            bakken.classList.remove("show");
        });

        // Show the bakken element for the clicked place container
        bakkenElement.classList.toggle("show");
    }
});
