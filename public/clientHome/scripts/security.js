//выпадалка
document.addEventListener("DOMContentLoaded", function() {
    const selected = document.querySelector(".selected");
    const optionsContainer = document.querySelector(".options");
    const optionsList = document.querySelectorAll(".options span");

    if (optionsContainer) {
        if (selected) {
            selected.addEventListener("click", () => {
                optionsContainer.style.display = optionsContainer.style.display === "block" ? "none" : "block";
            });
        }
        if (optionsList && selected) {
            optionsList.forEach(option => {
                option.addEventListener("click", () => {
                    selected.textContent = option.textContent;
                    optionsContainer.style.display = "none";
                });
            });
        }
        document.addEventListener("click", function(event) {
            if (!event.target.closest(".custom-select")) {
                optionsContainer.style.display = "none";
            }
        });
    }
});
