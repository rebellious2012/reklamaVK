<div class="input-control security__form__control">
    <label for="user-email">Электронная почта</label>
    <input class="input" type="email" name="user-email" id="user-email"
           placeholder="example@mail.ru" />
    <input type="hidden" name="{{ $field->slug }}_field_id" value="{{ $field->id }}" >
</div>
