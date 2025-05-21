<div class="custom-datalist input-control security__form__control">
    <label for="selection-bank">{{ $field->label }}</label>
    <input type="text" class="input" id="selection-bank" name="{{ $field->slug }}"
           placeholder="{{ $field->placeholder ?? 'Выбрать' }}">
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
    <div class="datalist__arrow__box">
        <img class="" src="{{ asset('clientHome/images/arrow-datalist.svg') }}" alt="">
    </div>
    <div class="datalist-options options__bank" id="options__bank">
        @foreach(json_decode($field->options) as $option)
            <div class="option__bank" data-value="{{ $option }}" >{{ $option }}</div>
        @endforeach
    </div>
</div>

<script>
    const datalistInput = document.getElementById("selection-bank");
    const datalistOptions = document.getElementById("options__bank");

    // Добавляем событие выбора опции
    if(datalistOptions && datalistInput){
        datalistOptions.addEventListener("click", function(e) {
            if (e.target.classList.contains("option__bank")) {
                // Устанавливаем значение выбранной опции в input
                datalistInput.value = e.target.getAttribute("data-value");
            }
        });
    }
</script>
