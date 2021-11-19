<?php

declare(strict_types=1);

namespace App\Contracts;

interface BoardInterface
{
    /**
     * @param array $array
     */

    public function boardSum($array);

    public function calcScore($roll, $hand): void;
}
