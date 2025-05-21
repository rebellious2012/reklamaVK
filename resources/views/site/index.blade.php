<!DOCTYPE html>

<html lang="ru">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="{{ asset('clientHome/css/index.css') }}">



</head>



<body>

<header class="header">

    <div class="container header__container">

        <nav class="nav header__nav">

            <div class="company">

                <div class="company__logo__box">

                    <img class="company__logo" src="{{ asset('clientHome/images/logo.svg') }}" alt="company logo">

                </div>

                <h2 class="company__name">Мой Клиент</h2>

            </div>

            <button type="button" class="btn btn__signin" id="sign-in">Войти</button>

        </nav>

    </div>

</header>



<main class="main">

    <section class="banner">

        <div class="container">

            <div class="banner__content">

                <div class="banner__content__text">

                    <h1 class="banner__title">Привлекайте и удерживайте клиентов с помощью нашей рекламной платформы

                    </h1>

                    <a class="btn main__btn main__btn-grad" href="{{route('home')}}">

                        <span>Начать сейчас</span>

                        <span>

                            <img class="main__btn__arrow" src="{{ asset('clientHome/images/arrow.svg') }}" alt="arrow">

                        </span>

                    </a>

                </div>

                <picture class="banner__mockup__box banner__mockup__box-up">

                    <source media="(max-width: 768px)" srcset="{{ asset('clientHome/images/bg/header-mob-fon.png') }}">

                    <img class="banner__mockup__img" src="{{ asset('clientHome/images/mockup-header.png') }}" alt="mockup">

                </picture>

            </div>



            <a href="#">

                <div class="box__scroll box__scroll-top">

                    <svg width="37" height="59" viewBox="0 0 37 59" fill="none">

                        <g clip-path="url(#clip0_45_1913)">

                            <path

                                    d="M19.7853 50.5695L36.5881 35.3721C37.1383 34.8742 37.1373 34.068 36.5852 33.5709C36.0332 33.0742 35.1389 33.0755 34.5883 33.5735L18.7856 47.8663L2.98301 33.573C2.43231 33.075 1.5386 33.0738 0.986477 33.5704C0.709705 33.8196 0.571319 34.146 0.571319 34.4725C0.571319 34.7981 0.708778 35.1233 0.983631 35.372L17.7859 50.5695C18.0505 50.8093 18.4105 50.9439 18.7856 50.9439C19.1607 50.9439 19.5203 50.8089 19.7853 50.5695Z"

                                    fill="white"/>

                        </g>

                        <g clip-path="url(#clip1_45_1913)">

                            <path

                                    d="M19.7853 38.2838L36.5881 23.0864C37.1383 22.5885 37.1373 21.7824 36.5852 21.2853C36.0332 20.7886 35.1389 20.7899 34.5883 21.2878L18.7856 35.5806L2.98301 21.2873C2.43231 20.7894 1.5386 20.7881 0.986477 21.2848C0.709705 21.5339 0.571319 21.8604 0.571319 22.1869C0.571319 22.5125 0.708778 22.8376 0.983631 23.0864L17.7859 38.2838C18.0505 38.5237 18.4105 38.6582 18.7856 38.6582C19.1607 38.6582 19.5203 38.5233 19.7853 38.2838Z"

                                    fill="white" fill-opacity="0.3"/>

                        </g>

                        <g clip-path="url(#clip2_45_1913)">

                            <path

                                    d="M19.7853 25.4267L36.5881 10.2293C37.1383 9.73134 37.1373 8.92519 36.5852 8.4281C36.0332 7.9314 35.1389 7.93268 34.5883 8.43067L18.7856 22.7235L2.98301 8.43015C2.43231 7.93223 1.5386 7.93094 0.986477 8.42759C0.709705 8.67677 0.571319 9.00322 0.571319 9.32968C0.571319 9.6553 0.708778 9.98046 0.983631 10.2292L17.7859 25.4267C18.0505 25.6665 18.4105 25.8011 18.7856 25.8011C19.1607 25.8011 19.5203 25.6661 19.7853 25.4267Z"

                                    fill="white" fill-opacity="0.1"/>

                        </g>

                    </svg>

                </div>

            </a>

        </div>

    </section>





    <!-- about -->

    <div class="about__section">

        <div class="container">

            <div class="swiper-pagination"></div>

            <div class="row flex">

                <div class="item about__item__1">

                    <div class="card__about ticker-bg">

                        <div class="about__content">

                            <p class="about__title">11 лет</p>

                            <p class="about__description">в сфере продвижения</p>

                        </div>

                    </div>

                </div>

                <div class="item about__item__2">

                    <div class="card__about dummy">

                        <div class="about__content">

                            <p class="about__title">4.8М</p>

                            <p class="about__description">исполнителей в сервисе</p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row flex">

                <div class="item about__item__2">

                    <div class="card__about exercise">

                        <div class="about__content">

                            <p class="about__title">47.5К</p>

                            <p class="about__description">заданий доступно сейчас</p>

                        </div>

                    </div>

                </div>

                <div class="item about__item__1">

                    <div class="card__about dollar">

                        <div class="about__content">

                            <p class="about__title">127.8М</p>

                            <p class="about__description">выплачено исполнителям</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>





    <!-- promotion -->

    <div class="bg-ellipse">

        <section class="section promotion__section">

            <div class="container">

                <div class="section__logo__box">

                    <img class="section__logo__image" src="{{ asset('clientHome/images/megaphone.svg') }}" alt="icon megaphone">

                </div>

                <h2 class="subtitle">Продвижение</h2>

                <div class="grid promotion__row">

                    <div class="promotion__item">

                        <div class="card promotion__cont__box">

                            <div class="promotion__cont__icon__box">

                                <img class="promotion__cont__icon" src="{{ asset('clientHome/images/help.svg') }}" alt="help icon">

                            </div>

                            <p class="promotion__cont__desc">Помощь в прохождении модерации даже если вы физ

                                                             лицо

                            </p>

                            <img class="promotion__cont__box__img" src="{{ asset('clientHome/images/promo-mask.svg') }}" alt="">

                        </div>

                    </div>

                    <div class="promotion__item">

                        <div class="card promotion__cont__box">

                            <div class="promotion__cont__icon__box">

                                <img class="promotion__cont__icon" src="{{ asset('clientHome/images/basket.svg') }}" alt="basket icon">

                            </div>

                            <p class="promotion__cont__desc">Помощь

                                <br>

                                                             в продаже первым 20 клиентам

                            </p>

                            <img class="promotion__cont__box__img" src="{{ asset('clientHome/images/promo-mask.svg') }}" alt="">

                        </div>

                    </div>

                    <div class="promotion__item">

                        <div class="card promotion__cont__box">

                            <div class="promotion__cont__icon__box">

                                <img class="promotion__cont__icon" src="{{ asset('clientHome/images/support.svg') }}" alt="support icon">

                            </div>

                            <p class="promotion__cont__desc">24/7 у вас будет собственный

                                <br>

                                                             куратор

                            </p>

                            <img class="promotion__cont__box__img" src="{{ asset('clientHome/images/promo-mask.svg') }}" alt="">

                        </div>

                    </div>

                    <div class="promotion__item">

                        <div class="card promotion__cont__box">

                            <div class="promotion__cont__icon__box">

                                <img class="promotion__cont__icon" src="{{ asset('clientHome/images/income.svg') }}" alt="income icon">

                            </div>

                            <p class="promotion__cont__desc">Гарантируем увеличение вашего заработка в

                                                             больше чем 10

                                                             раз за 1-3 месяца</p>

                            <img class="promotion__cont__box__img" src="{{ asset('clientHome/images/promo-mask.svg') }}" alt="">

                        </div>

                    </div>

                </div>

                <a class="btn main__btn main__btn-color" href="#">

                    <span>Начать сейчас</span>

                    <span>

                        <img class="main__btn__arrow" src="{{ asset('clientHome/images/arrow.svg') }}" alt="arrow">

                    </span>

                </a>

            </div>

        </section>

        <!-- tools -->

        <section class="section tools">

            <div class="container">

                <div class="section__logo__box">

                    <img class="section__logo__image" src="{{ asset('clientHome/images/tools.svg') }}" alt="icon tools">

                </div>

                <h2 class="subtitle">Инструменты</h2>

                <div class="grid tools__row">



                    <div class="card">

                        <div class="tools__icon__box">

                            <img class="tools__icon" src="{{ asset('clientHome/images/tools-row.webp') }}" alt="big arrow icon">

                        </div>

                        <p class="tools__desc"><strong>Продвижение</strong> будет через лучшие рекламные

                                                                            площадки</p>

                    </div>





                    <div class="card">

                        <div class="tools__icon__box">

                            <img class="tools__icon" src="{{ asset('clientHome/images/tools-sphere.webp') }}" alt="sphere icon">

                        </div>

                        <p class="tools__desc"><strong>Наша нейросеть</strong>

                            <br>

                            сама подбирает лучший метод

                            продвижения для вашего направления

                        </p>

                    </div>





                    <div class="card">

                        <div class="tools__icon__box">

                            <img class="tools__icon" src="{{ asset('clientHome/images/tools-docs.webp') }}" alt="docs icon">

                        </div>

                        <p class="tools__desc"><strong>Собственная</strong>

                            <br>

                            Автоматическая / бесплатная

                            передача

                            отчётов в ЕРИР, по каждому рекламному объявлению.

                        </p>

                    </div>

                </div>



                <div class="grid tools__row tools__row-social">

                    <div class="card tools__card">

                        <img src="{{ asset('clientHome/images/vk.svg') }}" alt="vk logo">

                    </div>



                    <div class="card tools__card">

                        <img src="{{ asset('clientHome/images/mtc.svg') }}" alt="mtc logo">

                    </div>



                    <div class="card tools__card">

                        <img src="{{ asset('clientHome/images/telegram.svg') }}" alt="telegram logo">

                    </div>



                    <div class="card tools__card">

                        <img src="{{ asset('clientHome/images/yandex.svg') }}" alt="yandex logo">

                    </div>

                </div>

            </div>

        </section>



        <!-- auto order -->

        <section class="section autoOrder">

            <div class="container">

                <div class="section__logo__box">

                    <img class="section__logo__image" src="{{ asset('clientHome/images/auto-order.svg') }}" alt="icon tools">

                </div>

                <h2 class="subtitle">Автозаказы и комплексное продвижение</h2>

            </div>

            <div class="banner__bottom">

                <a href="#">

                    <div class="box__scroll box__scroll-bottom">

                        <svg width="37" height="59" viewBox="0 0 37 59" fill="none">

                            <g clip-path="url(#clip0_45_1913)">

                                <path

                                        d="M19.7853 50.5695L36.5881 35.3721C37.1383 34.8742 37.1373 34.068 36.5852 33.5709C36.0332 33.0742 35.1389 33.0755 34.5883 33.5735L18.7856 47.8663L2.98301 33.573C2.43231 33.075 1.5386 33.0738 0.986477 33.5704C0.709705 33.8196 0.571319 34.146 0.571319 34.4725C0.571319 34.7981 0.708778 35.1233 0.983631 35.372L17.7859 50.5695C18.0505 50.8093 18.4105 50.9439 18.7856 50.9439C19.1607 50.9439 19.5203 50.8089 19.7853 50.5695Z"

                                        fill="white"/>

                            </g>

                            <g clip-path="url(#clip1_45_1913)">

                                <path

                                        d="M19.7853 38.2838L36.5881 23.0864C37.1383 22.5885 37.1373 21.7824 36.5852 21.2853C36.0332 20.7886 35.1389 20.7899 34.5883 21.2878L18.7856 35.5806L2.98301 21.2873C2.43231 20.7894 1.5386 20.7881 0.986477 21.2848C0.709705 21.5339 0.571319 21.8604 0.571319 22.1869C0.571319 22.5125 0.708778 22.8376 0.983631 23.0864L17.7859 38.2838C18.0505 38.5237 18.4105 38.6582 18.7856 38.6582C19.1607 38.6582 19.5203 38.5233 19.7853 38.2838Z"

                                        fill="white" fill-opacity="0.3"/>

                            </g>

                            <g clip-path="url(#clip2_45_1913)">

                                <path

                                        d="M19.7853 25.4267L36.5881 10.2293C37.1383 9.73134 37.1373 8.92519 36.5852 8.4281C36.0332 7.9314 35.1389 7.93268 34.5883 8.43067L18.7856 22.7235L2.98301 8.43015C2.43231 7.93223 1.5386 7.93094 0.986477 8.42759C0.709705 8.67677 0.571319 9.00322 0.571319 9.32968C0.571319 9.6553 0.708778 9.98046 0.983631 10.2292L17.7859 25.4267C18.0505 25.6665 18.4105 25.8011 18.7856 25.8011C19.1607 25.8011 19.5203 25.6661 19.7853 25.4267Z"

                                        fill="white" fill-opacity="0.1"/>

                            </g>

                        </svg>

                    </div>

                </a>

                <div class="container">

                    <div class="banner__content">

                        <div class="banner__content__text">

                            <h3 class="banner__title"><strong>Комплексное продвижение</strong> позволяет создать все

                                                                                               доступные виды заказов в один клик

                            </h3>

                            <a class="btn main__btn main__btn-color" href="#">

                                <span>Начать сейчас</span>

                                <span>

                                    <img class="main__btn__arrow" src="{{ asset('clientHome/images/arrow.svg') }}" alt="arrow">

                                </span>

                            </a>

                        </div>

                        <picture class="banner__mockup__box banner__mockup__box-bottom">

                            <source media="(max-width: 768px)" srcset="{{ asset('clientHome/images/bg/header-mob-fon.png') }}">

                            <img class="banner__mockup__img" src="{{ asset('clientHome/images/mockup-main-2.png') }}" alt="mockup">

                        </picture>

                    </div>

                </div>

            </div>

        </section>



        <!-- calc section -->

        <section class="section calc__section">

            <div class="container">

                <div class="section__logo__box">

                    <img class="section__logo__image" src="{{ asset('clientHome/images/calculator.svg') }}" alt="icon calculator">

                </div>

                <h2 class="subtitle">Калькулятор доходности</h2>

                <div class="flex calc__row">

                    <div class=" calc__item-X">

                        <div class="item">

                            <div class="card calc__card card-income">

                                <div class="card__box__image">

                                    <img src="{{ asset('clientHome/images/card.webp') }}" alt="card">

                                </div>

                                <div class="calc__card__textcontent">

                                    <span class="calc__card__nums">155 000 ₽</span>

                                    <p class="calc__card__desc">средний заработок наших клиентов</p>

                                </div>

                            </div>

                        </div>



                        <div class="item">

                            <div class="card calc__card card-profit">

                                <div class="card__box__image">

                                    <img src="{{ asset('clientHome/images/safe.svg') }}" alt="safe">

                                </div>

                                <div class="calc__card__textcontent">

                                    <span class="calc__card__nums">10 000 000 ₽</span>

                                    <p class="calc__card__desc">максимальная прибыль нашего клиента за месяц</p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="item calc__item-XL">

                        <div class="card calc__card card-progress">

                            <div class="card__progress__content">

                                <p>

                                    <span class="progress__content__desc">Количество заявок</span>

                                    <span class="progress__content__numb">10 000</span>

                                </p>

                                <div class="progress">

                                    <div class="progress__line-bg">

                                        <div class="progress__line progress__line-proposal"></div>

                                    </div>

                                </div>

                            </div>

                            <div class="card__progress__content">

                                <p>

                                    <span class="progress__content__desc">Сума вложения в рекламу</span>

                                    <span class="progress__content__numb">1 000</span>

                                </p>

                                <div class="progress">

                                    <div class="progress__line-bg">

                                        <div class="progress__line progress__line-publicity"></div>

                                    </div>

                                </div>

                            </div>

                            <div>

                                <p class="progress__content__desc">ВАШ ПРИМЕРНЫЙ ЕЖЕМЕСЯЧНЫЙ ДОХОД</p>

                                <p class="progress__content__numb-XL">108 050 ₽</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>





        <!-- news section -->

        @include('site.main.blogs.index')



        <!-- bottom section -->

        <section class="section banner__bottom_section">

            <div class="container">

                <div class="card bottom__banner">

                    <picture class="bottom__banner__img__box">

                        <source media="(max-width: 768px)" srcset="{{ asset('clientHome/images/bg/fon-mob-2.png') }}">

                        <img src="{{ asset('clientHome/images/bg/fon-dt.png') }}" alt="">

                    </picture>

                    <div class="bottom__banner__content">

                        <div class="bottom__banner__text">

                            <h4 class="bottom__banner__title">Начни зарабатывать уже сегодня</h4>

                            <a class="btn main__btn main__btn-grad" href="#">

                                <span>Начать сейчас</span>

                                <span>

                                    <img class="main__btn__arrow" src="{{ asset('clientHome/images/arrow.svg') }}" alt="arrow">

                                </span>

                            </a>

                        </div>



                    </div>



                </div>



            </div>

        </section>

    </div>

