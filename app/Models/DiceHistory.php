<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiceHistory extends Model
{
    use HasFactory;

    protected $table = 'dicehistory';

    protected $fillabe = ['value', 'count'];

    public function increaseValCount($val)
    {
        $current = self::find(1)->where('value', $val)->value('count');
        self::where('value', $val)->update(['count' => $current + 1]);
    }
}
