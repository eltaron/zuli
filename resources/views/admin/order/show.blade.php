@extends('admin.layouts.app')
@push('style')
@endpush
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body ">
                        <h5 class="text-secondary">Order Information</h5>
                        <p><strong>Order ID:</strong> {{ $order->id }}</p>
                        <p><strong>Created At:</strong> {{ $order->time_ago }}</p>
                        <p><strong>User:</strong> {{ $order->user->username }} ({{ $order->user->email }})</p>
                        <p><strong>Payment Method:</strong> {{ $order->payment_method->name }}</p>
                        <p><strong>Payment Type:</strong> {{ $order->payment_method->payment_type }}</p>

                        <h5 class="mt-4">Order Details</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderdetails as $detail)
                                    <tr>
                                        <td>{{ $detail->product ? $detail->product->title : 'product deleted' }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>${{ number_format($detail->price, 2) }}</td>
                                        <td>${{ number_format($detail->quantity * $detail->price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h5 class="mt-4 text-secondary">Order Totals</h5>
                        {{-- <p><strong>Tax:</strong> ${{ number_format($order->tax, 2) }}</p> --}}
                        {{-- <p><strong>Coupon:</strong> ${{ number_format($order->coupon, 2) }}</p> --}}
                        <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>

                        <a href="{{ aurl('orders') }}" class="btn btn-secondary mt-3">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    @endpush
@endsection
