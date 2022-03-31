@php
$unread_contact = \App\Models\Contact::where('is_read', 0)->count();
@endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-3 sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Developex Ltd</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-flat nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link @isset($dashboard_active) {{ $dashboard_active }} @endisset">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          {{-- Service start --}}
          <li class="nav-item @if(
            request()->is('admin/admin') ||
            request()->is('admin/admin/create') ||
            request()->is('admin/admin/change_password')
          ) menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.admin.index') }}" class="nav-link @if(request()->is('admin/admin')) bg-gray @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.admin.create') }}" class="nav-link @if(request()->is('admin/admin/create')) bg-gray @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.admin.change_password') }}" class="nav-link @if(request()->is('admin/admin/change_password')) bg-gray @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change password</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Category start --}}
          <li class="nav-item @if(
            request()->is('admin/category') ||
            request()->is('admin/category/create')
          ) menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link @if(request()->is('admin/category')) bg-gray @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.create') }}" class="nav-link @if(request()->is('admin/category/create')) bg-gray @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Training start --}}
          <li class="nav-item @if(
            request()->is('admin/training') ||
            request()->is('admin/training/create')
          ) menu-open @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Training
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.training.index') }}" class="nav-link @if(request()->is('admin/training')) bg-gray @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Training</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.training.create') }}" class="nav-link @if(request()->is('admin/training/create')) bg-gray @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Training</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Menu --}}
          <li class="nav-item @if(request()->is('admin/menus')) menu-open @endif">
            <a href="#" class="nav-link @isset($admin_active) {{ $admin_active }} @endisset">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.menus.index') }}" class="nav-link @if(request()->is('admin/menus')) bg-gray @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Menu</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Category end --}}

          {{-- Service start --}}
          <li class="nav-item @isset($service_active) {{ $service_active }} @endisset">
            <a href="#" class="nav-link @isset($service_active) {{ $service_active }} @endisset">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Services
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.service.index') }}" class="nav-link @isset($service_all_active) active @endisset">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.service.create') }}" class="nav-link @isset($service_add_active) active @endisset">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Service</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Service end --}}

          {{-- Client start --}}
          <li class="nav-item @if(
            request()->is('admin/clients')
            || request()->is('admin/clients/create')
          ) menu-open @endif">


            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Client
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->is('admin/clients') ? 'bg-gray' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.clients.create') }}" class="nav-link {{ request()->is('admin/clients/create') ? 'bg-gray' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Client</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Client end --}}

          {{-- Hero start --}}
          <li class="nav-item">
            <a href="{{ route('admin.hero.index') }}" class="nav-link {{ request()->is('admin/hero') ? 'bg-gray' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Hero Section
              </p>
            </a>
          </li> 
          {{-- Hero end --}}

          {{-- Contact start --}}
          <li class="nav-item">
            <a href="{{ route('admin.contact.all') }}" class="nav-link @isset($contact_active) {{ $contact_active }} @endisset">
              <i class="nav-icon fab fa-facebook-messenger"></i>
              <p>
                Contact &nbsp;
                @if ($unread_contact > 0)
                <span class="badge badge-danger">{{ $unread_contact }}</span>
                @endif
              </p>
            </a>
          </li>
          {{-- Contact end --}}

          {{-- Settings start --}}
          <li class="nav-item">
            <a href="{{ route('admin.setting') }}" class="nav-link @isset($setting_active) {{ $setting_active }} @endisset">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Settings
              </p>
            </a>
          </li> 
          {{-- Settings end --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>