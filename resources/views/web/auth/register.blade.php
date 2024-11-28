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
                    <h2>Sign up</h2>
                    <p>Glad you are back.</p>
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="username">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="phone">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe"
                                name="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-danger w-100 my-4">Sign up</button>
                    </form>
                    <h5 class="text-center">Have account <a href="#" class="text-danger">Sign in</a></h5>
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
