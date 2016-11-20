<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Wanted extends Model
{
    use Auditable;

    protected $fillable = array('wantedName', 'wantedCrimes', 'wantedBounty', 'active');
    protected $connection = 'armalife';
    public $timestamps = false;

    public function player()
    {
        return $this->belongsTo('App\Modules\ArmaLife\Models\Player', 'wantedID', 'playerid');
    }
}
