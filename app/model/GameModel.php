<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GameModel extends Model
{
    public $table = 'game';

    public function getGames($round, $championship = 1){
        $games = $this::select('game.id', 'game.id_team_h', 't1.name as team_h', 'game.goals_h', 'game.goals_v', 'game.id_team_v', 't2.name as team_v')
            ->where('game.id', '<>', null)
            ->where('game.round', $round)
            ->where('game.id_championship', $championship)
            ->join('team as t1', 't1.id', 'id_team_h')
            ->join('team as t2', 't2.id', 'id_team_v')
            ->orderBy('game.id')->get();

        return $games;
    }

    public function getAllGames($championship = 1){
        $games = $this::select('game.id', 'game.id_team_h', 't1.name as team_h', 'game.goals_h', 'game.goals_v', 'game.id_team_v', 't2.name as team_v')
            ->where('game.id', '<>', null)
            ->where('game.id_championship', $championship)
            ->join('team as t1', 't1.id', 'id_team_h')
            ->join('team as t2', 't2.id', 'id_team_v')
            ->orderBy('game.id')->get();

        return $games;
    }

    public function getRanking(){
        $teams = [];
        $games = $this->getAllGames();
        foreach($games as $game){
            $team_h = $game->team_h;
            $team_v = $game->team_v;
            $goal_h = $game->goals_h;
            $goal_v = $game->goals_v;

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

            $teams[$team_h] = isset($teams[$team_h]) ? $this->setDataTeam($teams, $team_h, $pt_h, $vt_h, $ep_h, $dr_h, $goal_h, $goal_v) : $this->setNewDataTeam($teams, $team_h, $pt_h, $vt_h, $ep_h, $dr_h, $goal_h, $goal_v);
            $teams[$team_v] = isset($teams[$team_v]) ? $this->setDataTeam($teams, $team_v, $pt_v, $vt_v, $ep_v, $dr_v, $goal_v, $goal_h) : $this->setNewDataTeam($teams, $team_v, $pt_v, $vt_v, $ep_v, $dr_v, $goal_v, $goal_h);
        }

        return $teams;
    }

    public function setNewDataTeam($teams, $team, $pt, $vt, $ep, $dr, $goal_p, $goal_d){
        $teams[$team] = new \stdClass;
        $teams[$team]->points = $pt;
        $teams[$team]->victory = $vt;
        $teams[$team]->draw = $ep;
        $teams[$team]->defeat = $dr;
        $teams[$team]->round = 1;
        $teams[$team]->goal_p = $goal_p;
        $teams[$team]->goal_d = $goal_d;
        $teams[$team]->name = $team;

        return $teams[$team];
    }

    public function setDataTeam($teams, $team, $pt, $vt, $ep, $dr, $goal_p, $goal_d){
        $teams[$team]->points += $pt;
        $teams[$team]->victory += $vt;
        $teams[$team]->draw += $ep;
        $teams[$team]->defeat += $dr;
        $teams[$team]->round += 1;
        $teams[$team]->goal_p += $goal_p;
        $teams[$team]->goal_d += $goal_d;

        return $teams[$team];
    }

    public function getGraph($round){
        $graph = [];
        for($i = 1; $i <= $round; $i++){
            $teams = [];
            $games = $this->getGames($i);
            foreach($games as $game){
                $team_h = $game->team_h;
                $team_v = $game->team_v;
                $goal_h = $game->goals_h;
                $goal_v = $game->goals_v;

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

                $teams[$team_h] = isset($teams[$team_h]) ? $this->setDataTeam($teams, $team_h, $pt_h, $vt_h, $ep_h, $dr_h, $goal_h, $goal_v) : $this->setNewDataTeam($teams, $team_h, $pt_h, $vt_h, $ep_h, $dr_h, $goal_h, $goal_v);
                $teams[$team_v] = isset($teams[$team_v]) ? $this->setDataTeam($teams, $team_v, $pt_v, $vt_v, $ep_v, $dr_v, $goal_v, $goal_h) : $this->setNewDataTeam($teams, $team_v, $pt_v, $vt_v, $ep_v, $dr_v, $goal_v, $goal_h);
            }

            usort($teams, function($a, $b){
                return ($b->points - $a->points);
            });
            $graph = $teams;
        }

        return $graph;
    }
}
