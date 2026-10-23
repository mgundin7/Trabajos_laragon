<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CocheExtra extends Model
{
    protected $table = 'coche_extras';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = ['matricula', 'id_extra'];
}
