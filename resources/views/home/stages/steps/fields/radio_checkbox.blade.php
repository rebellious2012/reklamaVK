<div class="bank__info">
    <h3 class="security__data__title">{{ $field->label ?? '' }}</h3>
    <fieldset class="fieldset">
        @foreach(json_decode($field->options) as $key=>$option)
            <div class="custom__radio__box">
                <input class="real__radio" type="radio" name="{{ $field->slug }}" id="card-{{$key}}"
                       value="{{ $option }}">
                <span class="custom__radio"></span>
                <label for="card-{{$key}}">{{ $option }}</label>
            </div>
        @endforeach
    </fieldset>
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
</div>
