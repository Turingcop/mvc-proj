<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\DiceHistory;
use App\Models\HandHistory;

class ScoreController extends Controller
{
    public function __construct()
    {
        $score = new Score();
        $this->score = $score->all();
    }

    public function desc()
    {
        $data = [];
        $data["score"] = $this->score->sortByDesc('score');
        return view('score', $data);
    }
}
