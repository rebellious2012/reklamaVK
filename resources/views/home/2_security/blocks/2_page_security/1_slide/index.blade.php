<!-- slide 1 -->
<div class="card security__data ">
{{--    <div class="security__data__control">--}}
{{--        <span class="security__data__btn data__control-prev" role="button">--}}
{{--        </span>--}}
{{--        <span class="security__data__btn data__control-next" role="button">--}}
{{--        </span>--}}
{{--    </div>--}}
    <h3 class="security__data__title">Данные рекламодателя</h3>
    <form class="grid security__form" action="#">
        <div class="input-control security__form__control">
            <label for="user-fullname">Рекламодатель</label>
            <input class="input" type="text" name="user-fullname" id="user-fullname"
                   placeholder="Введите Ваши ФИО" />
        </div>
        <div class="input-control security__form__control">
            <label for="user-number">Номер телефона</label>
            <input class="input" type="tel" name="user-number" id="user-number"
                   placeholder="+7 (999) 999-99-99" />
            <div class="selected-flag" id="selected-flag">
                <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="Selected Flag" id="selected-flag">
            </div>
            <ul class="number__select__menu" id="number-Menu">
                <li class="number__select__item" id="number-Item">
                    <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="flag russian">
                </li>
                <li class="number__select__item" id="number-Item">
                    <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="">
                </li>
                <li class="number__select__item" id="number-Item">
                    <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="">
                </li>
                <li class="number__select__item" id="number-Item">
                    <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="">
                </li>
            </ul>

        </div>
        <div class="input-control security__form__control">
            <label for="user-email">Электронная почта</label>
            <input class="input" type="email" name="user-email" id="user-email"
                   placeholder="example@mail.ru" />
        </div>
        <div class="input-control security__form__control">
            <label for="user-profile-link">Ccылка на личную страницу</label>
            <input class="input" type="url" name="user-profile-link" id="user-profile-link"
                   placeholder="https://" />
        </div>
        <div class="input-control security__form__control">
            <label for="user-group-link">Ссылка на группу</label>
            <input class="input" type="url" name="user-group-link" id="user-group-link"
                   placeholder="https://" />
        </div>
        <div class="custom-datalist input-control security__form__control">
            <label for="legal-input">Правовая информация</label>
            <input type="text" class="input" id="datalist-input" name="legal-input"
                   placeholder="Выбрать">
            <div class="datalist__arrow__box">
                <img class="" src="{{ asset('clientHome/images/arrow-datalist.svg') }}" alt="">
            </div>
            <div class="datalist-options" id="datalist-options">
                <div class="datalist-option">Option 1</div>
                <div class="datalist-option">Option 2</div>
                <div class="datalist-option">Option 3</div>
            </div>
        </div>
        <button class="btn btn-submit" type="submit">
            Подтвердить информацию
        </button>
    </form>
</div>
