<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\StatController;

class StatControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShow()
    {
        $controller = new StatController();
        $res = $controller->show();

        $this->assertInstanceOf("Illuminate\View\View", $res);
    }
}
