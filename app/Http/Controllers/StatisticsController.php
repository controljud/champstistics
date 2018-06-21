<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\StatisticModel as Statistic;
use App\model\GameModel as Game;

class StatisticsController extends Controller
{
    public function index(){
        $game = new Game;
        $round = $game->select('round')->max('round');

        $graph = $game->getGraph($round);

        $data = [
            'graph' => $graph,
        ];

        return view('statistics.index', $data);
    }
}