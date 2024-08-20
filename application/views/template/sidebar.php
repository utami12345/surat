<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('surat/index');?>" class="brand-link">
        <img src="<?=base_url('assets');?>/vendor/AdminLTE/dist/img/logosurat.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Data Surat</span>
    </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?=base_url('surat/dashboard');?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <!-- Transaksi Surat Menu Item -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                        Transaksi Surat
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?=base_url('surat/suratm_index');?>" class="nav-link">
                            <i class="fas fa-folder nav-icon"></i>
                            <p>Data Surat Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url('surat/index');?>" class="nav-link">
                            <i class="fas fa-folder nav-icon"></i>
                            <p>Data Surat Keluar</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="<?=base_url('auth/logout');?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</aside>

<style>
    .main-sidebar {
        background-color: #4f4f9d; 
    }

    .nav-link {
        color: #ffffff;
    }

    .nav-link:hover {
        background-color: #3a3a7d; 
        color: #ffffff; 
    }

    .nav-link.active {
        background-color: #ffffff; 
        color: #4f4f9d; 
    }

    .nav-icon {
        color: #ffffff; 
    }

    .nav-treeview > .nav-item > .nav-link {
        padding-left: 30px; 
    }
</style>