@extends('layouts.app')
@section('title', 'Create Staff')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 p-3">
                <form action="/staff" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="pronouns">Pronouns</label>
                        <select class="form-control pronouns-select" id="pronouns" name="pronouns[]" multiple="multiple">
                            <option value="">-- Please choose an option --</option>
                            @foreach($pronouns as $pronoun)
                                <option value="{{ $pronoun->id }}">{{ $pronoun->pronoun }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <select class="form-control pronouns-select" id="roles" name="roles[]" multiple="multiple">
                            <option value="">-- Please choose an option --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="funfact">Funfact</label>
                        <textarea class="form-control" name="funfact" id="funfact" cols="30" rows="4">{{ old('funfact') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" placeholder="Twitter" name="twitter">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" id="instagram" placeholder="Instagram" name="instagram">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" placeholder="Facebook" name="facebook">
                    </div>
                    <div class="form-group">
                        <label for="twitch">Twitch</label>
                        <input type="text" class="form-control" id="twitch" placeholder="Twitch" name="twitch">
                    </div>
                    <p>Profile picture</p>
                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" id="customFile" name="file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit!</button>
                </form>
            </div>
        </div>
    </div>


@endsection
