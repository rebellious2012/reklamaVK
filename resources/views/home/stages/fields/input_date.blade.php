<div class="input-control security__form__control">
    <label for="{{ $field->slug }}">{{ $field->label }}</label>
    <input class="input input__date" type="text" name="{{ $field->slug }}"
           id="{{ $field->slug }}" placeholder="__-__-____"/>
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}">
    <div class="calendar__container">
        <img class="calendar__container__img" src="{{ asset('clientHome/images/calendar.svg') }}"
             alt="calendar">
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dateField = document.getElementById("{{ $field->slug }}");
        const animSelect = document.getElementById("anim");

        // Инициализация datepicker
        if (dateField) {
            $(dateField).datepicker({
                dateFormat: "dd-mm-yy",
            });
        }

        // Изменение анимации при выборе из селекта
        if (animSelect) {
            animSelect.addEventListener("change", function() {
                const selectedAnim = this.value;
                $(dateField).datepicker("option", "showAnim", selectedAnim);
            });
        }
    });
</script>