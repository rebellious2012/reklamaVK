<!-- payment timer -->
<div class="payment__timer">
    <div class="payment__timer__box">
        <span class="payment__timer__time">{{ $field->placeholder ?? '9999' }}</span>
        <div class="payment__timer__icon-wrapper">
            <div class="payment__timer__icon-progress"></div>
            <div class="payment__timer__icon-inner"></div>
        </div>
    </div>
    <p class="payment__timer__desc">{!! $field->label ?? "У вас есть 10 минут <br> для оплаты заявки"  !!}
    </p>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var totalTime = 10 * 60; // 10 minutes in seconds
        var timeLeft = totalTime; // Remaining time
        var timerInterval = setInterval(updateTimer, 1000); // Update every second

        function updateTimer() {
            // Countdown
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;

            document.querySelector('.payment__timer__time').textContent =
                minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

            // Calculate the percentage of time that has passed
            var percent = ((totalTime - timeLeft) / totalTime) * 100;
            document.querySelector('.payment__timer__icon-progress').style.background =
                'conic-gradient(#67A1FF ' + percent + '%, transparent ' + percent + '%)';

            // If time runs out, stop the timer
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                document.querySelector('.payment__timer__time').textContent = '00:00';
                // Additional action when time expires
            }

            timeLeft--; // Decrease time by one second
        }
    });
</script>
