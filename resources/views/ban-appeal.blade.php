@extends('layouts.app')
@section('title', 'Appeal your ban')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <form action="" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Who are you?</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Your Discord tag">
                    </div>
                    <div class="form-group">
                        <label for="description">Why should we unban you?</label>
                        <textarea class="form-control" name="reason" id="reason" cols="30" rows="4" placeholder="Convince us!">{{ old('reason') }}</textarea>
                    </div>

                    <div class="form-group pt-3 pb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
