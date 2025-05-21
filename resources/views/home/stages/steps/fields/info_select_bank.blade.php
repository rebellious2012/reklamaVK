@php
    // Ищем форму для родительского поля
//    $formParent = $stepUser->forms->where('field_id', $field->parent_id)->first();
    $formParent = $userForms->where('field_id', $field->parent_id)->first();
@endphp

<h4 class="card__title">{{ $field->label ?? '' }}</h4>
<div class="bank__container">
    <div class="icon__box">
        <img class="bank__icon__logo" src="{{ asset('clientHome/images/bank-logo.png') }}" alt="bank logo">
    </div>
    <p class="bank__name">{{ $formParent ? $formParent->field_value : '' }}</p>
</div>
