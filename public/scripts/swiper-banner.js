const swiper = new Swiper('.banner-swiper', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});