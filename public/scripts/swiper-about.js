$(document).ready(function () {
    function initializeSwiper() {
        var screenWidth = $(window).width();

        if (screenWidth <= 600 && !$('.about__container').hasClass('swiper-about')) {
            $('.about__container').addClass('swiper-about');

            var swiperWrapper = $('<div class="swiper-wrapper swiper-wrapper-about"></div>');

            $('.about__section .row .item').each(function () {
                var slide = $('<div class="swiper-slide"></div>').append($(this).clone());
                swiperWrapper.append(slide);
            });

            $('.about__container').html(swiperWrapper);

            // Добавляем кнопки навигации
            $('.swiper-about').append('<div class="swiper-pagination"></div>'); // Добавляем пагинацию

            // Инициализация Swiper
            var swiper = new Swiper('.swiper-about', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }
    }

    initializeSwiper();

    $(window).resize(function () {
        initializeSwiper();
    });
});






