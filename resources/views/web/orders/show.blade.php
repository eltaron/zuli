@extends('web.layouts.app')
@push('styles')
    <style>
        .card {
            background-color: #0c0c0c;
        }

        .table-striped>tbody>tr:nth-of-type(odd)>* {
            color: #fff !important
        }
    </style>
@endpush
@section('content')
    <main>
        <div class="container my-5">
            <h1 class="text-center mb-4">Order Details</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                    {{-- <p><strong>Tax:</strong> ${{ number_format($order->tax, 2) }}</p>
                    <p><strong>Coupon:</strong> {{ $order->coupon ?? 'None' }}</p>
                    <p><strong>Payment Method:</strong> {{ $order->paymentMethod->name }}</p> --}}
                    <p><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>

            <h3 class="mb-4">Order Items</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>View Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderDetails as $detail)
                            <tr>
                                <td>
                                    <img width="150" height="150" class="rounded-circle"
                                        src="{{ env('APP_URL') . '/storage/' . $detail->product->image }}" alt=""
                                        loading="lazy" onclick="window.location.href=`<?php echo htmlspecialchars(url('/product/show/' . $detail->product->id)); ?>`">

                                </td>
                                <td>${{ number_format($detail->price, 2) }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>${{ number_format($detail->price * $detail->quantity, 2) }}</td>
                                <td>
                                    <h5>{{ $detail->product->title }}</h5>
                                    <p class="rounded">
                                        ${{ number_format($detail->price, 2) }}
                                    </p>
                                    @if ($order->status != 'pending')
                                        <a href="{{ $detail->product->url }}" target="_blank"
                                            class="btn btn-light btn-sm">View Product</a>
                                    @else
                                        <a target="_blank" class="btn btn-light btn-sm">Payment</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('orders.index') }}" class="btn btn-light mt-4">Back to Orders</a>
        </div>
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
