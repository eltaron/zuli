@extends('web.layouts.app')
@push('styles')
@endpush
@section('content')
    <main>
        <section id="Hero">
            <div class="d-flex justify-content-center align-items-center text-center" style="min-height: 60vh;">
                <div class="main">
                    <div class="images trusted d-flex align-items-center d-none d-md-flex  mb-4">
                        <div class="{{ env('APP_URL') }}/web_files/images">
                            <img src="{{ env('APP_URL') }}/web_files/images/users/user1.jpg" alt="" loading="lazy">
                            <img src="{{ env('APP_URL') }}/web_files/images/users/user2.jpg" style="right: 17px;"
                                alt="" loading="lazy">
                            <img src="{{ env('APP_URL') }}/web_files/images/users/user3.jpg" style="right: 34px;"
                                alt="" loading="lazy">
                        </div>
                        <h4>Trusted By <span>30,000+</span> creative designers</h4>
                    </div>
                    <h1 class=" mb-4">SOME DIGITAL ASSETS</h1>
                    <a href="" class="d-block btn btn-light">Explore Our
                        Products</a>
                </div>
            </div>
            <div class="news-ticker">
                <div class="ticker-wrapper">
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>PSD Files</h3>
                    </div>
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>MOCKUPS</h3>
                    </div>
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>ColorPalettes</h3>
                    </div>
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>TYPEFACES</h3>
                    </div>
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>PRUSHES</h3>
                    </div>
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>TEXTURES</h3>
                    </div>
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>Vectors</h3>
                    </div>
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>Illustrations</h3>
                    </div>
                    <div class="ticker-item">
                        <i class="fa-solid fa-star-of-life"></i>
                        <h3>Patterns</h3>
                    </div>
                </div>
            </div>
        </section>
        <section id="Products">
            <div class="container my-5">
                <p class="text-center">What's new</p>
                <h2 class="main-title text-center">Top Products</h2>
                <div class="swiper mySwiper ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image1.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image2.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image3.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image1.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image2.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image3.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="" class="btn btn-light text-center mt-4">View More</a>
                </div>
            </div>
        </section>
        <section id="Offers">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 d-flex align-items-center">
                        <img src="{{ env('APP_URL') }}/web_files/images/projects/image6.jpg" class="d-none d-md-block"
                            alt="" loading="lazy">
                        <div>
                            <h2>SALE <span>50%</span></h2>
                            <p>Sale 50% of all products</p>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex  align-items-center">
                        <div>
                            <h2>2 Days Left</h2>
                            <a href="#" class="btn btn-light">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="Typefaces">
            <div class="container my-5">
                <p class="text-center">Hot Sales</p>
                <h2 class="main-title text-center">Sales</h2>
                <div class="swiper mySwiper ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image1.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$ <sub class="text-danger"><del>300$</del></sub></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image2.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$ <sub class="text-danger"><del>300$</del></sub></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image3.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$ <sub class="text-danger"><del>300$</del></sub></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image1.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$ <sub class="text-danger"><del>300$</del></sub></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image2.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$ <sub class="text-danger"><del>300$</del></sub></h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image3.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$ <sub class="text-danger"><del>300$</del></sub></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="" class="btn btn-light text-center mt-4">View More</a>
                </div>
            </div>
        </section>
        <section id="Products">
            <div class="container my-5">
                <h2 class="main-title text-center">Mockups</h2>
                <div class="swiper mySwiper ">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image1.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image2.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image3.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image1.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image2.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide mb-3">
                            <div class="main">
                                <img src="{{ env('APP_URL') }}/web_files/images/projects/image3.jpg" alt=""
                                    loading="lazy">
                                <div class="overlay">
                                    <h3>Product</h3>
                                    <p>product details</p>
                                    <h4>250$</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="" class="btn btn-light text-center mt-4">View More</a>
                </div>
            </div>
        </section>
        <section id="Categories">
            <div class="container">
                <h2 class="main-title text-center">Categories</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div>
                            <img src="{{ env('APP_URL') }}/web_files/images/brands/font.png" class="me-3">
                            <h4>Typefaces</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <img src="{{ env('APP_URL') }}/web_files/images/brands/font.png" class="me-3">
                            <h4>Typefaces</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <img src="{{ env('APP_URL') }}/web_files/images/brands/font.png" class="me-3">
                            <h4>Typefaces</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <img src="{{ env('APP_URL') }}/web_files/images/brands/font.png" class="me-3">
                            <h4>Typefaces</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <img src="{{ env('APP_URL') }}/web_files/images/brands/font.png" class="me-3">
                            <h4>Typefaces</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="justify-content-center">
                            <h2>
                                <i class="fa-solid fa-plus"></i>
                                View All
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="Brands">
            <h2 class="main-title text-center">Top Clients</h2>
            <div class="d-flex flex-wrap align-items-center justify-content-center">
                <img src="{{ env('APP_URL') }}/web_files/images/brands/cps-removebg-preview.png" alt=""
                    loading="lazy">
                <img src="{{ env('APP_URL') }}/web_files/images/brands/golf-removebg-preview.png" alt=""
                    loading="lazy">
                <img src="{{ env('APP_URL') }}/web_files/images/brands/mtv-removebg-preview.png" alt=""
                    loading="lazy">
                <img src="{{ env('APP_URL') }}/web_files/images/brands/netflix-removebg-preview.png" alt=""
                    loading="lazy">
                <img src="{{ env('APP_URL') }}/web_files/images/brands/parmount-removebg-preview.png" alt=""
                    loading="lazy">
                <img src="{{ env('APP_URL') }}/web_files/images/brands/puma-removebg-preview.png" alt=""
                    loading="lazy">
                <img src="{{ env('APP_URL') }}/web_files/images/brands/sony-removebg-preview.png" alt=""
                    loading="lazy">
            </div>
        </section>
        <section id="Contact">
            <div class="container py-5">
                <h5 class="text-center">Contact Us</h5>
                <h2 class="main-title text-center">Let's Work Together</h2>
                <div class="container">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light"> Send
                                        Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')
@endpush
