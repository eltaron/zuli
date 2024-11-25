@extends('admin.layouts.app')
@push('style')
@endpush
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body ">
                        <h5 class="text-secondary">User Information</h5>
                        <p><strong>User ID:</strong> {{ $user->id }}</p>
                        <p><strong>Username:</strong> {{ $user->username }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Phone:</strong> {{ $user->phone }}</p>
                        <p><strong>Account Created:</strong> {{ $user->time_ago }}</p>

                        <h5 class="text-secondary mt-4">Payment Methods</h5>
                        @if ($user->paymentMethods->count())
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Payment Type</th>
                                        <th>Card Number</th>
                                        <th>CVV</th>
                                        <th>Expiration Date</th>
                                        <th>Default</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->paymentMethods as $paymentMethod)
                                        <tr>
                                            <td>{{ $paymentMethod->payment_type }}</td>
                                            <td>{{ substr($paymentMethod->card_number, -4) }}</td>
                                            <!-- Display last 4 digits -->
                                            <td>{{ $paymentMethod->cvv }}</td>
                                            <td>{{ $paymentMethod->expiration_date }}</td>
                                            <td>{{ $paymentMethod->default ? 'Yes' : 'No' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No payment methods found.</p>
                        @endif

                        <h5 class="text-secondary mt-4">Orders</h5>
                        @if ($user->orders->count())
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Total</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>${{ number_format($order->total, 2) }}</td>
                                            <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                            <td>{{ $order->status ?? 'N/A' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No orders found.</p>
                        @endif

                        <a href="{{ aurl('users') }}" class="btn btn-secondary mt-3">Back to Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    @endpush
@endsection
