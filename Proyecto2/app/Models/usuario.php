<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class usuario extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    public function rols():belongsToMany
    {
        return $this -> belongsToMany(rol::class,'rol_usuario');
    }
}
