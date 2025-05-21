<div class="ticket-info">
    <h4 class="card__title">{{ $field->label ?? 'Загрузить пожалуйста документ:' }}</h4>
    <span class="custom-input-file"></span>
    <label class="ticket__download__label" for="{{ $field->slug }}">
        <input type="file" name="file[{{ $field->id }}]" id="{{ $field->slug }}">
    </label>
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
</div>
