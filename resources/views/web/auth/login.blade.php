@extends('web.layouts.auth')
@push('styles')
@endpush
@section('content')
    <main>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7 text-center">
                    <img src="{{ env('APP_URL') }}/web_files/{{ env('APP_URL') }}/web_files/images/logo.png" width="150"
                        alt="">
                    <h1>WELCOME BACK</h1>
                </div>
                <div class="col-md-6 mainbg col-lg-5">
                    <h2>Sign in</h2>
                    <p>Glad you are back.</p>
                    <form action="">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="password">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="rememberMe"
                                name="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                        <button class="btn btn-danger w-100 my-4">Sign in</button>
                    </form>
                    <a href="#" class="text-center d-block">Forget Password ? </a>
                    <h5 class="mt-3 text-center">Don't have account <a href="#" class="text-danger">Sign up now...</a>
                    </h5>
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
