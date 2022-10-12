<style>
    a:active {
        color: white;
    }

    .nav-link {
        color: black;
    }

    .sidebar-nav .nav-link {
        color: black;
    }

    .customActive,
    .customActive i {
        background-color: #0d6efd !important;
        color: white !important;
    }

</style>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'customActive' : '' }} color_black"
                href="" style="text-decoration: none;">
                <i class="bi bi-grid" style="color: #95a5c3;"></i>
                <span>Dashboard</span>
            </a>
        </li>       
    </ul>
</aside>
