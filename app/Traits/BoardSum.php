<?php

declare(strict_types=1);

namespace App\Traits;

trait BoardSum
{
    public array $board;
    public function boardSum($board)
    {
        $score = 0;
        foreach ($board as $key => $val) {
            if ($key != "Summa" && $key != "Bonus") {
                $score += $val;
            }
        }
        $board["Summa"] = $score;
        if (isset($board["Bonus"]) && $score >= 63) {
            $board["Bonus"] = 50;
        }
        return $board;
    }
}
