<div class="custom-datalist input-control security__form__control">
    <label for="datalist-input">{{ $field->label }}</label>
    <input type="text" class="input" id="datalist-input" name="{{ $field->slug }}"
           placeholder="{{ $field->placeholder ?? 'Выбрать' }}" readonly>
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
    <div class="datalist__arrow__box">
        <img class="" src="{{ asset('clientHome/images/arrow-datalist.svg') }}" alt="">
    </div>
    <div class="datalist-options" id="datalist-options">
        @foreach(json_decode($field->options) as $option)
            <div class="datalist-option" data-value="{{ $option }}">{{ $option }}</div>
        @endforeach
    </div>
</div>

<script>
    const datalistInput = document.getElementById("datalist-input");
    const datalistOptions = document.getElementById("datalist-options");

    // Добавляем событие выбора опции
    if(datalistOptions && datalistInput){
        datalistOptions.addEventListener("click", function(e) {
            if (e.target.classList.contains("datalist-option")) {
                // Устанавливаем значение выбранной опции в input
                datalistInput.value = e.target.getAttribute("data-value");
            }
        });
    }
</script>
