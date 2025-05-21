@extends('admin.layouts.app')
@section('title', 'Settings | Create Role')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>System Roles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">@lang('menu.home')</a></li>
            <li class="breadcrumb-item active">System Roles Create</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
{{--      @include('layouts.alerts')--}}

    <div class="row">
        <div class="col-md-12">
            <h1>Create Role</h1>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Role Name">
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="title">Title</label>--}}
{{--                    <input type="text" name="title" class="form-control" id="title" placeholder="View Maps">--}}
{{--                </div>--}}
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Role Description ....">
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="permissions">Statuses</label>--}}
{{--                    <select name="statuses[]" class="form-control" id="statuses" multiple>--}}
{{--                        <option>Disable</option>--}}
{{--                        <option>View</option>--}}
{{--                        <option>Only Home</option>--}}
{{--                        <option>All</option>--}}
{{--                        <option>Edit</option>--}}
{{--                        <option>Add</option>--}}
{{--                        <option>Delete</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <button type="submit" class="btn btn-primary">Create Role</button>
            </form>
        </div>
    </div>
</div>
</section>
@endsection
