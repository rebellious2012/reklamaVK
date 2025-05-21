<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>My Client</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__block">
                <div class="burger" id="burger">
                    <span></span>
                </div>
                <div class="header__logo">
                    <a href="{{route('index')}}">
                        <img class="logo__image" src="./images/logo.svg" alt="лого">
                    </a>
                </div>
                <div class="header__navigation" id="navigation">
                    <nav class="header__nav" id="headerNavigation">
                        <a class="nav__item nav__item-mobile" href="#promotion"><span class="promotion">Продвижение</span></a>
                        <a class="nav__item nav__item-mobile" href="#how_we"><span class="tools">Как мы продвигаем ваш
                                бизнес</span></a>
                        <a class="nav__item nav__item-mobile" href="#calculate"><span class="calc">Калькулятор
                                доходности</span></a>
                        <a class="nav__item nav__item-mobile" href="#news"><span class="news">Новости</span></a>
                        <a class="btn btn__header-mobile" href="#">
                            <span>Начать сейчас</span>
                            <span class="btn__arrow">
                                <img class="" src="./images/arrow.svg" alt="arrow">
                            </span>
                        </a>
                    </nav>

                </div>
                <a href="#" class="btn btn-sign" id="sign-in"></a>
            </div>
        </div>
    </header>

    <main>
        <section class="banner-top">
            <div class="container">
                <div class="banner__content">
                    <div class="banner__content__text">
                        <h1 class="banner__title"><span>Реклама</span><br> которая приносит результат</h1>
                        <div class="button__box button__box-header">
                            <a class="btn btn-main" href="#">
                                <span>Получить доступ</span>
                                <span class="btn__arrow">
                                    <img class="" src="./images/arrow.svg" alt="arrow">
                                </span>
                            </a>
                            <a class="btn btn-more" href="#">Узнать больше</a>
                        </div>
                    </div>
                    <div class="banner__mockup__box banner-swiper">
                        <div class="swiper-wrapper banner-swiper-wrapper">
                            <div class="swiper-slide banner-slide">
                                <picture>
                                    <source media="(max-width: 425px)" srcset="./images/mockup-header-mob.svg">
                                    <img class="banner__mockup__img" src="./images/banner-top/Group-37.svg"
                                        alt="mockup">
                                </picture>
                            </div>
                            <div class="swiper-slide banner-slide">
                                <picture>
                                    <source media="(max-width: 425px)" srcset="./images/mockup-header-mob.svg">
                                    <img class="banner__mockup__img" src="./images/banner-top/Group-38.svg"
                                        alt="mockup">
                                </picture>
                            </div>
                        </div>
                        <div class="swiper-pagination banner-swiper__pagination"></div>
                    </div>

                </div>

                <a href="#">
                    <div class="box__scroll box__scroll-top">
                        <svg width="37" height="59" viewBox="0 0 37 59" fill="none">
                            <g clip-path="url(#clip0_45_1913)">
                                <path
                                    d="M19.7853 50.5695L36.5881 35.3721C37.1383 34.8742 37.1373 34.068 36.5852 33.5709C36.0332 33.0742 35.1389 33.0755 34.5883 33.5735L18.7856 47.8663L2.98301 33.573C2.43231 33.075 1.5386 33.0738 0.986477 33.5704C0.709705 33.8196 0.571319 34.146 0.571319 34.4725C0.571319 34.7981 0.708778 35.1233 0.983631 35.372L17.7859 50.5695C18.0505 50.8093 18.4105 50.9439 18.7856 50.9439C19.1607 50.9439 19.5203 50.8089 19.7853 50.5695Z"
                                    fill="white" />
                            </g>
                            <g clip-path="url(#clip1_45_1913)">
                                <path
                                    d="M19.7853 38.2838L36.5881 23.0864C37.1383 22.5885 37.1373 21.7824 36.5852 21.2853C36.0332 20.7886 35.1389 20.7899 34.5883 21.2878L18.7856 35.5806L2.98301 21.2873C2.43231 20.7894 1.5386 20.7881 0.986477 21.2848C0.709705 21.5339 0.571319 21.8604 0.571319 22.1869C0.571319 22.5125 0.708778 22.8376 0.983631 23.0864L17.7859 38.2838C18.0505 38.5237 18.4105 38.6582 18.7856 38.6582C19.1607 38.6582 19.5203 38.5233 19.7853 38.2838Z"
                                    fill="white" fill-opacity="0.3" />
                            </g>
                            <g clip-path="url(#clip2_45_1913)">
                                <path
                                    d="M19.7853 25.4267L36.5881 10.2293C37.1383 9.73134 37.1373 8.92519 36.5852 8.4281C36.0332 7.9314 35.1389 7.93268 34.5883 8.43067L18.7856 22.7235L2.98301 8.43015C2.43231 7.93223 1.5386 7.93094 0.986477 8.42759C0.709705 8.67677 0.571319 9.00322 0.571319 9.32968C0.571319 9.6553 0.708778 9.98046 0.983631 10.2292L17.7859 25.4267C18.0505 25.6665 18.4105 25.8011 18.7856 25.8011C19.1607 25.8011 19.5203 25.6661 19.7853 25.4267Z"
                                    fill="white" fill-opacity="0.1" />
                            </g>
                        </svg>
                    </div>
                </a>
            </div>
        </section>

        <!-- about -->
        <div class="about__section">
            <div class="container about__container">
                <div class="row flex">
                    <div class="item about__item__1">
                        <div class="card__about card__about-ticker ticker-bg" data-aos="zoom-in-down">
                            <div class="about__content">
                                <p class="about__title"><span class="counter">11</span> лет</p>
                                <p class="about__description">в сфере продвижения</p>
                            </div>
                        </div>
                    </div>
                    <div class="item about__item__2">
                        <div class="card__about card__about-dummy" data-aos="zoom-in-down">
                            <div class="about__content">
                                <p class="about__title"><span class="counter">4.8</span>М</p>
                                <p class="about__description">исполнителей в сервисе</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row flex">
                    <div class="item about__item__2">
                        <div class="card__about card__about-exercise" data-aos="zoom-in-down">
                            <div class="about__content">
                                <p class="about__title"><span class="counter">47.5</span>К</p>
                                <p class="about__description">заданий доступно сейчас</p>
                            </div>
                        </div>
                    </div>
                    <div class="item about__item__1">
                        <div class="card__about card__about-dollar" data-aos="zoom-in-down">
                            <div class="about__content">
                                <p class="about__title"><span class="counter">127.8</span>М</p>
                                <p class="about__description">выплачено исполнителям</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- promotion -->
        <div class="elipse-bg" id="promotion">
            <section class="section promotion__section">
                <div class="container">
                    <div class="section__logo__box">
                        <img class="section__logo__image" src="./images/megaphone.svg" alt="icon megaphone">
                    </div>
                    <h2 class="subtitle">Продвижение</h2>
                    <div class="promotion__cards">
                        <div class="promotion__card">
                            <div class="promotion__icon" data-aos="fade-up">
                                <img src="./images/s1_loyalty_b.svg" alt="">
                            </div>
                            <p class="promotion__desc" data-aos="fade-right" data-aos-duration="1000">
                                <span>Помощь</span><br> с модерацией даже
                                для физлиц
                            </p>
                        </div>
                        <div class="promotion__card">
                            <div class="promotion__icon" data-aos="fade-up">
                                <img src="./images/0ed12c74-52d6-44a7-93f7-43535baeeb94.svg" alt="">
                            </div>
                            <p class="promotion__desc" data-aos="fade-right" data-aos-duration="1000">
                                <span>Эффективная</span><br> помощь в
                                продаже вашим первым 20
                                клиентам
                            </p>
                        </div>
                        <div class="promotion__card">
                            <div class="promotion__icon" data-aos="fade-up">
                                <img src="./images/profile_icon_in_minimalist_3d_render_4.svg" alt="">
                            </div>
                            <p class="promotion__desc" data-aos="fade-right" data-aos-duration="1000">
                                <span>Персональный</span><br> куратор 24/7
                            </p>
                        </div>
                        <div class="promotion__card">
                            <div class="promotion__icon" data-aos="fade-up">
                                <img src="./images/5962551e-50db-4f2f-90bf-56bf51159638.svg" alt="">
                            </div>
                            <p class="promotion__desc" data-aos="fade-right" data-aos-duration="1000"><span>Ваш
                                    доход</span><br> будет расти уже
                                в течении первых 30
                                дней</p>
                        </div>
                    </div>

                    <a class="btn btn-main btn-center" href="#">
                        <span>Начать сейчас</span>
                        <span class="btn__arrow">
                            <img class="" src="./images/arrow.svg" alt="arrow">
                        </span>
                    </a>
                </div>
            </section>

            <!-- tools -->
            <section class="section tools__section">
                <div class="container">
                    <div class="section__logo__box">
                        <img class="section__logo__image" src="./images/tools.svg" alt="icon megaphone">
                    </div>
                    <h2 class="subtitle">Как мы продвигаем ваш бизнес</h2>
                    <div class="tools__cards">
                        <div class="tools__card">
                            <div class="tools__card__icon" data-aos="fade-up" data-aos-duration="500"
                                data-aos-delay="50">
                                <img src="./images/tools-row.webp" alt="">
                            </div>
                            <p class="tools__desc"><strong>Только проверенные</strong><br> рекламные платформы
                            </p>
                        </div>
                        <div class="tools__card">
                            <div class="tools__card__icon" data-aos="fade-up" data-aos-duration="500"
                                data-aos-delay="100">
                                <img src="./images/tools-sphere.webp" alt="">
                            </div>
                            <p class="tools__desc"><strong>Нейросеть</strong><br> подбирает идеальный сопсоб продвижения
                            </p>
                        </div>
                        <div class="tools__card">
                            <div class="tools__card__icon" data-aos="fade-up" data-aos-duration="500"
                                data-aos-delay="150">
                                <img src="./images/tools-docs.webp" alt="">
                            </div>
                            <p class="tools__desc"><strong>Автоматическая</strong><br> отчётность в ЕРИР
                            </p>
                        </div>
                    </div>
                    <div class="tools__cards__socbox">
                        <div class="card__social" data-aos="zoom-in-down">
                            <img src="./images/vkreclama.svg" alt="">
                        </div>
                        <div class="card__social" data-aos="zoom-in-down">
                            <img src="./images/mtc.svg" alt="">
                        </div>
                        <div class="card__social" data-aos="zoom-in-down">
                            <img src="./images/telegramAds.svg" alt="">
                        </div>
                        <div class="card__social" data-aos="zoom-in-down">
                            <img src="./images/yandexZen.svg" alt="">
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- banner-center -->
        <section class="section" id="how_we">
            <div class="container">
                <div class="section__logo__box">
                    <img class="section__logo__image" src="./images/diamond.svg" alt="icon megaphone">
                </div>
                <h2 class="subtitle">Сделайте свой бизнес заметным уже сегодня</h2>
            </div>

            <div class="banner-center">
                <a href="#">
                    <div class="box__scroll box__scroll-center">
                        <svg width="37" height="59" viewBox="0 0 37 59" fill="none">
                            <g clip-path="url(#clip0_45_1913)">
                                <path
                                    d="M19.7853 50.5695L36.5881 35.3721C37.1383 34.8742 37.1373 34.068 36.5852 33.5709C36.0332 33.0742 35.1389 33.0755 34.5883 33.5735L18.7856 47.8663L2.98301 33.573C2.43231 33.075 1.5386 33.0738 0.986477 33.5704C0.709705 33.8196 0.571319 34.146 0.571319 34.4725C0.571319 34.7981 0.708778 35.1233 0.983631 35.372L17.7859 50.5695C18.0505 50.8093 18.4105 50.9439 18.7856 50.9439C19.1607 50.9439 19.5203 50.8089 19.7853 50.5695Z"
                                    fill="white" />
                            </g>
                            <g clip-path="url(#clip1_45_1913)">
                                <path
                                    d="M19.7853 38.2838L36.5881 23.0864C37.1383 22.5885 37.1373 21.7824 36.5852 21.2853C36.0332 20.7886 35.1389 20.7899 34.5883 21.2878L18.7856 35.5806L2.98301 21.2873C2.43231 20.7894 1.5386 20.7881 0.986477 21.2848C0.709705 21.5339 0.571319 21.8604 0.571319 22.1869C0.571319 22.5125 0.708778 22.8376 0.983631 23.0864L17.7859 38.2838C18.0505 38.5237 18.4105 38.6582 18.7856 38.6582C19.1607 38.6582 19.5203 38.5233 19.7853 38.2838Z"
                                    fill="white" fill-opacity="0.3" />
                            </g>
                            <g clip-path="url(#clip2_45_1913)">
                                <path
                                    d="M19.7853 25.4267L36.5881 10.2293C37.1383 9.73134 37.1373 8.92519 36.5852 8.4281C36.0332 7.9314 35.1389 7.93268 34.5883 8.43067L18.7856 22.7235L2.98301 8.43015C2.43231 7.93223 1.5386 7.93094 0.986477 8.42759C0.709705 8.67677 0.571319 9.00322 0.571319 9.32968C0.571319 9.6553 0.708778 9.98046 0.983631 10.2292L17.7859 25.4267C18.0505 25.6665 18.4105 25.8011 18.7856 25.8011C19.1607 25.8011 19.5203 25.6661 19.7853 25.4267Z"
                                    fill="white" fill-opacity="0.1" />
                            </g>
                        </svg>
                    </div>
                </a>

                <div class="container banner-center__container">
                    <div class="banner-center__icons banner-center__icons-top">
                        <span class="icon__top icon__top-inst"><img src="./images/bubles-icon/inst-1.png" alt=""></span>
                        <span class="icon__top icon__top-tg"><img src="./images/bubles-icon/tg.png" alt=""></span>
                        <span class="icon__top icon__top-vid1"><img src="./images/bubles-icon/vid-1.png" alt=""></span>
                        <span class="icon__top icon__top-heart1"><img src="./images/bubles-icon/heart-1.png"
                                alt=""></span>
                        <span class="icon__top icon__top-heart2"><img src="./images/bubles-icon/heart-2.png"
                                alt=""></span>
                    </div>
                    <div class="banner-center__icons banner-center__icons-bottom">
                        <span class="icon__bottom icon__bottom-heart"><img src="./images/bubles-icon/heart-3.png"
                                alt=""></span>
                        <span class="icon__bottom icon__bottom-inst"><img src="./images/bubles-icon/inst-3.png"
                                alt=""></span>
                        <span class="icon__bottom icon__bottom-inst2"><img src="./images/bubles-icon/inst-2.png"
                                alt=""></span>
                        <span class="icon__bottom icon__bottom-tg"><img src="./images/bubles-icon/tg-2.png"
                                alt=""></span>
                        <span class="icon__bottom icon__bottom-vid"><img src="./images/bubles-icon/vid-2.png"
                                alt=""></span>
                    </div>
                    <div class="banner-center__content">
                        <div class="banner-center__img">
                            <picture>
                                <source media="(min-width: 425px)" srcset="./images/banner-center/phones.svg">
                                <img src="./images/banner-center/phone-banner.svg" alt="">
                            </picture>

                        </div>
                        <div class="banner-center__text text">
                            <p class="text__desc"><strong>Наша платформа помогает вам легко управлять рекламными
                                    кампаниями</strong> и достигать максимальных результатов.</p>
                            <p class="text__desc">Всё это — в несколько кликов</p>
                            <a class="btn btn-main" href="#">
                                <span>Начать сейчас</span>
                                <span class="btn__arrow">
                                    <img class="" src="./images/arrow.svg" alt="arrow">
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- calculate -->
        <section class="section" id="calculate">
            <div class="container">
                <div class="section__logo__box">
                    <img class="section__logo__image" src="./images/calculator.svg" alt="calculator">
                </div>
                <h2 class="subtitle">Калькулятор доходности</h2>
                <div class="flex calc__row">
                    <div class=" calc__item-X">
                        <div class="item calc__item">
                            <div class="card calc__card card-income">
                                <div class="card__box__image">
                                    <img src="./images/card.webp" alt="card">
                                </div>
                                <div class="calc__card__textcontent">
                                    <p class="calc__card__nums calc__card__nums-income"><span class="counter"
                                            data-target="155000">155 000</span> ₽
                                    </p>
                                    <p class="calc__card__desc">средний заработок наших клиентов</p>
                                </div>
                            </div>
                        </div>

                        <div class="item calc__item">
                            <div class="card calc__card card-profit">
                                <div class="card__box__image">
                                    <img src="./images/safe.svg" alt="safe">
                                </div>
                                <div class="calc__card__textcontent">
                                    <p class="calc__card__nums calc__card__nums-profit"><span class="counter"
                                            data-target="10000000">10 000 000</span> ₽</p>
                                    <p class="calc__card__desc">максимальная прибыль нашего клиента за месяц</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item calc__item-XL">
                        <div class="calc__card card-progress">
                            <div class="card__progress__content">
                                <p>
                                    <span class="progress__content__desc">Количество заявок</span>
                                    <span class="progress__content__numb value" data-target="200">0</span>
                                </p>
                                <div class="progress range">
                                    <div class="progress__line-bg">
                                        <div class="progress__line progress__line-proposal"></div>
                                    </div>
                                    <input type="range" class="progress__slider" min="0" max="100" value="0" id="range"
                                        step="1">
                                </div>
                            </div>
                            <div class="card__progress__content">
                                <p>
                                    <span class="progress__content__desc">Количество клиентов</span>
                                    <span class="progress__content__numb value" data-target="100">0</span>
                                </p>
                                <div class="progress range">
                                    <div class="progress__line-bg">
                                        <div class="progress__line progress__line-publicity"></div>
                                    </div>
                                    <input type="range" class="progress__slider" min="0" max="100" value="0" id="range"
                                        step="1">
                                </div>
                            </div>
                            <div>
                                <p class="progress__content__desc">ВАШ ПРИМЕРНЫЙ ЕЖЕМЕСЯЧНЫЙ ДОХОД</p>
                                <p class="progress__content__numb-XL"><span class="counter" data-target="0"></span>
                                    ₽</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- news section -->
