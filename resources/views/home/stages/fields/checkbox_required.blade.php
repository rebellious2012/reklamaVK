<div class="custom__checkbox__block">
    <input class="custom__checkbox" type="checkbox" name="{{ $field->slug}}"
           id="{{ $field->slug }}" required >
    <label for="{{ $field->slug }}">{{ $field->label ?? '' }}
    </label>
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
</div>
