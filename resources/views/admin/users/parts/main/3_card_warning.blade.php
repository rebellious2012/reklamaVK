<div class="card card-warning card-outline">
    <div class="card-header">
        <h3 class="card-title">Дії з користувачами</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <a class="btn btn-app bg-info button-info" data-toggle="modal" data-target="#modal-info">
            <i class="fas fa-info-circle"></i> Інформація про Клієнта
        </a>
{{--        <a class="btn btn-app history">--}}
{{--            <span class="badge bg-info">200</span>--}}
{{--            <i class="fas fa-tasks"></i> @lang('users.call_history')--}}
{{--        </a>--}}
{{--        <a class="btn btn-app" href="">--}}
{{--            <i class="fas fa-head-side-headphones"></i> @lang('users.call_control')--}}
{{--        </a>--}}
{{--        <a class="btn btn-app" href="">--}}
{{--            <i class="fas fa-phone-volume"></i> @lang('users.call-console')--}}
{{--        </a>--}}
{{--        @can('access-page', 'users_add')--}}
            <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-add1">
                <i class="fas fa-user-plus"></i> Додати
            </a>
{{--        @endcan--}}
{{--        @can('access-page', 'users_edit')--}}
            <a class="btn btn-app bg-warning edit-link" href="#" data-base-url="/admin/users">
                <i class="fas fa-user-edit"></i> Редагувати
            </a>
{{--        @endcan--}}
{{--        @can('access-page', 'users_activate')--}}
{{--            <a class="btn btn-app bg-danger button-deactive" data-toggle="modal" data-target="#modal-deactive">--}}
{{--                <i class="fas fa-user-times"></i> @lang('users.deactivate')--}}
{{--            </a>--}}
{{--            <a class="btn btn-app bg-teal button-active" data-toggle="modal" data-target="#modal-active">--}}
{{--                <i class="fas fa-user-check"></i> @lang('users.activate')--}}
{{--            </a>--}}
{{--        @endcan--}}
{{--        @can('access-page', 'users_delete')--}}
            <a class="btn btn-app bg-secondary button-delete" data-toggle="modal" data-target="#modal-delete">
                <i class="fas fa-user-slash"></i> Видалити
            </a>
{{--            <a class="btn btn-app bg-lime button-undelete" data-toggle="modal" data-target="#modal-undelete">--}}
{{--                <i class="fas fa-user-check"></i> @lang('users.undelete')--}}
{{--            </a>--}}
{{--        @endcan--}}
{{--        @can('access-page', 'users_banned')--}}
{{--            <a class="btn btn-app bg-orange banned-link" data-base-url="" data-toggle="modal" data-target="#modal-banned" data-accounts = "" >--}}
{{--                <i class="fas fa-user-slash"></i> @lang('users.banne')--}}
{{--            </a>--}}
{{--        @endcan--}}
    </div><!-- /.card-body -->
</div><!-- /.card -->
