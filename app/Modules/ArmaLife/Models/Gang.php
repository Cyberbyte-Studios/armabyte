<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Gang extends Model
{
    use Auditable;

    protected $fillable = array('owner', 'name', 'members', 'maxmembers', 'bank', 'active');
    protected $connection = 'armalife';
    public $timestamps = false;

    public function player()
    {
        return $this->belongsTo(Player::class, 'owner', 'playerid');
    }
}
