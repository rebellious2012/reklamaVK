@php

    // Ищем форму для родительского поля

//    $formParent = $stepUser->forms->where('field_id', $field->parent_id)->first();

   // $formParent = $userForms->where('field_id', $field->parent_id)->first();
   $bank = $assignedStages->first()->pivot->bank_name ?? 'Банк не указан - поставить по умолчанию';

@endphp



<h4 class="card__title">{{ $field->label ?? '' }}</h4>

<div class="bank__container">

    <div class="icon__box">

        <img class="bank__icon__logo" src="{{ asset('images/PNGbank/'.$bank.'.png') }}" alt="bank logo">

    </div>

    <p class="bank__name">{{ $bank }}</p>

</div>

