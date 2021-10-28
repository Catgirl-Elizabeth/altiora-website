@extends('layouts.app')
@section('title', 'Walking Challenge')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h2>The Walking Challenge</h2>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-9 mb-3 border-r-5 p-3">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('walking.store') }}">
                            @csrf
                            <div class="form-group pt-3 pb-3">
                                <label for="discordTag">Who are you?</label>
                                <input type="text" class="form-control mt-2" id="discordTag" name="discordTag"
                                       placeholder="Your Discord Tag" value="{{ old('discordTag') }}">
                            </div>
                            <p>Your Time*</p>
                            <div class="form-row pb-3">
                                <div class="form-group col">
                                    <label for="hours">Hours</label>
                                    <input type="text" class="form-control @error('hours') is-invalid @enderror"
                                           id="hours" name="hours" placeholder="hh" value="{{ old('hours') }}">
                                    @error('hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="minutes">Minutes</label>
                                    <input type="text" class="form-control @error('minutes') is-invalid @enderror"
                                           id="minutes" name="minutes" placeholder="mm" value="{{ old('minutes') }}">
                                    @error('minutes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group pt-3 pb-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <p>
                            Here you can submit your times for <a
                                href="https://twitter.com/moodyMRG/status/1366066938204610568" target="_blank">MRG's Walking
                                Challenge</a>.
                            Please stay safe while navigating through this pandemic and remember to follow your
                            country’s COVID guidelines while participating in this challenge.
                            <br><br>
                            You can submit your time anonymously by leaving the Discord tag field empty.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-9 mb-3 border-r-5 p-3">
                <p>Our progress so far: {{ $serverTotal }}/7200 minutes</p>
                <div class="progress" style="height: 20px;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $serverTotal }}" aria-valuemin="0" aria-valuemax="7200" style="width: {{ $percentage }}%;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
