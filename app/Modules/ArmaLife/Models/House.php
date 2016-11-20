<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = array('pos', 'owned');
    protected $connection = 'armalife';
    public $timestamps = false;

    public function player()
    {
        return $this->belongsTo(Player::class, 'pid', 'playerid');
    }
}
