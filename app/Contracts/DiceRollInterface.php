<?php

declare(strict_types=1);

namespace App\Contracts;

interface DiceRollInterface
{
    /**
     * @return int $roll
     */

    public function roll(): int;
}
