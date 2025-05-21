<!-- payment-cancle__info is display: none -->
<div class="card__info payment-cancle__info" id="pay-cancle">
    <h4 class="card__title">{{ $field->label ?? 'Укажите причину отмены заявки:' }}</h4>
    <ul class="payment-reason-cancle__list" id="reason-cancle">

        @foreach(json_decode($field->options) as $key=>$option)
            <li class="payment-reason-cancle__item">
                <input class="real-radio" type="radio" name="{{ $field->slug }}" value="{{ $option }}"
                       id="problem-{{$key}}">
                <span class="custom-radio"></span>
                <label for="problem-{{$key}}">{{ $option }}</label>
            </li>
        @endforeach
        <li class="payment-reason-cancle__item">
            <textarea name="" id="" rows="3"
                      placeholder="Опишите вашу проблему в деталях"></textarea>
        </li>
    </ul>

    <button class="btn btn__payment btn__payment-success"
            type="submit">Отправить
    </button>

</div>
