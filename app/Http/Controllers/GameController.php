<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\GameModel as Game;
use App\model\TeamModel as Team;

class GameController extends Controller
{
    public function index(){
        return view('game.index');
    }

    public function store(){

    }
}
