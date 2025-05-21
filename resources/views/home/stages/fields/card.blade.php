<div class="input-control">
    <div class="form-label">{{ $field->label }}</div>
    <input class="form-input" type="text" name="{{ $field->slug }}" id="{{ $field->slug }}" placeholder="{{ $field->placeholder ?? 'ХХХХ ХХХХ ХХХХ ХХХХ' }}"

           maxlength="16" required/>

    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >

</div>

