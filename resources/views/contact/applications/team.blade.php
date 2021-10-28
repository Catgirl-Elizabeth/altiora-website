@extends('layouts.app')
@section('title', 'Team Application')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <h2>Altiora Team Application</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9 mb-3 border-r-5 p-3">
            <p>You do not need to fill out this form. You can post in <a
                    href="https://discord.com/channels/709122055609778196/709219784692072498">#lft-overwatch</a>, where
                all the Altiora teams'
                managers can easily see your post. However, if you find it easier to apply this way, fill out this
                form.</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9 mb-3 border-r-5 p-3">
            <form method="POST" action="{{ route('applications.team.send') }}">
                @csrf
                <div class="form-group pt-3 pb-3">
                    <label for="discordTag">Who are you?</label>
                    <small id="discordTagHelp" class="form-text text-muted">Please give discord tag and/or the name
                        you go by, so we can identify you if you change your nickname.</small>
                    <input type="text" class="form-control mt-2" name="discordTag" id="discordTag"
                        aria-describedby="discordTagHelp" placeholder="Your Discord Tag:">
                </div>
                <div class="form-group pt-3 pb-3">
                    <p>Which region are you applying for?</p>
                    <small class="form-text text-muted">If none of the regions apply to you, just type in your own.
                        Unfortunately, we do not have the player-base yet for
                        regions beyond NA or EU. We will
                        get in touch if we receive enough applications to form teams for other regions.</small>
                    <div class="form-group">
                        <label class="d-none" for="region">Region</label>
                        <select class="form-control region-select" id="region" name="region">
                            <option value="">-- Please choose an option --</option>
                            <option value="EU only">EU only</option>
                            <option value="NA only">NA only</option>
                            <option value="Either (but prefer EU)">Either (but prefer EU)</option>
                            <option value="Either (but prefer NA)">Either (but prefer NA)</option>
                            <option value="I don't mind">I do not mind</option>
                        </select>
                    </div>
                </div>
                <div class="form-group pt-3 pb-3">
                    <p>What role do you want to play? Tick any that apply.</p>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="role[]" type="checkbox" value="Main Tank" id="mt">
                        <label class="custom-control-label" for="mt">
                            Main Tank (e.g. Rein, Orisa, Winston)
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="role[]" type="checkbox" value="Off Tank" id="ot">
                        <label class="custom-control-label" for="ot">
                            Off Tank (e.g. D.Va, Sigma, Zarya)
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="role[]" type="checkbox" value="Flex DPS" id="fdps">
                        <label class="custom-control-label" for="fdps">
                            Flex DPS (typically projectile heroes like Mei, Genji, Pharah or Hanzo)
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="role[]" type="checkbox" value="Hitscan DPS" id="hdps">
                        <label class="custom-control-label" for="hdps">
                            Hitscan DPS (typically heroes like Widowmaker, McCree or Tracer)
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="role[]" type="checkbox" value="Main Support" id="ms">
                        <label class="custom-control-label" for="ms">
                            Main Support (e.g. Lucio, Brig, Mercy)
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="role[]" type="checkbox" value="Flex Support" id="fs">
                        <label class="custom-control-label" for="fs">
                            Flex Support (e.g. Ana, Zenyatta, Moira)
                        </label>
                    </div>
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="rank">What rank (SR) are you typically or currently at?</label>
                    <input type="text" class="form-control mt-2" name="rank" id="rank" placeholder="Your SR">
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="peak">What is your peak SR?</label>
                    <small id="peakHelp" class="form-text text-muted">This means the highest rank you have ever
                        achieved on any role on any account on PC. It's okay to round to the nearest 100.</small>
                    <input type="text" class="form-control mt-2" name="peak" id="peak" aria-describedby="peakHelp"
                        placeholder="Your peak SR">
                </div>
                <div class="form-group pt-3 pb-3">
                    <p>When are you available for team practices & tournaments?</p>
                    <small class="form-text text-muted">This means scrims and VOD reviews. Answer with when you're
                        typically available, even if occaisonally it would be different due to one-off events. For
                        EU, almost all evening practices are 20:00 - 22:00 Central European (Summer) Time. For NA,
                        evening practices vary between 18:00 to midnight Eastern Time.</small>
                    <div class="custom-control custom-checkbox mt-2">
                        <input class="custom-control-input" name="availability[]" type="checkbox" value="Monday"
                            id="monday">
                        <label class="custom-control-label" for="monday">
                            Monday evening
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="availability[]" type="checkbox" value="Tuesday"
                            id="tuesday">
                        <label class="custom-control-label" for="tuesday">
                            Tuesday evening
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="availability[]" type="checkbox" value="Wednesday"
                            id="wednesday">
                        <label class="custom-control-label" for="wednesday">
                            Wednesday evening
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="availability[]" type="checkbox" value="Thursday"
                            id="thursday">
                        <label class="custom-control-label" for="thursday">
                            Thursday evening
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="availability[]" type="checkbox" value="Friday"
                            id="friday">
                        <label class="custom-control-label" for="friday">
                            Friday evening
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="availability[]" type="checkbox"
                            value="Saturday daytime" id="saturdayEarly">
                        <label class="custom-control-label" for="saturdayEarly">
                            Saturday - daytime/afternoon
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="availability[]" type="checkbox"
                            value="Saturday evening" id="saturdayLate">
                        <label class="custom-control-label" for="saturdayLate">
                            Saturday - evening
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="availability[]" type="checkbox" value="Sunday daytime"
                            id="sundayEarly">
                        <label class="custom-control-label" for="sundayEarly">
                            Sunday - daytime/afternoon
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="availability[]" type="checkbox" value="Sunday evening"
                            id="sundayLate">
                        <label class="custom-control-label" for="sundayLate">
                            Sunday - evening
                        </label>
                    </div>
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="concerns">Do you have any other comments or concerns about your schedule?</label>
                    <small id="concernsHelp" class="form-text text-muted">For instance, please write here if you
                        would have trouble making 20:00 - 22:00 Central European (EU), if you can only make certain
                        times between 18:00-00:00 Eastern (NA), or if you have an unpredictable work
                        schedule.</small>

                    <textarea class="form-control mt-2" name="concerns" id="concerns" aria-describedby="concernsHelp"
                        placeholder="Your answer:" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group pt-3 pb-3">
                    <p>[OPTIONAL] Are you eligible for Diversity & Inclusion teams?</p>
                    <div class="custom-control custom-checkbox mt-2">
                        <input class="custom-control-input" name="inclusion[]" type="checkbox"
                            value="I am eligible for all-women teams" id="womenOnly">
                        <label class="custom-control-label" for="womenOnly">
                            I am eligible for all-women teams
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="inclusion[]" type="checkbox"
                            value="I am eligible for all-LGBTQIA+ teams" id="lgbtqiaOnly">
                        <label class="custom-control-label" for="lgbtqiaOnly">
                            I am eligible for all-LGBTQIA+ teams
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="inclusion[]" type="checkbox"
                            value="I qualify for all-women or all-LGBTQIA+ teams but would not want to join one"
                            id="yesButNoJoin">
                        <label class="custom-control-label" for="yesButNoJoin">
                            I qualify for all-women or all-LGBTQIA+ teams but would not want to join one
                        </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" value="other" id="otherInclusion">
                        <label class="custom-control-label" for="otherInclusion">
                            Other
                        </label>
                        <label class="d-none" for="otherInclusionText">Other</label>
                        <input type="text" class="form-control mt-2" name="inclusion[]" id="otherInclusionText"
                            placeholder="Other" style="display: none">
                    </div>
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="questions">Do you have any other notes, questions or concerns for us?</label>
                    <textarea class="form-control" name="questions" id="questions" placeholder="Your questions:"
                        cols="30" rows="10"></textarea>
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="suggestions">How could we make this form better, improve the process, or make it easier
                        for you to try out?</label>
                    <textarea class="form-control" name="suggestions" id="suggestions" placeholder="Your suggestions:"
                        cols="30" rows="10"></textarea>
                </div>

                <div class="form-group pt-3 pb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
