<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class revisiones extends Model
{
    use HasFactory;

    protected $table = 'revisiones';
    protected $primaryKey = 'id_revisiones';
    protected $keyType = 'int';
    public $timestamps = false;
    protected $fillable = ['matricula', 'fecha', 'descripcion', 'precio'];
}