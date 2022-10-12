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
            <a class="nav-link {{ request()->is('admin/index') ? 'customActive' : '' }} color_black"
                href="{{url('/admin/index')}}" style="text-decoration: none;">
                <i class="bi bi-grid" style="color: #95a5c3;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/candidate-details/details') ? 'customActive' : '' }}"
                href="{{url('/admin/candidate-details/details')}}">
                <i class="bi bi-people-fill" style="color: #95a5c3;"></i>
                <span>Candidate List</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/electorial-post-details/*') ? 'customActive' : '' }}"
                href="{{url('/admin/electorial-post-details/details')}}">
                <i class="bi bi-file-plus-fill" style="color: #95a5c3;"></i>
                <span>Electorial Post Details</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link collapsed {{ request()->is('admin/candidate-details/add-candidate/*') ? 'customActive' : '' }}"
                data-bs-target="#top-nav-activity" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person-check-fill"></i><span>Candidate Details</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="top-nav-activity" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{url('/admin/candidate-details/add-candidate/add')}}" class="">
                        <i class="bi bi-circle"></i><span>Assign Candidate</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/admin/candidate-details/add-candidate/details')}}" class="">
                        <i class="bi bi-circle"></i><span>Add Candidate Details</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/vote-count') ? 'customActive' : '' }}"
                href="{{url('/admin/vote-count')}}">
                <i class="bi bi-people-fill" style="color: #95a5c3;"></i>
                <span>Vote Counts</span>
            </a>
        </li>
    </ul>
</aside>
