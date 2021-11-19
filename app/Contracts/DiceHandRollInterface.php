<?php

declare(strict_types=1);

namespace App\Contracts;

interface DiceHandRollInterface
{
    /**
     * @param 
     *
     * @return array.
     */

    public function roll(): array;

    /**
     * @param 
     *
     * @return array.
     */

    public function getLastRoll(): array;
}