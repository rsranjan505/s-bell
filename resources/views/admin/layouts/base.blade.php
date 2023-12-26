<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sortie Services') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}

    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/js/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/vertical-layout-light/style.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/> --}}
    <link  rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/anira.css')}}"/>

	<link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


</head>

<body>
    <div class="container-scroller">
        {{-- header --}}
        @include('admin.components.toast')

        @auth
            @include('admin.components.header')
            {{-- sidemenu --}}
            <div class="container-fluid page-body-wrapper">
                @include('admin.components.sidemenu')

                @yield('content')

            </div>
            @include('admin.components.footer')
        @else

            @yield('content')

        @endauth

        @include('admin.components.modalImage')

    </div>
    {{-- <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script> --}}
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>

	<script src="{{ asset('admin/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('admin/assets/js/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('admin/assets/js/template.js')}}"></script>
    <script src="{{ asset('admin/assets/js/settings.js')}}"></script>
    {{-- <script src="{{ asset('admin/assets/js/Chart.roundedBarCharts.js')}}"></script> --}}
    <script src="{{ asset('admin/assets/js/tabs.js')}}"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/assets/js/dashboard.js')}}"></script>
    {{-- <script src="{{ asset('admin/assets/js/sortie.js')}}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('scripts')
    {{-- {!! Toastr::message() !!} --}}

</body>

</html>
