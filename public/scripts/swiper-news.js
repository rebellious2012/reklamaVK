$(document).ready(function () {
    function initializeNewsSwiper() {
        var screenWidth = $(window).width();

        if (screenWidth <= 600 && !$('.news__row').hasClass('swiper-news')) {
            // Добавляем класс swiper-container к news__row
            $('.news__row').addClass('swiper-news');

            // Оборачиваем карточки в swiper-wrapper и добавляем класс swiper-slide к каждой карточке
            $('.news__row > .news__card__item').wrapAll('<div class="swiper-wrapper"></div>');
            $('.news__row .news__card__item').addClass('swiper-slide');

            // Добавляем кнопки навигации и пагинацию
            $('.news__row').append('<div class="swiper-pagination"></div>');

            // Инициализация Swiper
            var swiper = new Swiper('.swiper-news', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    600: {
                        slidesPerView: 1,
                    },
                }
            });
        }
    }

    // Инициализация при загрузке страницы
    initializeNewsSwiper();

    // Перезапуск при изменении размера окна
    $(window).resize(function () {
        initializeNewsSwiper();
    });
});
