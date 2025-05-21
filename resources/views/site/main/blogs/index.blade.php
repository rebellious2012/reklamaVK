<section class="section" id="news">
    <div class="container">
        <div class="section__logo__box">
            <img class="section__logo__image" src="./images/calculator.svg" alt="calculator">
        </div>
        <h2 class="subtitle">Новости</h2>
        <div class="news__row">

            @each('site.main.blogs.item', $blogs, 'blog')


        </div>
        <a class="btn btn-main btn-center" href="#">
            <span>Все новости</span>
            <span class="btn__arrow">
                <img class="" src="./images/arrow.svg" alt="arrow">
            </span>
        </a>
    </div>
</section>



