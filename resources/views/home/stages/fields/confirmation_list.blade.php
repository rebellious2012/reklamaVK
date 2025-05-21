<h5 class="profile__title profile__title-XL">{{ $field->label }}</h5>
<ul class="data__list">
    @foreach(json_decode($field->options) as $option)
        <li class="data__item">{{ $option }}</li>
    @endforeach
    <li class="data__item">
        <p>Я ознакомлен с <a class="data__item__link" href="#">правилами</a> и
            <a class="data__item__link" href="#">офертой</a>
        </p>
    </li>
</ul>
