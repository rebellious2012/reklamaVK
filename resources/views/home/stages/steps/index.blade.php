@if( ($activeStage = $assignedStages->first() ) && $activeStage)

    <div class="card security__info">

        <div class="security__info__iconbox">

            <img src="{{ asset('clientHome/images/icon-security.svg') }}" alt="security icon">

        </div>



        <h3 class="security__info__title">{{ $activeStage->name ?? '' }}</h3>

        <div class="security__info__desc">

            <span>

                {{ $activeStage->description ?? '' }}

            </span>

        </div>

        <div class="security__info__desc">

            <span>

                {{ $activeStage->short_content ?? '' }}

            </span>

        </div>

        <div class="security__info__desc">

            <span>Страница рекламодателя</span>

            <div class="security__info__costbox">

                <span class="security__info__cost">{{ ( ($stage_price = $activeStage->pivot->price ) && $stage_price ) ? number_format($stage_price, 0, ',', ' ') : '' }}</span>

                <span class="security__info__currensy"> ₽</span>

            </div>

        </div>

    </div>



    <div class="swiper">
            <div class="card security__data">
                <h1 class="form-title">{{ $step->name ?? '' }}</h1>
                <form class="grid security__form bank" id="form_step" action="{{ route("forms.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if($fields !==null)
                        <input type="hidden" name="step_user_id" value="{{ $stepUser->id }}">
                        @foreach($fields as $field)
                            @includeWhen(($field->type !== null), 'home.stages.fields.'.$field->type,  ['field' =>$field, 'stepUser' =>$stepUser, 'step' =>$step, 'userForms' =>$userForms])
                        @endforeach
                    @endif
                </form>
            </div>
    </div>
@endif
