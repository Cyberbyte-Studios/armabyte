<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;

class Wanted extends Model {
    protected $fillable = array('wantedName', 'wantedCrimes', 'wantedBounty', 'active');
    public $timestamps = false;
    
    public function player() {
        return $this->belongsTo('App\Modules\ArmaLife\Models\Player', 'wantedID', 'playerid');
    }
}
