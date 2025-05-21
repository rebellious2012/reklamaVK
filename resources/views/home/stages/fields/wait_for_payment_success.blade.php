<!-- payment timer -->
<div class="payment__timer">
    <div class="payment__timer__box">
        <span class="payment__timer__time" id="time-wait">{{ $field->placeholder ?? '14:59' }}</span>
        <div class="payment__timer__icon-wrapper">
            <div class="payment__timer__icon-progress" id="timer-progress-wait"></div>
            <div class="payment__timer__icon-inner"></div>
        </div>
    </div>
    <p class="payment__timer__desc">{!! $field->label ?? "После устранения всех неполадок возврат средств будет повторно инициирован, и процесс завершится в течение 15 минут после устранения ошибки." !!}
    </p>
</div>

<div class="notices">
    <div class="notice notice-success">
        <div class="notice__imagebox">
            <img class="notice__image" src="{{ asset('clientHome/images/notice-success.svg') }}"
                 alt="notice warrning success">
        </div>
        <div class="notice__content">
            <h5 class="notice__title">Средства зачислены</h5>
            <p class="notice__desc">Средства успешно возвращенны на указанные
                                    реквизиты.</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var totalTimeWait = 900; // 15 minutes in seconds
        var timeLeftWait = totalTimeWait; // Remaining time
        var timerIntervalWait = setInterval(updateTimerWait, 1000); // Update every second

        function updateTimerWait() {
            // Countdown
            var minutesWait = Math.floor(timeLeftWait / 60);
            var secondsWait = timeLeftWait % 60;

            document.getElementById("time-wait").textContent =
                minutesWait + ":" + (secondsWait < 10 ? "0" : "") + secondsWait;

            // Calculate the percentage of time that has passed
            var percentWait = ((totalTimeWait - timeLeftWait) / totalTimeWait) * 100;
            document.getElementById("timer-progress-wait").style.background =
                "conic-gradient(#67A1FF " + percentWait + "%, transparent " + percentWait + "%)";

            // If time runs out, stop the timer
            if (timeLeftWait <= 0) {
                clearInterval(timerIntervalWait);
                document.getElementById("time-wait").textContent = "00:00";
                // Additional action when time expires
            }

            timeLeftWait--; // Decrease time by one second
        }
    });

</script>
