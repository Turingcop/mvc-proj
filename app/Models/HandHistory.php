<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandHistory extends Model
{
    use HasFactory;

    protected $table = 'handhistory';

    protected $fillable = ['hand', 'value'];
}
