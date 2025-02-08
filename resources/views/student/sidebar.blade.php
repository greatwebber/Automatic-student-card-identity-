<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('student.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Student Panel</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <a href="{{ route('student.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.payments') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Pay School Fees</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>Update Bio Data</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.id-card') }}" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Update ID Card</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
