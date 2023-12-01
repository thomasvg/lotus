const forms = document.querySelectorAll(".activation");

forms.forEach((form) => {
    form.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent default form submission

        // Manually submit the form
        const formAction = form.getAttribute("action");
        const formData = new FormData(form);

        fetch(formAction, {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                // Handle successful response
                console.log("Form submitted successfully");
                // Wait for 2 seconds before reloading the page
            })
            .catch((error) => {
                // Handle error
                console.error(error);
            });

        setTimeout(function () {
            window.location.reload(); // Reload the page
        }, 2000);
    });
});

const formAction = form.getAttribute("action");
const formData = new FormData(form);

fetch(formAction, {
    method: "POST",
    body: formData,
})
    .then((response) => response.json())
    .then((data) => {
        // Handle successful response and reload the page
        console.log("Form submitted successfully");
        window.location.reload(); // Reload the page
    })
    .catch((error) => {
        // Handle error
        console.error(error);
    });
setTimeout(() => {
    window.location.reload(); // Reload the page after 2 seconds
}, 2000);
