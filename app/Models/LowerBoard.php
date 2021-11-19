<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BoardSum;

class LowerBoard extends Model
{
    use HasFactory;
    use BoardSum;

    public array $board;

    public function __construct()
    {
        $this->board = [
            "Par" => 0,
            "Tvåpar" => 0,
            "Tretal" => 0,
            "Fyrtal" => 0,
            "Kåk" => 0,
            "Liten stege" => 0,
            "Stor stege" => 0,
            "Chans" => 0,
            "Yatzy" => 0,
            "Summa" => 0
        ];
    }

    private function countDuplicates($roll)
    {
        $dupes = [];
        foreach ($roll as $die) {
            if (isset($dupes[$die])) {
                $dupes[$die] += 1;
                continue;
            }
            $dupes[$die] = 1;
        }
        return $dupes;
    }

    private function scoreDuplicates($dupes, $hand)
    {
        $num = 0;
        switch ($hand) {
            case "Par":
                $num = 2;
                break;
            case "Tretal":
                $num = 3;
                break;
            case "Fyrtal":
                $num = 4;
                break;
            default:
                return;
        }

        $score = 0;
        foreach ($dupes as $key => $val) {
            if ($val >= $num) {
                $score = $key * $num;
            }
        }
        $this->board[$hand] = $score;
    }

    private function fullHouse($dupes, $hand)
    {
        if ($hand != "Kåk") {
            return;
        }

        $score = 0;
        if (in_array(2, $dupes) && in_array(3, $dupes)) {
            foreach ($dupes as $key => $val) {
                $score += $key * $val;
            }
        }
        $this->board["Kåk"] = $score;
    }

    private function doublePairs($dupes, $hand)
    {
        $score = 0;
        if ($hand != "Tvåpar") {
            return;
        }
        if (count($dupes) < 2 || count($dupes) > 3) {
            $this->board["Tvåpar"] = 0;
            return;
        }

        $pair = 0;
        foreach ($dupes as $die => $count) {
            if ($count >= 2 && $die > $pair) {
                $score = $die * 2;
            }
        }
        $this->board["Tvåpar"] = $score;
    }

    private function calcStraight($roll, $hand)
    {
        sort($roll);
        switch ($hand) {
            case "Liten stege":
                $this->board[$hand] = $roll == [1, 2, 3, 4, 5] ? 15 : 0;
                break;
            case "Stor stege":
                $this->board[$hand] = $roll == [2, 3, 4, 5, 6] ? 20 : 0;
                break;
            default:
                return;
        }
    }

    private function calcChance($roll, $hand)
    {
        if ($hand != "Chans") {
            return;
        }
        $score = 0;
        foreach ($roll as $die) {
            $score += $die;
        }
        $this->board["Chans"] = $score;
    }

    private function calcYatzy($dupes, $hand)
    {
        if ($hand != "Yatzy") {
            return;
        }
        $score = count($dupes) == 1 ? 50 : 0;
        $this->board["Yatzy"] == $score;
    }

    public function calcScore($roll, $hand, $test = null)
    {
        $dupes = $this->countDuplicates($roll);
        
        $this->scoreDuplicates($dupes, $hand);
        $this->doublePairs($dupes, $hand);
        $this->calcYatzy($dupes, $hand);
        $this->fullHouse($dupes, $hand);
        $this->calcStraight($roll, $hand);
        $this->calcChance($roll, $hand);
    }
}
