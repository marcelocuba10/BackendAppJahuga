
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="/tema/img/profile_small.jpg"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">@if(Auth::check()) {{Auth::user()->username}} @endif</span>
                        <span class="text-muted text-xs block">ID user: 0015<b class="caret"></b></span>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="{{ route('users_.show.profile', Auth::user()->id) }}">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Contacts</a></li>
                            <li><a class="dropdown-item" href="#">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/user/logout/">Logout</a></li>
                        </ul>
                    </a>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="#">
                <a href="/user/dashboard"><i class="fa fa-line-chart" aria-hidden="true"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-clone" aria-hidden="true"></i> <span class="nav-label">Extracts</span></a>
            </li>
            <li class="#">
                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i> <span class="nav-label">Actions</span></a>
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
                <a href="#"><i class="fa fa-cubes" aria-hidden="true"></i> <span class="nav-label">Our Projects</span></a>
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
                <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> <span class="nav-label">FAQ</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="#">General Settings</a></li>
                    <li><a href="{{ route('users_.show.profile', Auth::user()->id) }}">My Profile</a></li>
                </ul>
            </li>
            <li>
                @auth
                    <a href="/user/logout/"><i class="fa fa-sign-out"></i> Logout</a>
                @endauth
            </li>
        </ul>

    </div>
</nav>
 