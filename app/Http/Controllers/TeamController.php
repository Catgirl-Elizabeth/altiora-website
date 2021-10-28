<?php

namespace App\Http\Controllers;

use App\Member;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('sr', 'desc')->get();
        return view('teams.index', compact('teams'));

    }

    public function create()
    {
        $members = Member::orderBy('member_name')->get();
//        dd($members);
        return view('teams.create', compact('members'));
    }

    public function store(Request $request)
    {

        $team = new Team;
        $team->team_name = $request->input('teamname');
        $team->sr = $request->input('sr');
        $team->region = $request->input('region');
        $team->description = $request->input('description');
        $team->accolades = $request->input('accolades');

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $team->banner_name = $fileName;
            $team->banner_path = '/storage/' . $filePath;
        }

        $team->save();

        return redirect('/teams')->with('success', 'Team successfully created!');
    }

    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Team $team, Request $request)
    {


        $team->team_name = $request->input('teamname');
        $team->sr = $request->input('sr');
        $team->region = $request->input('region');
        $team->description = $request->input('description');
        $team->accolades = $request->input('accolades');

        if ($request->file()) {
            Storage::disk('public')->delete('uploads/' . $team->banner_name);
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $team->banner_name = $fileName;
            $team->banner_path = '/storage/' . $filePath;
        }


        $team->save();

        return redirect('/teams#'.$team->slug)->with('success', 'Team successfully edited!');
    }

    public function destroy(Request $request, Team $team)
    {
        $team->delete();
        return redirect('/teams');
    }
}
