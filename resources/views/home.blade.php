@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome, {{ Auth::user()->name }}!</p>
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action list-transparent" href="{{ route('teams.create') }}">Make a new team</a>
                            <a class="list-group-item list-group-item-action list-transparent" href="{{ route('downloads.create') }}">Upload a document</a>
                            <a class="list-group-item list-group-item-action list-transparent" href="{{ route('wallpapers.create') }}">Upload a new wallpaper</a>
                            <a class="list-group-item list-group-item-action list-transparent" href="{{ route('user.create') }}">Create a new backend user</a>
                            <a class="list-group-item list-group-item-action list-transparent" href="{{ route('test') }}">Test</a>
                        </div>
                        <br>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
