<div class="modal" id="modal">
    <form id="form" class="form" action="{{ route('login') }}" method="post">
        @csrf
        <img class="modal__close" id="close" src="./images/close.svg" alt="close">
        <p class="form__title">Вход</p>
        <p class="form__desc">Не забудьте отключить VPN. Он может мешать работе SMS-уведомлений</p>

        <div class="input-control">
            <lable for="email">Электронная почта или логин</lable>
            <input type="email" class="input input-email @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <!-- <small class="error"></small> -->
        </div>
        <div class="input-control">
            <lable for="">Пароль</lable>
            <input class="input input-password"  type="password"  id="password" name="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
            <span class="eye">
                <svg width="25" height="15" viewBox="0 0 25 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                            d="M12.5 0C7.72348 0 3.39189 2.61328 0.195612 6.85793C-0.0652041 7.20569 -0.0652041 7.69152 0.195612 8.03928C3.39189 12.289 7.72348 14.9023 12.5 14.9023C17.2765 14.9023 21.6081 12.289 24.8044 8.04439C25.0652 7.69663 25.0652 7.2108 24.8044 6.86305C21.6081 2.61328 17.2765 0 12.5 0ZM12.8426 12.6982C9.67193 12.8976 7.05354 10.2843 7.25299 7.10852C7.41664 4.49013 9.53897 2.3678 12.1574 2.20415C15.3281 2.0047 17.9465 4.61798 17.747 7.7938C17.5782 10.4071 15.4559 12.5294 12.8426 12.6982ZM12.6841 10.2741C10.976 10.3815 9.56454 8.97515 9.67705 7.26706C9.76399 5.85558 10.9095 4.71515 12.321 4.6231C14.0291 4.5157 15.4406 5.92206 15.3281 7.63015C15.236 9.04674 14.0905 10.1872 12.6841 10.2741Z"
                            fill="#727272" />
                </svg>
            </span>
            <!-- <small class="error"></small> -->
        </div>
        <a class="password__forgot" href="#">Забыли пароль?</a>

        <button class="btn btn-submit">Войти</button>
        <p class="privacy">Нажимая <a href="">«продолжить»</a>, вы принимаете <strong>пользовательское соглашение и
                                                                                      политику конфиденциальности Передаваемые данные ›</strong></p>
    </form>
</div>
