const sign = document.getElementById("sign-in");
const modal = document.getElementById("modal");
const closeWindow = document.getElementById("close");

if (modal) {
    if (sign) {
        sign.addEventListener("click", () => {
            modal.classList.add("modal-open");
            modal.style.display = "flex";
        });
    }
    if (closeWindow) {
        closeWindow.addEventListener("click", () => {
            modal.classList.remove("modal-open");
            modal.style.display = "none";
        });
    }
}

