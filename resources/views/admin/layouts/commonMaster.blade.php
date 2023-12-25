<!DOCTYPE html>

<html class="light-style layout-menu-fixed">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') | Sortie Services </title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}" />

  <!-- Include Styles -->
  @include('admin.layouts.sections.styles')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Include Scripts for customizer, helper, analytics, config -->
  @include('admin.layouts.sections.scriptsIncludes')
</head>

<body>
    @include('admin.components.toast')
    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->

    <!-- Include Scripts -->
    @include('admin.layouts.sections.scripts')

</body>

</html>
