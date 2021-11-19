<?php

declare(strict_types=1);

namespace App\Contracts;

interface DiceRollInterface
{
    /**
     * @param 
     *
     * @return int.
     */

    public function roll(): int;
}