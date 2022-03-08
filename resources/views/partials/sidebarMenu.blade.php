<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-45">
            {{-- <i class="fas text-fmf fa-laugh-wink"></i> --}}
            <img src="{{asset('img/svg/brand/favicon.svg')}}" width="40" alt="AfrDash">
        </div>
        <div class="sidebar-brand-text mx-3">AfrDash</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-activity">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
            </svg>
            {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Posts -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true"
            aria-controls="collapsePost">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Posts</span></a>
        <div id="collapsePost" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('posts.index')}}">All Posts</a>
                @canany(['isEditor', 'isManager', 'isAdmin'])
                <a class="collapse-item" href="{{route('posts.create')}}">Create New Post</a>
                @endcanany
                <a class="collapse-item" href="{{route('categories.index')}}">Categories</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
            aria-controls="collapsePage">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Pages</span></a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('posts.index')}}">All Pages</a>
                <a class="collapse-item" href="{{route('posts.create')}}">Create New Page</a>
            </div>
        </div>
    </li>

        <!-- Nav Item - Media -->
        <li class="nav-item">

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCase" aria-expanded="true"
                aria-controls="collapseCase">
                <i class="fas fa-fw fa-images"></i>
                <span>Client case studies</span></a>
            <div id="collapseCase" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Select what you want :</h6>
                    <a class="collapse-item" href="{{route('clients.index')}}">All Cases</a>
                    <a class="collapse-item" href="{{route('clients.create')}}">Create new case</a>
    
                </div>
            </div>
        </li>

    <!-- Nav Item - Comments -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComment"
            aria-expanded="true" aria-controls="collapseComment">
            <i class="fas fa-fw fa-comments"></i>
            <span>Comments</span></a>
        <div id="collapseComment" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('posts.index')}}">All Comments</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Media -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMedia" aria-expanded="true"
            aria-controls="collapseMedia">
            <i class="fas fa-fw fa-images"></i>
            <span>Media</span></a>
        <div id="collapseMedia" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('posts.index')}}">All Media</a>
                <a class="collapse-item" href="{{route('posts.index')}}">Images</a>
                <a class="collapse-item" href="{{route('posts.index')}}">Files</a>

            </div>
        </div>
    </li>

        <!-- Nav Item - Mail -->
        <li class="nav-item">

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMail" aria-expanded="true"
                aria-controls="collapseMail">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Mail</span></a>
            <div id="collapseMail" class="collapse" aria-labelledby="headingMail" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Select what you want :</h6>
                    <a class="collapse-item" href="{{route('emails.index')}}">All Mails</a>   
                </div>
            </div>
        </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    @canany(['isManager', 'isAdmin', 'isEditor'])
    <!-- Heading -->
    <div class="sidebar-heading">
        Services
    </div>

    <!-- Nav Item - Legal-->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLegal"
            aria-expanded="true" aria-controls="collapseLegal">
            <i class="fas fa-fw fa-balance-scale"></i>
            <span>Legal</span></a>
        <div id="collapseLegal" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select legal option :</h6>
                <a class="collapse-item" href="{{route('legal')}}">Privacy Policy</a>
                <a class="collapse-item" href="{{route('legal')}}">Cookie Policy</a>
                <a class="collapse-item" href="{{route('legal')}}">White Label Terms</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    @endcanany
    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    @canany(['isAdmin', 'isManager'])
    <!-- Nav Item - Users -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
            aria-controls="collapseUser">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span></a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('users.index')}}">All Users</a>
                <a class="collapse-item" href="{{route('users.create')}}">Create New User</a>
                @can('isAdmin')
                <a class="collapse-item" href="{{route('roles.index')}}">User Roles</a>
                @endcan
            </div>
        </div>
    </li>
    @endcanany

    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
            aria-expanded="true" aria-controls="collapseAccount">
            <i class="fas fa-cogs fa-fw"></i>
            <span>Account</span></a>
        <div id="collapseAccount" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('account.index')}}">Profile</a>
                <a class="collapse-item" href="{{route('security.index')}}">Security</a>
                <a class="collapse-item" href="{{route('notifications.index')}}">Notifications</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" aria-label="Toggle Side bar" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->