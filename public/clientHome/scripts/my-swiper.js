$(document).ready(function() {
    function initializeSwiper() {
        var screenWidth = $(window).width();

        if (screenWidth <= 768 && !$('.about__section .container').hasClass('swiper-container')) {
            $('.about__section .container').addClass('swiper-container');

            var swiperWrapper = $('<div class="swiper-wrapper"></div>');

            $('.about__section .row .item').each(function() {
                var slide = $('<div class="swiper-slide"></div>').append($(this).clone());
                swiperWrapper.append(slide);
            });

            $('.about__section .container').html(swiperWrapper);

            // Добавляем кнопки навигации
            $('.about__section .swiper-container').append('<div class="swiper-button-next"></div>');
            $('.about__section .swiper-container').append('<div class="swiper-button-prev"></div>');
            $('.about__section .swiper-container').append('<div class="swiper-pagination"></div>'); // Добавляем пагинацию

            // Инициализация Swiper
            var swiper = new Swiper('.swiper-container', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
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
            });
        }
    }

    initializeSwiper();

    $(window).resize(function() {
        initializeSwiper();
    });
});






