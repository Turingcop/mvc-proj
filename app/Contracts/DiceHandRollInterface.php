<?php

declare(strict_types=1);

namespace App\Contracts;

interface DiceHandRollInterface
{
    /**
     * @return array []
     */

    public function roll(): array;

    public function getLastRoll();
}
