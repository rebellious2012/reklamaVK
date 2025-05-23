<!-- payment-cancle__info is display: none -->

<div class="card__info payment-cancle__info" id="pay-cancle" >

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

            <textarea name="reason-text" id="reason-text" rows="3"

                      placeholder="Опишите вашу проблему в деталях"></textarea>

        </li>

    </ul>



    <div class="ticket-info">

        <h4 class="card__title">{{ 'Загрузить пожалуйста скриншот:' }}</h4>

        <span class="custom-input-file"></span>

        <label class="ticket__download__label" for="file_{{ $field->slug }}">

            <input type="file" name="file[{{ $field->id }}]" id="file_{{ $field->slug }}"  >

        </label>

        <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
  <!-- Элемент для отображения статуса загрузки -->
  <div id="upload-status-{{ $field->slug }}" class="upload-status"></div>

    </div>



    <button class="submit-button" id="send-cancel-data">
        Отправить
    </button>



</div>
<script>
document.getElementById("send-cancel-data").addEventListener("click", function () {
     // Предотвращаем отправку формы
     event.preventDefault();
    // Собираем данные из радиокнопок
    const reason = document.querySelector('input[name="{{ $field->slug }}"]:checked');
    if (!reason) {
        alert("Пожалуйста, выберите причину отмены.");
        return;
    }

    // Собираем данные из текстового поля
    const details = document.getElementById("reason-text").value;
    // Собираем файл
    const fileInput = document.getElementById("file_{{ $field->slug }}");
    const file = fileInput.files[0];
    // Формируем данные для отправки
    const formData = new FormData();
    // Добавляем csrf токен
    formData.append("reason", reason.value);
    console.log("причина: "+reason.value);
    formData.append("details", details);
    formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));
if (file) {
    formData.append("file", file);
}
    // Отправляем данные на сервер через AJAX
    fetch("{{ route('cancel.store') }}", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Ошибка при отправке данных.");
            }
            return response.json();
        })
        .then((data) => {
            alert("Ваше уведомление находится в обработке! Дождитесь ответа от менеджера.");
            console.log(data);
        })
        .catch((error) => {
            console.error("Ошибка:", error);
            alert("Не удалось отправить данные. Попробуйте еще раз.");
        });
});
    </script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('file_{{ $field->slug }}');
    const uploadStatus = document.getElementById('upload-status-{{ $field->slug }}');

    fileInput.addEventListener('change', function () {
        if (fileInput.files.length > 0) {
            // Отображаем сообщение об успешной загрузке
            uploadStatus.textContent = 'Файл успешно выбран: ' + fileInput.files[0].name;
            uploadStatus.classList.add('visible');
        } else {
            // Если файл не выбран, скрываем сообщение
            uploadStatus.textContent = '';
            uploadStatus.classList.remove('visible');
        }
    });
});
</script>
