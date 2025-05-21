<!-- slide 3 -->
<div class="card security__data">
{{--    <div class="security__data__control">--}}
{{--        <span class="security__data__btn data__control-prev" role="button"></span>--}}
{{--        <span class="security__data__btn data__control-next" role="button"></span>--}}
{{--    </div>--}}
    <h3 class="security__data__title">Выбор / настройка оплаты и подтверждение</h3>
    <form class="grid security__form bank" action="#">
        <div class="custom-datalist input-control security__form__control">
            <label for="selection-bank">Выбор банка для создания заявки</label>
            <input type="text" class="input" id="selection-bank" name="selection-bank"
                   placeholder="Выбрать">
            <div class="datalist__arrow__box">
                <img class="" src="{{ asset('clientHome/images/arrow-datalist.svg') }}" alt="">
            </div>
            <div class="datalist-options options__bank" id="options__bank">
                <div class="option__bank">Option 1</div>
                <div class="option__bank">Option 2</div>
                <div class="option__bank">Option 3</div>
            </div>
        </div>
        <div class="input-control security__form__control">
            <label for="">Введите номер карты для оплаты</label>
            <input class="input" type="text" name="" id="" placeholder="ХХХХ ХХХХ ХХХХ ХХХХ"
                   maxlength="16" />
        </div>
        <div class="input-control security__form__control">
            <label for="">ФИО</label>
            <input class="input" type="email" name="" id=""
                   placeholder="Введите данные как на карте с которой будет оплата" />
        </div>

        <div class="bank__info">
            <h3 class="security__data__title">Правила создания заявки:</h3>
            <ul class="data__list">
                <li class="data__item">На оплату будет 10 минут</li>
                <li class="data__item">Есть две бесплатные заявки на оплату, третья заявка
                                       будет с комиссией</li>
            </ul>
        </div>

        <div class="bank__info">
            <h3 class="security__data__title">Выбор способа оплаты:</h3>
            <fieldset class="fieldset">
                <div class="custom__radio__box">
                    <input class="real__radio" type="radio" name="payment-choice" id="card"
                           value="card">
                    <span class="custom__radio"></span>
                    <label for="card">Оплата по номеру карты без комисии</label>
                </div>
                <div class="custom__radio__box">
                    <input class="real__radio" type="radio" name="payment-choice" id="check"
                           value="check">
                    <span class="custom__radio"></span>
                    <label for="check">Оплата по номеру счета компании с налогом 20% от
                                       суммы</label>
                </div>
            </fieldset>
        </div>
        <button class="btn btn-submit btn-request" type="submit">
            <span>Создать заявку</span>
        </button>
    </form>
</div>
