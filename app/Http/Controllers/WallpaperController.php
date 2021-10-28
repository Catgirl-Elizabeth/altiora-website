<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallpaper;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class WallpaperController extends Controller
{
    public function index()
    {
        $wallpapers = Wallpaper::orderBy('id', 'desc')->get();
        return view('wallpapers.index', compact('wallpapers'));
    }

    /**
     * @function makeDirectory
     * create required directory if it doesnt exist and set perms
     */
    public function makeDirectory()
    {
        $paths = [
            'image_path' => public_path('img/wallpapers/'),
            'thumb_path' => public_path('img/wallpapers/thumbs/')
        ];

        foreach ($paths as $key => $path) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
        }

        $this->imagesPath = $paths['image_path'];
        $this->thumbnailPath = $paths['thumb_path'];
    }

    public function create()
    {
        return view('wallpapers.create');
    }

    public function store(Request $request)
    {
//        dd($request->file('file'));
        if ($request->file()) {
            $this->makeDirectory();
            $file = $request->file('file');
            $image = Image::make($file);
            $imageName = time().'_'.str_replace(' ', '_',$file->getClientOriginalName());
            $image->save($this->imagesPath.$imageName);
            $image->heighten(300);
            $image->save($this->thumbnailPath.'thumb_'.$imageName);

            $wallpaper = new Wallpaper;
            $wallpaper->file_name = $imageName;
            $wallpaper->save();

            return redirect('/wallpapers')->with('success', 'Wallpaper successfully uploaded!');
        }
        return redirect('/wallpapers/upload')->with('error', 'Oops, something went wrong.');
    }
}
