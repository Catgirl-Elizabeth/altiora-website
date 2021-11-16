<?php

namespace App\Http\Controllers;

use App\Message;
use App\Staff;
use App\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }


    public function legal()
    {
        return view('legal.legal');
    }

    public function contact()
    {
        return view ('contact.contact');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'pronouns' => 'nullable',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new Message;
        $message->sender_name = $request->input('name');
        $message->sender_pronouns = $request->input('pronouns');
        $message->sender_email = $request->input('email');
        $message->message_subject = $request->input('subject');
        $message->message_body = $request->input('message');

        $saved = $message->save();
        if ($saved) {
            $webhookUrl = 'https://discord.com/api/webhooks/875934590269788160/g9LdT4ljLau0AaFUYYOpot7veDNwH33ModvltO_9Hm5SX3sdMxy8IR9ONUBHNKfyhp55';
            $sent = Http::post($webhookUrl, [
                'embeds' => [
                    [
                        'title' => 'Incoming message from the contact form!',
                        'fields' => [
                            [
                                'name' => 'Name',
                                'value' => $request->input('name')
                            ],
                            [
                                'name' => 'Pronouns',
                                'value' => $request->input('pronouns')
                            ],
                            [
                                'name' => 'Email',
                                'value' => $request->input('email')
                            ],
                            [
                                'name' => 'Subject',
                                'value' => $request->input('subject')
                            ],
                            [
                                'name' => 'Message',
                                'value' => $request->input('message')
                            ],
                        ]
                    ]
                ]
            ]);

            return redirect('/contact')->with('success', 'Your message has been sent succesfully!');
        }


        return redirect('/contact')->with('error', 'Failed to send your message. Please try again later.');
    }

    public function feedback()
    {
        return view('contact.feedback');
    }

    public function applications()
    {
        return view('contact.applications');
    }

    public function showPolicy()
    {
        return view('legal.privacy-policy');
    }

    public function test()
    {

        $wallpapers = Wallpaper::all();
//        dd($wallpapers);
        foreach ($wallpapers as $wallpaper) {
            Storage::disk('wallpaper')->delete($wallpaper->file_name);
            Storage::disk('wallpaper')->delete('thumbs/thumb_'.$wallpaper->file_name);

            $wallpaper->delete();
        }
        return true;
    }

}
