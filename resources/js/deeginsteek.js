const bakken = document.querySelectorAll(".individualBak");

const mdl = document.querySelector(".mdl");
var div_list = document.querySelectorAll(".individualBak"); // returns NodeList
var div_array = [...div_list]; // converts NodeList to Array
div_array.forEach((div) => {
    // do something awesome with each div

    div.addEventListener("click", () => {
        var bak = div.textContent;

        console.log(lineNumber);
        showInModal(bak, lineNumber);
        mdl.style.display = "block";
    });
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == mdl) {
        mdl.style.display = "none";
    }
};

function showInModal(bak) {
    document.getElementById("modalBak").textContent = "bak" + bak + "op lijn";
    document.getElementById("bakInput").value = bak;
}

const lineSelect = document.querySelector("#line");
const lineNumberInput = document.querySelector("#lineNumber");

lineSelect.addEventListener("change", () => {
    lineNumberInput.value = lineSelect.value;
});
