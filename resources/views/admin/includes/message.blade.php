@if ($errors->any())
    <div class="alert text-light mb-3 message  alert-danger" role="alert">
        <h4 class="text-light">
            <strong> something went wrong</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </h4>
        @foreach ($errors->all() as $error)
            <p>* {{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session()->has('success'))
    <div class="alert text-light mb-3 message  alert-info alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>
@endif
@if (session()->has('faild'))
    <div class="alert text-light message mb-3 alert-danger alert-dismissible fade show" role="alert">
        {{ session('faild') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>
@endif
