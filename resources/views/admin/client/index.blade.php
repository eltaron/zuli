@extends('admin.layouts.app')
@push('style')
@endpush
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h4>{{ $title }}</h4>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#add"> + Add New Item</button>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive p-0">
                            <table id="example" class="table table-bordered border-light text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>
                                                <img src="{{ env('APP_URL') . '/storage/' . $item->logo }}" width="50"
                                                    height="50" class="rounded-circle" alt="" loading="lazy">
                                                {{ $item->name }}
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    onclick="deleteItem(`{{ $item->id }}`)"
                                                    data-bs-target="#delete">Delete
                                                </button>
                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                    onclick="editItem(`{{ $item->id }}`)"
                                                    data-bs-target="#edit">Update</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.models.add')
    @include('admin.includes.models.edit')
    @include('admin.includes.models.delete')
    @push('script')
    @endpush
@endsection
