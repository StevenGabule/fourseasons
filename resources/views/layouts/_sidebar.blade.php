<!-- Sidebar -->
<ul class="sidebar navbar-nav shadow toggled" style="padding-top: 1%;">

    <li class="nav-item {{ Route::current()->getName() == 'home' ? 'active' : ''}}">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-dice-d6"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ Route::current()->getName() == 'booking.index' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('booking.index') }}">
            <i class="far fa-fw fa-heart"></i>
            <span>Bookings</span></a>
    </li>

    <li class="nav-item {{ Route::current()->getName() == 'customers.index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('customers.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Customers</span>
        </a>
    </li>

    <li class="nav-item {{ Route::current()->getName() == 'calendar.index' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('calendar.index') }}">
            <i class="far fa-fw fa-calendar-alt"></i>
            <span>Calenders</span></a>
    </li>

    <li class="nav-item {{ Route::current()->getName() }}">
        <a class="nav-link" href="">
            <i class="far fa-fw fa-envelope"></i>
            <span>Messages</span></a>
    </li>

</ul><!-- end of sidebar -->
