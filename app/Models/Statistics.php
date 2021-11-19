<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    private object $diceHist;
    private object $handHist;

    public function getStats()
    {
        $this->diceHist = new DiceHistory();
        $this->handHist = new HandHistory();

        $data = [];
        $data["hands"]["Ettor"] = $this->handHist->where('hand', "Ettor")->avg('value');
        $data["hands"]["Tvåor"] = $this->handHist->where('hand', "Tvåor")->avg('value');
        $data["hands"]["Treor"] = $this->handHist->where('hand', "Treor")->avg('value');
        $data["hands"]["Fyror"] = $this->handHist->where('hand', "Fyror")->avg('value');
        $data["hands"]["Femmor"] = $this->handHist->where('hand', "Femmor")->avg('value');
        $data["hands"]["Sexor"] = $this->handHist->where('hand', "Sexor")->avg('value');
        $data["hands"]["Par"] = $this->handHist->where('hand', "Par")->avg('value');
        $data["hands"]["Tvåpar"] = $this->handHist->where('hand', "Tvåpar")->avg('value');
        $data["hands"]["Tretal"] = $this->handHist->where('hand', "Tretal")->avg('value');
        $data["hands"]["Fyrtal"] = $this->handHist->where('hand', "Fyrtal")->avg('value');
        $data["hands"]["Kåk"] = $this->handHist->where('hand', "Kåk")->avg('value');
        $data["hands"]["Liten stege"] = $this->handHist->where('hand', "Liten stege")->avg('value');
        $data["hands"]["Stor stege"] = $this->handHist->where('hand', "Stor stege")->avg('value');
        $data["hands"]["Chans"] = $this->handHist->where('hand', "Chans")->avg('value');
        $data["hands"]["Yatzy"] = $this->handHist->where('hand', "Yatzy")->avg('value');
        $data["dice"] = $this->diceHist->all()->sortBy('value');

        $count = [];
        foreach ($data["dice"] as $die) {
            array_push($count, $die->count);
        }

        $data["count"] = $count;

        return $data;
    }
}
