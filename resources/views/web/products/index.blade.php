@extends('web.layouts.app')
@push('styles')
@endpush
@section('content')
    <main>
        <section id="Products" class="pt-0">
            <div class="container mb-5">
                <h2 class="main-title text-center">{{ $title }}</h2>
                <div class="mainbg">
                    <div class="row">
                        @forelse ($products as $pp)
                            <div class="col-md-4 mb-3">
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
                            <h2 class="text-center text-light">No Products Found</h2>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        <section id="Brands">
            <h2 class="main-title text-center">Top Clients</h2>
            <div class="d-flex flex-wrap align-items-center justify-content-center">
                @foreach ($clients as $cc)
                    <img src="{{ env('APP_URL') . '/storage/' . $cc->logo }}" alt="" loading="lazy">
                @endforeach
            </div>
        </section>
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
