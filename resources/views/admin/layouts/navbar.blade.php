 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.home') }}" class="nav-link">Dashboard</a>
      </li>
     <li class="nav-item d-none d-sm-inline-block">
       <a href="{{route('home')}}" class="nav-link">Кабинет ЛК</a>
    </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge unread-count">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right messages">
{{--            <a href="{{route('mailbox.index')}}" class="dropdown-item dropdown-footer">See All Messages</a>--}}
        </div>

      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown ">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge notif_count">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><span class="notif_count">0</span> Notifications</span>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>

            <i class="fas fa-clipboard-list mr-2"></i> <span class="logsCount"></span> account logs
            <span class="float-right text-muted text-sm">1 day</span>
          </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><a href="{{ route('home') }}">Your profile</a></span>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf <!-- CSRF токен для защиты формы -->
            <a href="javascript:;" onclick="document.getElementById('logout-form').submit();" class="dropdown-item">
                <i class="fas fa-door-closed mr-2"></i> Exit
                <span class="float-right text-muted text-sm"></span>
            </a>
        </form>

        </div>

      </li>
         <!-- Language Dropdown Menu -->
         <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">

            </a>
            <div class="dropdown-menu dropdown-menu-right p-0">

            </div>
          </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav><!-- /.navbar -->
