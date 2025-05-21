<!-- slide 1 -->
<div class="card security__data ">
    @if($stepUser !==null)
        <h3 class="security__data__title">{{ $step->name ?? '' }}</h3>
        <form class="grid security__form" id="form_step" action="{{ route("forms.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($fields !==null)
                <input type="hidden" name="step_user_id" value="{{ $stepUser->id }}">
                @foreach($fields as $field)
                    @includeWhen(($field->type !== null), 'home.stages.fields.'.$field->type,  ['field' =>$field, 'stepUser' =>$stepUser, 'step' =>$step, 'userForms' =>$userForms])
                @endforeach
            @endif
        </form>
    @endif
</div>
