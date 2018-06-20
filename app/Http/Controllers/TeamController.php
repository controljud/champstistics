<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\TeamModel as Team;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::select('id', 'name')->where('id', '<>', null)->orderBy('name')->get();
        return view('team.index', array('teams'=> $teams));
    }

    public function edit(){

    }

    public function store(Request $request){
        $name = $request->team_name;
        $image = $request->team_image;

        $team = new Team;
        $team->name = $name;
        $team->image = $image;
        $team->save();

        return redirect()->route('team');
    }
}
