@extends('web.layouts.app')
@push('styles')
@endpush
@section('content')
    <main>
        <section id="Categories">
            <div class="container">
                <h2 class="main-title text-center">Categories</h2>
                <div class="row">
                    @foreach ($categories as $ss)
                        <div class="col-md-3" onclick="window.location.href=`<?php echo htmlspecialchars(url('/categories/show/' . $ss->id)); ?>`">
                            <div class="text-center">
                                {{-- <img src="{{ env('APP_URL') . '/storage/' . $ss->logo }}" class="me-3"> --}}
                                {{ $ss->title }}
                            </div>
                        </div>
                    @endforeach
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
@endpush
