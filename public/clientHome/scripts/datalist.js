// datalist
function openDatalist() {
    const input = document.querySelector("#datalist-input");
    const options = document.querySelector("#datalist-options");
    const arrow = document.querySelector(".datalist__arrow__box img");

    if (input && options && arrow) {
        input.addEventListener("focus", () => {
            options.classList.add("active");
            arrow.classList.add("open");
        });

        input.addEventListener("input", () => {
            options.classList.add("active");
            arrow.classList.add("open");
        });

        options.addEventListener("click", (e) => {
            if (e.target.classList.contains("datalist-option")) {
                input.value = e.target.textContent;
                options.classList.remove("active");
                arrow.classList.remove("open");
            }
        });
    }
    if (options && arrow) {
        window.addEventListener("click", (e) => {
            if (!document.querySelector(".custom-datalist").contains(e.target)) {
                options.classList.remove("active");
                arrow.classList.remove("open");
            }
        });
    }
}

openDatalist();

// select number
function openNumsList() {
    const numberMenu = document.getElementById("number-Menu");
    const numberMenuItem = document.getElementById("number-Item");
    const selectedFlag = document.getElementById("selected-flag");
    if (selectedFlag) {
        selectedFlag.addEventListener("click", () => {
            numberMenu.classList.toggle("active");
        });
    }
}

openNumsList();

// selection bank
function selectBank() {
    const selectionBank = document.getElementById("selection-bank");
    const optionsBank = document.getElementById("options__bank");
    const arrow = document.querySelector(".datalist__arrow__box img");

    if (selectionBank && optionsBank && arrow) {
        selectionBank.addEventListener("focus", () => {
            optionsBank.classList.add("active");
            arrow.classList.add("open");
        });

        selectionBank.addEventListener("input", () => {
            optionsBank.classList.add("active");
            arrow.classList.add("open");
        });
        optionsBank.addEventListener("click", (e) => {
            if (e.target.classList.contains("option__bank")) {
                selectionBank.value = e.target.textContent;
                optionsBank.classList.remove("active");
                arrow.classList.remove("open");
            }
        });
    }
}

selectBank();



