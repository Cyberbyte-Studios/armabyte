<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;

class Gang extends Model
{
    protected $fillable = array('owner', 'name', 'members', 'maxmembers', 'bank', 'active');
    public $timestamps = false;
    
    public function player() {
        return $this->belongsTo('App\Modules\ArmaLife\Models\Player', 'owner', 'playerid');
    }
}