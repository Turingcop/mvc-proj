<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table = 'score';

    protected $fillable = ['score', 'name'];

    public function highScore()
    {
        $score = new Score();
        $scoreSort = $score->all()->sortByDesc('score')->values();
        return $scoreSort;
    }

    public function setScore($playerscore, $name)
    {
        $score = new Score();
        $score->create([
            'score' => $playerscore,
            'name' => $name,
        ]);
        
        if ($score->all()->offsetExists(10)) {
            $score->all()->sortByDesc('score')->last()->delete();
        }
    }
}
