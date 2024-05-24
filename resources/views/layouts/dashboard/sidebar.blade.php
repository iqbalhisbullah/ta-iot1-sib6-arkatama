<div class="iq-sidebar">
    <style>
        .iq-sidebar {
            width: 270px;
        }
    </style>

    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ route('home') }}">
            <img src="images/qbal.png" class="img-fluid" alt="">
            <span>Qbaltech</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li><a href="{{ route('dashboard') }}" class="iq-waves-effect" data-title="Dashboard"><i class="ri-home-4-line"></i><span>Dashboard</span></a></li>
                <li><a href="{{ route('sensor') }}" class="iq-waves-effect" data-title="Sensor"><i class="ri-list-check"></i><span>Sensor</span></a></li>
                <li><a href="{{ route('led') }}" class="iq-waves-effect" data-title="Led Control"><i class="ri-lightbulb-line"></i><span>Led Control</span></a></li>
                <li><a href="{{ route('user') }}" class="iq-waves-effect" data-title="User"><i class="ri-user-line"></i><span>User</span></a></li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
