@foreach($availableStages as $stage)

    @php

        $assignedStage = $assignedStages->firstWhere('id', $stage->id);

        $currentStatus = $assignedStage->pivot->status ?? null;

    @endphp



        @if($currentStatus === 'active')

            <h4 style="padding-right: 1%;"><span style="color:grey;">Поточний Етап:</span>

                <br><span style="color:green;">{{ $stage->name }}</span></h4>

        <!-- Поле для ввода стоимости этапа -->

        <label for="stage_{{ $stage->id }}_price">Вартість Етапу:</label>

        <input type="number" name="stage_prices[{{ $stage->id }}]" id="stage_{{ $stage->id }}_price" class="form-control" placeholder="Вартість"

               value="{{ $assignedStages->firstWhere('id', $stage->id)->pivot->price ?? '' }}">
        <!-- поле для ввода названия банка-->
        <label for="stage_{{ $stage->id }}bank_name">Назва банку</label>
<select name="stage_bank_names" id="stage_{{ $stage->id }}_bank_name" class="form-control">
    <option value="" disabled selected>Оберіть банк</option>
    @php
        $bankList = [
            'Сбербанк',
            'ВТБ',
            'Газпромбанк',
            'Россельхозбанк',
            'Т-Банк (бывший Тинькофф Банк)',
            'Альфа-Банк',
            'Райффайзенбанк',
            'ОЗОН Банк',
            'Абсолют Банк',
            'Авангард',
            'Акибанк',
            'Ак Барс Банк',
            'Банк Аверс',
            'Банк Дом.РФ',
            'Банк Зенит',
            'Банк Интеза',
            'Банк Казани',
            'Банк Левобережный',
            'Банк Россия',
            'Банк Санкт-Петербург',
            'Банк Синара',
            'Банк Уралсиб',
            'Банк Центр-Инвест',
            'БКС Банк',
            'ВБРР',
            'ВУЗ-банк',
            'Дальневосточный банк',
            'Ингосстрах Банк',
            'Кредит Европа Банк',
            'Кубань Кредит',
            'Локо-Банк',
            'МИнБанк',
            'Московский Кредитный Банк',
            'МТС Банк',
            'Нацинвестпромбанк',
            'Новикомбанк',
            'Открытие Банк',
            'ПСКБ',
            'Почта Банк',
            'Промсвязьбанк',
            'Ренессанс Кредит',
            'РНКБ',
            'Росбанк',
            'Русский Стандарт',
            'Севергазбанк',
            'Солид Банк',
            'Совкомбанк',
            'Траст Банк',
            'УБРиР',
            'Хоум Кредит Банк',
            'ЮниКредит Банк'
        ];
        $selectedBank = optional($assignedStages->firstWhere('id', $stage->id))->pivot->bank_name;
    @endphp

    @foreach($bankList as $bank)
        <option value="{{ $bank }}" {{ $selectedBank === $bank ? 'selected' : '' }}>{{ $bank }}</option>
    @endforeach
</select>

        <!-- поле для ввода номера карты account_number -->
        <label for="stage_{{ $stage->id }}_account_number">Номер карти</label>
        <input name="stage_account_numbers" id="stage_{{ $stage->id }}_account_number" class="form-control" placeholder="Номер карти"
value="{{ $assignedStages->firstWhere('id', $stage->id)->pivot->account_number ?? '' }}">
        <!-- Поле для ввода назначения платежа -->
        <label for="stage_{{ $stage->id }}_payment_purpose">Призначення платежу</label>
        <input name="stage_payment_purpose" id="stage_{{ $stage->id }}_payment_purpose" class="form-control" placeholder="Призначення платежу"
 value="{{ $assignedStages->firstWhere('id', $stage->id)->pivot->payment_purpose ?? '' }}">

        <!-- Поле для выбора статуса этапа -->

        <div class="form-group mt-2">

            <label for="stage_status_{{ $stage->id }}">Статус Етапу:</label>

            <select class="form-control" id="stage_status_{{ $stage->id }}" name="stages[{{ $stage->id }}][status]">

                <option value="active" {{ $currentStatus === 'active' ? 'selected' : '' }}>Поточний</option>

                <option value="completed" {{ $currentStatus === 'completed' ? 'selected' : '' }}>Завершений</option>

                <option value="pending" {{ $currentStatus === 'pending' ? 'selected' : '' }}>В очікуванні</option>

            </select>

        </div>

        <!-- Список шагов -->

        <label for="steps_{{ $stage->id }}">Кроки для цього Етапу:</label>



            @if ($completedSteps->isNotEmpty())

                <h6><span style="color:grey;">Завершені Кроки:</span>&nbsp;

                    <span style="color:#6528a3;font-weight: bold;">

                        @foreach($completedSteps as $step)

                                {{ $step->name }};&nbsp;

                        @endforeach

                    </span>

                </h6>

            @else

                <h6><span style="color:#6528a3;font-weight: bold;">У користувача ще немає завершених кроків.</span></h6>

            @endif



            @if ($currentStep)

                <h6><span style="color:grey;">Поточний Крок:</span>&nbsp;

                    <span style="color:green;font-weight: bold;">{{ $currentStep->name }}&nbsp;</span>

                </h6>

            @else

                <h6><span style="color:green;font-weight: bold;">Поточний Крок не призначено!!!</span></h6>

            @endif



            <select name="steps[{{ $stage->id }}][]" id="steps_{{ $stage->id }}" class="form-control" >

            @foreach($stage->steps as $step)

                <option value="{{ $step->id }}"

                        @if($user->steps->contains($step->id))  {{-- Проверяем, содержит ли пользователь шаг --}}

                        selected="selected"

                        @endif

                >

                    {{ $step->name }}

                </option>

           @endforeach

        </select>

    @endif

@endforeach

