<div class="bank__info">
    <h3 class="security__data__title">{{ $field->label ?? '' }}</h3>
    <ul class="data__list">
        @foreach(json_decode($field->options) as $option)
            <li class="data__item">{{ $option }}</li>
        @endforeach
    </ul>
</div>
