@php
$routeName = Route::currentRouteName();
$routeName = explode('.', $routeName);
$routeGroup = $routeName[0];
$cat = $cat ?? '';
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('adminka/adminka/dist/img/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Smart Route</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="">
        <div class="image">
          <img
          @isset(auth()->user()->photo)
              src=""
            @else
              src=""
          @endisset
          class="img-circle elevation-2" alt="User Image">
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

            <li class="nav-item menu-is-opening menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: block;">
                    <li class="nav-item">
                        <a href="./index.html" class="nav-link active">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Dashboard v1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Dashboard v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Dashboard v3</p>
                        </a>
                    </li>
                </ul>
            </li>




          <li class="nav-item  menu-open ">
            <a href="#" class="nav-link  active ">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                @lang('menu.info')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link  active ">
                  <i class="fas fa-tachometer-alt-average"></i>
                  <p>@lang('menu.dashboard')</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="" class="nav-link  active ">
                  <i class="fas fa-microchip nav-icon"></i>
                  <p>@lang('menu.systems')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link  active ">
                  <i class="fas fa-server nav-icon"></i>
                  <p>@lang('menu.servers')</p>
                  <span class="right badge badge-info nodes-count">0</span>
                </a>
              </li>
               <li class="nav-item">
                <a href="" class="nav-link  active ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>@lang('menu.talkgroups')</p>
                  <span class="right badge badge-info tg-counts">0</span>
                </a>
              </li>
             <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="fas fa-signal-stream nav-icon"></i>
                  <p>@lang('menu.repiters')</p>
                  <span class="right badge badge-info repeater-count">0</span>
                </a>
              </li>
{{--              <li class="nav-item">--}}
{{--                <a href="{{route('hotspots.index')}}" class="nav-link @if($routeGroup == 'hotspots') active @endif">--}}
{{--                  <i class="fas fa-passport nav-icon"></i>--}}
{{--                  <p>@lang('menu.hotspots')</p>--}}
{{--                  <span class="right badge badge-info hotspot-count">0</span>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a href="{{route('clusters.index')}}" class="nav-link @if($routeGroup == 'clusters') active @endif">--}}
{{--                  <i class="fas fa-th-list nav-icon"></i>--}}
{{--                  <p>@lang('menu.clusters')</p>--}}
{{--                  <span class="right badge badge-info cluster-count">0</span>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a href="{{route('bridges.index')}}" class="nav-link @if($routeGroup == 'bridges') active @endif">--}}
{{--                  <i class="fas fa-code-branch nav-icon"></i>--}}
{{--                  <p>@lang('menu.bridges')</p>--}}
{{--                  <span class="right badge badge-info bridge-count"></span>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a href="{{route('information-routes.index')}}" class="nav-link @if($routeGroup == 'information-routes') active @endif--}}
{{--                ">--}}
{{--                  <i class="fas fa-road nav-icon"></i>--}}
{{--                  <p>@lang('menu.routes')</p>--}}
{{--                  <span class="right badge badge-info routes-count">0</span>--}}
{{--                </a>--}}
{{--              </li>--}}

{{--              <li class="nav-item">--}}
{{--                <a href="{{route('gateways.index')}}" class="nav-link @if($routeGroup == 'gateways') active @endif">--}}
{{--                  <i class="fas fa-flux-capacitor nav-icon"></i>--}}
{{--                  <p>@lang('menu.gateways')</p>--}}
{{--                  <span class="right badge badge-info gateways-count">0</span>--}}
{{--                </a>--}}
{{--              </li>--}}
            </ul>
          </li>
          <li class="nav-item  menu-open ">
            <a href="#" class="nav-link  active ">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>
                @lang('menu.events')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link  active ">
                  <i class="fas fa-signal-slash nav-icon"></i>
                  <p>@lang('menu.alarms-repiter')</p>
                  <span class="right badge badge-warning alarms-count">0</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link  active ">
                  <i class="fas fa-clipboard-prescription nav-icon"></i>
                  <p>@lang('menu.event-logs')</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-header">@lang('menu.maps')</li>
          <li class="nav-item">
            <a href="" class="nav-link active ">
              <i class="fas fa-chart-network"></i>
              <p>@lang('menu.map-network')</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link  active ">
              <i class="fas fa-map-marked-alt"></i>
              <p>@lang('menu.subscribers-map')</p>
            </a>
          </li>
          <li class="nav-header">@lang('menu.calls')</li>
          <li class="nav-item">
            <a href="" class="nav-link  active ">
              <i class="nav-icon fas fa-microphone-alt"></i>
              <p>
                @lang('menu.call-last')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link active ">
              <i class="nav-icon fas fa-stream"></i>
              <p>
                @lang('menu.call-statistics')
              </p>
            </a>
          </li>
{{--          <li class="nav-item">--}}
{{--            <a href="{{route('call-control')}}" class="nav-link @if($routeGroup == 'call-control') active @endif">--}}
{{--              <i class="nav-icon fas fa-head-side-headphones"></i>--}}
{{--              <p>--}}
{{--                @lang('menu.call-control')--}}
{{--              </p>--}}
{{--            </a>--}}
{{--          </li>--}}
{{--          <li class="nav-item">--}}
{{--            <a href="{{route('call-console')}}" class="nav-link @if($routeGroup == 'call-console') active @endif" >--}}
{{--              <i class="nav-icon fas fa-phone-volume"></i>--}}
{{--              <p>--}}
{{--                @lang('menu.call-console')--}}
{{--              </p>--}}
{{--            </a>--}}
{{--          </li>--}}
{{--          <li class="nav-header">@lang('menu.personal-area')</li>--}}
{{--          <li class="nav-item">--}}
{{--            <a href="{{route('personal-selfservice.index')}}" class="nav-link @if($routeGroup == 'personal-selfservice') active @endif">--}}
{{--              <i class="nav-icon fas fa-user-hard-hat"></i>--}}
{{--              <p>--}}
{{--                @lang('menu.personal-selfservice')--}}
{{--              </p>--}}
{{--            </a>--}}
{{--          </li>--}}
{{--          <li class="nav-item">--}}
{{--            <a href="{{route('mailbox.index')}}" class="nav-link @if($routeGroup == 'mailbox') active @endif">--}}
{{--              <i class="nav-icon fas fa-envelope"></i>--}}
{{--              <p>--}}
{{--                @lang('menu.mailbox')--}}
{{--              </p>--}}
{{--              <span class="right badge badge-info unread-count">0</span>--}}
{{--            </a>--}}
{{--          </li>--}}
          <li class="nav-item">
            <a href="" class="nav-link active ">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                @lang('menu.calendar')
              </p>
              <span class="right badge badge-info eventsCount">0</span>
            </a>
          </li>
          <li class="nav-item menu-open ">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                @lang('menu.settings')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
{{--    @can('access-page', 'department_read')--}}
    <li class="nav-item">
        <a href="" class="nav-link active ">
        <i class="fas fa-globe-americas nav-icon"></i>
        <p>@lang('menu.departments')</p>
        <span class="right badge badge-info departments-count">0</span>
        </a>
    </li>
{{--    @endcan--}}
{{--    @can('access-page', 'areas_read')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('areas.index')}}" class="nav-link @if($routeGroup == 'areas') active @endif">--}}
{{--                    <i class="fas fa-globe-europe nav-icon"></i>--}}
{{--                    <p>@lang('menu.areas')</p>--}}
{{--                    <span class="right badge badge-info areas-count">0</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--    @endcan--}}
{{--    @can('access-page', 'users_read')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('setting-users.index')}}" class="nav-link @if($routeGroup == 'setting-users') active @endif">--}}
{{--                    <i class="fas fa-user-tie nav-icon"></i>--}}
{{--                    <p>@lang('menu.setting-users')</p>--}}
{{--                    <span class="right badge badge-info users-count">0</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--    @endcan--}}
{{--    @can('access-page', 'operators_read')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('operators.index')}}" class="nav-link @if($routeGroup == 'operators') active @endif">--}}
{{--                    <i class="fas fa-user-crown nav-icon"></i>--}}
{{--                    <p>@lang('menu.operators')</p>--}}
{{--                    <span class="right badge badge-info operators-count">0</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--    @endcan--}}
{{--    @can('access-page', 'admin_read')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('administrators.index')}}" class="nav-link @if($routeGroup == 'administrators') active @endif">--}}
{{--                    <i class="fas fa-user-graduate nav-icon"></i>--}}
{{--                    <p>@lang('menu.administrators')</p>--}}
{{--                    <span class="right badge badge-info admin-count">0</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--    @endcan--}}
{{--    @can('access-department',[0,'add_department'])--}}
{{--    <li class="nav-item">--}}
{{--        <a href="{{route('roles.index')}}" class="nav-link @if($routeGroup == 'roles') active @endif">--}}
{{--        <i class="fas fa-folder-tree nav-icon"></i>--}}
{{--        <p>@lang('menu.roles')</p>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    @endcan--}}
{{--    @can('access-page', 'blocked_ip_read')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('blocked-ip')}}" class="nav-link @if($routeGroup == 'blocked-ip') active @endif">--}}
{{--                        <i class="fas fa-store-alt-slash nav-icon"></i>--}}
{{--                    <p>@lang('menu.blocked-ip')</p>--}}
{{--                    <span class="right badge badge-info blocked-ip-count">0</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--    @endcan--}}
{{--    @can('access-page', 'banned_calls_read')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('banned-calls')}}" class="nav-link @if($routeGroup == 'banned-calls') active @endif">--}}
{{--                    <i class="fas fa-head-side-cough-slash nav-icon"></i>--}}
{{--                    <p>@lang('menu.banned-calls')</p>--}}
{{--                    <span class="right badge badge-info banned-calls-count">0</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--    @endcan--}}
{{--    @can('access-page', 'banned_users_read')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('banned-users')}}" class="nav-link @if($routeGroup == 'banned-users') active @endif">--}}
{{--                    <i class="fas fa-user-slash nav-icon"></i>--}}
{{--                    <p>@lang('menu.banned-users')</p>--}}
{{--                    <span class="right badge badge-info banned-users-count">0</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--    @endcan--}}
{{--    @can('access-department',[0,'add_department'])--}}
                <li class="nav-item">
                    <a href="" class="nav-link  ">
                    <i class="fas fa-language nav-icon"></i>
                    <p>@lang('menu.translations')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link active ">
                    <i class="fas fa-cog nav-icon"></i>
                    <p>@lang('menu.settings-main')</p>
                    </a>
                </li>
{{--    @endcan--}}
            </ul>
          </li>
{{--          <li class="nav-header">@lang('menu.help')</li>--}}
{{--          <li class="nav-item">--}}
{{--            <a href="{{route('faq')}}" class="nav-link">--}}
{{--              <i class="fas fa-question-circle nav-icon"></i>--}}
{{--              <p>--}}
{{--                @lang('menu.faq')--}}
{{--                </p>--}}
{{--            </a>--}}
{{--          </li>--}}
{{--          --}}{{-- contact us --}}
{{--            <li class="nav-item">--}}
{{--                <a href="{{route('contacts')}}" class="nav-link">--}}
{{--                <i class="fas fa-envelope-open-text nav-icon"></i>--}}
{{--                <p>--}}
{{--                    @lang('menu.contacts')--}}
{{--                </p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            @can('access-page', 'logs_read')--}}
{{--            <li class="nav-item">--}}
{{--                <a href="{{route('allLogs')}}" class="nav-link">--}}
{{--                  <i class="nav-icon fas fa-clipboard-list"></i>--}}
{{--                  <p>--}}
{{--                    @lang('menu.allLogs')--}}
{{--                  </p>--}}
{{--                </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

          {{-- <li class="nav-item">
            <a href="{{route('logs')}}" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Error Logs
              </p>
            </a>
            </li> --}}
        </ul>
      </nav><!-- /.sidebar-menu -->
    </div><!-- /.sidebar -->
  </aside>
