<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-injured"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Кількість клієнтів</span>
                <span class="info-box-number">
                    {{ $clientCount ?? '-' }}
                    <small>чол.</small>
                </span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Кількість Адмінів</span>
                <span class="info-box-number">
                    {{ $adminCount ?? '-' }}
                    <small>чол.</small>
                </span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
{{--    <div class="col-12 col-sm-6 col-md-2">--}}
{{--        <div class="info-box mb-3">--}}
{{--            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-times"></i></span>--}}
{{--            <div class="info-box-content">--}}
{{--                <span class="info-box-text">@lang('users.deactivated')</span>--}}
{{--                <span class="info-box-number">--}}
{{--                    deactive--}}
{{--                    <small>@lang('users.pcs')</small>--}}
{{--                </span>--}}
{{--            </div><!-- /.info-box-content -->--}}
{{--        </div><!-- /.info-box -->--}}
{{--    </div><!-- /.col -->--}}
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-user-tag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Кількість Сапорту</span>
                <span class="info-box-number">
                    {{ $supportCount ?? '-' }}
                    <small>чол.</small>
                </span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
{{--    <div class="col-12 col-sm-6 col-md-2">--}}
{{--        <div class="info-box mb-3">--}}
{{--            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-user-slash"></i></span>--}}
{{--            <div class="info-box-content">--}}
{{--                <span class="info-box-text">@lang('users.deleted')</span>--}}
{{--                <span class="info-box-number">--}}
{{--                    deleted--}}
{{--                    <small>@lang('users.pcs')</small>--}}
{{--                </span>--}}
{{--            </div><!-- /.info-box-content -->--}}
{{--        </div><!-- /.info-box -->--}}
{{--    </div><!-- /.col -->--}}
    <div class="col-12 col-sm-6 col-md-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Всього</span>
                <span class="info-box-number">
                    {{ $users->count() ?? '-' }}
                    <small>користувачів</small>
                </span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div><!-- /.row -->
