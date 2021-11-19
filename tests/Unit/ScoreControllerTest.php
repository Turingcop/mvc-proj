<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ScoreController;

class ScoreControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShow()
    {
        $controller = new ScoreController();
        $res = $controller->show();

        $this->assertInstanceOf("Illuminate\View\View", $res);
    }
}