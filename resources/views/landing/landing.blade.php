@extends('landing.mainland')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="title">Tentang Toko!</h3>
                <p class="description">
                    Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about
                    this.
                </p>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-raised card-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('template/assetsland/img/kit/bg2.jpg') }}"
                                    alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                                    </h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('template/assetsland/img/kit/pro/bg3.jpg') }}"
                                    alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                        <i class="material-icons">location_on</i> Somewhere Beyond, United States
                                    </h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('template/assetsland/img/kit/bg.jpg') }}"
                                    alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <i class="material-icons">keyboard_arrow_left</i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="material-icons">keyboard_arrow_right</i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="navigation-pills">
            <div class="title d-flex justify-content-center mb-3">
                <h3>Produk</h3>
            </div>
            <ul class="nav nav-pills nav-pills-rose d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#pill1" data-toggle="tab">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pill2" data-toggle="tab">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pill3" data-toggle="tab">Options</a>
                </li>
            </ul>
            <div class="tab-content tab-space">
                <div class="tab-pane active" id="pill1">
                    Collaboratively administrate empowered markets via plug-and-play networks. Dynamically
                    procrastinate B2C users after installed base benefits.
                    <br>
                    <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                </div>
                <div class="tab-pane" id="pill2">
                    Efficiently unleash cross-media information without cross-media value. Quickly maximize timely
                    deliverables for real-time schemas.
                    <br>
                    <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                </div>
                <div class="tab-pane" id="pill3">
                    Completely synergize resource taxing relationships via premier niche markets. Professionally
                    cultivate one-to-one customer service with robust ideas.
                    <br>
                    <br>Dynamically innovate resource-leveling customer service for state of the art customer
                    service.
                </div>
            </div>
        </div>
    </div>
@endsection
