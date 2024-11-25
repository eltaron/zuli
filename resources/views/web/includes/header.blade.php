<main class="d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row align-items-center mainrow">
            <div class="col-md-5 text-center order-2">
                <img src='{{ env('APP_URL') }}web_files{{ isset($image_path) ? $image_path : '/images/login.png' }}'
                    width="80%" alt="">
            </div>
            <div class="col-md-7 py-2">
