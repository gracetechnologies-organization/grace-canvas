<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

{{-- Vanilla JavaScript - Static scripts --}}
<script>
    const changeLanguage = (selectElement) => {
        var url = "/change";
        var selectedValue = selectElement.value;
        window.location.href = url + "?lang=" + selectedValue;
    }
</script>

{{-- Vanilla JavaScript - Dynamic scripts --}}
@php
    $EditingRoutes = ['edit/resume/{ID}', 'edit/saved/resume/{ID}'];
@endphp
@if (in_array(Route::current()->uri, $EditingRoutes))
    @include('javascript_files.resume-form')
@endif

@php
    $UserDashboardRoutes = ['user/dashboard/home', 'user/dashboard/settings', 'user/dashboard/subcribtion', 'user/dashboard/templates'];
@endphp
@if (in_array(Route::current()->uri, $UserDashboardRoutes))
    @include('javascript_files.user-dahsboard-scripts')
@endif

@if (Route::current()->uri == '/payment/subscription/{ID?}')
@include('javascript_files.subscription-form')
@endif

{{-- JQuery - Link --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>

{{-- JQuery - Static scripts --}}
@include('jquery_files.modals-scripts')

{{-- JQuery - Dynamic scripts --}}
@php
    $EditingRoutes = ['edit/resume/{ID}', 'edit/saved/resume/{ID}'];
@endphp
@if (in_array(Route::current()->uri, $EditingRoutes))
    @include('jquery_files.cropper-scripts')
@endif

