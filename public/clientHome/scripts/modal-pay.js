const secModalCancel = document.getElementById("modal-payment-cancle");
const cancle = document.getElementById("cancle");
const modalClose = document.getElementById("modal-payment-close");
const modalBtnCancle = document.getElementById("modal-btn-cancle");
const reasonCancle = document.getElementById("reason-cancle");
const payCancle = document.getElementById("pay-cancle");

const modalPaymentSuccess = document.getElementById("modal-payment-success");
const btnPaySuccess = document.getElementById("btn-pay-success");
const modalPaymentSucClose = document.getElementById("modal-payment-suc-close");

if (cancle && secModalCancel ) {
    cancle.addEventListener("click", (e) => {
        e.preventDefault();
        secModalCancel.classList.add("modal-open");
        secModalCancel.style.display = "block";
    });
}
if (modalClose && secModalCancel) {
    modalClose.addEventListener("click", () => {
        secModalCancel.classList.remove("modal-open");
        secModalCancel.style.display = "none";
    });
}
// Отображение блока payCancle при клике на кнопку согласия в модальном окне
if (modalBtnCancle && payCancle) {
    modalBtnCancle.addEventListener("click", (e) => {
        e.preventDefault();
        payCancle.style.display = "block"; // Отображаем блок payCancle
        secModalCancel.classList.remove("modal-open"); // Закрываем модальное окно
        secModalCancel.style.display = "none";
    });
}

// Открытие модального окна успеха
if (btnPaySuccess && modalPaymentSuccess) {
    btnPaySuccess.addEventListener("click", (e) => {
        e.preventDefault();
        console.log("hello");
        modalPaymentSuccess.classList.add("modal-open");
        modalPaymentSuccess.style.display = "block";
    });
}

// Закрытие модального окна успеха
if (modalPaymentSucClose && modalPaymentSuccess) {
    modalPaymentSucClose.addEventListener("click", () => {
        console.log("close");
        modalPaymentSuccess.classList.remove("modal-open");
        modalPaymentSuccess.style.display = "none";
    });
}



