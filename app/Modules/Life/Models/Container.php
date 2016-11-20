<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;

class Container extends Model {
    protected $fillable = array('pos', 'inventory', 'gear', 'acive');
    public $timestamps = false;
    
    public function player() {
        return $this->belongsTo('App\Modules\ArmaLife\Models\Player', 'pid', 'playerid');
    }
}
