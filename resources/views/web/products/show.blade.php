@extends('web.layouts.app')
@push('styles')
    <style>
        .buttons .add-to-cart {
            box-shadow: none !important;
            min-width: 85%;
            height: 50px;
        }

        .add-to-wishlist {
            width: 50px;
            height: 50px;
            line-height: 35px;
            margin: 0 10px;
        }

        .add-to-wishlist i {
            color: #ad2525
        }
    </style>
@endpush
@section('content')
    <main>
        <section id="Products" class="pt-0">
            <div class="container mb-5">
                <h2 class="main-title text-center mt-2">{{ $title }}</h2>
                <div class="mainbg">
                    <div class="row">
                        <div class="col-md-5">
                            <img style="border-radius: 30px" src="{{ env('APP_URL') . '/storage/' . $product->image }}"
                                width="100%" alt="">
                        </div>
                        <div class="col-md-7">
                            <h2>{{ $product->title }}</h2>
                            <h6 class="text-muted">
                                @if ($product->offer)
                                    ${{ $product->offer->new_price }} <sub
                                        class="text-danger"><del>${{ $product->price }}</del></sub>
                                @else
                                    ${{ $product->price }}
                                @endif
                            </h6>
                            <hr>
                            @if ($product->description)
                                <h2>Description:</h2>
                                <p>
                                    {{ $product->description }}
                                </p>
                            @endif
                            <div class="buttons align-items-center d-flex m-0 mt-5 justify-content-between">
                                <button class="btn btn-light add-to-cart" data-id="{{ $product->id }}">Add to
                                    Cart</button>
                                <br>
                                <button class="btn btn-outline-light add-to-wishlist" data-id="{{ $product->id }}"><i
                                        class="fa-solid fa-heart"></i></button>
                            </div>
                        </div>
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
