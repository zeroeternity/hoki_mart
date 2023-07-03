<div class="top_nav">
  <div class="nav_menu">
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
            data-toggle="dropdown" aria-expanded="false">
            @if (auth()->check())
            <strong>{{ auth()->user()->name }}</strong>
            @else
            Anda Belum Login
            @endif
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile') }}"> Profile</a>
            <a class="dropdown-item" href="/signup"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</div>