<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="brand-link logo-switch" style="display: flex; align-items: center;">
    <img src="/assets/img/Logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    {{-- <a href="{{ route('personal-index') }}"><span class="brand-text font-weight-light">{{ $employee->name }}</span></a> --}}
     <span class="brand-text font-weight-light">{{ $employee->name }}</span>
  </div>
  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
            <a href="{{ route('personal-info') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Tổng quát ngày nghỉ</p>
            </a>
        </li>
      <li class="nav-item">
          <a href="{{ route('personal-Compensatory-Day') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Thông tin nghỉ bù</p>
          </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('personal-Annual-Leave') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Thông tin nghỉ phép</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('personal-Sick-Leave') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Thông tin nghỉ ốm</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('personal-Unpaid-Leave') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Thông tin nghỉ không lương</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('personal-School-Leave') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Thông tin nghỉ đi học</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('personal-Regime-Leave') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Thông tin nghỉ chế độ</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('personal-Leave') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Thông tin nghỉ</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('personal-Not-Leave') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Thông tin nghỉ không phép</p>
        </a>
      </li>
      <li class="nav-item">
          <a href="{{ route('personal-list-time-keep', session()->get('personal_login')) }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Thông tin cham cong trong phong</p>
          </a>
      </li>
      {{-- <li class="nav-item">
        <a href="{{ route('set-timekeep-user') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Chấm công</p>
        </a>
      </li> --}}
        <li class="nav-item">
            <a href="{{ route('personal-logout') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Đăng xuất</p>
            </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
