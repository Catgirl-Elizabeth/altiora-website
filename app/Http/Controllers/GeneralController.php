<?php

namespace App\Http\Controllers;

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

    public function banAppeal()
    {
        return view('ban-appeal');
    }
}
