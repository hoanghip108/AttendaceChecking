<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        J2Project
        @if(isset($title))
            | {{ $title }}
        @endif
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app-creative.min.css') }}" rel="stylesheet" type="text/css">
    @stack('css')
</head>

<body class=""
      data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: true}"
      data-leftbar-theme="dark">
<!-- Begin page -->
<div class="wrapper mm-active">
    <!-- ========== Left Sidebar Start ========== -->
    @include('layout.sidebar')
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @include('layout.header')
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title-box">
                            @if(isset($title))
                                <h4 class="page-title">{{ $title }}</h4>
                            @endif
                        </div>
                        @if ($errors->any())
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <ul>{{ $error }}</ul>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="col-xs-12">
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- content -->

        <!-- Footer Start -->
        @include('layout.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- bundle -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('js')

</body>
</html>