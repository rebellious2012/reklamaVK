@php
$routeName = Route::currentRouteName();
$routeName = explode('.', $routeName);
$routeGroup = $routeName[0];
$cat = $cat ?? '';
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
      <img src="{{asset('adminka/dist/img/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="">
        <div class="image">
            <img src="{{asset('adminka/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" />
{{--          <img--}}
{{--          @isset(auth()->user()->photo)--}}
{{--              src="{{asset('storage/'.auth()->user()->photo)}}"--}}
{{--            @else--}}
{{--              src="{{asset('adminka/dist/img/user2-160x160.png')}}"--}}
{{--          @endisset--}}
{{--          class="img-circle elevation-2" alt="User Image">--}}
        </div>
    </a>
        <div class="info">
          <a href="" class="d-block">{{auth()->user()?->name}}</a>
        </div>

      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item    {{ ( Request::routeIs('admin.home') || Request::routeIs('admin.users.*') || Request::routeIs('roles.*') ) ? 'menu-open' : '' }} ">
                    <a href="#" class="nav-link  {{ ( Request::routeIs('admin.home') || Request::routeIs('admin.users.*') || Request::routeIs('roles.*') ) ? 'active' : '' }} ">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Dashboard
                       <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('admin.home')}}" class="nav-link {{ (  Request::routeIs('admin.home') || Request::routeIs('admin.users.*') ) ? 'active' : '' }}">
                          <i class="fas fa-tachometer-alt-average"></i>
                          <p>Користувачі</p>
                        </a>
                      </li>
                        <li class="nav-item ">
                            <a href="{{route('roles.index')}}" class="nav-link {{ Request::routeIs('roles.*') ? 'active' : '' }}">
                                <i class="fas fa-folder-tree nav-icon"></i>
                                <p>Ролі</p>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{route('admin.users.create')}}" class="nav-link active">--}}
{{--                                <i class="fas fa-tachometer-alt-average"></i>--}}
{{--                                <p>@lang('admin/sidebar.users.create')</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                       <li class="nav-item">
{{--                        <a href="{{route('systems.index')}}" class="nav-link @if($routeGroup == 'systems') active @endif">--}}
{{--                          <i class="fas fa-microchip nav-icon"></i>--}}
{{--                          <p>@lang('menu.systems')</p>--}}
{{--                        </a>--}}
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{ Request::routeIs('stages.*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::routeIs('stages.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Етапи
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('stages.index')}}" class="nav-link {{ Request::routeIs('stages.*') ? 'active' : '' }}">
                  <i class="fas fa-tachometer-alt-average"></i>
                  <p>Всі Етапи</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav><!-- /.sidebar-menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ Request::routeIs('steps.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::routeIs('steps.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Кроки
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('steps.index')}}" class="nav-link {{ Request::routeIs('steps.*') ? 'active' : '' }}">
                                <i class="fas fa-tachometer-alt-average"></i>
                                <p>Всі Кроки</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- /.sidebar-menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ Request::routeIs('fields.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::routeIs('fields.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Поля
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('fields.index')}}" class="nav-link {{ Request::routeIs('fields.*') ? 'active' : '' }}">
                                <i class="fas fa-tachometer-alt-average"></i>
                                <p>Всі Поля</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- /.sidebar-menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ Request::routeIs('blogs.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::routeIs('blogs.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Новини
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('blogs.index')}}" class="nav-link  {{ Request::routeIs('blogs.*') ? 'active' : '' }}">
                                <i class="fas fa-tachometer-alt-average"></i>
                                <p>Всі Новини</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- /.sidebar-menu -->


    </div><!-- /.sidebar -->
  </aside>
