@extends('layouts.app')
@section('title', 'Downloads')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="text-center heading">
                        <h1>Wallpapers</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach( $wallpapers as $wallpaper )
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="thumbnail d-flex justify-content-center">
                            <a href="/img/wallpapers/{{ $wallpaper->file_name }}" data-lightbox="wallpaper" data-title="{{ $wallpaper->title }}">
                                <img class="lazy" data-src="/img/wallpapers/thumbs/thumb_{{ $wallpaper->file_name }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
