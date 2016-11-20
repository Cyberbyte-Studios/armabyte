<?php

namespace App\Modules\ArmaLife\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;

class Container extends Model
{
    use Auditable;

    protected $fillable = array('pos', 'inventory', 'gear', 'acive');
    protected $connection = 'armalife';
    public $timestamps = false;

    public function player()
    {
        return $this->belongsTo(Player::class, 'pid', 'playerid');
    }
}
