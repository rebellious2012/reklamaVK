@php

    // Ищем форму для родительского поля

    //dd($field->parent_id);

    $formParent = $userForms->where('field_id', $field->parent_id)->first();

   // dd($field->parent->parent->payments->first()->id);

    $firstPaymentId = $field->getFirstPaymentIdFromParent();

    //dd($firstPaymentId);

@endphp



<div class="card__info">

    <h4 class="card__title">{{ $field->label ?? 'Прикрепленные файлы:' }}</h4>

    <p class="card__number payment__info__file">

        <span class="payment__info__file-name">{{ $formParent ? ( $formParent->field_value !== null ? basename($formParent->field_value) : 'Документ не загружен') : 'Документ не загружен' }}</span>

        <span class="payment__info__file-size">1 МБ</span>

    </p>

    <input type="hidden" name="form_id" value="{{ $formParent?->id }}">

    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

    <input type="hidden" name="amount" value="{{ $field->getParentParentFieldValueForCurrentUser() ?? 0 }}">

    <input type="hidden" name="stage_id" value="{{ $assignedStages->first()?->id }}">

    <input type="hidden" name="stage" value="{{ $assignedStages->first()?->name." ".$assignedStages->first()?->group_name }}">

    <input type="hidden" name="status" value="moderate">

    <input type="hidden" name="image_path" value="{{ $formParent ? ( $formParent->field_value !== null ? basename($formParent->field_value) : '' ) : '' }}">

    <input type="hidden" name="payment_id" value="{{ $firstPaymentId }}">

</div>

<button class="btn btn__payment btn__payment-success" id="btn-pay-{{ session('success_button') }}">Подтвердить оплату</button>



<script>

    document.addEventListener("DOMContentLoaded", function() {

        @if(session('paymentProcessed'))

        // Показываем модальное окно после успешной оплаты

        var modalButton = document.getElementById('btn-pay-success');

        if (modalButton) {

            modalButton.click();  // Имитация клика для вызова модального окна

        }

        @endif

    });

</script>