<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\DiceHistory;
use App\Models\HandHistory;

class ScoreController extends Controller
{
    public function show()
    {
        $score = new Score();
        $data = ["score" => $score->highScore()];
        return view('score', $data);
    }
}
