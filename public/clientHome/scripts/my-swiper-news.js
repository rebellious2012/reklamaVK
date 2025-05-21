$(document).ready(function() {
    function initializeNewsSwiper() {
        var screenWidth = $(window).width();

        if (screenWidth <= 768 && !$('.news__row').hasClass('swiper-container')) {
            // Добавляем класс swiper-container к news__row
            $('.news__row').addClass('swiper-container');
            
            // Оборачиваем карточки в swiper-wrapper и добавляем класс swiper-slide к каждой карточке
            $('.news__row > .news__card__item').wrapAll('<div class="swiper-wrapper"></div>');
            $('.news__row .news__card__item').addClass('swiper-slide');

            // Добавляем кнопки навигации и пагинацию
            $('.news__row').append('<div class="swiper-button-next"></div>');
            $('.news__row').append('<div class="swiper-button-prev"></div>');
            $('.news__row').append('<div class="swiper-pagination"></div>');

            // Инициализация Swiper
            var swiper = new Swiper('.news__row', {
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
    initializeNewsSwiper();

    // Перезапуск при изменении размера окна
    $(window).resize(function() {
        initializeNewsSwiper();
    });
});
