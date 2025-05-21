<div class="profile__heading">
    <div class="profile__box__img">
        <span class="">b</span>
    </div>
    <div>
        <h5 class="profile__title">{!! $field->label ?? "Профиль" !!}</h5>
        <p class="profile__user__info user__name">{{ Auth::user()?->account?->fio ?? 'ФИО' }}</p>
    </div>
</div>
