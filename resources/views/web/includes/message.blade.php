@if ($errors->any())
    <div class="alert mb-3 message  alert-danger" role="alert">
        <h4 class="text-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>يوجد خطأ</strong>

        </h4>
        @foreach ($errors->all() as $error)
            <p>* {{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session()->has('success'))
    <div class="alert mb-3 message  alert-info alert-dismissible fade show" role="alert">
        {{ session('success') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('faild'))
    <div class="alert message mb-3 alert-danger alert-dismissible fade show" role="alert">
        {{ session('faild') }}.
        @if (session('faild') == 'المريض غير موجود هل تود اضافه المريض للمنظومة ؟')
            <button class="btn btn-primary" onclick="submitForm()"><i class="fa fa-plus"></i>
                اضافة</button>
        @elseif(session('faild') == 'المريض لديه أكثر من العيادات المتاحه له.')
            <button class="btn btn-primary"
                onclick="window.location.href=`{{ url('patient/edit/' . session('patient_id')) }}`"><i
                    class="fa fa-plus"></i>
                تعديل</button>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
