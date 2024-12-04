@extends('landing.mainland')
@section('content')
    <div class="container">
        <div class="animate__animated animate__fadeInUp">
            <h2 class="title text-center">Produk Toko</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="{{ asset('template/./assetsland/img/kit/pro/examples/sma.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">
                                <a href="#pablo">Seragam SMA</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="{{ asset('template/./assetsland/img/kit/pro/examples/smp.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Seragam SMP</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="{{ asset('template/./assetsland/img/kit/pro/examples/sd.png') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Seragam SD</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <div class="section">
        <div class="container" id="produk">
            <h2 class="title text-center" data-aos="zoom-in">Produk Berdasarkan Kategori</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-refine card-plain card-rose">
                        <div class="card-body">
                            <h4 class="card-title" data-aos="zoom-in">
                                Reset Kategori
                                <button class="btn btn-default btn-fab btn-fab-mini btn-link pull-right" rel="tooltip"
                                    title="" data-original-title="Reset Filter">
                                    <i class="material-icons">cached</i>
                                </button>
                            </h4>
                            <div id="accordion" role="tablist">
                                <div class="card card-collapse" data-aos="zoom-in">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="javascript:void(0);" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                                Rentang Harga
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" role="tabpanel"
                                        aria-labelledby="headingOne">
                                        <div class="card-body card-refine">
                                            <span id="price-left" class="price-left pull-left" data-currency="Rp">Rp
                                                10.000</span>
                                            <span id="price-right" class="price-right pull-right" data-currency="Rp">Rp
                                                100.000</span>
                                            <div class="clearfix"></div>
                                            <div id="sliderRefine"
                                                class="slider slider-rose noUi-target noUi-ltr noUi-horizontal"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-collapse" data-aos="zoom-in">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="javascript:void(0);"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Kategori
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" role="tabpanel"
                                        aria-labelledby="headingTwo">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                    Semua
                                                    <span class="form-check-sign">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>

                                            <!-- Iterasi melalui kategori untuk menampilkan nama kategori sebagai checkbox -->
                                            @foreach ($kategori as $item)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{ $item->id_kategori }}">
                                                        {{ $item->nama_kategori }}
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @if ($produk->isEmpty())
                            <div class="col-12 text-center" data-aos="zoom-in">
                                <h4 class="text-muted mt-5">Produk tidak tersedia</h4>
                            </div>
                        @else
                            @foreach ($produk as $item)
                                <div class="col-md-3" data-aos="zoom-in">
                                    <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                        <div class="card-header card-header-image">
                                            <a href="#">
                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                    alt="{{ $item->nama_produk }}">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <a href="#">
                                                <h4 class="card-title">{{ $item->nama_produk }}</h4>
                                            </a>
                                        </div>
                                        <div class="card-footer justify-content-between">
                                            <div class="price-container">
                                                <span class="price">Rp
                                                    {{ number_format($item->harga_jual, 0, ',', '.') }}</span>
                                            </div>
                                            <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right"
                                                rel="tooltip" title="Remove from wishlist" data-placement="left">
                                                <i class="material-icons">favorite</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <h2 class="section-title">News in fashion</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-background"
                        style="background-image: url('{{ asset('template/assetsland/img/kit/pro/examples/color1.jpg') }}')">

                        <div class="card-body">
                            <h6 class="card-category text-info">Productivy Apps</h6>
                            <a href="#pablo">
                                <h3 class="card-title">The best trends in fashion 2017</h3>
                            </a>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-md-4">
                    <div class="card card-background"
                        style="background-image: url('{{ asset('template/assetsland/img/kit/pro/examples/color3.jpg') }}')">
                        <div class="card-body">
                            <h6 class="card-category text-info">Fashion News</h6>
                            <h3 class="card-title">Kanye joins the Yeezy team at Adidas</h3>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-md-4">
                    <div class="card card-background"
                        style="background-image: url('{{ asset('template/assetsland/img/kit/pro/examples/color2.jpg') }}')">
                        <div class="card-body">
                            <h6 class="card-category text-info">Productivy Apps</h6>
                            <a href="#pablo">
                                <h3 class="card-title">Learn how to use the new colors of 2017</h3>
                            </a>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-background"
                        style="background-image: url('{{ asset('template/assetsland/img/kit/pro/dg3.jpg') }}')">
                        <div class="card-body">
                            <h6 class="card-category text-info">Tutorials</h6>
                            <a href="#pablo">
                                <h3 class="card-title">Trending colors of 2017</h3>
                            </a>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-background"
                        style="background-image: url('{{ asset('template/assetsland/img/kit/pro/dg1.jpg') }}')">
                        <div class="card-body">
                            <h6 class="card-category text-info">Productivy Style</h6>
                            <a href="#pablo">
                                <h3 class="card-title">Fashion &amp; Style 2017</h3>
                            </a>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end-main-raised -->
    <div class="section section-blog">
        <div class="container">
            <h2 class="section-title">Latest Articles</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="{{ asset('template/./assetsland/img/kit/pro/dg6.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-rose">Trends</h6>
                            <h4 class="card-title">
                                <a href="#pablo">Learn how to wear your scarf with a floral print shirt</a>
                            </h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="{{ asset('template/./assetsland/img/kit/pro/dg10.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-rose">Fashion week</h6>
                            <h4 class="card-title">
                                <a href="#pablo">Katy Perry was wearing a Dolce &amp; Gabanna arc dress</a>
                            </h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-header card-header-image">
                            <a href="#pablo">
                                <img src="{{ asset('template/./assetsland/img/kit/pro/dg9.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-rose">Fashion week</h6>
                            <h4 class="card-title">
                                <a href="#pablo">Check the latest fashion events and which are the trends</a>
                            </h4>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I
                                love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <div class="subscribe-line subscribe-line-image" data-parallax="true"
        style="background-image: url('{{ asset('template/assetsland/img/kit/pro/examples/ecommerce-header.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="text-center">
                        <h3 class="title">Subscribe to our Newsletter</h3>
                        <p class="description">
                            Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about
                            this.
                        </p>
                    </div>
                    <div class="card card-raised card-form-horizontal">
                        <div class="card-body">
                            <form method="" action="">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">mail</i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Your Email...">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-rose btn-block">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
