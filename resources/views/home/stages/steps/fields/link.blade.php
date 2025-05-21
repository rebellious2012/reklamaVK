<div class="input-control security__form__control">
    <label for="{{ $field->slug }}">{{ $field->label }}</label>
    <input class="input" type="url" name="{{ $field->slug }}" id="{{ $field->slug }}"
           placeholder="{{ $field->placeholder }}" />
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
</div>
