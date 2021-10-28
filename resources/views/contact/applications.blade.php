@extends('layouts.app')
@section('title', 'Applications')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h1>Applications</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-9 mb-3 border-r-5 p-3">
                <p>Available applications:</p>
                <div class="list-group">
                    <a class="list-group-item list-group-item-action list-transparent" href="/applications/team">Apply for a team</a>
                    <a class="list-group-item list-group-item-action list-transparent" href="/applications/altiora">Apply for the Altiora role</a>
                    <a class="list-group-item list-group-item-action list-transparent" href="/applications/staff">Apply to be staff</a>
                </div>
            </div>
        </div>
    </div>
@endsection
