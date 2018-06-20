<?php

namespace App\Http\Controllers;

use App\model\ChampionshipModel;
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
        $game = new Game;
        $round = $game->select('round')->max('round');
        $games = $game->getGames($round, 1);

        $count_games = Game::where('id_championship', 1)->count();
        $count_teams = Team::count();
        $count_champ = Championship::count();
        $rankingObj = $game->getRanking();

        usort($rankingObj, function($a, $b){
            return ($b->points - $a->points);
        });

        $data = [
            'games' => $games,
            'count_games' => $count_games,
            'count_teams' => $count_teams,
            'count_champ' => $count_champ,
            'round' => $round,
            'ranking' => $rankingObj
        ];

        return view('home', $data);
    }
}