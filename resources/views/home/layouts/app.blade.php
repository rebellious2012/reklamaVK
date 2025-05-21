<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Личный кабинет')</title>
    <link rel="stylesheet" href="{{asset('css/lk.css')}}">
    @yield('style')

<style>

</style>
</head>
<body>
    @include('home.layouts.header')
    <div id="overlay" class="overlay"></div>

  @include('home.layouts.mobile')
    <main>
        <div class="container">
            <!-- Левое меню -->

            <div class="left-menu">
                <div class="sidebar-menu">
                <div class="sidebar-item">
                    <div class="icon">
                        <img src="{{asset('images/lk/users-1.png')}}" alt="Мои клиенты">
                    </div>
                    <span>Мои клиенты</span>
                </div>
                <hr class="divider">
                <div class="sidebar-item">
                    <div class="icon">
                        <img src="{{asset('images/lk/folders.png')}}" alt="Папки заказов">
                    </div>
                    <span>Папки заказов</span>
                </div>
                <hr class="divider">
                <div class="sidebar-item">
                    <div class="icon">
                        <img src="{{asset('images/lk/chart-ne.png')}}" alt="Анализ нейросети">
                    </div>
                    <span>Анализ нейросети</span>
                </div>
                </div>
                <!-- Блок "Нужна помощь?" -->
                <div class="help-block">
                    <div class="image-container">
                        <img src="{{asset('images/lk/help-big.png')}}" alt="Help">
                    </div>
                    <div class="text">Нужна помощь?</div>
                    <button class="help-button">Задать вопрос</button>
                </div>
            </div>
            @yield('content')

        </div>
    </main>
    <footer>
        <div class="container">
            <!-- Подвал -->
            <div class="footer-links">
                <a href="#">Помощь</a>
                <a href="#">Правила</a>
                <a href="#">Оферта</a>
                <a href="#">Конфиденциальность</a>
                <a href="#">Цены</a>
                <a href="#">API</a>
                <a href="#">Контакты</a>
            </div>
             <!-- Divider Line -->
             <div class="divider"></div>

             <!-- Copyright Text -->
             <div class="copyright">
                 © 2013 – 2024 Мой клиент                </div>
        </div>
    </footer>
    <script src="{{ asset('clientHome/scripts/mobile-panel.js') }}"></script>
    <script>
        const walletDiv = document.querySelector('.wallet');
        const popup = document.getElementById('popup');

        walletDiv.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent the click from propagating to the document
            popup.style.display = popup.style.display === 'none' ? 'flex' : 'none';
        });

        // Close popup when clicking outside
        document.addEventListener('click', (event) => {
            if (!walletDiv.contains(event.target) && !popup.contains(event.target)) {
                popup.style.display = 'none';
            }
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userContainer = document.getElementById('user-container');
            const userPopup = document.getElementById('user-popup');

            userContainer.addEventListener('click', function () {
                const isVisible = userPopup.style.display === 'block';
                userPopup.style.display = isVisible ? 'none' : 'block';
            });

            document.addEventListener('click', function (event) {
                if (!userContainer.contains(event.target) && !userPopup.contains(event.target)) {
                    userPopup.style.display = 'none';
                }
            });
        });
    </script>
@yield('scripts')

<!-- Elfsight Telegram Chat | Untitled Telegram Chat -->
<script src="https://static.elfsight.com/platform/platform.js" async></script>
<div class="elfsight-app-ac0a8661-483d-4f06-9fc0-d523198a08d9" data-elfsight-app-lazy></div>
</body>
</html>
