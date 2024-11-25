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
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive p-0">
                            <table id="example" class="table table-bordered border-light text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Payment method</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $item->user->username }}</td>
                                            <td>{{ $item->payment_method->name }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <button class="btn btn-light"
                                                    onclick="window.location.href=`{{ aurl('orders/') . '/' . $item->id }}`">Details
                                                </button>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    onclick="deleteItem(`{{ $item->id }}`)"
                                                    data-bs-target="#delete">Delete
                                                </button>
                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                    onclick="editItem(`{{ $item->id }}`)" data-bs-target="#edit">Edit
                                                    Status</button>
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
    @include('admin.includes.models.delete')
    @include('admin.includes.models.edit')

    @push('script')
    @endpush
@endsection
