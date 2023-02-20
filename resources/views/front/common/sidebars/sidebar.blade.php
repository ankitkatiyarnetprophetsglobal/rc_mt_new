<aside class="main-menu menu-fixed">
    <div class="navbar-header">
        <a href="#" class="l_left_logo">
            <img src="{{asset('public/front/themes/images/logo.svg')}}" alt="" class="img-fluid">
        </a>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation">
            <li class="nav-item active"><a href="{{url('/')}}"><i class="icon-DASHBOARD"></i><span
                        class="menu-title">DASHBOARD</span></a>
            </li>
            @if(Session::get('role_details')->id == 2 || Session::get('role_details')->id == 3)
            <li class="nav-item has-sub">
                <a href="javascript:void(0)" class="link"><i class="icon-MANAGE"></i><span class="menu-title">
                        Master</span></a>
                <ul class="menu-content submenu">
                    <li><a class="menu-item" href="{{route('infrastructure.index')}}"><span class="menu-title">Infra structure</a></span> </li>
                    <li><a class="menu-item" href="{{route('finance.index')}}"><span class="menu-title">Finances</a></span> </li>
                    <li><a class="menu-item" href="{{route('masters.miscmaster.index')}}"><span class="menu-title">Miscellaneous</a></span> </li>
                    <li><a class="menu-item" href="{{route('procurement.index')}}"><span class="menu-title">Procurement</a></span> </li>
                    <li><a class="menu-item" href="{{route('procurement.service.index')}}"><span class="menu-title">Procurement Services</a></span> </li>
                  </ul>
            </li>
            @endif
            {{-- <li class="nav-item has-sub">
                <a href="#" class="link">
                    <i class="icon-MANAGE"></i><span class="menu-title">Manage</span>
                </a>
                <ul class="menu-content submenu">
                    <li><a class="menu-item" href="{{route('manage.infrastructure.index')}}"><span class="menu-title">Manage Infra structure</span></a> </li>
                    <li><a class="menu-item" href="{{route('managefinance.index')}}"><span class="menu-title">Manage Finances</span></a> </li>
                    <li><a class="menu-item" href="#"><span class="menu-title">Manage Procurement</span></a> </li>
                    <li><a class="menu-item" href="#"><span class="menu-title">Manage Miscellaneous</span></a> </li>
                  </ul>
            </li> --}}
            <li class="nav-item"><a href="{{route('temp.manage.index')}}"><i class="icon-MONTHLY-MONITORING"></i><span
                        class="menu-title">Monthly Monitoring</span></a>
            </li>
            <li class="nav-item"><a href="javascript:void(0)"><i class="icon-TENDER"></i><span
                        class="menu-title">TENDER</span></a>
            </li>
 @if(Session::get('role_details')->name == 'NCOE' || Session::get('role_details')->name == 'RC') 
            <li class="nav-item"><a href="{{url('review/index')}}"><i class="icon-TENDER"></i><span
                class="menu-title">Review</span></a>
            </li>
             @endif 

            @if(Session::get('role_details')->name == 'OPS') 
                        <li class="nav-item"><a href="{{url('review/download_excel')}}"><i class="icon-TENDER"></i><span
                            class="menu-title">NCOE Review Excel Download </span></a>
                        </li>
            @endif 
             

            <!-- <li class="nav-item has-sub">
      <a href="#" class="link"><i class="fa fa-question-circle-o"></i><span class="menu-title">Lorem
          Ipsum</span></a>
      <ul class="menu-content submenu">
        <li><a class="menu-item" href="registration.html">Lorem Ipsum</a> </li>
        <li><a class="menu-item" href="#">Lorem Ipsum</a> </li>
      </ul>
    </li>
    <li class="nav-item has-sub">
      <a href="#" class="link"><i class="fa fa-question-circle-o"></i><span class="menu-title">Lorem
          Ipsum</span></a>
      <ul class="menu-content submenu">
        <li><a class="menu-item" href="#">Lorem Ipsum</a> </li>
        <li><a class="menu-item" href="#">Lorem Ipsum</a> </li>
      </ul>
    </li> -->
        </ul>
    </div>
</aside>
