@php
    // Ищем форму для родительского поля
//    $formParent = $stepUser->forms->where('field_id', $field->parent_id)->first();
    $formParent = $userForms->where('field_id', $field->parent_id)->first();
@endphp
<div class="">
    <h5 class="profile__title">{{ $field->label ?? '' }}</h5>
    <p class="profile__user__info">
        <span class="profile__user__info__icon">
            <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="">
        </span>
        {{ $formParent ? $formParent->field_value : '' }}
    </p>

</div>
