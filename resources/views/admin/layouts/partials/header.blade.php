<section class = "header-section admin-banner-section">
    <div class = "container header-container">
        <a href = "/" class = "logo-wrapper">
            <img src="{{ asset('images/logo-white.png') }}" alt="Logo">
        </a>
        @if ($userType == 'admin')
            <div class="menu-wrapper admin-menu-wrapper">
                <a href="/admin/dashboard" class="menu-item" id="menu-about">Dashboard</a>
                <a href="/admin/mentor-request" class="menu-item" id="menu-courses">Mentor Requests</a>
                <a href="/admin/mentors" class="menu-item" id="menu-mentor">Users</a>
                <a href="/admin/courses" class="menu-item" id="menu-contact">Course Types</a>
                <a href="/admin/business" class="menu-item" id="menu-contact">Business</a>
            </div>
        @endif

        @if ($userType == 'mentor')
            @if ($mentorStatus == 'active')
                <div class="menu-wrapper admin-menu-wrapper">
                    <a href="/mentor/dashboard" class="menu-item" id="menu-about">Dashboard</a>
                    <a href="/mentor/mentor-courses" class="menu-item" id="menu-courses">My Courses</a>
                    <a href="/mentor/mentor-orders" class="menu-item" id="menu-mentor">My Orders</a>
                    <a href="/mentor/mentor-wallet" class="menu-item" id="menu-contact">Earnings</a>
                </div>
            @else
                <div class="menu-wrapper admin-menu-wrapper">
                    
                </div>
            @endif
        @endif

        @if ($userType == 'student')
        <div class="menu-wrapper admin-menu-wrapper">
            <a href="/student/dashboard" class="menu-item" id="menu-about">Dashboard</a>
            <a href="/student/courses" class="menu-item" id="menu-courses">All Courses</a>
            <a href="/student/purchased-courses" class="menu-item" id="menu-mentor">My Courses</a>
            <a href="/student/student-wallet" class="menu-item" id="menu-contact">My Wallet</a>
        </div>
        @endif


        <div class = "menu-wrapper admin-menu-wrapper">
            <a href="{{ route('logout') }}" class="menu-item-btn" id="menu-signup"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Log out
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

        </div>
    </div>
</section>
