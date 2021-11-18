<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

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
        $data["score"] = $this->score->sortByDesc('score')->values();
        $data["pointhref"] = "score/pointsasc";
        return view('score', $data);
    }

    public function asc()
    {
        $data = [];
        $data["score"] = $this->score->sortBy('score')->values();
        $data["pointhref"] = url("/score");
        return view('score', $data);
    }
}
