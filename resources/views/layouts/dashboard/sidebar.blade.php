<div class="iq-sidebar">

    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{ route('landing') }}">
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
                <li class="{{ Request::is('sensor') ? 'active' : '' }}"><a href="{{ route('sensor.index') }}" class="iq-waves-effect" data-title="Sensor Monitoring"><i class="ri-list-check"></i><span>Sensor Monitoring</span></a></li>
                <li class="{{ Request::is('led*') ? 'active' : '' }}"><a href="{{ route('led.index') }}" class="iq-waves-effect" data-title="Led Control"><i class="ri-lightbulb-line"></i><span>Led Control</span></a></li>
                <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ route('user') }}" class="iq-waves-effect" data-title="User"><i class="ri-user-line"></i><span>User</span></a></li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
