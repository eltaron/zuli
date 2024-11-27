@extends('web.layouts.auth')
@push('styles')
@endpush
@section('content')
    <main>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7 text-center">
                    <img src="{{ env('APP_URL') }}/web_files/images/logo.png" width="150" alt="">
                    <h1>Let's start our journey</h1>
                </div>
                <div class="col-md-6 mainbg col-lg-5 register">
                    <h2>Reset Password</h2>
                    <form action="{{ route('password.request') }}" method="POST">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="New Password" </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm Password">
                            </div>
                            <button class="btn btn-danger w-100 my-4">Reset Password</button>
                    </form>
                    <hr>
                    <ul>
                        <li><a href="#">Terms Of Conditions</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Customer Care</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
@endpush
