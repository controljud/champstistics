<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\GameModel as Game;
use App\model\TeamModel as Team;

class GameController extends Controller
{
    public function index(){
        $teams = Team::select('id', 'name')->where('name', '<>', '')->orderBy('name')->get();
        $games = Game::select('game.id', 't1.name', 'game.goals_h', 'game.goals_v', 't2.name')
            ->where('game.id', '<>', null)
            ->join('team as t1', 't1.id', 'id_team_h')
            ->join('team as t2', 't2.id', 'id_team_v')
            ->orderBy('game.id')->get();
        $year = date('Y');
        $count_game = Game::where('id_championship', 1)->count();
        $round = intval($count_game / 10) + 1;

        $data = [
            'teams' => $teams,
            'games' => $games,
            'year' => $year,
            'round' => $round,
        ];

        return view('game.index', $data);
    }

    public function store(Request $request){
        $id_team_h = $request->team_h;
        $id_team_v = $request->team_v;
        $goals_h = $request->goals_h ? $request->goals_h : 0;
        $goals_v = $request->goals_v ? $request->goals_v : 0;
        $date = $request->date;
        $year = $request->year;
        $round = $request->round;
        $id_championship = 1;

        $game = new Game;
        $game->id_championship = $id_championship;
        $game->id_team_h = $id_team_h;
        $game->id_team_v = $id_team_v;
        $game->goals_h = $goals_h;
        $game->goals_v = $goals_v;
        $game->date = $date;
        $game->year = $year;
        $game->round = $round;

        $game->save();

        return redirect()->route('game');
    }
}
