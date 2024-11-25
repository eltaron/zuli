@extends('web.layouts.app')
@push('styles')
    <style>
        .dropdown.setting {
            display: none !important
        }
    </style>
@endpush
@section('content')
    <form action="{{ url('login') }}" method="post" class="card p-5">
        @csrf
        <h1 class="text-center mb-4">بوابة الاستقبال</h1>
        <input type="text" name="username" class="form-control mb-2" required placeholder="اسم المستخدم">
        <input type="text" name="username" class="form-control mb-2" required placeholder="">
        <input type="password" name="password" class="form-control mb-2" required placeholder="كلمه المرور ">
        <input type="submit" class="form-control mb-2 btn btn-auto" value=" تسجيل الدخول">
    </form>
@endsection
@push('scripts')
@endpush
