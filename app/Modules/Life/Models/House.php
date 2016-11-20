<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model {
    protected $fillable = array('pos', 'owned');
    public $timestamps = false;
    
    public function player() {
        return $this->belongsTo('App\Modules\ArmaLife\Models\Player', 'pid', 'playerid');
    }
}
