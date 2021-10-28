@extends('layouts.app')
@section('title', 'Walking Challenge - Times')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h2>The Walking Challenge - Times</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-9">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Name</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($times as $time)
                        <tr>
                            <th scope="row">{{ date_format($time->created_at, 'd/m') }}</th>
                            <td>{{ $time->discord_tag ? $time->discord_tag : 'anonymous' }}</td>
                            <td>{{ $time->calculated_time }} minutes</td>
                        </tr>
                    @endforeach
                    <tr class="total">
                        <th scope="row">Total:</th>
                        <td>---</td>
                        <td>{{ $total }} minutes</td>
                    </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">
                    DELETE
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>So what this does is deleting all the entries, while saving the total time logged so far. Use it,
                        if the list gets too long or if you struggle to keep track of which entries you did or did not
                        submit to the spreadsheet already.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Uhh, nevermind</button>
                    <button type="button" class="btn btn-danger">Yes, delete!</button>
                </div>
            </div>
        </div>
    </div>
@endsection
