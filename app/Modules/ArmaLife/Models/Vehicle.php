<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Vehicle extends Model
{
    use Auditable;

    protected $fillable = array('alive', 'active', 'blacklist', 'color', 'inventory', 'gear', 'fuel', 'damage');
    protected $connection = 'armalife';
    public $timestamps = false;

    public function player() {
        return $this->belongsTo('App\Modules\ArmaLife\Models\Player', 'pid', 'playerid');
    }
}
