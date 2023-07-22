<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="brand-link logo-switch" style="display: flex; align-items: center;">
            <img src="/assets/img/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Bệnh viện Tâm thần</span>
    </div>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
          <li class="nav-item">
              <a class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Khoa/Phòng<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="{{ route('group.list') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('group.create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Tạo mới</p>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a href="" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Nhân viên<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="{{ route('employee.list') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('employee.create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Thêm mới</p>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-item">
              <a href="" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Ngày nghỉ<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="{{ route('dayoff.list') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Thêm mới</p>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-item">
              <a href="" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Tài khoản chấm công<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="{{ route('timekeepaccount.list') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('timekeepaccount.create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Thêm mới</p>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-item">
              <a href="" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Chỉnh sửa chấm công<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                      <a href="{{ route('timekeepPersonnal.show') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách</p>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-item">
              <a href="{{ route('admin-logout') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Đăng xuất</p>
              </a>
          </li>
      </ul>
    </nav>
  </div>
</aside>
