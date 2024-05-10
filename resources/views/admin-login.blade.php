<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Eat Clean | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ $path }}/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ $path }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ $path }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ $path }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body class="account-bg">

    <div>
        @yield('content')
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ $path }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ $path }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ $path }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ $path }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ $path }}/assets/libs/node-waves/waves.min.js"></script>

    <script src="{{ $path }}/assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            };
            toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            };
            toastr.error("{{ session('error') }}");
        @endif
    </script>
</body>


</html>
