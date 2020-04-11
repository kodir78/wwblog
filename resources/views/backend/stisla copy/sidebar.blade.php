<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">Web Blog</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">Blog</a>
        </div>
        <ul class="sidebar-menu">
            <li><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li><a target="_blank" class="nav-link" href="{{ route('blog') }}"><i class="fas fa-fire"></i> <span>View Site</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-book-open"></i><span>Blogs</span></a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="{{ route('backend.blogs.index') }}">All Post</a></li> --}}
                    {{-- <li><a class="nav-link" href="{{route('backend.blogs.create')}}">Add Post</a></li> --}}
                    <li><a class="nav-link" href="{{route('posts.index')}}">All Post</a></li>
                    <li><a class="nav-link" href="{{route('posts.create')}}">Add Post</a></li>
                    <li><a class="nav-link" href="{{route('posts.trash')}}">Trash Post</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('categories.index')}}">All Catagory</a></li>
                    <li><a class="nav-link" href="{{route('categories.create')}}">Add Catagory</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Tags</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('tags.index')}}">All Tags</a></li>
                    <li><a class="nav-link" href="{{route('tags.create')}}">Add Tags</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Sliders</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('sliders.index')}}">All Sliders</a></li>
                    <li><a class="nav-link" href="{{route('sliders.create')}}">Add Sliders</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Manage Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('users.index')}}">All Users</a></li>
                    <li><a class="nav-link" href="{{route('users.create')}}">Add User</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Manage Pegawai</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('pegawai.index')}}">All Users</a></li>
                    {{-- <li><a class="nav-link" href="{{route('pegawai.create')}}">Add User</a></li> --}}
                </ul>
            </li>
        </aside>
    </div>
    
   
    