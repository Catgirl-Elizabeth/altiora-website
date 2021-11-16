@extends('layouts.app')
@section('title', 'Contact us!')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h1>Contact us!</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 p-3">
                <form action="/contact" method="post">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-8">
                            <label for="name">Name*</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group col-4">
                            <label for="pronouns">Pronouns</label>
                            <input type="text" id="pronouns" name="pronouns" class="form-control @error('pronouns') is-invalid @enderror" placeholder="Pronouns" value="{{ old('pronouns') }}">
                            @error('pronouns')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="subject">Subject*</label>
                        <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" value="{{ old('subject') }}" required>
                        @error('subject')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="message">Your message*</label>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror

                    </div>
                    <p class="fsize-20">Fields marked with * are required.</p>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
