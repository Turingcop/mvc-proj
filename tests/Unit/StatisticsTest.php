<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Statistics;

class StatisticsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetstats()
    {
        $statistics = new Statistics();
        $data = $statistics->getStats();

        $this->assertIsArray($data);
    }
}
