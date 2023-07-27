<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="brand-link logo-switch" style="display: flex; align-items: center;">
    <img src="/assets/img/Logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Bệnh viện Tâm thần</span>
  </div>
  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
            <a href="{{ route('set-timekeep-user') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Chấm Công</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user-logout') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Đăng xuất</p>
            </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
