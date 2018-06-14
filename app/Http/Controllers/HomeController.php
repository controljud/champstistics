<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\GameModel as Game;
use App\model\TeamModel as Team;
use App\model\ChampionshipModel as Championship;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $round = Game::select('round')->max('round');
        $games = Game::select('game.id', 't1.name as team_h', 'game.goals_h', 'game.goals_v', 't2.name as team_v')
            ->where('game.id', '<>', null)
            ->where('game.round', $round)
            ->where('game.id_championship', 1)
            ->join('team as t1', 't1.id', 'id_team_h')
            ->join('team as t2', 't2.id', 'id_team_v')
            ->orderBy('game.id')->get();
        $count_games = Game::where('id_championship', 1)->count();
        $count_teams = Team::count();
        $count_champ = Championship::count();

        $data = [
            'games' => $games,
            'count_games' => $count_games,
            'count_teams' => $count_teams,
            'count_champ' => $count_champ,
            'round' => $round,
        ];

        return view('home', $data);
    }
}
