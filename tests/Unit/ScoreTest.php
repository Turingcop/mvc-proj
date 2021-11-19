<?php

namespace PHPUnit\Framework\TestCase;

use Tests\TestCase;
use App\Models\Score;

class ScoreTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSetGetScore()
    {
        $score = new Score();
        $score->setScore(2000, "Kingen");

        $highScore = $score->highScore();
        $this->assertEquals($highScore[0]->score, 2000);

        $score->where("name", "Kingen")->delete();
    }
}
