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
        $data = [];
        $data["score"] = Score::all()->sortByDesc('score')->values();
        return view('score', $data);
    }
}
