<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yatzy
{
    use HasFactory;

    private $playerhand;
    private $presentationHand;
    private array $boardValues;
    private int $round = 1;
    private int $rolls = 0;
    private array $lastroll;
    private ?string $disable = null;
    public ?string $playername = null;
    public ?string $scorekey = null;
    public array $scorekeys;
    private object $diceHistory;
    private object $highScore;
    public object $scoreboard;

    public function __construct($dicehand, $dice, $amount, $diceHistory, $handHistory, $highScore)
    {
        $this->scoreboard = new ScoreBoard($handHistory);
        $this->playerhand = new $dicehand($dice, $amount);
        $this->boardValues = $this->scoreboard->boardHands;
        $this->highScore = $highScore;
        $this->diceHistory = $diceHistory;
    }

    private function updateScorekeys($hand)
    {
        $index = (int) array_search($hand, $this->boardValues);
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
        $flash = null;
        $scoreSort = $this->highScore->highScore();
        $tenth = $scoreSort[9]->score ?? 0;
        $totalscore = $this->scoreboard->boardSum([$this->scoreboard->upperBoard, $this->scoreboard->lowerBoard]);
        if ($totalscore > $tenth) {
            $flash = "Grattis, din poäng placerar dig bland de tio bästa!";
            $this->highScore->setScore($totalscore, $this->playername);
        }
        return $flash;
    }

    private function setData()
    {
        $data = [
            "header" => "Yatzy",
            "title" => "Yatzy",
            "action" => "/yatzy",
            "playlabel" => "Kasta",
            "round" => $this->round,
           ];
        $data = array_merge($data, $this->setName());

        return $data;
    }

    private function saveDice()
    {
        if (isset($_POST["dice"])) {
            foreach ($_POST["dice"] as $val) {
                $this->playerhand->saveDice(intval($val));
            };
        }
    }

    private function thirdRoll($data)
    {
        if ($this->rolls == 3) {
            $this->disable = "disabled";
            $this->lastroll = $this->playerhand->getLastRoll()[0];
            $data["playlabel"] = "Vidare";
            $this->round++;
        }
        return $data;
    }

    private function updateScore()
    {
        if ($this->rolls == 4) {
            $roll = $this->lastroll;
            $this->scoreboard->calcScore($roll, $_POST["scoreindex"]);
            $this->updateScorekeys($_POST["scoreindex"]);
            $this->rolls = 1;
            $this->scoreboard->calcBothSum();
        }
    }

    private function endGame($data)
    {
        if ($this->round > 15) {
            $this->disable = "disabled";
            $data["playlabel"] = "Avsluta";
            $data["action"] = "/yatzy";
            $this->round++;
            return $data;
        }
        return $data;
    }

    private function finishGame($data) {
        if ($this->round == 18) {
            $data["flash"] = $this->highScore();
            $data["playlabel"] = "Börja om";
            $data["action"] = "/yatzy/restart";
        }
        return $data;
    }

    public function playGame()
    {
        $data = $this->setData();
        $this->disable = null;
        $this->saveDice();

        $this->rolls++;
        $this->playerhand->roll();

        $lastRoll = $this->playerhand->getLastRoll()[0];
        foreach ($lastRoll as $die) {
            $this->diceHistory->increaseValCount($die);
        }

        $data = $this->thirdRoll($data);
        $this->updateScore();
        $data = $this->endGame($data);
        $data = $this->finishGame($data);

        $data["checkbox"] = implode(" ", $this->playerhand->checkDice($this->disable));
        $data["scoreboardUpper"] = $this->scoreboard->upperBoard->board;
        $data["scoreboardLower"] = $this->scoreboard->lowerBoard->board;
        $data["scorekeys"] = $this->boardValues;
        $data["rolls"] = $this->rolls;
        return $data;
    }
}
