<div class="news__card__item">

    <div class=" news__card">

        <div class="card news__img__box">

            <img class="news__img" src="{{ asset('storage/media/blog/' . $blog->image_path) }}" alt="photo">

        </div>

        <div class="card news__content__box">

            <p class="news__content__date">{{ $blog->ru_created_at }}</p>

            <p class="news__content__desc">{{ $blog->name }}</p>

            <a class="news__content__link" href="{{ route('home') }}">Подробнее</a>

        </div>

    </div>

</div>
