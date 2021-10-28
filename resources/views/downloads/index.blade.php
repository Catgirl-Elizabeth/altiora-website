@extends('layouts.app')
@section('title', 'Downloads')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="text-center heading">
                        <h1>Downloads</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 p-3">
                    <p>Here you can find the rulebook to our tournament as well as other important documents.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 p-3">
                <div class="row">
                    @foreach($downloads as $download)
                        <div class="col-sm-4">
                            <div class="file">
                                <a href="{{ $download->file_path }}" target="_blank" class="w-100">
                                    <div class="download">
                                        <div class="text">{{ $download->slug }}</div>
                                        <div class="icon"><img src="/arrow_downward.svg" alt="download-icon"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
