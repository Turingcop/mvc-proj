<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistics;

class StatController extends Controller
{
    public function show()
    {
        $stats = new Statistics();
        $data = $stats->getStats();
        return view('index', $data);
    }
}
