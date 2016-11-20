<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = array('alive', 'active', 'blacklist', 'color', 'inventory', 'gear', 'fuel', 'damage');
    public $timestamps = false;
    
    public function player() {
        return $this->belongsTo('App\Modules\ArmaLife\Models\Player', 'pid', 'playerid');
    }
}