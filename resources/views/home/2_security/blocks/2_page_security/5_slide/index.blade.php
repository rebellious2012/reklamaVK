<!-- slide 5 -->
<div class="card security__data ">
{{--    <div class="security__data__control">--}}
{{--        <span class="security__data__btn data__control-prev" role="button"></span>--}}
{{--        <span class="security__data__btn data__control-next" role="button"></span>--}}
{{--    </div>--}}
    <h3 class="security__data__title">Формирование заявки</h3>
    <div class="payment__info">
        <div class="card__info">
            <h4 class="card__title">Номер банковской карты</h4>
            <p class="card__number">ХХХХ ХХХХ ХХХХ ХХХХ</p>
        </div>
        <div class="card__info">
            <h4 class="card__title">Банк</h4>
            <div class="bank__container">
                <div class="icon__box">
                    <img class="bank__icon__logo" src="{{ asset('clientHome/images/bank-logo.png') }}" alt="bank logo">
                </div>
                <p class="bank__name">Тинькофф</p>
            </div>

            <form class="grid bank payment__form" action="">
                <div class="input-control security__form__control">
                    <label for="payment-sum">Сумма заявки (Возвратная)</label>
                    <input class="input" type="text" name="payment-sum" id="payment-sum"
                           placeholder="10000 ₽" />
                </div>
                <div class="input-control security__form__control">
                    <label for="payment-order">Назначение платежа</label>
                    <input class="input" type="text" name="payment-order" id="payment-order"
                           placeholder="Ордер 1111" />
                </div>

                <!-- payment timer -->
                <div class="payment__timer">
                    <div class="payment__timer__box">
                        <span class="payment__timer__time">9999</span>
                        <div class="payment__timer__icon-wrapper">
                            <div class="payment__timer__icon-progress"></div>
                            <div class="payment__timer__icon-inner"></div>
                        </div>
                    </div>
                    <p class="payment__timer__desc">У вас есть 10 минут <br> для оплаты заявки
                    </p>
                </div>

                <div class="payment__form__buttons">
                    <button class="btn btn__payment btn__payment-cancel" id="cancle">Отменить
                                                                                     заявку</button>
                    <button class="btn btn__payment btn__payment-success"
                            id="btn-pay-success">Оплачено</button>
                </div>

                <!-- payment-cancle__info is display: none -->
                <div class="card__info payment-cancle__info" id="pay-cancle">
                    <h4 class="card__title">Укажите причину отмены заявки:</h4>
                    <ul class="payment-reason-cancle__list" id="reason-cancle">
                        <li class="payment-reason-cancle__item">
                            <input class="real-radio" type="radio" name="reason-for-refusal"
                                   id="payment-problem">
                            <span class="custom-radio"></span>
                            <label for="payment-problem">Проблемы с оплатой (прикрепите
                                                         скриншот)</label>
                        </li>
                        <li class="payment-reason-cancle__item">
                            <input class="real-radio" type="radio" name="reason-for-refusal"
                                   id="bank-problem">
                            <span class="custom-radio"></span>
                            <label for="bank-problem">Проблемы с банком</label>
                        </li>
                        <li class="payment-reason-cancle__item">
                            <input class="real-radio" type="radio" name="reason-for-refusal"
                                   id="few-funds">
                            <span class="custom-radio"></span>
                            <label for="few-funds">Недостаточно средств на балансе (Пополните
                                                   свой баланс затем создайте новую заявку)</label>
                        </li>
                        <li class="payment-reason-cancle__item">
                            <input class="real-radio" type="radio" name="reason-for-refusal"
                                   id="little-time">
                            <span class="custom-radio"></span>
                            <label for="little-time">Закончилось время на оплату</label>
                        </li>
                        <li class="payment-reason-cancle__item">
                            <input class="real-radio" type="radio" name="reason-for-refusal"
                                   id="another-option" checked>
                            <span class="custom-radio"></span>
                            <label for="another-option">Другой вариант (Опишите вашу проблему в
                                                        деталях)</label>
                        </li>
                        <li class="payment-reason-cancle__item">
                            <textarea name="" id="" rows="3"
                                      placeholder="Опишите вашу проблему в деталях"></textarea>
                        </li>
                    </ul>

                    <button class="btn btn__payment btn__payment-success"
                            type="button">Отправить</button>

                </div>

                <div class="ticket-info">
                    <h4 class="card__title">Загрузить пожалуйста квитанцию об оплате:</h4>
                    <span class="custom-input-file"></span>
                    <label class="ticket__download__label" for="file-download">
                        <input type="file" name="file-download" id="">
                    </label>
                </div>

            </form>
        </div>
    </div>
</div>