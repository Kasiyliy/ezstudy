<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EZStudy</title>
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/iconfonts/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/shared/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo_1/style.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}"/>
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

    @yield('styles')
</head>
<body>
<div class="container-scroller">
    @include('admin.parts.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.parts.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield("content")
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('admin/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('admin/assets/js/shared/off-canvas.js')}}"></script>
<script src="{{asset('admin/assets/js/demo_1/dashboard.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    toastr.options.closeButton = true;
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif

    @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{Session::get('error')}}");
    @endif

    @if(Session::has('warning'))
    toastr.info("{{Session::get('warning')}}");
    @endif

</script>

@yield('scripts')
</body>
</html>