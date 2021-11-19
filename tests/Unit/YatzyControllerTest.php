<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Tests\TestCase;

class YatzyControllerTest extends TestCase
{
    public function testStart()
    {
        $controller = new YatzyController();
        $controller->start();
        $this->assertInstanceOf("App\Http\Controllers\YatzyController", $controller);
        $this->assertInstanceOf("App\Models\Yatzy", session("game"));
    }

    public function testPlay()
    {
        $controller = new YatzyController();
        $controller->start();
        $res = $controller->play();
        $this->assertInstanceOf("Illuminate\View\View", $res);
    }

    public function testReset()
    {
        $controller = new YatzyController();
        $controller->start();
        $this->assertInstanceOf("App\Models\Yatzy", session("game"));

        $controller->reset();
        $this->assertEquals('', session('game'));
    }
}
