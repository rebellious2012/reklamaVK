 <div class="bank__info">
    <h3 class="security__data__title">{{ $field->label ?? '' }}</h3>

    <fieldset class="fieldset">
        @foreach(json_decode($field->options) as $key => $option)
            <label class="custom__radio__box">
                <input type="radio" name="{{ $field->slug }}" value="{{ $option }}"
                       id="option-{{ $key }}" class="real__radio">
                <span class="custom__radio"></span>
                <span class="radio__text">{{ $option }}</span>
            </label>
        @endforeach
    </fieldset>

    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}">
</div>

