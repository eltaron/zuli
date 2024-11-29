@extends('web.layouts.app')
@push('styles')
    <style>
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            color: #fff !important
        }

        p.rounded {
            border: 1px solid #fff !important;
            border-radius: 50px !important;
            width: fit-content;
            margin: 10px 0;
            padding: 5px 15px
        }

        input.rounded,
        select.rounded {
            border-radius: 50px !important;
        }

        table img {
            box-shadow: 0px 8px 15px rgba(255, 255, 255, 0.2) !important;
            margin-top: 20px
        }
    </style>
@endpush
@section('content')
    <main>
        <div class="container my-5">
            <h1 class="text-center mb-4">Shopping Cart</h1>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        @forelse ($carts as $i => $item)
                            <tr>
                                <td class="w-75">
                                    <img src="{{ env('APP_URL') . '/storage/' . $item->product->image }}" width="150"
                                        height="150" class="rounded" alt="" loading="lazy"
                                        onclick="window.location.href=`<?php echo htmlspecialchars(url('/product/show/' . $item->product->id)); ?>`">
                                </td>
                                <td class="w-25">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">{{ $item->product->title }}</h5>
                                        <button class="btn  remove-from-cart" data-id="{{ $item->product->id }}"><i
                                                class="fa-solid text-danger fa-trash"></i>
                                        </button>
                                    </div>
                                    <p class="rounded">
                                        ${{ $item->product->offer ? $item->product->offer->new_price : $item->product->price }}
                                    </p>
                                    <input type="number" class="rounded form-control bg-dark text-white quantity-input"
                                        data-id="{{ $item->product->id }}" value="{{ $item->quantity }}" min="1">
                                    <select name=""
                                        class="rounded form-control bg-dark text-white quantity-input mt-3">
                                        <option value="">pro</option>
                                    </select>
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
