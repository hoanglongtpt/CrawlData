<!DOCTYPE html>
<html lang="en" data-layout="topnav">

<head>
    <meta charset="utf-8" />
    <title>Đăng Nhập | Lawer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.ico')}}">
    <script src="{{ asset('admin-assets/js/hyper-config.js')}}"></script>
    <link href="{{ asset('admin-assets/css/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('admin-assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
    <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
        <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
            <g fill-opacity='0.22'>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
            </g>
        </svg>
    </div>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        @yield('content')
    </div>
    <footer class="footer footer-alt">
        2018 -
        <script>
            document.write(new Date().getFullYear())
        </script> © Lawer - TPT
    </footer>
    <script src="{{ asset('admin-assets/js/vendor.min.js')}}"></script>
    <script src="{{ asset('admin-assets/js/app.min.js')}}"></script>
</body>
</html>
