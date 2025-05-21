<div class="input-control security__form__control">
    <label for="{{ $field->slug }}">{{ $field->label }}</label>
    <input class="input" type="tel" name="{{ $field->slug }}" id="{{ $field->slug }}"
           placeholder="{{ $field->placeholder }}" />
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
    <div class="selected-flag" id="selected-flag">
        <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="Selected Flag" id="selected-flag">
    </div>
    <ul class="number__select__menu" id="number-Menu">
        <li class="number__select__item" id="number-Item">
            <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="flag russian">
        </li>
        <li class="number__select__item" id="number-Item">
            <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="">
        </li>
        <li class="number__select__item" id="number-Item">
            <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="">
        </li>
        <li class="number__select__item" id="number-Item">
            <img src="{{ asset('clientHome/images/flags/flag-ru.png') }}" alt="">
        </li>
    </ul>

</div>
