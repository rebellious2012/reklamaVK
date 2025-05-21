<!-- Выпадающий список для выбора этапов -->

<h4><span style="color:green;">Призначити Наступний Етап!!!</span></h4>

<select id="stage-selector" class="form-control">

    <option value="">Виберіть Етап</option>

    @foreach($pendingStages as $stage)

        <option value="stage_{{ $stage->id }}">{{ $stage->name }}</option>

    @endforeach

</select>



<!-- Блоки для каждого этапа -->

@foreach($pendingStages as $stage)

    @php

        $assignedStage = $assignedStages->firstWhere('id', $stage->id);

        $currentStatus = $assignedStage->pivot->status ?? null;



    @endphp

    <div id="stage_block_{{ $stage->id }}" class="stage-block mb-3">

{{--            <h4 style="padding-right: 1%;">{{ $stage->name }}</h4>--}}



        <h4 style="padding-right: 1%;"><span style="color:grey;">Наступний Етап:</span>

            <br><span style="color:green;">{{ $stage->name }}</span></h4>



        <!-- Поле для ввода стоимости этапа -->

        <label for="stage_{{ $stage->id }}_price">Вартість Етапу:</label>

        <input type="number" name="stage_prices[{{ $stage->id }}]" id="stage_{{ $stage->id }}_price" class="form-control" placeholder="Вартість"

               value="{{ $assignedStage->pivot->price ?? $stage->price ?? '' }}">



        <!-- Поле для выбора статуса этапа -->

        <div class="form-group mt-2">

            <label for="stage_status_{{ $stage->id }}">Статус Етапу:</label>

            <select class="form-control" id="stage_status_{{ $stage->id }}" name="stages[{{ $stage->id }}][status]">

                <option value="pending" {{ $currentStatus === 'pending' ? 'selected' : '' }}>В очікуванні</option>

                <option value="active" {{ $currentStatus === 'active' ? 'selected' : '' }}>Поточний</option>

                <option value="completed" {{ $currentStatus === 'completed' ? 'selected' : '' }}>Завершений</option>

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



{{--        <!-- Список шагов -->--}}

{{--        <label for="steps_{{ $stage->id }}">Кроки для цього Етапу:</label>--}}

{{--        <select name="steps[{{ $stage->id }}][]" id="steps_{{ $stage->id }}" class="form-control" >--}}

{{--            @foreach($stage->steps as $step)--}}

{{--                <option value="{{ $step->id }}"--}}

{{--                        {{ $assignedStage && $assignedStage->steps->contains($step->id) ? 'selected' : '' }}>--}}

{{--                    {{ $step->name }}--}}

{{--                </option>--}}

{{--            @endforeach--}}

{{--        </select>--}}





    </div>

@endforeach



<script>

    document.addEventListener('DOMContentLoaded', function() {

        const stageSelector = document.getElementById('stage-selector');

        const stageBlocks = document.querySelectorAll('.stage-block');



        // Изначально скрываем все блоки и устанавливаем disabled

        stageBlocks.forEach(block => {

            block.style.display = 'none';

            block.querySelectorAll('input, select, textarea').forEach(field => {

                field.disabled = true; // Устанавливаем disabled для всех полей

            });

        });



        // Обрабатываем изменение в селекте

        stageSelector.addEventListener('change', function() {

            // Скрываем все блоки и устанавливаем disabled

            stageBlocks.forEach(block => {

                block.style.display = 'none';

                block.querySelectorAll('input, select, textarea').forEach(field => {

                    field.disabled = true; // Устанавливаем disabled для всех полей

                });

            });



            // Получаем выбранное значение

            const selectedStageId = this.value;



            // Отображаем выбранный блок и снимаем disabled, если что-то выбрано

            if (selectedStageId) {

                const selectedStageBlock = document.getElementById('stage_block_' + selectedStageId.split('_')[1]);

                if (selectedStageBlock) {

                    selectedStageBlock.style.display = 'block';

                    selectedStageBlock.querySelectorAll('input, select, textarea').forEach(field => {

                        field.disabled = false; // Снимаем disabled для всех полей

                    });

                }

            }

        });

    });

</script>



