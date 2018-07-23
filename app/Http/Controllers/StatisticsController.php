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

        $graph = $this->getGraph($game, $round);

        $data = [
            'graph' => $graph,
        ];

        return view('statistics.index', $data);
    }

    public function getDataGraph($game, $round){
        $graph = [];
        for($i = 1; $i <= $round; $i++){
            $teams = [];
            $games = $game->getGames($i);
            foreach($games as $gm){
                $team_h = $gm->team_h;
                $team_v = $gm->team_v;
                $goal_h = $gm->goals_h;
                $goal_v = $gm->goals_v;

                $pt_h = 0; $pt_v = 0;
                $vt_h = 0; $vt_v = 0;
                $ep_h = 0; $ep_v = 0;
                $dr_h = 0; $dr_v = 0;

                if($goal_h > $goal_v){
                    $pt_h = 3;
                    $vt_h = 1; $dr_v = 1;
                }else if($goal_h < $goal_v){
                    $pt_v = 3;
                    $vt_v = 1; $dr_h = 1;
                }else{
                    $pt_h = 1; $pt_v = 1;
                    $ep_h = 1; $ep_v = 1;
                }

                $teams[$team_h] = isset($teams[$team_h]) ? $game->setDataTeam($teams, $team_h, $pt_h, $vt_h, $ep_h, $dr_h, $goal_h, $goal_v) : $game->setNewDataTeam($teams, $team_h, $pt_h, $vt_h, $ep_h, $dr_h, $goal_h, $goal_v);
                $teams[$team_v] = isset($teams[$team_v]) ? $game->setDataTeam($teams, $team_v, $pt_v, $vt_v, $ep_v, $dr_v, $goal_v, $goal_h) : $game->setNewDataTeam($teams, $team_v, $pt_v, $vt_v, $ep_v, $dr_v, $goal_v, $goal_h);
            }

            usort($teams, function($a, $b){
                return ($b->points - $a->points);
            });
            $graph[] = $teams;
        }

        return $graph;
    }

    public function getGraph($graph){

    }
}