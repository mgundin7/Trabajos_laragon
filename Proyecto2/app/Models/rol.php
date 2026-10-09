<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class rol extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $keyType = 'integer';

    public function usuarios():belongsToMany
    {
        return $this -> belongsToMany(usuario::class,'rol_usuario');
    }
}
