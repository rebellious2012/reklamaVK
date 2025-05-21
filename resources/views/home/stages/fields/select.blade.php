<div class="input-control">
    <div class="form-label">{{ $field->label }}</div>
    <select class="form-select" name="{{ $field->slug }}" required>
        @foreach(json_decode($field->options) as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
    </select>
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
</div>
