<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\BoardInterface;

class ScoreBoard extends Model implements BoardInterface
{
    use HasFactory;

    public object $handHistory;
    public object $upperBoard;
    public object $lowerBoard;

    public function __construct($handHistory)
    {
        $this->upperBoard = new UpperBoard();
        $this->lowerBoard = new LowerBoard();
        $this->handHistory = $handHistory;

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

    public function boardSum($boards)
    {
        $score = $boards[0]->board["Summa"] + $boards[1]->board["Summa"];
        return $score;
    }

    public function calcScore($roll, $hand): void
    {
        if (in_array($hand, array_keys($this->lowerBoard->board))) {
            $this->lowerBoard->calcScore($roll, $hand);
            $this->handHistory->create(['hand' => $hand, 'value' => $this->lowerBoard->board[$hand]]);
            return;
        }
        $this->upperBoard->calcScore($roll, $hand);
        $this->handHistory->create(['hand' => $hand, 'value' => $this->upperBoard->board[$hand]]);
    }
}
