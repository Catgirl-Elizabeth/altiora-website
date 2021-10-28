@extends('layouts.app')
@section('title', 'Staff Application')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h2>Altiora Staff Application</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-9 mb-3 border-r-5 p-3">
                <p>You can always just PM the admins to ask about being staff, but feel free to use this form if it's
                    easier. This will also help us have a record of who's applied so we can keep track! </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-9 mb-3 border-r-5 p-3">
                <form method="POST" action="{{ route('applications.staff.send') }}">
                    @csrf

                    <div class="form-group pt-3 pb3">
                        <label for="discordTag">Who are you? *</label>
                        <small id="discordTagHelp" class="form-text text-muted">Please give discord tag and/or the name
                            you go by, so we can identify you if you change your nickname.</small>
                        <input type="text" class="form-control mt-2" name="discordTag" id="discordTag"
                            aria-describedby="discordTagHelp" placeholder="Your Discord Tag:">
                    </div>
                    <div class="form-group pt-3 pb-3">
                        <p>What would you be interested in, or willing to do?</p>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="operations"
                                value="Operations">
                            <label for="operations" class="custom-control-label">Operations (discord wrangling, creating
                                forms and spreadsheets, overseeing teams, running the discord)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="outreach"
                                value="Outreach">
                            <label for="outreach" class="custom-control-label">Outreach (copy pasting Looking For Players
                                ads to various servers and dealing with questions from new members)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="discordModerator"
                                value="Discord Moderator">
                            <label for="discordModerator" class="custom-control-label">Discord Moderator</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="twitchModerator"
                                value="Twitch Moderator">
                            <label for="twitchModerator" class="custom-control-label">Twitch Moderator</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="managing"
                                value="Team managing">
                            <label for="managing" class="custom-control-label">Team managing</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="coaching"
                                value="Team coaching">
                            <label for="coaching" class="custom-control-label">Team coaching (must be GM peak OR 3.5k+
                                current OR have previous experience)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="art" value="Art staff">
                            <label for="art" class="custom-control-label">Art staff (make logos, emojis and banners)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="individualCoaching"
                                value="1-on-1 coaching">
                            <label for="individualCoaching" class="custom-control-label">Individual 1-on-1 coaching (must be
                                GM peak OR 3.5k+ current OR have previous team coaching experience)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="socialMedia"
                                value="Social media">
                            <label for="socialMedia" class="custom-control-label">Social media</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="communityStaff"
                                value="Community staff">
                            <label for="communityStaff" class="custom-control-label">Community staff (run a variety of
                                events)</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role[]" id="pugs"
                                value="Hosting PUGs">
                            <label for="pugs" class="custom-control-label">Hosting PUGs</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="other" id="otherRole">
                            <label class="custom-control-label" for="otherRole">
                                Other
                            </label>
                            <label class="d-none" for="otherRoleText">Other</label>
                            <input type="text" class="form-control mt-2" name="role[]" id="otherRoleText"
                                placeholder="Other" style="display: none">
                        </div>
                    </div>
                    <div class="form-group pt-3 pb-3">
                        <label for="preferredRole">Which role would you prefer, or be most interested in?</label>
                        <input type="text" class="form-control" name="preferredRole" id="preferredRole"
                            placeholder="Your answer:">
                    </div>
                    <div class="form-group pt-3 pb-3">
                        <label for="why">Why do you want to be staff/ why would you be good at it? Have you done similar
                            things before?</label>
                        <textarea class="form-control" name="why" id="why" placeholder="Your answer:" cols="30"
                            rows="10"></textarea>
                    </div>
                    <div class="form-group pt-3 pb-3">
                        <label for="questions">Do you have any questions or concerns about being staff? Could we helping
                            resolve those by eg. providing a mentor?</label>
                        <textarea name="questions" id="questions" cols="30" rows="10" class="form-control"
                            placeholder="Your questions:"></textarea>
                    </div>
                    <div class="form-group pt-3 pb-3">
                        <label for="nominations">Would you like to nominate someone else who you think would be a great
                            staff member?</label>
                        <input type="text" class="form-control" name="nominations" id="nominations"
                            placeholder="Your answer:">
                    </div>
                    <div class="form-group pt-3 pb-3">
                        <label for="suggestions">How could we improve this form and/or make it easier to apply?</label>
                        <textarea name="suggestions" id="suggestions" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group pt-3 pb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    @endsection
