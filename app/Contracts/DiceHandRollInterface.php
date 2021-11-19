<?php

declare(strict_types=1);

namespace App\Contracts;

interface DiceHandRollInterface
{
    public function roll(): array;

    public function getLastRoll(): array;
}