<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('template/./assetsland/img/kit/pro/apple-icon.png') }}">
    <link rel="icon" href="{{ asset('template/assets/img/favicon/1.png') }}">
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

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Animate AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body class="ecommerce ">
    @include('landing.navbar')
    <div class="page-header header-filter header-small" data-parallax="true"
        style="
        background-image: url('{{ asset('template/assetsland/img/kit/pro/examples/bg-7.jpg') }}'); 
        background-position: center 25%;
        background-size: cover;
        background-repeat: no-repeat;
    ">
        <div class="container" id="beranda">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <div class="brand">
                        <h1 class="title animate__animated animate__zoomIn">Toko Barokah</h1>
                        <h4 class="animate__animated animate__zoomIn">Toko Retail yang menjual berbagai
                            <b>Perlengkapan Sekolah Anak</b>
                            <br>
                            Mulai dari tas, baju, sepatu hingga keperluan sekolah lainnya
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised">
        <div class="section">
            @yield('content')
            @include('landing.footer')
        </div>
    </div>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tailwind CSS -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <script>
        $(document).ready(function() {

            //init DateTimePickers
            materialKit.initFormExtendedDatetimepickers();

            // Sliders Init
            materialKit.initSliders();
        });
    </script>
    <script>
        $(document).ready(function() {
            var slider2 = document.getElementById('sliderRefine');

            // Inisialisasi slider
            noUiSlider.create(slider2, {
                start: [10000, 100000], // Nilai awal rentang harga
                connect: true,
                range: {
                    'min': [1000], // Harga minimum
                    'max': [500000] // Harga maksimum
                }
            });

            var limitFieldMin = document.getElementById('price-left');
            var limitFieldMax = document.getElementById('price-right');

            // Fungsi untuk memformat angka ke dalam format Rupiah
            function formatRupiah(value) {
                return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
            }

            // Event listener untuk update slider
            slider2.noUiSlider.on('update', function(values, handle) {
                if (handle) {
                    limitFieldMax.innerHTML = formatRupiah(Math.round(values[handle]));
                } else {
                    limitFieldMin.innerHTML = formatRupiah(Math.round(values[handle]));
                }
            });

            // Event listener untuk perubahan pada slider rentang harga
            slider2.noUiSlider.on('change', function(values) {
                let minPrice = Math.round(values[0]); // Harga minimum
                let maxPrice = Math.round(values[1]); // Harga maksimum

                // Ambil semua kategori yang dipilih
                let selectedCategories = [];
                $('.form-check-input:checked').each(function() {
                    let value = $(this).val();
                    if (value) {
                        selectedCategories.push(value);
                    }
                });

                // Kirim request AJAX ke server
                $.ajax({
                    url: "{{ route('filter.produk') }}", // Ganti dengan route untuk filter produk
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", // Token CSRF Laravel
                        categories: selectedCategories,
                        min_price: minPrice, // Kirim harga minimum
                        max_price: maxPrice // Kirim harga maksimum
                    },
                    success: function(response) {
                        let productRow = $('.col-md-9 .row');
                        productRow.fadeOut(200, function() {
                            productRow.empty();
                            if (response.produk.length === 0) {
                                productRow.append(`
                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">Free Chat</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Verified Users</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Fingerprint</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>
                </div>
            `);
                            } else {
                                response.produk.forEach(item => {
                                    let productCard = `
                    <div class="col-md-3" data-aos="zoom-in">
                        <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                            <div class="card-header card-header-image">
                                <a href="#">
                                    <img src="{{ asset('storage') }}/${item.gambar}" alt="${item.nama_produk}">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title">${item.nama_produk}</h4>
                                </a>
                            </div>
                            <div class="card-footer justify-content-between">
                                <div class="price-container">
                                    <span class="price">Rp ${item.harga_jual.toLocaleString('id-ID')}</span>
                                </div>
                                <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right"
                                    rel="tooltip" title="Remove from wishlist" data-placement="left">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>`;
                                    productRow.append(productCard);
                                });
                            }
                            productRow.fadeIn(200);
                        });
                    },
                    error: function(error) {
                        console.error("Error fetching products:", error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Toggle navbar transparency on scroll
            $(window).on("scroll", function() {
                var scrollDistance = $(window).scrollTop();
                var navbar = $("#sectionsNav");
                var colorOnScroll = parseInt(navbar.attr("color-on-scroll"), 10) || 100;

                if (scrollDistance > colorOnScroll) {
                    navbar.removeClass("navbar-transparent");
                } else {
                    navbar.addClass("navbar-transparent");
                }
            });
        });
        $(document).ready(function() {
            // Select all links with hashes
            $('a[href^="#"]').on('click', function(event) {
                // Prevent default action
                event.preventDefault();

                // Get the target element
                var targetId = $(this).attr('href').substring(1);
                var targetElement = $('#' + targetId);

                // Check if the target element exists
                if (targetElement.length) {
                    // Calculate the top position with an offset for the navbar
                    var targetPosition = targetElement.offset().top - 70;

                    // Smooth scroll to the target position
                    $('html, body').animate({
                        scrollTop: targetPosition
                    }, 800, 'swing'); // 'swing' makes the scroll more natural
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Event listener untuk perubahan pada checkbox kategori
            $('.form-check-input').on('change', function() {
                // Ambil semua kategori yang dipilih
                let selectedCategories = [];
                $('.form-check-input:checked').each(function() {
                    let value = $(this).val();
                    if (value) {
                        selectedCategories.push(value);
                    }
                });

                // Kirim request AJAX ke server
                $.ajax({
                    url: "{{ route('filter.produk') }}", // Ganti dengan route untuk filter produk
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}", // Token CSRF Laravel
                        categories: selectedCategories
                    },
                    success: function(response) {
                        let productRow = $('.col-md-9 .row');
                        productRow.fadeOut(200, function() {
                            productRow.empty();
                            if (response.produk.length === 0) {
                                productRow.append(`
                <div class="col-md-9">
                    {{-- <div class="row"> --}}
                    <div class="row justify-content-center">
                        <!-- Tambahkan kelas justify-content-center -->
                        <div class="col-md-9 text-center" data-aos="zoom-in">
                            <div class="info">
                                <div class="icon icon-info">
                                    <i class="material-icons">recycling</i>
                                </div>
                                <h4 class="title">Mohon Maaf <br> Produk Saat ini belum tersedia</h4>
                            </div>
                        </div>
                    </div>
                </div>
            `);
                            } else {
                                response.produk.forEach(item => {
                                    let productCard = `
                    <div class="col-md-3" data-aos="zoom-in">
                        <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                            <div class="card-header card-header-image">
                                <a href="#">
                                    <img src="{{ asset('storage') }}/${item.gambar}" alt="${item.nama_produk}">
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="#">
                                    <h4 class="card-title">${item.nama_produk}</h4>
                                </a>
                            </div>
                            <div class="card-footer justify-content-between">
                                <div class="price-container">
                                    <span class="price">Rp ${item.harga_jual.toLocaleString('id-ID')}</span>
                                </div>
                                <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right"
                                    rel="tooltip" title="Remove from wishlist" data-placement="left">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>`;
                                    productRow.append(productCard);
                                });
                            }
                            productRow.fadeIn(200);
                        });
                    },
                    error: function(error) {
                        console.error("Error fetching products:", error);
                    }
                });
            });
        });
    </script>
</body>

</html>
