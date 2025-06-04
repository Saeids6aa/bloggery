{{-- تأكّد إنك مَرّرت المتغيّرات $about و $setting من الكونترولر للفيو --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('back_end/dist/img/logo-color_rides.png') }}" alt="dashboard Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Bloger_Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/admin/admin_image/' . auth('admin')->user()->admin_image) }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile', auth('admin')->user()->id) }}"
                    class="d-block">{{ auth('admin')->user()->admin_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (auth('admin')->user()->role == 'super_admin')
                    <li class="nav-item has-treeview menu-open">

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admins') }}"
                                    class="nav-link {{ request()->routeIs('admins') ? 'active' : '' }}">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Admins</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categories') }}"
                                    class="nav-link {{ request()->routeIs('categories') ? 'active' : '' }}">
                                    <i class="fas fa-th-large nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tags') }}"
                                    class="nav-link {{ request()->routeIs('tags') ? 'active' : '' }}">
                                    <i class="fas fa-tags nav-icon"></i>
                                    <p>Tags</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users') }}"
                                    class="nav-link {{ request()->routeIs('users') ? 'active' : '' }}">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('posts') }}"
                                    class="nav-link {{ request()->routeIs('posts') ? 'active' : '' }}">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>Posts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('about.edit', $about->id) }}"
                                    class="nav-link {{ request()->routeIs('about.edit') ? 'active' : '' }}">
                                    <i class="fas fa-info-circle nav-icon"></i>
                                    <p>About</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('setting.edit', $setting->id) }}"
                                    class="nav-link {{ request()->routeIs('setting.edit') ? 'active' : '' }}">
                                    <i class="fas fa-cog nav-icon"></i>
                                    <p>Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contacts') }}"
                                    class="nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}">
                                    <i class="fas fa-heart nav-icon"></i>
                                    <p>Contacts</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(auth('admin')->user()->role == 'admin')
                    <li class="nav-item has-treeview menu-open">

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('categories') }}"
                                    class="nav-link {{ request()->routeIs('categories') ? 'active' : '' }}">
                                    <i class="fas fa-th-large nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tags') }}"
                                    class="nav-link {{ request()->routeIs('tags') ? 'active' : '' }}">
                                    <i class="fas fa-tags nav-icon"></i>
                                    <p>Tags</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users') }}"
                                    class="nav-link {{ request()->routeIs('users') ? 'active' : '' }}">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('posts') }}"
                                    class="nav-link {{ request()->routeIs('posts') ? 'active' : '' }}">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>Posts</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contacts') }}"
                                    class="nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}">
                                    <i class="fas fa-heart nav-icon"></i>
                                    <p>Contacts</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(auth('admin')->user()->role == 'editor')
                    <li class="nav-item">
                        <a href="{{ route('posts') }}"
                            class="nav-link {{ request()->routeIs('posts') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>Posts</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
