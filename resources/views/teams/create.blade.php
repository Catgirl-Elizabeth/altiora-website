@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 text-bg p-3">
                <form action="/teams" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="teamname">Team name</label>
                            <input type="text" class="form-control" id="teamname" placeholder="Team name"
                                   name="teamname">
                        </div>
                        <div class="form-group col">
                            <label for="sr">Average SR</label>
                            <input type="text" class="form-control" id="sr" placeholder="Average SR" name="sr">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="region">Region</label>
                        <select class="form-control member-select" id="region" name="region">
                            <option value="">-- Please choose an option --</option>
                            <option value="EU">EU</option>
                            <option value="NA">NA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="accolades">Notable Accolades</label>
                        <textarea class="form-control" name="accolades" id="accolades" cols="30" rows="4">{{ old('accolades') }}</textarea>
                    </div>
                    <p>Team banner</p>
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
