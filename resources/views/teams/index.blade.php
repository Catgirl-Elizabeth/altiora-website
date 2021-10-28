@extends('layouts.app')
@section('title', 'Teams')
@section('content')


    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="text-center heading">
                        <h1>Teams</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-11">
                    <p>We host a wide variety of teams - from Europe to America, Overwatch to Valorant, bronze to
                        Grandmaster. Each team can operate independently - they set their own schedules, enter a variety
                        of different tournaments, and can decide to accept only women and LGBTQA+ or be open to anyone.
                        What we all share is a commitment to Altiora's values.</p>
                </div>
                <div class="team-list expanded" id="team-list">
                    <button id="button-expand" class="btn btn-dark">+</button>
                    <button id="button-collapse" class="btn btn-dark">-</button>
                    <div class="wrapper">
                        <h3>EU Teams</h3>
                        <ul>
                            @foreach($teams as $team)
                                @if ($team->region == "EU")
                                    <li><a href="#{{ $team->slug }}">{{ $team->team_name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                        <h3>NA Teams</h3>
                        <ul>
                            @foreach($teams as $team)
                                @if ($team->region == "NA")
                                    <li><a href="#{{ $team->slug }}">{{ $team->team_name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{--    <section>--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-11">--}}
    {{--                    <h3>EU Teams</h3>--}}
    {{--                    <ul>--}}
    {{--                        @foreach($teams as $team)--}}
    {{--                            @if ($team->region == "EU")--}}
    {{--                                <li><a href="#{{ $team->slug }}">{{ $team->team_name }}</a></li>--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--                <div class="col">--}}
    {{--                    <h3>NA Teams</h3>--}}
    {{--                    <ul>--}}
    {{--                        @foreach($teams as $team)--}}
    {{--                            @if ($team->region == "NA")--}}
    {{--                                <li><a href="#{{ $team->slug }}">{{ $team->team_name }}</a></li>--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    @foreach($teams as $team)
        <section id="{{ $team->slug }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="d-flex justify-content-center team-banner">
                            <img src="{{ $team->banner_path }}" alt="teambanner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-6">

                        <table class="table table-sm table-borderless">
                            <tbody>
                            <tr>
                                <th scope="row" class="w-50">Average SR:</th>
                                <td>{{ $team->sr }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="w-50">Server Location:</th>
                                <td>{{ $team->region }}</td>
                            </tr>
                            </tbody>
                        </table>
                        @auth
                            <a href="/teams/{{ $team->slug }}/edit" class="btn btn-primary">Edit</a>
                            <form action="/teams/{{ $team->slug }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        @endauth
                    </div>
                    <div class="col-5 text-center">
                        <p>{{ $team->description }}</p>
                        <p>{{ $team->accolades }}</p>
                    </div>
                </div>
            </div>

        </section>
    @endforeach
@endsection
