<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BoardSum;

class UpperBoard extends Model
{
    use HasFactory;
    use BoardSum;

    public array $board;

    public function __construct()
    {
        $this->board = [
            "Ettor" => 0,
            "Tvåor" => 0,
            "Treor" => 0,
            "Fyror" => 0,
            "Femmor" => 0,
            "Sexor" => 0,
            "Summa" => 0,
            "Bonus" => 0,
        ];

        $this->hands = [
            "Ettor" => 1,
            "Tvåor" => 2,
            "Treor" => 3,
            "Fyror" => 4,
            "Femmor" => 5,
            "Sexor" => 6
        ];
    }

    public function calcScore($roll, $hand)
    {
        // $handHistory = new HandHistory();
        $score = 0;
        foreach ($roll as $die) {
            if ($die == $this->hands[$hand]) {
                $score += $die;
            }
        }
        $this->board[$hand] = $score;

        // $handHistory->create(['hand' => $hand, 'value' => $score]);
    }
}
