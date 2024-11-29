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
                    <h1 class=" mb-4">{{ home()?->slogan }}</h1>
                    <a href="#Products" class="d-block btn btn-light">Explore Our
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
                        @forelse ($topproducts as $pp)
                            <div class="swiper-slide mb-3">
                                <div class="main">
                                    <img src="{{ env('APP_URL') . '/storage/' . $pp->image }}" alt="" loading="lazy"
                                        onclick="window.location.href=`<?php echo htmlspecialchars(url('/product/show/' . $pp->id)); ?>`">
                                    <div class="overlay">
                                        <h3>{{ $pp->title }}</h3>
                                        @if (isset($pp->offer[0]))
                                            @foreach ($pp->offer as $v)
                                                @if (strtotime($v->end_at) > strtotime(date('Y-m-d')))
                                                    <h4>{{ $v->new_price }}$ <sub
                                                            class="text-danger"><del>{{ $pp->price }}$</del></sub></h4>
                                                @endif
                                            @endforeach
                                        @else
                                            <h4>{{ $pp->price }}$</h4>
                                        @endif
                                        <!-- Wishlist and Cart Buttons -->
                                        <div class="actions mt-3">
                                            <button class="btn btn-light add-to-cart" data-id="{{ $pp->id }}">Add to
                                                Cart</button>
                                            <button class="btn btn-outline-light add-to-wishlist"
                                                data-id="{{ $pp->id }}">Wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h2 class="text-center text-light m-auto">No Products Found</h2>
                        @endforelse
                    </div>
                </div>
                @if (count($topproducts) != 0)
                    <div class="text-center">
                        <a href="{{ route('top.products') }}" class="btn btn-light text-center mt-4">View More</a>
                    </div>
                @endif
            </div>
        </section>
        @if (home()?->descount != 0 && home()?->days_of_offer != 0)
            <section id="Offers">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 d-flex align-items-center">
                            <img src="{{ env('APP_URL') }}/web_files/images/projects/image6.jpg" class="d-none d-md-block"
                                alt="" loading="lazy">
                            <div>
                                <h2>SALE <span>{{ home()?->descount }} %</span></h2>
                                <p>Sale {{ home()?->descount }} of all products</p>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex  align-items-center">
                            <div>
                                <h2>{{ home()?->days_of_offer }} Days Left</h2>
                                <a href="#Offers" class="btn btn-light">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (count($offers) != 0)
            <section id="Typefaces">
                <div id="Offers" class="container my-5">
                    <p class="text-center">Hot Sales</p>
                    <h2 class="main-title text-center">Sales</h2>
                    <div class="swiper mySwiper ">
                        <div class="swiper-wrapper">
                            @foreach ($offers as $ff)
                                <div class="swiper-slide mb-3">
                                    <div class="main">
                                        <img src="{{ env('APP_URL') . '/storage/' . $ff->product->image }}" alt=""
                                            loading="lazy" onclick="window.location.href=`<?php echo htmlspecialchars(url('/product/show/' . $ff->product->id)); ?>`">
                                        <div class="overlay">
                                            <h3>{{ $ff->product->title }}</h3>
                                            <h4>{{ $ff->new_price }}$ <sub
                                                    class="text-danger"><del>{{ $ff->product->price }}$</del></sub></h4>
                                            <!-- Wishlist and Cart Buttons -->
                                            <div class="actions mt-3">
                                                <button class="btn btn-light add-to-cart"
                                                    data-id="{{ $ff->product->id }}">Add
                                                    to
                                                    Cart</button>
                                                <button class="btn btn-outline-light add-to-wishlist"
                                                    data-id="{{ $ff->product->id }}">Wishlist</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ url('/offers/') }}" class="btn btn-light text-center mt-4">View More</a>
                    </div>
                </div>
            </section>
        @endif
        @if ($mokups != null)
            <section id="Products">
                <div class="container my-5">
                    <h2 class="main-title text-center">Mockups</h2>
                    <div class="swiper mySwiper ">
                        <div class="swiper-wrapper">
                            @foreach ($mokups as $po)
                                <div class="swiper-slide mb-3">
                                    <div class="main">
                                        <img src="{{ env('APP_URL') . '/storage/' . $po->image }}" alt=""
                                            loading="lazy" onclick="window.location.href=`<?php echo htmlspecialchars(url('/product/show/' . $po->id)); ?>`">
                                        <div class="overlay">
                                            <h3>{{ $po->title }}</h3>
                                            @if (isset($po->offer[0]))
                                                @foreach ($po->offer as $v)
                                                    @if (strtotime($v->end_at) > strtotime(date('Y-m-d')))
                                                        <h4>{{ $v->new_price }}$ <sub
                                                                class="text-danger"><del>{{ $po->price }}$</del></sub>
                                                        </h4>
                                                    @endif
                                                @endforeach
                                            @else
                                                <h4>{{ $po->price }}$</h4>
                                            @endif
                                            <!-- Wishlist and Cart Buttons -->
                                            <div class="actions mt-3">
                                                <button class="btn btn-light add-to-cart"
                                                    data-id="{{ $po->id }}">Add to
                                                    Cart</button>
                                                <button class="btn btn-outline-light add-to-wishlist"
                                                    data-id="{{ $po->id }}">Wishlist</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ url('/categories/show' . '/' . $po->id) }}"
                            class="btn btn-light text-center mt-4">View
                            More</a>
                    </div>
                </div>
            </section>
        @endif
        @if (count($clients) != 0)
            <section id="Brands">
                <h2 class="main-title text-center">Top Clients</h2>
                <div class="d-flex flex-wrap align-items-center justify-content-center">
                    @foreach ($clients as $cc)
                        <img src="{{ env('APP_URL') . '/storage/' . $cc->logo }}" alt="" loading="lazy">
                    @endforeach
                </div>
            </section>
        @endif
        <section id="Contact">
            <div class="container py-5">
                <h5 class="text-center">Contact Us</h5>
                <h2 class="main-title text-center">Let's Work Together</h2>
                <div class="container">
                    <form action="{{ url('contact') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="phone" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message" name="message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light" type="submit"> Send
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
    <script src="{{ env('APP_URL') }}/web_files/js/controls.js"></script>
@endpush
