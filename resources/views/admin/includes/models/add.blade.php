<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ aurl($add_url) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach ($inputs as $input)
                        @if ($input['type'] == 'radio')
                            @php
                                $data = explode(',', $input['values']);
                            @endphp
                            <h5 class="form-label"><b>{{ $input['label'] }}</b></h5>
                            <div class="mb-3">
                                @foreach ($data as $d)
                                    <input type="{{ $input['type'] }}" name="{{ $input['name'] }}"
                                        id="add{{ $d }}" value="{{ $d }}"
                                        {{ $input['required'] }}>
                                    <label for="add{{ $d }}"
                                        class="form-label me-4">{{ $d }}</label>
                                @endforeach
                            </div>
                        @elseif ($input['type'] == 'textarea')
                            <div class="mb-3">
                                <label for="{{ $input['label'] }}" class="form-label">{{ $input['label'] }}</label>
                                <textarea name="{{ $input['name'] }}" {{ $input['required'] }} class="form-control"></textarea>
                            </div>
                        @elseif ($input['type'] == 'select')
                            <div class="mb-3">
                                <label for="{{ $input['label'] }}" class="form-label">{{ $input['label'] }}</label>
                                <select name="{{ $input['name'] }}" {{ $input['required'] }} class="form-control">
                                    @foreach ($input['values'] as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="{{ $input['label'] }}" class="form-label">{{ $input['label'] }}</label>
                                <input name="{{ $input['name'] }}" type="{{ $input['type'] }}"
                                    {{ $input['type'] == 'file' ? $input['multible'] : '' }} {{ $input['required'] }}
                                    class="form-control">
                            </div>
                        @endif
                    @endforeach

                    <button type="submit" class="btn btn-light">Add</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
