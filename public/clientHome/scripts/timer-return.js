$(document).ready(function () {
    var totalTime = 21599; // 6 часов в секундах
    var timeLeft = totalTime; // Оставшееся время
    var timerIntervalReturn = setInterval(updateTimerReturn, 1000); // Обновление каждую секунду

    function updateTimerReturn() {
        // Обратный отсчёт
        var hours = Math.floor(timeLeft / 3600);
        var minutes = Math.floor(timeLeft / 360);
        var seconds = timeLeft % 60;
        $('#timer-return').text(
            '0' + hours + ':' + minutes + ':' + (seconds < 10 ? '0' : '') + seconds
        );

        // Рассчитываем процент времени, который прошёл
        var percent = (totalTime - timeLeft) / totalTime * 100;
        $('#timer-progress-return').css(
            'background',
            'conic-gradient(#67A1FF ' + percent + '%, transparent ' + percent + '%)'
        );

        // Если время вышло, остановить таймер
        if (timeLeft <= 0) {
            clearInterval(timerIntervalReturn);
            $('#timer-return').text('00:00');
            // Дополнительное действие по истечении времени
        }

        timeLeft--; // Уменьшаем время на секунду
    }


    var totalTimeWait = 900; // 15 минут в секундах
    var timeLeftWait = totalTimeWait; // Оставшееся время
    var timerIntervalWait = setInterval(updateTimerWait, 1000); // Обновление каждую секунду

    function updateTimerWait() {
        // Обратный отсчёт
        var minutesWait = Math.floor(timeLeftWait / 60);
        var secondsWait = timeLeftWait % 60;
        $('#time-wait').text(
            minutesWait + ':' + (secondsWait < 10 ? '0' : '') + secondsWait
        );

        // Рассчитываем процент времени, который прошёл
        var percentWait = (totalTimeWait - timeLeftWait) / totalTimeWait * 100;
        $('#timer-progress-wait').css(
            'background',
            'conic-gradient(#67A1FF ' + percentWait + '%, transparent ' + percentWait + '%)'
        );

        // Если время вышло, остановить таймер
        if (timeLeftWait <= 0) {
            clearInterval(timerIntervalWait);
            $('#time-wait').text('00:00');
            // Дополнительное действие по истечении времени
        }

        timeLeftWait--; // Уменьшаем время на секунду
    }
});
