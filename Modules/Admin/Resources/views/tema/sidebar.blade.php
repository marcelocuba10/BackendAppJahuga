
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="/tema/img/profile_small.jpg"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">@if (Auth::check()) {{ Auth::user()->username }} @endif</span>
                        <span class="text-muted text-xs block">                            
                            @if (Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->getRoleNames()[0] }}
                            @endif<b class="caret"></b></span>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="{{ route('users.show.profile', Auth::user()->id) }}">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Contacts</a></li>
                            <li><a class="dropdown-item" href="#">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/admin/logout/">Logout</a></li>
                        </ul>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="#">
                <a href="/admin/dashboard"><i class="fa fa-line-chart" aria-hidden="true"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            @can('user-list')
            <li class="#">
                <a href="{{ route('partners.index') }}"><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">Customers</span></a>
            </li>
            @endcan
            <li class="#">
                <a href="#"><i class="fa fa-clone" aria-hidden="true"></i> <span class="nav-label">Extracts</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> <span class="nav-label">Quotas</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> <span class="nav-label">Deposits</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i> <span class="nav-label">withdrawals</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-university" aria-hidden="true"></i> <span class="nav-label">Transferences</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-sitemap" aria-hidden="true"></i> <span class="nav-label">Franchises</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-money" aria-hidden="true"></i> <span class="nav-label">Expenses</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> <span class="nav-label">Offer Book</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span class="nav-label">My Affiliates</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i> <span class="nav-label">Work Us</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="nav-label">Reports</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> <span class="nav-label">FAQ</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-life-ring" aria-hidden="true"></i> <span class="nav-label">Support</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i> <span class="nav-label">Usage Policy</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-file" aria-hidden="true"></i> <span class="nav-label">Contract</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> <span class="nav-label">Translations</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @can('super_user-list')
                    <li class="#">
                        <a href="{{ route('users.index') }}"><span class="nav-label">Users</span></a>
                    </li>
                    @endcan
                    @can('role-list')
                    <li>
                        <a href="#"><span class="nav-label">ACL</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            @can('role-list')
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            @endcan
                            @can('permission-list')
                            <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    <li><a href="#">General Settings</a></li>
                    <li><a href="{{ route('users.show.profile', Auth::user()->id) }}">My Profile</a></li>
                </ul>
            </li>
            <li>
                @auth
                    <a href="/admin/logout/"><i class="fa fa-sign-out"></i> Logout</a>
                @endauth
            </li>
        </ul>

    </div>
</nav>
 