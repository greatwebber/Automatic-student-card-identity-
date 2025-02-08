<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboardsss</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faculties.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Faculties</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('departments.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Departments</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('students.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Students</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
