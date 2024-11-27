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
        <div class="container my-5">
            <h1 class="text-center mb-4">Wishlist</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="http://localhost/ecommerce/zuli/web_files/images/projects/image2.jpg" class="card-img-top"
                            alt="Product Image" height="250px">
                        <div class="card-body">
                            <h5 class="card-title">Elegant Font</h5>
                            <p class="card-text">$10.00</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger btn-sm">Remove</button>
                                <button class="btn btn-light btn-sm">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="http://localhost/ecommerce/zuli/web_files/images/projects/image2.jpg" class="card-img-top"
                            alt="Product Image" height="250px">
                        <div class="card-body">
                            <h5 class="card-title">Elegant Font</h5>
                            <p class="card-text">$10.00</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger btn-sm">Remove</button>
                                <button class="btn btn-light btn-sm">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="http://localhost/ecommerce/zuli/web_files/images/projects/image2.jpg" class="card-img-top"
                            alt="Product Image" height="250px">
                        <div class="card-body">
                            <h5 class="card-title">Elegant Font</h5>
                            <p class="card-text">$10.00</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger btn-sm">Remove</button>
                                <button class="btn btn-light btn-sm">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
@endpush
