$(document).ready(function() {
    function initializePromotionSwiper() {
        var screenWidth = $(window).width();

        if (screenWidth <= 768 && !$('.promotion__row').hasClass('swiper-container')) {
            // Добавляем класс swiper-container к promotion__row
            $('.promotion__row').addClass('swiper-container');
            
            // Оборачиваем карточки в swiper-wrapper и добавляем класс swiper-slide к каждой карточке
            $('.promotion__row .promotion__item').wrapAll('<div class="swiper-wrapper"></div>');
            $('.promotion__row .promotion__item').addClass('swiper-slide');

            // Добавляем кнопки навигации и пагинацию
            $('.promotion__row').append('<div class="swiper-button-next"></div>');
            $('.promotion__row').append('<div class="swiper-button-prev"></div>');
            $('.promotion__row').append('<div class="swiper-pagination"></div>');

            // Инициализация Swiper
            var swiper = new Swiper('.promotion__row', {
                loop: true,
                slidesPerView: 1, // Отображаем по одному слайду
                spaceBetween: 20, // Отступы между слайдами
                // autoplay: {
                //     delay: 3000,
                //     disableOnInteraction: false,
                // },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 1,
                    },
                    1024: {
                        slidesPerView: 1,
                    }
                }
            });
        }
    }

    // Инициализация при загрузке страницы
    initializePromotionSwiper();

    // Перезапуск при изменении размера окна
    $(window).resize(function() {
        initializePromotionSwiper();
    });
});
