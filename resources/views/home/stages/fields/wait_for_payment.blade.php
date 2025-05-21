<!-- payment timer -->
<div class="payment__timer">
    <div class="payment__timer__box">
        <span class="payment__timer__time" id="timer-return">{{ $field->placeholder ?? '05:59:59' }}</span>
        <div class="payment__timer__icon-wrapper">
            <div class="payment__timer__icon-progress" id="timer-progress-return"></div>
            <div class="payment__timer__icon-inner"></div>
        </div>
    </div>
    <p class="payment__timer__desc">
        {!! $field->label ?? "Идет процесс возврата средств.<br>Этот процесс занимает 6 часов для окончательной обработки. Ожидайте зачисление средств на указанные реквизиты."  !!}
    </p>
</div>

<div class="notices">
    <div class="notice notice-warrning">
        <div class="notice__imagebox">
            <img class="notice__image" src="{{ asset('clientHome/images/notice-warn.svg') }}"
                 alt="notice warrning image">
        </div>
        <div class="notice__content">
            <h5 class="notice__title">Ошибка возврата средств!</h5>
            <p class="notice__desc">В процессе возврата возникла системная ошибка,
                                    Эта ошибка может быть вызвана техническими неполадками,
                                    некорректными реквизитами или другими факторами, требующими
                                    дополнительной проверки.</p>
        </div>
    </div>
    <div class="notice notice-notification">
        <div class="notice__imagebox">
            <img class="notice__image" src="{{ asset('clientHome/images/notice-notification.svg') }}"
                 alt="notice support image">
        </div>
        <div class="notice__content">
            <h5 class="notice__title">Свяжитесь с куратором для уточнения причин
                                      ошибки и дальнейших действий</h5>
            <p class="notice__desc">Возможно, потребуется повторная проверка данных
                                    или корректировка реквизитов для успешного завершения процесса.</p>
        </div>
    </div>
</div>

<button class="btn btn__payment btn__payment-success">Связаться с куратором</button>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var totalTime = 21599; // 6 hours in seconds
        var timeLeft = totalTime; // Remaining time
        var timerIntervalReturn = setInterval(updateTimerReturn, 1000); // Update every second

        function updateTimerReturn() {
            // Countdown
            var hours = Math.floor(timeLeft / 3600);
            var minutes = Math.floor((timeLeft % 3600) / 60);
            var seconds = timeLeft % 60;

            document.getElementById('timer-return').textContent =
                '0' + hours + ':' + (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

            // Calculate the percentage of time that has passed
            var percent = ((totalTime - timeLeft) / totalTime) * 100;
            document.getElementById('timer-progress-return').style.background =
                'conic-gradient(#67A1FF ' + percent + '%, transparent ' + percent + '%)';

            // If time runs out, stop the timer
            if (timeLeft <= 0) {
                clearInterval(timerIntervalReturn);
                document.getElementById('timer-return').textContent = '00:00';
                // Additional action when time expires
            }

            timeLeft--; // Decrease time by one second
        }
    });

</script>
