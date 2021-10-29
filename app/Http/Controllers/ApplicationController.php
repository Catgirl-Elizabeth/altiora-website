<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApplicationController extends Controller
{
    public function team()
    {
        return view('contact.applications.team');
    }

    public function postTeam(Request $request)
    {

        // dd($request);
        $discord = "N/A";
        if ($request->input('discordTag')) {
            $discord = $request->input('discordTag');
        }

        $region = "N/A";
        if ($request->input('region')) {
            $region = $request->input('region');
        }

        $role = "N/A";
        if ($request->input('role')) {
            $role = implode(", ", $request->input('role'));
        }

        $rank = "N/A";
        if ($request->input('rank')) {
            $rank = $request->input('rank');
        }

        $peak = "N/A";
        if ($request->input('peak')) {
            $peak = $request->input('peak');
        }

        $availability = "N/A";
        if ($request->input('availability')) {
            $availability = implode(", ", $request->input('availability'));
        }

        $concerns = "N/A";
        if ($request->input('concerns')) {
            $concerns = $request->input('concerns');
        }

        $inclusion = "N/A";
        if ($request->input('inclusion')) {
            $inclusion = implode(", ", $request->input('inclusion'));
        }

        $questions = "N/A";
        if ($request->input('questions')) {
            $questions = $request->input('questions');
        }

        $suggestions = "N/A";
        if ($request->input('suggestions')) {
            $suggestions = $request->input('suggestions');
        }

        // dump($discord, $region, $role, $rank, $peak, $availability, $concerns, $inclusion, $questions, $suggestions);

        $teamWebhook = '';

        $response = Http::post($teamWebhook, [
            'embeds' => [
                [
                    'title' => 'Incoming team application!',
                    'fields' => [
                        [
                            'name' => 'Who are you?',
                            'value' => $discord
                        ],
                        [
                            'name' => 'Which region are you applying for?',
                            'value' => $region
                        ],
                        [
                            'name' => 'What role do you want to play?',
                            'value' => $role
                        ],
                        [
                            'name' => 'What rank (SR) are you typically or currently at?',
                            'value' => $rank
                        ],
                        [
                            'name' => 'What is your peak SR?',
                            'value' => $peak
                        ],
                        [
                            'name' => 'When are you available for team practices & tournaments?',
                            'value' => $availability
                        ],
                        [
                            'name' => 'Do you have any other comments or concerns about your schedule?',
                            'value' => $concerns
                        ],
                        [
                            'name' => 'Are you eligible for Diversity & Inclusion teams?',
                            'value' => $inclusion
                        ],
                        [
                            'name' => 'Do you have any other notes, questions or concerns for us?',
                            'value' => $questions
                        ],
                        [
                            'name' => 'How could we make this form better, improve the process, or make it easier for you to try out?',
                            'value' => $suggestions
                        ]
                    ]
                ]
            ]
        ]);

        if ($response) {
            return redirect('/applications')->with('success', 'Application sent!');
        }

        return redirect('/applications/team')->with('error', 'Oops, something went wrong.');
    }

    public function altiora()
    {
        return view('contact.applications.altiora');
    }

    public function postAltiora(Request $request)
    {
        //dd($request);

        $discord = "N/A";
        if ($request->input('discordTag')) {
            $discord = $request->input('discordTag');
        }

        $vouch = "N/A";
        if ($request->input('vouch')) {
            $vouch = $request->input('vouch');
        }

        $partnerServer = "N/A";
        if ($request->input('partnerServer')) {
            $partnerServer = $request->input('partnerServer');
        }

        $tryout = "N/A";
        if ($request->input('tryout')) {
            $tryout = $request->input('tryout');
        }

        $activities = "N/A";
        if ($request->input('activities')) {
            $activities = implode(", ", $request->input('activities'));
        }

        $inclusion = "N/A";
        if ($request->input('inclusion')) {
            $inclusion = implode(", ", $request->input('inclusion'));
        }

        $suggestions = "N/A";
        if ($request->input('suggestions')) {
            $suggestions = $request->input('suggestions');
        }

        $altioraWebhook = '';

        $response = Http::post($altioraWebhook, [
            'embeds' => [
                [
                    'title' => 'Incoming Altiora application!',
                    'fields' => [
                        [
                            'name' => 'Who are you?',
                            'value' => $discord
                        ],
                        [
                            'name' => 'Do you know an Altiora member who would be willing to vouch for you?',
                            'value' => $vouch
                        ],
                        [
                            'name' => 'Are you an active member of a partner server? If so, please give the name of a staff member (for the partner server) that we could contact to verify you.',
                            'value' => $partnerServer
                        ],
                        [
                            'name' => 'Would you like to try out for a team?',
                            'value' => $tryout
                        ],
                        [
                            'name' => 'If you do not have a specific person to vouch for you, do any of the following apply?',
                            'value' => $activities
                        ],
                        [
                            'name' => 'Are you a member of one of our Diversity & Inclusion target audiences?',
                            'value' => $inclusion
                        ],
                        [
                            'name' => 'Is there any way we could improve this form to make the application process better?',
                            'value' => $suggestions
                        ]
                    ]
                ]
            ]
        ]);

        if ($response) {
            return redirect('/applications')->with('success', 'Application sent!');
        }

        return redirect('/applications/altiora')->with('error', 'Oops, something went wrong.');
    }

    public function staff()
    {
        return view('contact.applications.staff');
    }

    public function postStaff(Request $request)
    {
        $discord = "N/A";
        if ($request->input('discordTag')) {
            $discord = $request->input('discordTag');
        }

        $roles = "N/A";
        if ($request->input('role')) {
            $roles = implode(", ", $request->input('role'));
        }

        $preferredRole = "N/A";
        if ($request->input('preferredRole')) {
            $preferredRole = $request->input('preferredRole');
        }

        $reason = "N/A";
        if ($request->input('why')) {
            $reason = $request->input('why');
        }

        $questions = "N/A";
        if ($request->input('questions')) {
            $questions = $request->input('questions');
        }

        $nominations = "N/A";
        if ($request->input('nominations')) {
            $nominations = $request->input('nominations');
        }

        $suggestions = "N/A";
        if ($request->input('suggestions')) {
            $suggestions = $request->input('suggestions');
        }

        $staffWebhook = '';

        $response = Http::post($staffWebhook, [
            'embeds' => [
                [
                    'title' => 'Incoming staff application!',
                    'fields' => [
                        [
                            'name' => 'Who are you?',
                            'value' => $discord
                        ],
                        [
                            'name' => 'What would you be interested in, or willing to do?',
                            'value' => $roles
                        ],
                        [
                            'name' => 'Which role would you prefer, or be most interested in?',
                            'value' => $preferredRole
                        ],
                        [
                            'name' => 'Why do you want to be staff/ why would you be good at it? Have you done similar things before?',
                            'value' => $reason
                        ],
                        [
                            'name' => 'Do you have any questions or concerns about being staff? Could we helping resolve those by eg. providing a mentor?',
                            'value' => $questions
                        ],
                        [
                            'name' => 'Would you like to nominate someone else who you think would be a great staff member?',
                            'value' => $nominations
                        ],
                        [
                            'name' => 'How could we improve this form and/or make it easier to apply?',
                            'value' => $suggestions
                        ]
                    ]
                ]
            ]
        ]);

        if ($response) {
            return redirect('/applications')->with('success', 'Application sent!');
        }

        return redirect('/applications/staff')->with('error', 'Oops, something went wrong.');
    }
}
