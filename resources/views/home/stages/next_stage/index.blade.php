@if($stage !== null)
    <div class="card security__data card__check group">

        <div class="card__check__imagebox">
            <img class="card__check__img" src="{{ asset('clientHome/images/icon-security.svg') }}" alt="security icon">
        </div>
        <h4 class="card__title">{{ $stage->name }}</h4>
        <h2 class="card__check__title">{{ $stage->group_name }}</h2>
        <div class="card__check__imagebox__checked card__check__imagebox__checked-check">
            <img class="card__check__imagebox__checked__content" src="{{ asset('clientHome/images/card-check.png') }}"
                 alt="card checked">
        </div>
    </div>

<div class="card security__data card__check group">
    <div class="card__check__imagebox">
        <img class="card__check__img" src="{{ asset('clientHome/images/icon-security.svg') }}" alt="security icon">
    </div>
    <h4 class="card__title">{{ $next_stage->name }}</h4>
    <h2 class="card__check__title">{{ $next_stage->group_name }}</h2>
    <div class="card__check__imagebox__checked card__check__imagebox__checked-continue">

        <form action="{{ route("home.userStartStage") }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="stage_id" value="{{ $stage?->id }}">
            <input type="hidden" name="next_stage_id" value="{{ $next_stage->id }}">
            <button class="btn btn__payment btn__payment-success card__check__imagebox__checked__content" type="submit">Начать</button>
        </form>

        {{--        <form action="{{ route("home.stageUpdate", ['user' =>Auth::user()]) }}" method="post" enctype="multipart/form-data">--}}
        {{--            @csrf--}}
        {{--            @method('PUT')--}}
        {{--            <input type="hidden" name="stage_id" value="{{ $stage->id }}">--}}
        {{--            <input type="hidden" name="next_stage_id" value="{{ $next_stage->id }}">--}}
        {{--            <button class="btn btn__payment btn__payment-success card__check__imagebox__checked__content" type="submit">Начать</button>--}}
        {{--        </form>--}}
    </div>
</div>
@endif

