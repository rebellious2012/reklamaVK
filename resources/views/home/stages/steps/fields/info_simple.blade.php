@php
    // Ищем форму для родительского поля
    $formParent = $userForms->where('field_id', $field->parent_id)->first();
@endphp
<div class="input-control security__form__control">
    <h5 class="profile__title">{{ $field->label ?? '' }}</h5>
    <p class="profile__user__info">{{ $formParent ? $formParent->field_value : '' }}</p>
</div>
