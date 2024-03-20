<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Users Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('./Users/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('./Users/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('./Users/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('./Users/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('./Users/css/style.css')}}" rel="stylesheet">



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
        <a href="/dashboard" class="brand-logo">
            <img class="logo-abbr" src="{{asset('./Users/images/logo.png')}}" alt="">
            <img class="logo-compact" src="{{asset('./Users/images/logo-text.png')}}" alt="">

            <p class="brand-title">Farm Users</p>
        </a>

        <div class="nav-control">
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                            <div class="dropdown-menu p-0 m-0">
                                <form>
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">

                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-account"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="/profile" class="dropdown-item">
                                    <i class="icon-user"></i>
                                    <span class="ml-2">Profile </span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Logout</span>
                                </a>

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--********************************* -->
    @include('Users.sidebar')

    <!--**********************************
        Content body start
        ====== -->
   @yield('content')

    <!--**********************************
        Footer start
    ***********************************-->

    <!--**********************************
        Footer end
    ***********************************-->

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
<script src="{{asset('./Users/vendor/global/global.min.js')}}"></script>
<script src="{{asset('./Users/js/quixnav-init.js')}}"></script>
<script src="{{asset('./Users/js/custom.min.js')}}"></script>


<!-- Vectormap -->
<script src="{{asset('./Users/vendor/raphael/raphael.min.js')}}"></script>
<script src="{{asset('./Users/vendor/morris/morris.min.js')}}"></script>


<script src="{{asset('./Users/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('./Users/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<script src="{{asset('./Users/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

<!--  flot-chart js -->
<script src="{{asset('./Users/vendor/flot/jquery.flot.js')}}"></script>
<script src="{{asset('./Users/vendor/flot/jquery.flot.resize.js')}}"></script>

<!-- Owl Carousel -->
<script src="{{asset('./Users/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<!-- Counter Up -->
<script src="{{asset('./Users/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
<script src="{{asset('./Users/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('./Users/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>


<script src="{{asset('./Users/js/dashboard/dashboard-1.js')}}"></script>

</body>

</html>
