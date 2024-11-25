@extends('admin.layouts.app')
@push('style')
    <style>
        .show-more-btn {
            background-color: transparent;
            border: none;
            color: #c84747;
            width: fit-content
        }
    </style>
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
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td style="max-width: 100px" class="text-container">
                                                <p style="text-wrap: auto;">
                                                    {{ $item->message }}
                                                </p>
                                                <button class="show-more-btn">Show More</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    onclick="deleteItem(`{{ $item->id }}`)"
                                                    data-bs-target="#delete">Delete
                                                </button>
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
    @push('script')
        <script>
            const maxLength = 35; // Character limit for truncation
            // Get all containers
            const containers = document.querySelectorAll('.text-container');
            // Loop through each container
            containers.forEach(container => {
                const paragraph = container.querySelector('p'); // Find the paragraph inside the container
                const button = container.querySelector('button'); // Find the button inside the container
                const fullText = paragraph.textContent.trim(); // Get the full text of the paragraph
                let isFullTextShown = false; // Initial state

                // Initialize paragraph with truncated text
                if (fullText.length > maxLength) {
                    paragraph.textContent = fullText.substring(0, maxLength) + '...';
                } else {
                    button.style.display = 'none'; // Hide the button if the text is short
                }
                // Add click event to the button
                button.addEventListener('click', () => {
                    if (isFullTextShown) {
                        paragraph.textContent = fullText.substring(0, maxLength) + '...';
                        button.textContent = 'Show More';
                    } else {
                        paragraph.textContent = fullText;
                        button.textContent = 'Show Less';
                    }
                    isFullTextShown = !isFullTextShown;
                });
            });
        </script>
    @endpush
@endsection
