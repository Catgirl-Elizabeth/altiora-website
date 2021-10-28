@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 text-bg p-3">
                <form action="/members" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="member-name">Name</label>
                        <input type="text" class="form-control" id="member-name" placeholder="Name" name="member-name">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit!</button>
                </form>
            </div>
        </div>
    </div>
@endsection
