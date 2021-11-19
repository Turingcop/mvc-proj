<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\LowerBoard;

class LowerBoardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testYatzy()
    {
        $lower = new LowerBoard();
        $roll = [1, 1, 1, 1, 1];
        $hand = "Yatzy";
        $lower->calcScore($roll, $hand);

        $this->assertEquals(50, $lower->board["Yatzy"]);
    }

    public function testDuplicates()
    {
        $lower = new LowerBoard();
        $roll = [2, 2, 2, 2, 5];

        $lower->calcScore($roll, "Par");
        $lower->calcScore($roll, "Tretal");
        $lower->calcScore($roll, "Fyrtal");

        $this->assertEquals(4, $lower->board["Par"]);
        $this->assertEquals(6, $lower->board["Tretal"]);
        $this->assertEquals(8, $lower->board["Fyrtal"]);
    }

    public function testFullHouse()
    {
        $lower = new LowerBoard();
        $roll = [1, 1, 1, 5, 5];
        $lower->calcScore($roll, "Kåk");

        $this->assertEquals(13, $lower->board["Kåk"]);

        $roll = [1, 1, 1, 4, 5];
        $lower->calcScore($roll, "Kåk");
        $this->assertEquals(0, $lower->board["Kåk"]);
    }

    public function testChance()
    {
        $lower = new LowerBoard();
        $roll = [1, 2, 3, 4, 5];
        $lower->calcScore($roll, "Chans");

        $this->assertEquals(15, $lower->board["Chans"]);
    }

    public function testDoubles()
    {
        $lower = new LowerBoard();
        $roll = [1, 1, 1, 2, 2];
        $lower->calcScore($roll, "Tvåpar");

        $this->assertEquals(6, $lower->board["Tvåpar"]);

        $roll = [1, 1, 1, 1, 2];
        $lower->calcScore($roll, "Tvåpar");
        $this->assertEquals(0, $lower->board["Tvåpar"]);
    }

    public function testStraights()
    {
        $lower = new LowerBoard();
        $roll = [2, 1, 4, 3, 5];
        $lower->calcScore($roll, "Stor stege");
        $lower->calcScore($roll, "Liten stege");

        $this->assertEquals(0, $lower->board["Stor stege"]);
        $this->assertEquals(15, $lower->board["Liten stege"]);

        $roll = [2, 3, 4, 5, 6];
        $lower->calcScore($roll, "Stor stege");
        $lower->calcScore($roll, "Liten stege");

        $this->assertEquals(20, $lower->board["Stor stege"]);
        $this->assertEquals(0, $lower->board["Liten stege"]);
    }
}
