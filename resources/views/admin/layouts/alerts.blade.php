@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ session('success') }}
  </div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Error!</h5>
    {{ session('error') }}
  </div>
@endif
@if (session('warning'))
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Warning!</h5>
    {{ session('warning') }}
  </div>
@endif
@if (session('info'))
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-info"></i> @lang('pages.info_action')!</h5>
    Info alert preview. This alert is dismissable.
  </div>
@endif
@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
</div>
@endif
