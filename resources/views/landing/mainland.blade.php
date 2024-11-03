<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('template/./assetsland/img/kit/pro/apple-icon.png') }}">
    <link rel="icon" href="{{ asset('template/./assetsland/img/kit/pro/favicon.png') }}">
    <title>
        Toko Barokah
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('template/./assetsland/css/material-kit.css?v=2.0.2') }}">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('template/./assetsland/assets-for-demo/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/./assetsland/assets-for-demo/vertical-nav.css') }}" rel="stylesheet" />
</head>

<body class="index-page ">
    @include('landing.navbar')
    <div class="page-header header-filter clear-filter" data-parallax="true"
        style="background-image: url('{{ asset('template/assetsland/img/kit/pro/bgbarokah2.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand">
                        <h1>Toko Barokah
                            <span class="pro-badge">
                                Pekantingan
                            </span>
                        </h1>
                        <h3 class="title">Menjual Berbagai Macam Perlengkapan Anak</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="section section-basic">
            @yield('content')
            @include('landing.footer')
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('template/./assetsland/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('template/./assetsland/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('template/./assetsland/js/bootstrap-material-design.js') }}"></script>
    <!--  Google Maps Plugin  -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="{{ asset('template/./assetsland/js/plugins/moment.min.js') }}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('template/./assetsland/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('template/./assetsland/js/plugins/nouislider.min.js') }}"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{ asset('template/./assetsland/js/plugins/bootstrap-selectpicker.js') }}"></script>
    <!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
    <script src="{{ asset('template/./assetsland/js/plugins/bootstrap-tagsinput.js') }}"></script>
    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('template/./assetsland/js/plugins/jasny-bootstrap.min.js') }}"></script>
    <!--	Plugin for Small Gallery in Product Page -->
    <script src="{{ asset('template/./assetsland/js/plugins/jquery.flexisel.js') }}"></script>
    <!-- Plugins for presentation and navigation  -->
    <script src="{{ asset('template/./assetsland/assets-for-demo/js/modernizr.js') }}"></script>
    <script src="{{ asset('template/./assetsland/assets-for-demo/js/vertical-nav.js') }}"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="{{ asset('template/./assetsland/js/material-kit.js?v=2.0.2') }}')}}"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="{{ asset('template/./assetsland/assets-for-demo/js/material-kit-demo.js') }}"></script>
    <script>
        $(document).ready(function() {

            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();
        });
    </script>
</body>

</html>
