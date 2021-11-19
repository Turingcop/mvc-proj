<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\YatzyCheat;

class Yatzy
{
    use HasFactory;

    // use YatzyCheat;

    private $playerhand;
    private $presentationHand;
    private array $boardValues;
    private int $round = 1;
    private int $rolls = 0;
    private ?string $disable = null;
    public ?string $playername = null;
    public ?string $scorekey = null;
    public array $scorekeys;

    public function __construct($dicehand, $dice, $amount, $highScore)
    {
        $this->scoreboard = new ScoreBoard();
        $this->playerhand = new $dicehand($dice, $amount);
        $this->boardValues = $this->scoreboard->boardHands;
        $this->highScore = $highScore;
    }

    private function updateScorekeys($hand)
    {
        $index = array_search($hand, $this->boardValues);
        array_splice($this->boardValues, $index, 1);
    }

    public function presentGame()
    {
        $this->presentationHand = new YatzyHand("App\Models\DiceCheat", 5);
        $data = [
            "header" => "Yatzy",
            "title" => "Yatzy",
            "action" => "/yatzy",
            "playlabel" => "Börja",
            "name" => 'playername'
           ];

        $this->presentationHand->roll();
        $present = $this->presentationHand->getLastGraphic();
        $data["present"] = "";
        foreach ($present as $die) {
            $data["present"] .= "<label>{$die}</label> ";
        }

        $data["scoreboardUpper"] = $this->scoreboard->upperBoard->board;
        $data["scoreboardLower"] = $this->scoreboard->lowerBoard->board;
        $data["scorekeys"] = $this->boardValues;
        return $data;
    }

    private function setName()
    {
        $data = [];
        $data['playername'] = $_POST['playername'] ?? $this->playername;
        $this->playername = $_POST['playername'] ?? $this->playername;
        $data["disabled"] = 'disabled';
        return $data;
    }

    private function highScore()
    {
        $data = [];
        $score = new Score();
        $scoreSort = $score->all()->sortByDesc('score')->values();
        $tenth = $scoreSort[9]->score ?? 0;
        if ($this->scoreboard->sumScore() > $tenth) {
            $data['flash'] = "Grattis, din poäng placerar dig bland de tio bästa!";
            $score->create([
                'score' => $this->scoreboard->sumScore(),
                'name' => $this->playername,
            ]);
        }

        if ($score->all()->offsetExists(10)) {
            $score->all()->sortByDesc('score')->last()->delete();
        }

        return $data;
    }

    public function playGame()
    {
        $data = [
            "header" => "Yatzy",
            "title" => "Yatzy",
            "action" => "/yatzy",
            "playlabel" => "Kasta",
            "round" => $this->round,
           ];
        $data = array_merge($data, $this->setName());
        $this->disable = null;

        if (isset($_POST["dice"])) {
            foreach ($_POST["dice"] as $val) {
                $this->playerhand->saveDice(intval($val));
            };
        }

        $this->rolls++;
        $this->playerhand->roll();

        $lastRoll = $this->playerhand->getLastRoll()[0];
        $diceHistory = new DiceHistory();
        foreach ($lastRoll as $die) {
            $diceHistory->increaseValCount($die);
        }

        if ($this->rolls == 3) {
            $this->disable = "disabled";
            $this->lastroll = $this->playerhand->getLastRoll()[0];
            $data["playlabel"] = "Vidare";
        }

        if ($this->rolls == 4) {
            $roll = $this->lastroll;
            $this->scoreboard->calcScore($roll, $_POST["scoreindex"]);
            $this->updateScorekeys($_POST["scoreindex"]);
            $this->rolls = 1;
            $this->scoreboard->calcBothSum();
            $this->round++;
        }

        if ($this->round > 15) {
            $this->disable = "disabled";
            $data["playlabel"] = "Börja om";
            $data["action"] = "/yatzy/restart";

            $data = array_merge($data, $this->highScore());
        }

        $data["checkbox"] = implode(" ", $this->playerhand->checkDice($this->disable));
        $data["scoreboardUpper"] = $this->scoreboard->upperBoard->board;
        $data["scoreboardLower"] = $this->scoreboard->lowerBoard->board;
        $data["scorekeys"] = $this->boardValues;
        $data["rolls"] = $this->rolls;
        return $data;
    }
}