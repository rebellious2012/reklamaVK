<div class="card security__data swiper-slide loader__card">

    <h3 class="security__data__title">{{ $field->label ?? 'Формирование заявки' }}</h3>

    <p class="security__data__desc">{{ $field->placeholder ?? 'Идет поиск заявки, ожидайте' }}</p>

    <div class="security__loader__box">

        <img class="security__loader__img" src="{{ asset('clientHome/images/loader.svg') }}" alt="loader">

    </div>

</div>

