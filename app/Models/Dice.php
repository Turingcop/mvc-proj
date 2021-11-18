<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dice
{
    use HasFactory;

    protected int $roll = 0;
    private int $faces;

    public function __construct(int $faces = 6)
    {
        $this->faces = $faces;
    }

    public function roll(): int
    {
        $this->roll = rand(1, $this->faces);
        return $this->roll;
    }

    public function getLastRoll(): int
    {
        return $this->roll;
    }
}
