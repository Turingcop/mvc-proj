<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiceController extends Controller
{
    public function show()
    {
        $dice = new Dice();
        $dice->roll();

        return view('test', ['res' => $dice->getLastRoll()]);
    }
}
