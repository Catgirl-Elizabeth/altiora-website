@extends('layouts.app')
@section('title', ' - '.$team->team_name)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h1>{{ $team->team_name }}</h1>
                <p>{{ $team->region }} / {{ $team->sr }}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="text-bg border-r-5 p-3 justify-content-center">
                    <ul>
                        <li>Maintank: <a href="/members/{{strtolower(str_replace(' ', '-',$team->maintank))}}">{{$team->maintank}}</a></li>
                        <li>Offtank: <a href="/members/{{strtolower(str_replace(' ', '-',$team->offtank))}}">{{$team->offtank}}</a></li>
                        <li>DPS: <a href="/members/{{strtolower(str_replace(' ', '-',$team->dps1))}}">{{$team->dps1}}</a></li>
                        <li>DPS: <a href="/members/{{strtolower(str_replace(' ', '-',$team->dps2))}}">{{$team->dps2}}</a></li>
                        <li>Mainsupport: <a href="/members/{{strtolower(str_replace(' ', '-',$team->mainsupp))}}">{{$team->mainsupp}}</a></li>
                        <li>Flexsupport: <a href="/members/{{strtolower(str_replace(' ', '-',$team->flexsupp))}}">{{$team->flexsupp}}</a></li>
                        <li>Manager: <a href="/members/{{strtolower(str_replace(' ', '-',$team->manager))}}">{{$team->manager}}</a></li>
                        <li>Coach: <a href="/members/{{strtolower(str_replace(' ', '-',$team->coach))}}">{{$team->coach}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
