// const burger = document.getElementById("burger");
// const mobileMenu = document.getElementById("mobile-menu");
// const mobile = document.getElementById("mobile");

// if (burger) {
//     burger.addEventListener("click", () => {
//         burger.classList.toggle("active");
//         if (mobileMenu) {
//             mobileMenu.classList.toggle("open");
//         }
//         if (mobile) {
//             mobile.classList.toggle("open");
//         }
//     });
// }

const menuIcon = document.getElementById('menuIcon');
const navContainer = document.querySelector('.mobile-menu');
const menuImage = menuIcon.querySelector('.menu-icon-visible');
const closeImage = menuIcon.querySelector('.close-icon-hidden');
const overlay = document.getElementById('overlay');

menuIcon.addEventListener('click', () => {
    navContainer.classList.toggle('active');
    menuImage.classList.toggle('menu-icon-visible');
    menuImage.classList.toggle('close-icon-hidden');
    closeImage.classList.toggle('menu-icon-visible');
    closeImage.classList.toggle('close-icon-hidden');
    overlay.style.display = navContainer.classList.contains('active') ? 'block' : 'none';
});
