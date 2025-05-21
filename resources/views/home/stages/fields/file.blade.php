<div class="ticket-info">
    <h4 class="card__title">{{ $field->label ?? 'Загрузить пожалуйста документ:' }}</h4>
    <span class="custom-input-file"></span>
    <label class="ticket__download__label" for="{{ $field->slug }}">
        <input type="file" name="file[{{ $field->id }}]" id="{{ $field->slug }}"  >
    </label>
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
</div>
<!-- JavaScript -->
<script>
    document.getElementById("{{ $field->slug }}").addEventListener('change', function() {
        const form = document.getElementById('form_step');

        // Проверяем, есть ли уже кнопка <button> в форме
        if (!form.querySelector('button')) {
            // Создаем новую кнопку
            const submitButton = document.createElement('button');
            submitButton.type = 'submit';
            submitButton.textContent = 'Подтвердить загрузку';
            submitButton.classList.add('btn', 'btn-submit'); // Добавьте нужные классы, если требуется

            // Добавляем кнопку в форму
            form.appendChild(submitButton);
        }
    });
</script>
