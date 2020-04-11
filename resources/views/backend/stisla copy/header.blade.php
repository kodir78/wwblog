<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>   
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
           <?php $currentUser = Auth::user() ?>
            @if($currentUser->image)
            <img src="{{asset($$currentUser->image)}}" width="70px"/>
            @else
            <img alt="image" src="{{ asset('public/assets/stisla/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture" width="70px">
            @endif
            {{-- <img alt="image" src="{{ asset('public/assets/stisla/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1"> --}}
            @if($currentUser)
            <div class="d-sm-none d-lg-inline-block">Hi, {{$currentUser->name}}</div></a>
            @endif
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="#" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{route("logout")}}" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger" style="cursor:pointer"><i class="fas fa-sign-out-alt"></i> <strong>Logout</strong></button>
                </form>
            </div>
        </li>
    </ul>
</nav>