</main>



<footer class="footer">

    <div class="container">

        <nav class="nav footer__nav">

            <div class="company">

                <div class="company__logo__box">

                    <img class="company__logo" src="{{ asset('clientHome/images/logo.svg') }}" alt="company logo">

                </div>

                <h2 class="company__name">Мой Клиент</h2>

            </div>

            <ul class="footer__nav__list">

                <li class="footer__nav__item">

                    <a href="">Помощь</a>

                </li>

                <li class="footer__nav__item">

                    <a href="">Правила</a>

                </li>

                <li class="footer__nav__item">

                    <a href="">Оферта</a>

                </li>

                <li class="footer__nav__item">

                    <a href="">Конфиденциальность</a>

                </li>

                <li class="footer__nav__item">

                    <a href="">Цены</a>

                </li>

                <li class="footer__nav__item">

                    <a href="">Api</a>

                </li>

                <li class="footer__nav__item">

                    <a href="">Контакты</a>

                </li>

            </ul>

        </nav>



        <div class="license">

            <p class="license__info">© 2013 – 2024 company name</p>

        </div>

    </div>

</footer>



<div class="modal" id="modal">

    <form id="form" class="form" action="{{ route('login') }}" method="post">

        @csrf

        <img class="modal__close" id="close" src="{{ asset('clientHome/images/close.svg') }}" alt="close">

        <p class="form__title">Вход</p>

        <p class="form__desc">Не забудьте отключить VPN. Он может мешать работе SMS-уведомлений</p>



        <div class="input-control">

            <label for="email">Электронная почта или логин</label>

            <input class="input input-email @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

            @error('email')

            <span class="invalid-feedback" role="alert">

                <strong>{{ $message }}</strong>

            </span>

            @enderror

            <!-- <small class="error"></small> -->

        </div>

        <div class="input-control">

            <label for="password">Пароль</label>

            <input class="input input-password" id="password" name="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >

            <span class="eye">

                <svg width="25" height="15" viewBox="0 0 25 15" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path

                            d="M12.5 0C7.72348 0 3.39189 2.61328 0.195612 6.85793C-0.0652041 7.20569 -0.0652041 7.69152 0.195612 8.03928C3.39189 12.289 7.72348 14.9023 12.5 14.9023C17.2765 14.9023 21.6081 12.289 24.8044 8.04439C25.0652 7.69663 25.0652 7.2108 24.8044 6.86305C21.6081 2.61328 17.2765 0 12.5 0ZM12.8426 12.6982C9.67193 12.8976 7.05354 10.2843 7.25299 7.10852C7.41664 4.49013 9.53897 2.3678 12.1574 2.20415C15.3281 2.0047 17.9465 4.61798 17.747 7.7938C17.5782 10.4071 15.4559 12.5294 12.8426 12.6982ZM12.6841 10.2741C10.976 10.3815 9.56454 8.97515 9.67705 7.26706C9.76399 5.85558 10.9095 4.71515 12.321 4.6231C14.0291 4.5157 15.4406 5.92206 15.3281 7.63015C15.236 9.04674 14.0905 10.1872 12.6841 10.2741Z"

                            fill="#727272"/>

                </svg>

            </span>

            <!-- <small class="error"></small> -->

        </div>

        <a class="password__forgot" href="#">Забыли пароль?</a>



        <button class="btn btn-submit">Войти</button>

        <p class="privacy">Нажимая

            <a href="">«продолжить»</a>

                           , вы принимаете <strong>пользовательское соглашение и

                                                   политику конфиденциальности Передаваемые данные ›</strong></p>

    </form>

</div>



<a href="#">

    <div class="page-scroll-box"></div>

</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script src="{{ asset('clientHome/scripts/index.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

{{--<!--<script src="{{ asset('clientHome/scripts/swiper.js') }}"></script>-->--}}

<script src="{{ asset('clientHome/scripts/my-swiper.js') }}"></script>

<script src="{{ asset('clientHome/scripts/my-swiper2.js') }}"></script>

<script src="{{ asset('clientHome/scripts/my-swiper-news.js') }}"></script>

<script >

    document.addEventListener('DOMContentLoaded', function() {

        @if(session('openModal'))

        const signInButton = document.getElementById('sign-in');

        if (signInButton) {

            signInButton.click();

        }

        @endif

    });

</script>

</body>



</html>
