<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiceCheat extends DiceGraphic
{
    use HasFactory;

    public function roll(): int
    {
        $this->roll = 6;
        return $this->roll;
    }
}
