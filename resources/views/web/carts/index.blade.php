@extends('web.layouts.app')
@push('styles')
    <style>
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            color: #fff !important
        }
    </style>
@endpush
@section('content')
    <main>
        <div class="container my-5">
            <h1 class="text-center mb-4">Shopping Cart</h1>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carts as $i => $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    <img src="{{ env('APP_URL') . '/storage/' . $item->product->image }}" width="50"
                                        height="50" class="rounded-circle" alt="" loading="lazy"
                                        onclick="window.location.href=`<?php echo htmlspecialchars(url('/product/show/' . $item->product->id)); ?>`">
                                    {{ $item->product->title }}
                                </td>
                                <td>${{ $item->product->offer ? $item->product->offer->new_price : $item->product->price }}
                                </td>
                                <td>
                                    <input type="number" class="form-control bg-dark text-white quantity-input"
                                        data-id="{{ $item->product->id }}" value="{{ $item->quantity }}" min="1">
                                </td>
                                <td>${{ ($item->product->offer ? $item->product->offer->new_price : $item->product->price) * $item->quantity }}
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-sm remove-from-cart"
                                        data-id="{{ $item->product->id }}">Remove</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No products in cart</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <h3>Total: ${{ $totalPrice }}</h3>
                <button class="btn btn-light proceed-to-checkout">Proceed to Checkout</button>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script src="{{ env('APP_URL') }}/web_files/js/controls.js"></script>
@endpush
