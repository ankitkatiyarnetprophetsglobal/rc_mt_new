<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" id="csrf_front" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('public/front/assets/themes/images/favicon.png')}}">
    <title>RC Monitoring</title>
    <link rel="stylesheet" href="{{asset('public/front/themes/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/themes/css/gijgo.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/themes/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/themes/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/themes/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/plugin/jquery-ui.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!--
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <style>


        html body {
            background: #F6F9FF
        }
    </style>
    <script>
        var baseurl = "{{url('/')}}";
    </script>
    @yield('page_specific_css')
</head>
