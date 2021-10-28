@extends('layouts.app')
@section('title', 'Altiora Role Application')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <h2>Altiora Role Application</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9 mb-3 border-r-5 p-3">
            <p>The Altiora role allows you access to most of the channels and resources in our Discord. We give it
                to members and friends of our community who we trust to be respectful and non-toxic, which helps the
                Altiora channels to remain positive and safe. </p>
            <p>You do not have to apply through the form. You can qualify for the Altiora role by having any current
                Altiora member vouch for you, by trying out for a team and being accepted, or by being an active
                member of a partner organization. A current member can message anyone from Mods or Ops staff to
                vouch for you. You can also post in our LFT channel or message Operations staff to ask about
                tryouts. </p>
            <p>If none of the above fit you or if it's just easier for you, you can apply through the form
                below. </p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9 mb-3 border-r-5 p-3">
            <form method="POST" action="{{ route('applications.altiora.send') }}">
                @csrf

                <div class="form-group pt-3 pb-3">
                    <label for="discordTag">Who are you? *</label>
                    <small id="discordTagHelp" class="form-text text-muted">Please give discord tag and/or the name
                        you go by, so we can identify you if ypu change your nickname.</small>
                    <input type="text" class="form-control mt-2" name="discordTag" id="discordTag"
                        aria-describedby="discordTagHelp" placeholder="Your Discord Tag:">
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="vouch">Do you know an Altiora member who would be
                        willing to vouch for you?</label>
                    <small class="form-text text-muted" id="vouchHelp">They will need to message us from their
                        account confirming
                        that they know you or have played with you and believe you are non-toxic.</small>
                    <input type="text" class="form-control mt-2" name="vouch" id="vouch" aria-describedby="vouchHelp"
                        placeholder="Their Discord Tag:">
                </div>
                <div class="form-group pt-3 pb-3">
                    <label for="partnerServer">Are you an active member of a partner server? If so, please give the
                        name of a staff member (for the partner server) that we could contact to verify you.</label>
                    <small class="form-text text-muted" id="partnerServerHelp">You do not have to do this if you
                        already qualify through another
                        route. If you have a specific staff or trusted role in a partner server, we can also simply
                        verify you that way.</small>
                    <input type="text" class="form-control mt-2" name="partnerServer" id="partnerServer"
                        aria-describedby="partnerServerHelp" placeholder="Discord Tag of the staff member:">
                </div>
                <div class="form-group pt-3 pb-3">
                    <p>Would you like to try out for a team?</p>
                    <div class="form-group">
                        <label class="d-none" for="tryout">Tryout</label>
                        <select class="form-control join-team-select" id="tryout" name="tryout">
                            <option value="">-- Please choose an option --</option>
                            <option value="Yes, ASAP">Yes, ASAP</option>
                            <option value="Yes, at some point">Yes, at some point</option>
                            <option value="Maybe">Maybe</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="form-group pt-3 pb-3">
                    <p>If you do not have a specific person to vouch for you, do any of the following apply?</p>
                    <small class="form-text text-muted">If you don't have a specific person who can vouch for you
                        but you have hung out with several different people, you can choose "Other" and write their
                        names.</small>
                    <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox" class="custom-control-input" name="activities[]" id="chatting"
                            value="I talk in text chats">
                        <label class="custom-control-label" for="chatting">I talk sometimes or often in Altiora text
                            chats.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="activities[]" id="communityNight"
                            value="I have been to Community Night regularly">
                        <label for="communityNight" class="custom-control-label">I have been to Community Night
                            regularly.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="pugs" name="activities[]"
                            value="I have been to PUGs regularly">
                        <label for="pugs" class="custom-control-label">I have been to PUGs regularly.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="playTogether" name="activities[]"
                            value="I regularly group up with a variety of people for QP/Comp in Altiora">
                        <label for="playTogether" class="custom-control-label">I regularly group up with a variety of
                            people for QP/Comp in Altiora.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="coaching" name="activities[]"
                            value="I have had coaching sessions with Altiora coaches">
                        <label for="coaching" class="custom-control-label">I have had coaching sessions with Altiora
                            coaches.</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" value="other" id="otherActivity">
                        <label class="custom-control-label" for="otherActivity">
                            Other
                        </label>
                        <label class="d-none" for="otherActivityText">Other</label>
                        <input type="text" class="form-control mt-2" name="activities[]" id="otherActivityText"
                            placeholder="Other" style="display: none">
                    </div>
                </div>
                <div class="form-group pt-3 pb-3">
                    <p>[OPTIONAL] Are you a member of one of our Diversity & Inclusion target audiences?</p>
                    <small class="form-text text-muted">These are groups we put particular effort into recruiting to
                        ensure we maintain a diverse
                        community and welcoming environment. We are passionate about supporting marginalised
                        communities in esports, and we host some teams which are women and LGBTQIA+ only. You do not
                        have to answer.</small>
                    <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox" class="custom-control-input" id="womenOnly" name="inclusion[]"
                            value="I'm eligible for all-women teams">
                        <label for="womenOnly" class="custom-control-label">I am eligible for all-women teams</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="lgbtqiaOnly" name="inclusion[]"
                            value="I'm eligible for LGBTQIA+ only teams">
                        <label for="lgbtqiaOnly" class="custom-control-label">I am eligible for LGBTQIA+ only
                            teams</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="disabled" name="inclusion[]"
                            value="I'm disabled">
                        <label for="disabled" class="custom-control-label">I am disabled</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="neurodiverse" name="inclusion[]"
                            value="I'm neurodiverse">
                        <label for="neurodiverse" class="custom-control-label">I am neurodiverse</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ethnicMinority" name="inclusion[]"
                            value="I belong to an ethnic, religious or linguistic minority">
                        <label for="ethnicMinority" class="custom-control-label">I belong to an ethnic, religious or
                            linguistic minority</label>
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
                    <label for="suggestions">Is there any way we could improve this form to make the application process
                        better?</label>
                    <textarea name="suggestions" id="suggestions" cols="30" rows="10" class="form-control"
                        placeholder="Your suggestions:"></textarea>
                </div>
                <div class="form-group pt-3 pb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
