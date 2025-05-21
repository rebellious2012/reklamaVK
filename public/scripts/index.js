const burger = document.getElementById("burger");
const burgerLine = document.querySelector("#burger span");

const sign = document.getElementById("sign-in");
const modal = document.getElementById("modal");
const closeWindow = document.getElementById("close");

const mobileModal = document.getElementById("navigation");
const mobileNav = document.getElementById("headerNavigation");

const openPassword = document.getElementById("eye");
const inputPassword = document.getElementById("password");
const isPassword = inputPassword.type === "password";

const scrollButton = document.querySelectorAll(".box__scroll");

burger.addEventListener("click", () => {
    burger.classList.toggle("active");
    burgerLine.classList.toggle("active");
    mobileModal.classList.toggle("active");
    mobileNav.classList.toggle("active");
    document.body.classList.toggle("no-scroll");
})


sign.addEventListener('click', () => {
    modal.classList.add('modal-open');
    modal.style.display = 'flex';
    document.body.classList.add("no-scroll");

})

closeWindow.addEventListener('click', () => {
    modal.classList.remove('modal-open');
    modal.style.display = 'none';
    document.body.classList.remove("no-scroll");
})


// password visible
openPassword.addEventListener("click", () => {
    const inputPassword = document.getElementById("password");
    const isPassword = inputPassword.type === "password";

    inputPassword.type = isPassword ? "text" : "password";
    openPassword.classList.toggle("close");
    inputPassword.classList.toggle("focused");

})

scrollButton.forEach((button => button.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollBy({ top: window.innerHeight * 0.5 })
})))