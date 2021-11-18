<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandHistory extends Model
{
    use HasFactory;

    protected $table = 'handhistory';

    protected $fillable = ['hand', 'value'];

    // public function insertHand($hand, $value)
    // {
    //     // $current = Self::find(1)->where('handvalue', $handvalue)->value('count');
    //     // Self::where('handvalue', $handvalue)
    //     // ->update(['count' => $current + 1]);
    //     Self::create(['hand' => $hand, 'value' => $value]);
    // }
}
