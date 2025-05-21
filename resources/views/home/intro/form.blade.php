@extends('home.layouts.app')
@section('title',$page_title)
@section('style')
    <link rel="stylesheet" href="./css/forms.css">
@endsection
@section('content')
            <div class="forms-content">
                <div class="form-container">
                    <h1 class="form-title">Прохождение безопасности для страницы и группы</h1>
<form action="{{route('intro.form.submit')}}" method="post">
    @csrf
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-label">Тип аккаунта</div>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="account_type" class="radio-input" value="advertiser" checked>
                                    Рекламодатель
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="account_type" class="radio-input" value="agency">
                                    Агентство
                                </label>
                            </div>

                        </div>

                        <div class="form-column">
                            <div class="form-label">Ссылка на страницу*</div>
                            <div class="form-input-with-icon">
                                <input type="text" class="form-input" name="link_page" placeholder="https://vk.com/id777777" required>
                                <span class="icon-link">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_423_596)">
                                        <path d="M4.93523 10.0649C4.56898 9.69927 4.56898 9.1049 4.93523 8.73927C5.30148 8.37302 5.89461 8.37302 6.26086 8.73927C7.08961 9.56802 8.53586 9.56865 9.36461 8.73927L12.4827 5.62115C13.3384 4.76552 13.3384 3.37302 12.4827 2.5174C11.6271 1.66177 10.2346 1.66177 9.37898 2.5174C9.01273 2.88365 8.41961 2.88365 8.05336 2.5174C7.68711 2.15177 7.68711 1.5574 8.05336 1.19177C9.63961 -0.395101 12.2221 -0.395101 13.8084 1.19177C15.3952 2.77865 15.3952 5.3599 13.8084 6.94677L10.6902 10.0649C9.89648 10.8586 8.85461 11.2549 7.81273 11.2549C6.77086 11.2549 5.72836 10.858 4.93523 10.0649ZM4.07023 14.998C5.11211 14.998 6.15399 14.6011 6.94773 13.808C7.31398 13.4424 7.31398 12.848 6.94773 12.4824C6.58148 12.1161 5.98836 12.1161 5.62211 12.4824C4.76586 13.3386 3.37336 13.338 2.51836 12.4824C1.66273 11.6268 1.66273 10.2343 2.51836 9.37865L5.61898 6.27802C6.47523 5.42177 7.86773 5.42177 8.72273 6.27802C9.08898 6.64427 9.68211 6.64427 10.0484 6.27802C10.4146 5.9124 10.4146 5.31802 10.0484 4.9524C8.46148 3.36552 5.88023 3.36552 4.29336 4.9524L1.19211 8.05302C-0.394766 9.6399 -0.394766 12.2211 1.19211 13.808C1.98586 14.6018 3.02836 14.998 4.07023 14.998Z" fill="#E47D7D"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_423_596">
                                        <rect width="15" height="15" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                </span>
                            </div>
                            @error('link_page')
                            <div class="required-field">Обязательное поле</div>
                            @enderror

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-label">Выберите страну</div>
                            <select class="form-select" name="country">
                                <option>Россия</option>
                                <option>Казахстан</option>
                                <option>Беларусь</option>
                            </select>
                        </div>

                        <div class="form-column">
                            <div class="form-label">Ссылка на группу*</div>
                            <div class="form-input-with-icon">
                                <input type="text" class="form-input" placeholder="https://vk.com/vk" name="link_group">
                                <span class="icon-link">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_423_596)">
                                        <path d="M4.93523 10.0649C4.56898 9.69927 4.56898 9.1049 4.93523 8.73927C5.30148 8.37302 5.89461 8.37302 6.26086 8.73927C7.08961 9.56802 8.53586 9.56865 9.36461 8.73927L12.4827 5.62115C13.3384 4.76552 13.3384 3.37302 12.4827 2.5174C11.6271 1.66177 10.2346 1.66177 9.37898 2.5174C9.01273 2.88365 8.41961 2.88365 8.05336 2.5174C7.68711 2.15177 7.68711 1.5574 8.05336 1.19177C9.63961 -0.395101 12.2221 -0.395101 13.8084 1.19177C15.3952 2.77865 15.3952 5.3599 13.8084 6.94677L10.6902 10.0649C9.89648 10.8586 8.85461 11.2549 7.81273 11.2549C6.77086 11.2549 5.72836 10.858 4.93523 10.0649ZM4.07023 14.998C5.11211 14.998 6.15399 14.6011 6.94773 13.808C7.31398 13.4424 7.31398 12.848 6.94773 12.4824C6.58148 12.1161 5.98836 12.1161 5.62211 12.4824C4.76586 13.3386 3.37336 13.338 2.51836 12.4824C1.66273 11.6268 1.66273 10.2343 2.51836 9.37865L5.61898 6.27802C6.47523 5.42177 7.86773 5.42177 8.72273 6.27802C9.08898 6.64427 9.68211 6.64427 10.0484 6.27802C10.4146 5.9124 10.4146 5.31802 10.0484 4.9524C8.46148 3.36552 5.88023 3.36552 4.29336 4.9524L1.19211 8.05302C-0.394766 9.6399 -0.394766 12.2211 1.19211 13.808C1.98586 14.6018 3.02836 14.998 4.07023 14.998Z" fill="#E47D7D"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_423_596">
                                        <rect width="15" height="15" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                </span>
                            </div>
                            @error('link_group')
                            <div class="required-field">Обязательное поле</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-label">Валюта</div>
                            <select class="form-select" name="currency">
                                <option>Российский рубль (RUB)</option>
                                <option>Казахстанский тенге (KZT)</option>
                                <option>Белорусский рубль (BYN)</option>
                            </select>
                        </div>

                        <div class="form-column">
                            <div class="form-label">ИНН</div>
                            <input type="text"
                            class="form-input"
                            placeholder="Пример: 100303539843"
                            name="inn"
                            pattern="[0-9]*"
                            inputmode="numeric"
                            onkeypress="return /[0-9]/i.test(event.key)"
                            required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-label">Email*</div>
                            <div class="form-input-with-icon">
                                <input type="email" class="form-input" value="{{auth()->user()->email}}" name="email" required>
                                <span class="icon-right"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_548_12220)">
                                    <path d="M14.9713 3.46387L9.71 8.72512C9.12336 9.31028 8.32859 9.63889 7.5 9.63889C6.67141 9.63889 5.87664 9.31028 5.29 8.72512L0.02875 3.46387C0.02 3.56262 0 3.65199 0 3.75012V11.2501C0.000992411 12.0786 0.330551 12.8729 0.916387 13.4587C1.50222 14.0446 2.2965 14.3741 3.125 14.3751H11.875C12.7035 14.3741 13.4978 14.0446 14.0836 13.4587C14.6694 12.8729 14.999 12.0786 15 11.2501V3.75012C15 3.65199 14.98 3.56262 14.9713 3.46387Z" fill="#A6ACC3"/>
                                    <path d="M8.82609 7.84125L14.5348 2.13188C14.2583 1.67332 13.8683 1.29377 13.4023 1.02983C12.9364 0.765889 12.4103 0.626463 11.8748 0.625H3.12484C2.58936 0.626463 2.06328 0.765889 1.59736 1.02983C1.13144 1.29377 0.741393 1.67332 0.464844 2.13188L6.17359 7.84125C6.52583 8.19207 7.00271 8.38904 7.49984 8.38904C7.99698 8.38904 8.47386 8.19207 8.82609 7.84125Z" fill="#A6ACC3"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_548_12220">
                                    <rect width="15" height="15" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg></span>
                            </div>
                            @error('email')
                            <div class="required-field">Обязательное поле</div>
                            @enderror
                        </div>

                        <div class="form-column">
                            <div class="form-label">ФИО</div>
                            <input type="text" class="form-input" placeholder="ФИО" name="fio" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-label">Тип аккаунта</div>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="legal_type" class="radio-input" value="Физическое лицо" checked>
                                    Физическое лицо <span class="tooltip-icon" data-tooltip="Не требуется заключение договора. Доступные методы оплаты: банковская карта, электронные деньги, платёж со счёта телефона, криптовалюта">?</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="legal_type" class="radio-input" value="Юридическое лицо">
                                    Юридическое лицо <span class="tooltip-icon" data-tooltip="Потребуется предоставить реквизиты юридического лица. В конце каждого месяца клиенту предоставляется бухгалтерская отчётность. Доступные методы оплаты: банковский перевод для юридических лиц, криптовалюта">?</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-column">
                            <div class="terms-checkbox">
                                <input type="checkbox" id="terms"  checked required>
                                <div class="terms-text">
                                    Создавая кабинет, вы принимаете условия <a href="#">Оферты</a>, <a href="#">Соглашение о передаче рекламных данных</a>, <a href="#">правила пользования сервисом</a>, <a href="#">Политику конфиденциальности</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button-row">
                        <button class="submit-button">Подключить безопасность</button>
                    </div>
                </form>
                </div>
            </div>
@endsection
