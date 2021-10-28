<?php

namespace App\Http\Controllers;

use App\Pronoun;
use App\Role;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::get()->sortBy(function ($q) {
            return $q->roles[0]->id;
        });
        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        $pronouns = Pronoun::all();
        $roles = Role::all();
        return view('staff.create', compact('roles', 'pronouns'));
    }

    public function makeDirectory()
    {
        $paths = [
            'image_path' => public_path('img/staff/'),
            'thumb_path' => public_path('img/staff/thumbs/')
        ];

        foreach ($paths as $key => $path) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
        }

        $this->imagesPath = $paths['image_path'];
        $this->thumbnailPath = $paths['thumb_path'];
    }

    public function store(Request $request)
    {
        $staff = new Staff;
        $staff->staff_name = $request->input('name');
        $staff->funfact = $request->input('funfact');
        $staff->twitter = $request->input('twitter');
        $staff->instagram = $request->input('instagram');
        $staff->facebook = $request->input('facebook');
        $staff->twitch = $request->input('twitch');

        if ($request->file()) {
            $this->makeDirectory();
            $file = $request->file('file');
            $image = Image::make($file);
            $imageName = time() . '_' . str_replace(' ', '_', $request->input('name'));
            $image->save($this->imagesPath . $imageName);
            $image->heighten(300);
            $image->save($this->thumbnailPath . 'thumb_' . $imageName);

            $staff->file_name = $imageName;
            $staff->save();
            $staff->roles()->attach($request->input('roles'));
            $staff->pronouns()->attach($request->input('pronouns'));

            return redirect('/staff')->with('success', 'Staff member successfully created!');
        }
        return redirect('/staff')->with('error', 'Oops, something went wrong :(');
    }

}