@include('site.main.blogs.index')
        <!-- banner bottom -->
        <section class="section">
            <div class="container">
                <div class="bottom__banner">

                    <div class="bottom__banner__content">
                        <div class="bottom__banner__text">
                            <h3 class="bottom__banner__title"><span>Начни получать</span><br> новых клиентов уже сегодня
                            </h3>
                            <a class="btn btn-main btn-center" href="#">
                                <span>Начать сейчас</span>
                                <span class="btn__arrow">
                                    <img class="" src="./images/arrow.svg" alt="arrow">
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="bottom__banner__img__box">
                        <img src="./images/banner-bottom/fon-dt.png" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">

        <nav class="footer__nav footer__top">
            <div class="container">
                <div class="footer__log">
                    <a href="#" onclick="event.preventDefault()"><img src="./images/logo-footer.svg" alt=""></a>
                </div>
                <div class="footer__nav__list">
                    <a class="footer__nav__item" href="#">Помощь</a>
                    <a class="footer__nav__item" href="#">Правила</a>
                    <a class="footer__nav__item" href="#">Оферта</a>
                    <a class="footer__nav__item" href="#">Конфиденциальность</a>
                    <a class="footer__nav__item" href="#">Цены</a>
                    <a class="footer__nav__item" href="#">Api</a>
                    <a class="footer__nav__item" href="#">Контакты</a>
                </div>
            </div>
        </nav>

        <div class="footer__bottom container">
            <p class="footer__lic">© 2013 – 2024 Мой клиент</p>
        </div>

    </footer>

    <!-- modal -->
    <div class="modal" id="modal">
        <div class="modal__window">
            <div class="modal__close" id="close">
                <img src="./images/close.svg" alt="close">
            </div>

            <form id="form" class="form" action="{{ route('login') }}" method="post">
                @csrf
                <p class="form__title">Вход</p>
                <p class="form__desc">Не забудьте отключить VPN. Он может мешать работе SMS-уведомлений</p>
                <div class="input-control">
                    <label for="email"></label>
                    <input class="input input-email" id="email" name="email" type="email"
                        placeholder="Электронная почта или логин">
                @error('email')
                     <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="input-control">
                    <label for="password"></label>
                    <input class="input input-password" id="password" name="password" type="password"
                        placeholder="Пароль">
                    <span class="eye" id="eye">
                        <svg width="25" height="15" viewBox="0 0 25 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5 0C7.72348 0 3.39189 2.61328 0.195612 6.85793C-0.0652041 7.20569 -0.0652041 7.69152 0.195612 8.03928C3.39189 12.289 7.72348 14.9023 12.5 14.9023C17.2765 14.9023 21.6081 12.289 24.8044 8.04439C25.0652 7.69663 25.0652 7.2108 24.8044 6.86305C21.6081 2.61328 17.2765 0 12.5 0ZM12.8426 12.6982C9.67193 12.8976 7.05354 10.2843 7.25299 7.10852C7.41664 4.49013 9.53897 2.3678 12.1574 2.20415C15.3281 2.0047 17.9465 4.61798 17.747 7.7938C17.5782 10.4071 15.4559 12.5294 12.8426 12.6982ZM12.6841 10.2741C10.976 10.3815 9.56454 8.97515 9.67705 7.26706C9.76399 5.85558 10.9095 4.71515 12.321 4.6231C14.0291 4.5157 15.4406 5.92206 15.3281 7.63015C15.236 9.04674 14.0905 10.1872 12.6841 10.2741Z"
                                fill="#727272" />
                        </svg>
                    </span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <a class="password__forgot" href="#">Забыли пароль?</a>
                <button class="btn btn-submit">Войти в аккаунт</button>
                <p class="privacy">Нажимая <a href="">«продолжить»</a>, вы принимаете <strong>пользовательское
                        соглашение и политику конфиденциальности Передаваемые данные ›</strong></p>
            </form>
        </div>
    </div>

    <!-- scroll up -->
    <a href="#">
        <div class="page-scroll-box">
            <img src="./images/arrow-scroll-up.svg" alt="">
        </div>
    </a>



    <script src="{{asset('scripts/index.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('scripts/swiper-banner.js')}}"></script>
    <script src="{{asset('scripts/swiper-about.js')}}"></script>
    <script src="{{asset('scripts/swiper-promo.js')}}"></script>
    <script src="{{asset('scripts/swiper-news.js')}}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{asset('scripts/aos.js')}}"></script>
    <script src="{{asset('scripts/counter.js')}}"></script>
    <script >

        document.addEventListener('DOMContentLoaded', function() {

            @if(session('openModal'))

            const signInButton = document.getElementById('modal');

            if (signInButton) {

                signInButton.click();

            }

            @endif

        });

    </script>

</body>

</html>
