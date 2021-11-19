<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreBoard extends Model
{
    use HasFactory;

    public function __construct()
    {
        $this->upperBoard = new UpperBoard();
        $this->lowerBoard = new LowerBoard();

        $this->boardHands = [
            "Ettor",
            "Tvåor",
            "Treor",
            "Fyror",
            "Femmor",
            "Sexor",
            "Par",
            "Tvåpar",
            "Tretal",
            "Fyrtal",
            "Kåk",
            "Liten stege",
            "Stor stege",
            "Chans",
            "Yatzy"
        ];
    }

    public function calcBothSum()
    {
        $this->upperBoard->board = $this->upperBoard->boardSum($this->upperBoard->board);
        $this->lowerBoard->board = $this->lowerBoard->boardSum($this->lowerBoard->board);
    }

    public function sumScore()
    {
        $score = $this->upperBoard->board["Summa"] + $this->lowerBoard->board["Summa"];
        return $score;
    }

    public function calcScore($roll, $hand)
    {
        $handHist = new HandHistory();
        $score = 0;

        if (in_array($hand, array_keys($this->lowerBoard->board))) {
            $score = $this->lowerBoard->calcScore($roll, $hand);
            $handHist->create(['hand' => $hand, 'value' => $this->lowerBoard->board[$hand]]);
            return;
        }
        $score = $this->upperBoard->calcScore($roll, $hand);
        $handHist->create(['hand' => $hand, 'value' => $this->upperBoard->board[$hand]]);
    }
}
