<!-- modal window payment cancel -->
<div class="modal" id="modal-payment-cancle">
    <div class="modal__payment modal__payment-cancle" id="">
        <img class="modal__close" id="modal-payment-close" src="{{ asset('clientHome/images/close.svg') }}" alt="close">
        <p class="modal__payment__title">Подтвердить отмену заявки?</p>
        <p class="modal__payment__desc">Останется 2 заявки без комиссии при отмене настоящей заявки. Вы уверены что
                                        хотите отменить заявку?</p>
        <button class="btn btn__payment btn__payment-cancel" id="modal-btn-cancle">Отменить заявку</button>
    </div>
</div>

<!-- modal window payment success -->
<div class="modal" id="modal-payment-success">
    <div class="modal__payment modal__payment-success" id="">
        <img class="modal__close" id="modal-payment-suc-close" src="{{ asset('clientHome/images/close.svg') }}" alt="close">
        <p class="modal__payment__title">Подтверждение оплаты</p>
        <p class="modal__payment__desc">Идет подтверждение оплаты, это может занять несколько минут, ожидайте</p>
        <div class="security__loader__box">
            <img class="security__loader__img" src="{{ asset('clientHome/images/loader.svg') }}" alt="loader">
        </div>
    </div>
</div>

<!-- JavaScript -->
<!-- JavaScript -->
<script>
    // Обработчик для закрытия модального окна при клике на иконку закрытия
    document.getElementById('modal-payment-close').addEventListener('click', function() {
        const modal = document.getElementById('modal-payment-cancle');
        modal.classList.add('hidden');
        modal.style.display = 'none'; // Добавляем display: none
    });

    // Обработчик для кнопки "Отменить заявку"
    document.getElementById('modal-btn-cancle').addEventListener('click', function() {
        // Убираем класс hidden для информации об отмене
        document.getElementById('pay-cancle').classList.remove('hidden');

        // Закрываем модальное окно, добавляя класс hidden и display: none
        const modal = document.getElementById('modal-payment-cancle');
        modal.classList.add('hidden');
        modal.style.display = 'none'; // Добавляем display: none
    });

</script>

{{--<script>--}}
{{--    document.getElementById('modal-btn-cancle').addEventListener('click', function() {--}}
{{--        // Убираем класс hidden--}}
{{--        document.getElementById('pay-cancle').classList.remove('hidden');--}}
{{--    });--}}
{{--</script>--}}
