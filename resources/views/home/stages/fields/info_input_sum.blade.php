@php

    // Ищем форму для родительского поля

    $formParent = $userForms->where('field_id', $field->parent_id)->first();

@endphp

<div class="card__info">

    <h4 class="card__title">{{ $field->label ?? $field->placeholder ?? 'Сумма' }}</h4>
    <p class="card__number"> {{ $assignedStages?->first()->pivot->price }}</p>

</div>
