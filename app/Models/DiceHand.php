<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\DiceHandRollInterface;

class DiceHand extends Model implements DiceHandRollInterface
{
    use HasFactory;

    protected array $diceArr;
    protected int $sum;
    public $rolls = [];

    public function __construct($dice, $amount)
    {
        for ($i = 0; $i < $amount; $i++) {
            $this->diceArr[$i] = new $dice();
        }
        $this->sum = 0;
    }

    public function roll(): array
    {
        $len = count($this->diceArr);
        for ($i = 0; $i < $len; $i++) {
            $this->sum += $this->diceArr[$i]->roll();
        }
        return $this->diceArr;
    }

    public function getLastRoll(): array
    {
        $len = count($this->diceArr);
        $res = [];
        $sum = 0;
        for ($i = 0; $i < $len; $i++) {
            $res[$i] = $this->diceArr[$i]->getLastRoll();
            $sum += $this->diceArr[$i]->getLastRoll();
        }
        $this->rolls[] = implode(", ", $res) . " = " . $sum;
        return [$res, $sum];
    }

    public function getSum(): int
    {
        return $this->sum;
    }

    public function setSum($num)
    {
        $this->sum = $num;
    }
}
