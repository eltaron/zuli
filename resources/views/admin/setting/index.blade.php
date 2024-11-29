@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h2>Home Page Settings</h2>
                    </div>
                    <div class="card-body ">

                        <form action="{{ aurl('settings/update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="slogan" class="form-label">Slogan</label>
                                <textarea class="form-control" id="slogan" name="slogan" rows="4">{{ old('slogan', $settings->slogan ?? '') }}</textarea>
                                @error('slogan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook URL</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    value="{{ old('facebook', $settings->facebook ?? '') }}">
                                @error('facebook')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="instgram" class="form-label">Instagram URL</label>
                                <input type="text" class="form-control" id="instgram" name="instgram"
                                    value="{{ old('instgram', $settings->instgram ?? '') }}">
                                @error('instgram')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="behance" class="form-label">Behance URL</label>
                                <input type="text" class="form-control" id="behance" name="behance"
                                    value="{{ old('behance', $settings->behance ?? '') }}">
                                @error('behance')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="days_of_offer" class="form-label">days of offer</label>
                                <input type="number" class="form-control" id="days_of_offer" name="days_of_offer"
                                    value="{{ old('days_of_offer', $settings->days_of_offer ?? '') }}">
                                @error('instgram')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descount" class="form-label">discount</label>
                                <input type="number" class="form-control" id="descount" name="descount"
                                    value="{{ old('descount', $settings->descount ?? '') }}">
                                @error('instgram')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-secondary">Save Settings</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
