<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tpracticamarcos extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'matricula';
    protected $keyType = 'string'; 
}
