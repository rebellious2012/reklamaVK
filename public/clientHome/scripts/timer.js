$(document).ready(function() {
    var totalTime = 10 * 60; // 10 минут в секундах
    var timeLeft = totalTime; // Оставшееся время
    var timerInterval = setInterval(updateTimer, 1000); // Обновление каждую секунду

    function updateTimer() {
        // Обратный отсчёт
        var minutes = Math.floor(timeLeft / 60);
        var seconds = timeLeft % 60;
        $('.payment__timer__time').text(
            minutes + ':' + (seconds < 10 ? '0' : '') + seconds
        );

        // Рассчитываем процент времени, который прошёл
        var percent = (totalTime - timeLeft) / totalTime * 100;
        $('.payment__timer__icon-progress').css(
            'background',
            'conic-gradient(#67A1FF ' + percent + '%, transparent ' + percent + '%)'
        );

        // Если время вышло, остановить таймер
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            $('.payment__timer__time').text('00:00');
            // Дополнительное действие по истечении времени
        }

        timeLeft--; // Уменьшаем время на секунду
    }
});
