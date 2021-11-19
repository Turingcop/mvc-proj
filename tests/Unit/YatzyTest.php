<?php

declare(strict_types=1);

namespace App\Models;

use PHPUnit\Framework\TestCase;

class YatzyTest extends TestCase
{
    public function testCreateYatzy()
    {
        $yatzy = new Yatzy("App\Models\YatzyHand", "App\Models\DiceGraphic", 5, new DiceHistory(), new HandHistory(), new Score());
        $this->assertInstanceOf(Yatzy::class, $yatzy);
    }

    public function testPresentGame()
    {
        $yatzy = new Yatzy("App\Models\YatzyHand", "App\Models\DiceGraphic", 5, new DiceHistory(), new HandHistory(), new Score());
        $res = $yatzy->presentGame();
        $this->assertIsArray($res);
    }

    public function testPlayThrough()
    {
        $handHist = new class
        {
            public function create()
            {
                return;
            }
        };

        $highScore = new class
        {
            public function highScore()
            {
                return;
            }
            public function setScore()
            {
                return;
            }
        };

        $diceHist = new class
        {
            public function increaseValCount()
            {
                return;
            }
        };

        $yatzy = new Yatzy("App\Models\YatzyHand", "App\Models\DiceGraphic", 5, $diceHist, $handHist, $highScore);
        $yatzy->presentGame();
        for ($i = 0; $i < 15; $i++) {
            for ($j = 0; $j <= 3; $j++) {
                $_POST["dice"] = [$i - 1];
                $_POST["scoreindex"] = $yatzy->scoreboard->boardHands[$i];
                $yatzy->playGame();
            }
        }
        $roll = [1, 1, 1, 1, 1];
        $yatzy->scoreboard->calcScore($roll, "Ettor");
        $this->assertEquals(5, $yatzy->scoreboard->upperBoard->board["Ettor"]);
    }
}
