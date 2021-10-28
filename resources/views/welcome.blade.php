@extends('layouts.app')
@section('title', 'Home')
@section('description', 'Altiora is an esports community founded on principles of sportsmanship, respect, and diversity. We aim to provide a safe space community for everyone who plays games. We host Overwatch teams at all levels across EU & NA as well as PUGs, Minecraft & community nights.')
@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col justify-content-center align-items-center">
                    <div class="image-container d-flex align-items-center justify-content-center">
                        <h1>Welcome to Altiora</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <p>Hello friend, welcome to Altiora!</p>
                    <p><strong>Altiora's mission is to change esports.</strong> We are here because we love games and we
                        believe that esports communities can be better - kinder, more respectful, more diverse, more
                        accessible, more collaborative. If you share our values, we would love you to join us.</p>
                    <p>We currently host teams across Europe & North America for Overwatch & Valorant. We also run
                        community events and pick-up games, we are organizing our third tournament, and we're looking to
                        build a stream team. If you want to get involved, the first step is to join our Discord
                        community and say hi!</p>

                </div>
                <div class="col-lg-4 offset-md-1">
                    <h2>News</h2>
                    <div class="twitter">
                        <a class="twitter-timeline" data-height="500" data-dnt="true"
                           href="https://twitter.com/Altiora_Gaming?ref_src=twsrc%5Etfw" target="_blank">Tweets only
                            available when cookies are enabled. Click here to check out what's happening on our
                            twitter!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-lg-3">
                    <a href="https://discord.gg/altiora" target="_blank">
                        <div class="shortcut">
                            <div class="shortcut-image text-center tile-1">
                                <h3>Community</h3>
                            </div>
                            <div class="shortcut-text">
                                <p>Interested in joining an inclusive and positive gaming community? Click here to join
                                    our Discord!</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="/teams">
                        <div class="shortcut">
                            <div class="shortcut-image text-center tile-2">
                                <h3>Teams</h3>
                            </div>
                            <div class="shortcut-text">
                                <p>We currently support teams for Overwatch and Valorant. Come tryout, receive coaching,
                                    and play against other communities!</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="/staff">
                        <div class="shortcut">
                            <div class="shortcut-image text-center tile-3">
                                <h3>Staff</h3>
                            </div>
                            <div class="shortcut-text">
                                <p>Our community is supported by our amazing volunteers.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
