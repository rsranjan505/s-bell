<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('admin/assets/vendor/libs/jquery/jquery.js')) }}"></script>

<script src="{{ asset(mix('admin/assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('admin/assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('admin/assets/vendor/js/menu.js')) }}"></script>

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('admin/assets/js/main.js')) }}"></script>

{{-- custom script --}}
<script src="{{ asset('admin/assets/js/anira.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
