<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ env('APP_URL') }}/web_files/images/logo.png" alt=""
                    loading="lazy"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fa-xl"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home*') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}"
                            href="{{ url('products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}"
                            href="{{ url('categories') }}">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#Contact">Contact</a>
                    </li>
                    @auth
                        @if (Auth::user()->orders->count() > 0 && Auth::user()->role != 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('orders*') ? 'active' : '' }}"
                                    href="{{ url('orders') }}">Orders</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('logout') }}">Logout</a>
                        </li>
                    @endauth
                </ul>
                @auth
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ aurl('') }}" class="btn btn-light">Admin Panel</a>
                    @else
                        <a href="{{ url('wishlist') }}" class="mx-2 btn btn-light"><i class="fa-solid fa-heart "></i></a>
                        <a href="{{ url('cart') }}" class="btn btn-light">Cart</a>
                    @endif
                @else
                    <a href="{{ url('login') }}" class="btn btn-light">Get Started</a>
                @endauth
            </div>
        </div>
    </nav>
</header>
