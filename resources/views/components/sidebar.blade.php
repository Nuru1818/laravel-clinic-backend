<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Klinik Pratama Antam</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Main Menu</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('users.index') }}"><i class="far fa-user"></i> <span>Users</span></a>
            </li>
            <li class="{{ Request::is('doctors') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('doctors.index') }}"><i class="fas fa-user-md"></i> <span>Doctors</span></a>
            </li>


    </aside>
</div>
