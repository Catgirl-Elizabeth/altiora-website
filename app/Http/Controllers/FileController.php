<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $downloads = File::all();
        return view('downloads.index', compact('downloads'));
    }

    public function create()
    {
        return view ('downloads.create');
    }

    public function store(Request $r)
    {

        $file = new File;

        if($r->file()) {
            $fileName = time().'_'. str_replace(' ', '_', $r->file('file')->getClientOriginalName());
            $filePath = $r->file('file')->storeAs('uploads', $fileName, 'public');

            $file->name = $fileName;
            $file->slug = $r->slug;
            $file->file_path = '/storage/'.$filePath;
            $file->save();

            return redirect('/documents')->with('success', 'Document successfully uploaded.');
        }
        return redirect('/documents/upload')->with('error', 'Oops, something went wrong.');
    }
}
