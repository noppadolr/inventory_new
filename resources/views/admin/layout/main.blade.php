<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventory - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/core/core.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.css')}}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo2/style.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->

    @include('admin.layout.sidebar')
    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->

        @include('admin.layout.header')
        <!-- partial -->




            @yield('main')


        <!-- partial:partials/_footer.html -->

        @include('admin.layout.footer')
        <!-- partial -->

    </div>
</div>

<!-- core:js -->
<script src="{{ asset('admin/assets/vendors/core/core.js') }}"></script>
<!-- endinject -->
<script src="{{ asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Plugin js for this page -->
<script src="{{ asset('admin/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/template.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('admin/assets/js/dashboard-dark.js') }}"></script>
<!-- End custom js for this page -->
<script src="{{ asset('admin/assets/js/sweet-alert.js') }}"></script>
<script src="{{asset('jquery-3.7.0.min.js')}}"></script>
<script src="{{asset('admin/assets/js/validate.min.js')}}"></script>

@stack('scripts')

<script type="text/javascript">
    @if(Session::has('logedin'))
    $(document).ready( function () {
        showSwal('login');
    });
    @endif
</script>





</body>
</html>
