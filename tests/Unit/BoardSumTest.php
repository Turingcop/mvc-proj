<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class BoardSumTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBoardSum()
    {
        $mock = $this->getMockForTrait("App\Traits\BoardSum");
        $board = ["Ettor" => 30, "Tvåor" => 33, "Bonus" => 0];
        $ctrlboard = ["Ettor" => 30, "Tvåor" => 33, "Bonus" => 50, "Summa" => 113];
        $this->assertEquals($ctrlboard, $mock->boardSum($board));
    }
}
