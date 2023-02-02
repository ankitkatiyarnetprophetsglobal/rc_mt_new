<!DOCTYPE html>
<html lang="en">
@include('front.common.headers.header')

<body class="fixed-navbar">
    <!-- Header -->
    @include('front.common.navbars.navbar')
    <!-- Side Menu -->
    @include('front.common.sidebars.sidebar')
    <!-- Main Content -->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">

                @yield('content')

            </div>
        </div>
    </div>
    <!--close main-content-->


    <div class="overlay"></div>

    @include('front.common.footers.footer')

</body>

</html>
