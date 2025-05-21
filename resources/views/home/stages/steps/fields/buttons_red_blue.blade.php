<div class="payment__form__buttons">
    <button class="btn btn__payment btn__payment-cancel" id="cancle">{{ $field->placeholder ?? 'Отменить заявку' }}</button>
    <button class="btn btn__payment btn__payment-success" type="submit"
            id="btn-pay-success">{{ $field->label ?? 'Оплачено' }}</button>
</div>
