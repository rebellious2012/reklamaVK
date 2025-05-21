<!-- payment timer -->
<div class="payment__timer">
    <div class="payment__timer__box">
        <span class="payment__timer__time">{{ $field->placeholder ?? '9999' }}9999</span>
        <div class="payment__timer__icon-wrapper">
            <div class="payment__timer__icon-progress"></div>
            <div class="payment__timer__icon-inner"></div>
        </div>
    </div>
    <p class="payment__timer__desc">{!! $field->label ?? "У вас есть 10 минут <br> для оплаты заявки"  !!}
    </p>
</div>
