<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ set_active(['home']) }}"> <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                <li class="submenu">
                    <a href="#">
                        <i class="fa fa-user-plus"></i> 
                        <span> User Management </span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="submenu_class" style="display: none;">
                        <li><a class="{{ set_active(['users']) }}" href="{{ route('users.index') }}">All User</a></li>
                        <li><a class="{{ set_active(['users/create']) }}" href="{{ route('users.create') }}">Add User</a></li>
                    </ul>
                </li>
                <li> <a href="{{ route('rooms.index') }}">
                    <i class="fas fa-hotel"></i>
                    <span>Rooms</span></a> 
                </li>
                <li> <a href="{{route('bookings.index')}}">
                    <i class="fas fa-door-open"></i>
                    <span>Bookings</span></a> 
                </li>
                <li> <a href="{{route('barcodes.index')}}">
                    <i class="fas fa-qrcode"></i>
                    <span>BarCode</span></a> 
                </li>
                <li> <a href="">
                    <i class="fas fa-image"></i>
                    <span>Media Gallery</span></a> 
                </li>
            </ul>
        </div>
    </div>
</div>