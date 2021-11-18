<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiceGraphic extends Dice
{
    use HasFactory;

    protected const FACES = 6;
    protected array $graphic = [
        1 => "⚀",
        2 => "⚁",
        3 => "⚂",
        4 => "⚃",
        5 => "⚄",
        6 => "⚅"
    ];

    public function __construct()
    {
        parent::__construct(self::FACES);
    }

    public function graphic(): string
    {
        return $this->graphic[$this->getLastRoll()];
    }
}
