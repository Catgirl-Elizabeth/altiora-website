@extends('layouts.app')
@section('title', 'Staff')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="text-center heading">
                        <h1>Meet our staff!</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($staffs as $staff)
                    <div class="col-3">
                        <div class="card bg-transparent staff-image-card" data-toggle="modal"
                             data-target="#staff-{{ $staff->slug }}">
                            <img class="card-img-top staff-image" src="/img/staff/thumbs/thumb_{{ $staff->file_name }}"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h3 class="">{{ $staff->staff_name }}</h3>
                                <h6>
                                    {{$staff->pronouns->implode('pronoun', ' | ')}}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @foreach($staffs as $staff)
            <div class="modal fade" id="staff-{{ $staff->slug }}" tabindex="-1" role="dialog"
                 aria-labelledby="staff-{{ $staff->slug }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg staff-modal" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <img class="card-img-top staff-image" src="/img/staff/{{ $staff->file_name }}"
                                             alt="Card image cap">
                                    </div>
                                    <div class="col-6">
                                        <h3 class="modal-title" id="staff-{{ $staff->slug }}Label">
                                            {{ $staff->staff_name }}
                                        </h3>
                                        <h6>
                                            {{$staff->pronouns->implode('pronoun', ' | ')}}
                                        </h6>
                                        @foreach($staff->roles as $role)
                                            <h6 class="card-subtitle mb-2 text-muted">{{ $role->role_name }}</h6>
                                        @endforeach
                                        <hr>
                                        @if($staff->funfact)
                                        <p>{{ $staff->funfact }}</p>
                                        <hr>
                                        @endif
                                        <div class="d-flex flex-column justify-content-center">
                                            @if($staff->twitter)
                                                <a href="https://twitter.com/{{ $staff->twitter }}">
                                                    <img class="social-logo" src="/img/brand-icons/twitter.png"
                                                         alt="Twitter logo">
                                                    {{ $staff->twitter }}</a>
                                            @endif
                                            @if($staff->instagram)
                                                <a href="https://instagram.com/{{ $staff->instagram }}">
                                                    <img class="social-logo" src="/img/brand-icons/instagram.png"
                                                         alt="Instagram logo">
                                                    {{ $staff->instagram }}</a>
                                            @endif
                                            @if($staff->facebook)
                                                <a href="https://facebook.com/{{ $staff->facebook }}">
                                                    <img class="social-logo" src="/img/brand-icons/facebook.png"
                                                         alt="Facebook logo">
                                                    {{ $staff->facebook }}</a>
                                            @endif
                                            @if($staff->twitch)
                                                <a href="https://twitch.tv/{{ $staff->twitch }}">
                                                    <img class="social-logo" src="/img/brand-icons/twitch.png"
                                                         alt="Twitch logo">
                                                    {{ $staff->twitch }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
