@php
    // Ищем форму для родительского поля
//    $formParent = $stepUser->forms->where('field_id', $field->parent_id)->first();
    $formParent = $userForms->where('field_id', $field->parent_id)->first();
@endphp

<div>
    <h5 class="profile__title">{{ $field->label ?? '' }}</h5>
    <p class="profile__user__info">{{ $formParent ? $formParent->field_value : '' }}</p>
</div>
