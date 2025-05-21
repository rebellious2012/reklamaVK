@php

    // Ищем форму для родительского поля
    //
   // $formParent = $userForms->where('field_id', $field->parent_id)->first();
    $card = $assignedStages->first()->pivot->account_number ?? 'ХХХХ ХХХХ ХХХХ ХХХХ';

@endphp

<div class="card__info">

    <h4 class="card__title">{{ $field->label ?? $field->placeholder ?? 'Номер банковской карты' }}</h4>

    <p class="card__number">{{ $card}}</p>

</div>
