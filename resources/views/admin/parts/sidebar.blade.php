<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{asset('admin/assets/images/faces/face8.jpg')}}"
                         alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Меню</li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <span>Басқару тақтасы</span>
            </a>
        </li>

        @if(Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.index')}}">
                    <span>Қолданушылар</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('courses.index')}}">
                    <span>Курстар</span>
                </a>
            </li>
        @endif
    </ul>
</nav>