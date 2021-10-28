@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <form action="{{ route('downloads.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" id="customFile" name="file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group pt-3 pb3">
                        <label for="slug">Readable file name</label>
                        <input type="text" class="form-control mt-2" id="slug" name="slug">
                    </div>
                    <div class="form-group pt-3 pb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
