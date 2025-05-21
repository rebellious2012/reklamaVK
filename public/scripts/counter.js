document.addEventListener("DOMContentLoaded", () => {
    const requestSlider = document.querySelectorAll(".progress__slider")[0]; // Ползунок заявок
    const clientSlider = document.querySelectorAll(".progress__slider")[1]; // Ползунок клиентов
    const requestNumber = document.querySelector(".progress__line-proposal").closest(".card__progress__content").querySelector(".progress__content__numb");
    const clientNumber = document.querySelector(".progress__line-publicity").closest(".card__progress__content").querySelector(".progress__content__numb");
    const incomeNumber = document.querySelector(".progress__content__numb-XL .counter");

    const conversionRate = 0.2; // 20% конверсии
    const averageCheck = 5000; // Средний чек

    // Устанавливаем max значения для ползунков
    requestSlider.max = 200;
    clientSlider.max = 40;

    // Функция форматирования чисел с пробелами
    function formatNumber(number) {
        return number.toLocaleString("ru-RU");
    }

    // Функция обновления значений при изменении количества клиентов
    function updateFromClients() {
        let clients = parseInt(clientSlider.value, 10);
        if (clients > clientSlider.max) clients = clientSlider.max; // Ограничение

        let requests = Math.round(clients / conversionRate);
        if (requests > requestSlider.max) requests = requestSlider.max; // Ограничение

        const income = clients * averageCheck;

        clientNumber.textContent = formatNumber(clients);
        requestNumber.textContent = formatNumber(requests);
        incomeNumber.textContent = formatNumber(income);

        requestSlider.value = requests; // Двигаем ползунок заявок
        updateProgressBars();
    }

    // Функция обновления значений при изменении количества заявок
    function updateFromRequests() {
        let requests = parseInt(requestSlider.value, 10);
        if (requests > requestSlider.max) requests = requestSlider.max; // Ограничение

        let clients = Math.round(requests * conversionRate);
        if (clients > clientSlider.max) clients = clientSlider.max; // Ограничение

        const income = clients * averageCheck;

        requestNumber.textContent = formatNumber(requests);
        clientNumber.textContent = formatNumber(clients);
        incomeNumber.textContent = formatNumber(income);

        clientSlider.value = clients; // Двигаем ползунок клиентов
        updateProgressBars();
    }

    // Функция обновления прогрессбаров
    function updateProgressBars() {
        document.querySelector(".progress__line-proposal").style.width = `${(requestSlider.value / requestSlider.max) * 100}%`;
        document.querySelector(".progress__line-publicity").style.width = `${(clientSlider.value / clientSlider.max) * 100}%`;
    }

    // Синхронизируем ползунки при изменении любого из них
    requestSlider.addEventListener("input", updateFromRequests);
    clientSlider.addEventListener("input", updateFromClients);

    // Устанавливаем стартовые значения
    updateFromClients();
});
