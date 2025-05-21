<header>
    <div class="container">
        <!-- Top Section -->
        <div class="top-section">
            <div class="menu-icon" id="menuIcon">
                <img src="{{asset('images/lk/free-icon-menu.png')}}" alt="menu" class="menu-icon-visible">
                <img src="{{asset('images/lk/close.png')}}" alt="close" class="close-icon-hidden">
            </div>
            <!-- Logo Section -->
            <div class="col-3">
                <div class="header__logo">
                    <a href="{{route('index')}}">
                        <img class="logo__image" src="{{asset('images/logo.svg')}}" alt="лого">
                    </a>
                </div>
            </div>


            <!-- Navigation Menu -->
            <nav class="nav-container">
                <div class="menu-items">
                    <div class="menu-item">
                        <img src="{{asset('images/lk/megaphon.png')}}" width="17" height="17" alt="megaphone">
                        <a href="{{route('home')}}" class="menu-text">Рекламний кабинет</a>
                    </div>
                    <div class="menu-item active">
                        <img src="{{asset('images/lk/document.png')}}" width="17" height="17" alt="document">
                        <a href="{{route('home')}}" class="menu-text">Модерация</a>
                    </div>
                    <div class="menu-item">
                        <img src="{{asset('images/lk/chart-pi.png')}}" width="17" height="17" alt="chart">
                        <span class="menu-text">Статистика</span>
                    </div>
                    <div class="menu-item">
                        <img src="{{asset('images/lk/question.png')}}" width="17" height="17" alt="question">
                        <span class="menu-text">Ответ / Вопрос</span>
                    </div>
                </div>

                <div class="notification-container">
                    <img src="{{asset('images/lk/vector.png')}}" width="22.93" height="24" alt="notification">
                    <span class="notification-badge">1</span>
                </div>

                <div class="user-container" id="user-container">
                    <div class="avatar-container">
                        <img src="{{asset('images/lk/avatar.png')}}" width="40" height="40" alt="avatar">
                    </div>
                    <span class="user-email">{{Auth()->user()->email ?? 'Электронная п....'}}</span>
                    <img src="{{asset('images/lk/vector-2.png')}}" class="dropdown-arrow" alt="dropdown">
                    <div class="user-popup" id="user-popup">
                        <a href="{{ route('home') }}" class="popup-link">Личный кабинет</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="popup-button">Выйти</button>
                        </form>
                    </div>
                </div>


            </nav>


        </div>

        <!-- Bottom Section -->
        <div class="bottom-section">
            <!-- Login Button -->
            <div class="col-3">
                <div class="login-button">
                    <span>Добавить задание</span>
                    <img src="{{asset('images/lk/add-1.png')}}">
                </div>
            </div>


            <nav class="breadcrumbs">
                <span class="breadcrumb-item active">Реклама</span>
                <div class="breadcrumb-separator">
                    <img src="{{asset('images/lk/next-1.png')}}" alt="separator">
                </div>
                <span class="breadcrumb-item inactive">Модерация</span>
                @isset($breadcrumbs_one)
                    <div class="breadcrumb-separator">
                        <img src="{{asset('images/lk/next-1.png')}}" alt="separator">
                    </div>
                    <span class="breadcrumb-item inactive">{{$breadcrumbs_one}}</span>
                @endisset

            </nav>



            <!-- Wallet -->
            <div class="wallet">
                <img src="{{asset('images/lk/coins-1.png')}}">
                <span>{{ $paymentsHeader['totalAmount'] ?? 0 }} ₽</span>
                <div id="popup" class="wallet-popup">
                    <div class="wallet-popup-content">
                        <div class="wallet-button wallet-button-blue">
                            <span>Пополнить</span>
                            <img src="{{asset('images/lk/wallet-arrow.svg')}}" alt="wallet-arrow">
                        </div>
                        <div class="wallet-button wallet-button-white">
                            <span>Вывести</span>
                            <img src="{{asset('images/lk/wallet-income.svg')}}" alt="wallet-income">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
