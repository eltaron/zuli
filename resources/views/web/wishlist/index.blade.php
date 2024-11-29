@extends('web.layouts.app')
@push('styles')
    <style>
        .card {
            background-color: #212529;
            border: none;
        }
    </style>
@endpush
@section('content')
    <main>
        <section id="Products" class="pt-0">
            <div class="container mb-5">
                <h2 class="main-title text-center">Wishlist</h2>
                <div class="mainbg">
                    <div class="row">
                        @forelse ($whishlists as $ff)
                            <div class="col-md-4 mb-3">
                                <div class="main">
                                    <img src="{{ env('APP_URL') . '/storage/' . $ff->product->image }}" alt=""
                                        loading="lazy" onclick="window.location.href=`<?php echo htmlspecialchars(url('/product/show/' . $ff->product->id)); ?>`">
                                    <div class="overlay">
                                        <h3>{{ $ff->product->title }}</h3>
                                        <p>{{ $ff->product->description }}</p>
                                        <h4>{{ $ff->new_price }}$ <sub
                                                class="text-danger"><del>{{ $ff->product->price }}$</del></sub></h4>
                                        <!-- Wishlist and Cart Buttons -->
                                        <div class="actions mt-3">
                                            <button class="btn btn-light add-to-cart" data-id="{{ $ff->product->id }}">Add
                                                to
                                                Cart</button>
                                            <button class="btn btn-outline-light remove-from-wishlist"
                                                data-id="{{ $ff->product->id }}">Remove</button>
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

    </main>
@endsection
@push('scripts')
    <script src="{{ env('APP_URL') }}/web_files/js/controls.js"></script>
@endpush
