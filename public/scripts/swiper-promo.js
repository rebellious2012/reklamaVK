$(document).ready(function () {
    function initializePromotionSwiper() {
        var screenWidth = $(window).width();
        var $container = $('.promotion__cards');

        if (screenWidth <= 600) {
            if (!$container.hasClass('swiper-promo')) {
                // Удаляем display: grid;
                $container.css('display', 'block');

                // Добавляем Swiper-классы
                $container.addClass('swiper-promo');
                $container.children().wrapAll('<div class="swiper-wrapper swiper-wrapper-promo"></div>');
                $container.find('.promotion__card').addClass('swiper-slide');

                // Добавляем пагинацию
                $container.append('<div class="swiper-pagination swiper-pagination-promo"></div>');

                // Инициализируем Swiper
                new Swiper('.swiper-promo', {
                    loop: true,
                    slidesPerView: 1.2,
                    spaceBetween: 15,
                    pagination: {
                        el: '.swiper-pagination-promo',
                        clickable: true,
                    },
                });
            }
        } else {
            if ($container.hasClass('swiper-promo')) {
                // Возвращаем display: grid;
                $container.css('display', 'grid');

                // Удаляем Swiper-классы и возвращаем HTML в исходное состояние
                $container.removeClass('swiper-promo');
                $container.find('.promotion__card').removeClass('swiper-slide');
                $container.find('.swiper-wrapper').children().unwrap();
                $container.find('.swiper-pagination-promo').remove();
            }
        }
    }

    // Запуск при загрузке страницы
    initializePromotionSwiper();

    // Перезапуск при изменении размера окна
    $(window).resize(function () {
        initializePromotionSwiper();
    });
});
