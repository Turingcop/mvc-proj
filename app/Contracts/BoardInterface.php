<?php

declare(strict_types=1);

namespace App\Contracts;

interface BoardInterface
{
    /**
     * @param 
     *
     * @return array.
     */

    public function boardSum($array);

    /**
     * @param 
     *
     * @return void.
     */

    public function calcScore($roll, $hand): void;
}