<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}admin/images/favicon.png">
    <link rel="stylesheet" href="{{asset('/')}}admin/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="{{asset('/')}}admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}admin/css/style.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('/')}}admin/css//style.css" rel="stylesheet">

    <!-- Favicon icon -->
    <link rel="stylesheet" href="{{asset('/')}}admin/vendor/select2/css/select2.min.css">

    <!-- Summernote -->
    <link href="{{asset('/')}}admin/vendor/summernote/summernote.css" rel="stylesheet">






</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="{{asset('/')}}admin/images/logo.png" alt="">
            <img class="logo-compact" src="{{asset('/')}}admin/images/logo-text.png" alt="">
            <img class="brand-title" src="{{asset('/')}}admin/images/logo-text.png" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->
@include('admin.include.header')

@include('admin.include.left-sidebar')


@yield('body')

@include('admin.include.footer')
    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset('/')}}admin/vendor/global/global.min.js"></script>
<script src="{{asset('/')}}admin/js/quixnav-init.js"></script>
<script src="{{asset('/')}}admin/js/custom.min.js"></script>


<!-- Vectormap -->
<script src="{{asset('/')}}admin/vendor/raphael/raphael.min.js"></script>
<script src="{{asset('/')}}admin/vendor/morris/morris.min.js"></script>


<script src="{{asset('/')}}admin/vendor/circle-progress/circle-progress.min.js"></script>
<script src="{{asset('/')}}admin/vendor/chart.js/Chart.bundle.min.js"></script>

<script src="{{asset('/')}}admin/vendor/gaugeJS/dist/gauge.min.js"></script>

<!--  flot-chart js -->
<script src="{{asset('/')}}admin/vendor/flot/jquery.flot.js"></script>
<script src="{{asset('/')}}admin/vendor/flot/jquery.flot.resize.js"></script>

<!-- Owl Carousel -->
<script src="{{asset('/')}}admin/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<!-- Counter Up -->
<script src="{{asset('/')}}admin/vendor/jqvmap/js/jquery.vmap.min.js"></script>
<script src="{{asset('/')}}admin/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
<script src="{{asset('/')}}admin/vendor/jquery.counterup/jquery.counterup.min.js"></script>


<script src="{{asset('/')}}admin/js/dashboard/dashboard-1.js"></script>
<!-- Required vendors -->
<script src="{{asset('/')}}admin/vendor//global/global.min.js"></script>
<script src="{{asset('/')}}admin/js//quixnav-init.js"></script>
<script src="{{asset('/')}}admin/js//custom.min.js"></script>

<!-- Datatable -->
<script src="{{asset('/')}}admin/vendor//datatables/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}admin/js//plugins-init/datatables.init.js"></script>


<script src="{{asset('/')}}admin/vendor/select2/js/select2.full.min.js"></script>
<script src="{{asset('/')}}admin/js/plugins-init/select2-init.js"></script>

<script src="{{asset('/')}}admin/js/dashboard/dashboard-1.js"></script>
<!-- Summernote -->
<script src="{{asset('/')}}admin/vendor/summernote/js/summernote.min.js"></script>
<!-- Summernote init -->
<script src="{{asset('/')}}admin/js/plugins-init/summernote-init.js"></script>



</body>

</html>
