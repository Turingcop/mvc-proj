<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yatzy;
use App\Models\DiceHistory;
use App\Models\HandHistory;
use App\Models\Score;

class YatzyController extends Controller
{
    public function start()
    {
        // $diceHistory = new DiceHistory();
        $game = new Yatzy("App\Models\YatzyHand", "App\Models\DiceGraphic", 5, new DiceHistory(), new HandHistory(), new Score());
        session(['game' => $game]);
        $data = $game->presentGame();
        $data['action'] = url($data['action']);
        return view('yatzy', $data);
    }

    public function play()
    {
        $data = session('game')->/** @scrutinizer ignore-call */ playGame();
        $data['action'] = url($data['action']);
        return view('yatzy', $data);
    }

    public function reset()
    {
        session(['game' => '']);
        return redirect("/yatzy");
    }
}
