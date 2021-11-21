<?php

namespace PHPUnit\Framework\TestCase;

use PHPUnit\Framework\TestCase;
use App\Models\UpperBoard;

class UpperBoardTest extends TestCase
{
    /**
     * @return void
     */
    public function testUpperBoard()
    {
        $upperBoard = new UpperBoard();
        $roll = [1, 1, 1, 1, 1];
        $hand = "Ettor";

        $this->assertInstanceOf(UpperBoard::class, $upperBoard);
        $upperBoard->calcScore($roll, $hand);

        $res = $upperBoard->board[$hand];

        $this->assertEquals($res, 5);
    }
}
