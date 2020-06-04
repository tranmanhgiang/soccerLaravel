
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      
      <div class="sidebar-brand-text mx-3">
          <img src="front_asset/img/logo.png" class="logo" />
          
      </div>
    </a>
    <br/>
    <h4 class="text-center title">Trang quản trị</h4>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is('admin/dashboard/index')) ? 'active' : '' }}">
      <a class="nav-link" href="admin/dashboard/index">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Quản lý người dùng
    </div>

    <li class="nav-item {{ (request()->is('admin/users/list')) ? 'active' : '' }}">
      <a class="nav-link" href="admin/users/list">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Quản lý các đội bóng
    </div>

    <li class="nav-item {{ (request()->is('admin/clubs/list')) ? 'active' : '' }}">
      <a class="nav-link" href="admin/clubs/list">
        <i class="fas fa-fw fa-futbol"></i>
        <span>Đội bóng</span></a>
    </li>
    <li class="nav-item {{ (request()->is('admin/findamatch/pending')) ? 'active' : '' }}">
      <a class="nav-link" href="admin/findamatch/pending">
        <i class="fas fa-paper-plane"></i>
        <span>Đang chờ xét duyệt</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="competitor.html">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Kèo</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>