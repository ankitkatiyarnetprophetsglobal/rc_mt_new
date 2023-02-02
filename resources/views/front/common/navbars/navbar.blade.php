<nav class="header-navbar navbar-expand-md navbar fixed-top">
    <div class="navbar-wrapper content px-3">
        <div class="text-center mr-2 ml-2"> <a class="nav-link nav-menu-main menu-toggle"><i class="fa fa-bars"
                    aria-hidden="true"></i></a>
        </div>
        <div class="logo-wrap">

            <!-- User Dropdown -->
            <ul class="user-menu">

                <!-- <div class="header-search">
                    <i class="fa fa-search"></i>
                    <input class="input-search" type="search" name="" placeholder="Search Athlete, Coaches etc..">
                </div> -->

                <li><a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="dropdown dropdown-user nav-item"> <a class="dropdown-toggle nav-link" href="#"
                         data-bs-toggle="dropdown"><span><i class="fa-regular fa-user"></i>
                        </span></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="arrow_box_right"> <a class="dropdown-item" href="#"> {{Session::get('user')->name ?? ''}}<br>
                                <small>{{Session::get('user')->user_name ?? '' }}</small> </a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item"
                                href="chat-application.html"> Change password</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="{{route('logout')}}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Logout</a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>