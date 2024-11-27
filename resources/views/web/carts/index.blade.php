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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Elegant Font</td>
                            <td>$10.00</td>
                            <td><input type="number" class="form-control bg-dark text-white" value="1"></td>
                            <td>$10.00</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Remove</button>
                            </td>
                        </tr>
                        <!-- Repeat rows for more products -->
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <h3>Total: $50.00</h3>
                <button class="btn btn-light">Proceed to Checkout</button>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
@endpush
