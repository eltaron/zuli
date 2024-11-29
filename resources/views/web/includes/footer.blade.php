<footer>
    <div class="container my-2 p-2">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <img src="{{ env('APP_URL') }}/web_files/images/logo.png" class="mb-3" width="130" alt=""
                    loading="lazy">
            </div>
            <div class="col-md-6 col-lg-3">
                <h3>Products</h3>
                <ul>
                    <li><a href="">Textures</a></li>
                    <li><a href="">Mockups</a></li>
                    <li><a href="">Text Effect</a></li>
                    <li><a href="">Illustrations</a></li>
                    <li><a href="">Typefaces</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h3>Categories</h3>
                <ul>
                    <li><a href="">PS Assets</a></li>
                    <li><a href="">AI Assets</a></li>
                    <li><a href="">InDesign Assets</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h3>Contact</h3>
                <ul>
                    <li><a href="{{ home()?->facebook }}"><i class="fa-brands fa-facebook"></i> Zuli Assets</a></li>
                    <li><a href="{{ home()?->instagram }}"><i class="fa-brands fa-instagram"></i> Zuli_design</a></li>
                    <li><a href="{{ home()?->behance }}"><i class="fa-brands fa-behance"></i> Zuli designs</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright mt-5">
            <h5><span>&#169;</span> Zuli 2024 All rights reserved</h5>
        </div>
    </div>
</footer>
<div id="alert-container"></div>
